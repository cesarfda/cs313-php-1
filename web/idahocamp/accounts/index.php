<?php
// ACCOUNTS CONTROLER

// Create or access a Session
session_start();

require_once './library/connections.php';
require_once './models/accounts.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action){
    case 'signUp':
        include '../views/register.php';
    break;
    
    case 'login':
      include '../views/login.php';
    break;
   
    //REGISTRATION CASE
    //
    case 'register':
     // Filter and store the data
      $fullName = filter_input(INPUT_POST, 'fullName', FILTER_SANITIZE_STRING);
      $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
      $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
      $email = checkEmail($email);
      $checkPassword = checkPassword($password);
      //Check for existing email address
      $existingEmail = checkExistingEmail($email);

      // Check for existing email address in the table
      if($existingEmail){
      $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
      include './views/login.php';
      exit;
      }

      // Check for missing data
      if(empty($fullName) || empty($username) || empty($email) || empty($checkPassword)){
      $message = '<p>Please provide information for all empty form fields.</p>';
      include './views/register.php';
      exit; 
      }
    
      // Hash the checked password
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      // Send the data to the model
      $regOutcome = regmember($username, $password, $email, $fullName);


      // Check and report the result
      if($regOutcome === 1){
        setcookie('firstname', $fullName, strtotime('+1 year'), '/');
        $_SESSION['message'] = "<p>Thanks for registering $fullName. Please use your email and password to login.</p>";
        header('Location:  /idahocamp/accounts/?action=login');
        exit;
      } else {
        $message = "<p>Sorry $fullName, but the registration failed. Please try again.</p>";
        include './views/register.php';
        exit;
      }
    break;

     //LOGIN CASE
     //
      case 'processLogin':
        //Filter and store
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $email = checkEmail($email);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $passwordCheck = checkPassword($password);
        //CHECK INPUTS
        // Run basic checks, return if errors
        if (empty($email) || empty($passwordCheck)) {
          $message = '<p class="notice">Please provide a valid email address and password.</p>';
          include './views/login.php';
          exit;
        }
        
        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getmember($email);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($password, $clientData['password']);
        // If the hashes don't match create an error
        // and return to the login view
        if(!$hashCheck) {
          $message = '<p class="notice">Please check your password and try again.</p>';
          include './views/login.php';
          exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // Send them to the admin view
        header('Location: /idahocamp/index.php');
        exit;

      break;

    //LOGOUT CASE
     case 'logout':
        //Destroy Session
        session_destroy();
        //Send user back to main controller
        header('Location: /idahocamp/index.php');
     break;

    //UPDATE INFO VIEW
      case 'updateInfo':
        include '../view/client-update.php';
        exit;
      break;
    //UPDATE ACCOUNT INFO
      case 'updateAccountInfo':
        // Filter and store the data
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
        $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientId = $_SESSION['clientData']['clientId'];
       

        // Check for missing data
        if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)){
        $message = '<p>Please provide information for all empty form fields.</p>';
        include '../view/client-update.php';
        exit; 
        }

        // Send the data to the model
        $modOutcome = updatemember($clientFirstname, $clientLastname, $clientEmail, $clientId);


        // Check and report the result
        if($modOutcome){
          $clientData = getmemberById($clientId);
          $_SESSION['clientData'] = $clientData;
          header('Location: /phpmotors/accounts');
          exit;
        } else {
          $message = "<p>Sorry $clientFirstname, but the update failed. Please try again.</p>";
          include '../view/client-update.php';
          exit;
        }
      break;

    //UPDATE ACCOUNT PASSWORD
    case 'updateAccountPsw':
      // Filter and store the data
      $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
      $checkPassword = checkPassword($clientPassword);
      $clientId = $_SESSION['clientData']['clientId'];

      // Check for missing data
      if(empty($checkPassword)){
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '../view/client-update.php';
      exit; 
      }
      // Hash the checked password
      $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

      // Send the data to the model
      $modOutcome = updatePassowrd($hashedPassword, $clientId);


      // Check and report the result
      if($modOutcome){
        $_SESSION['message'] = "Your password has been updated. Please use your email and password to login.";
        header('Location: /phpmotors/accounts/?action=login');
        exit;
      } else {
        $message = "<p>Sorry $clientFirstname, but the update failed. Please try again.</p>";
        include '../view/client-update.php';
        exit;
      }
    break;
    
    //DEFAULT
      default:
        include '../views/campgrounds/index.php';
      break;
 }

?>