<?php
// MAIN CONTROLER
require_once './library/connections.php';
$db = get_db(); 
// Create or access a Session
session_start();

function getCampInfo($campId){
    $db = get_db();
    $sql = 'SELECT * FROM camp_site WHERE id = :campId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':campId', $campId, PDO::PARAM_INT);
    $stmt->execute();
    $invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
  return $invInfo;
  }

// Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action){
    case 'addCamp':
        include './views/campgrounds/new.php';
    break;

    case 'About':
        include './views/about.php';
    break;

    case 'login':
        include './views/login.php';
    break;

    case 'logout':
        //Destroy Session
        session_destroy();
        //Send user back to main controller
        header('Location: /idahocamp/index.php');
    break;

    case 'signUp':
        include './views/register.php';
    break;

    case 'addNewCamp':
        //Fetch Data
        $campName = filter_input(INPUT_POST, 'campName', FILTER_SANITIZE_STRING);
        $campImage = filter_input(INPUT_POST, 'campImage', FILTER_SANITIZE_STRING);
        $campDescription = filter_input(INPUT_POST, 'campDescription', FILTER_SANITIZE_STRING);
        $campLocation = filter_input(INPUT_POST, 'campLocation', FILTER_SANITIZE_STRING);
        $author = 1;
        //Check Data
        if(empty($campName) || empty($campDescription) || empty($campImage) || empty($campLocation) || empty($author)){
        $message = '<p>Please provide information for all empty fields.</p>';
        include './views/campgrounds/new.php';
        exit;
        }
         #$campImage = "images/".$file_name;
         //Send data to model
         try{
            
                // Create a connection object from the phpmotors connection function
                $db = get_db(); 
                // The SQL statement to be used with the database 
                $sql = 'INSERT INTO camp_site (name, image, description, location, creation_date, author) 
                VALUES (:campName, :campImage, :campDescription, :campLocation, current_timestamp, :author)'; 
                // The next line creates the prepared statement using the phpmotors connection      
                $stmt = $db->prepare($sql);
                // The next four lines replace the placeholders in the SQL
                // statement with the actual values in the variables
                // and tells the database the type of data it is
                $stmt->bindValue(':campName', $campName, PDO::PARAM_STR);
                $stmt->bindValue(':campImage', $campImage, PDO::PARAM_STR);
                $stmt->bindValue(':campDescription', $campDescription, PDO::PARAM_STR);
                $stmt->bindValue(':campLocation', $campLocation, PDO::PARAM_STR);
                $stmt->bindValue(':author', $author, PDO::PARAM_INT);
                // The next line runs the prepared statement 
                $stmt->execute(); 
              
         }
         catch(Exception $ex){
             echo"Error with DB. Details:$ex";
             die();
         }
         // Check and report the result
            include './views/campgrounds/index.php';
            exit;
        break;


        case 'mod':
            $campId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            $campInfo = getCampInfo($campId);
            include './views/campgrounds/edit.php';
        break;

        case 'updateCamp':
            //Fetch Data
            $campId = filter_input(INPUT_POST, 'campId', FILTER_SANITIZE_NUMBER_INT);
            $campName = filter_input(INPUT_POST, 'campName', FILTER_SANITIZE_STRING);
            $campImage = filter_input(INPUT_POST, 'campImage', FILTER_SANITIZE_STRING);
            $campDescription = filter_input(INPUT_POST, 'campDescription', FILTER_SANITIZE_STRING);
            $campLocation = filter_input(INPUT_POST, 'campLocation', FILTER_SANITIZE_STRING);
            $author = 1;
            //Check Data
            if(empty($campName) || empty($campDescription) || empty($campImage) || empty($campLocation) || empty($author)){
                $message = '<p>Please provide information for all empty fields.</p>';
                include './views/campgrounds/edit.php';
                exit;
            }
            #var_dump($campDescription) ;
             #$campImage = "images/".$file_name;
             //Send data to model
             try{
                    // Create a connection object from the phpmotors connection function
                    $db = get_db(); 
                    // The SQL statement to be used with the database 
                    $sql = 'UPDATE camp_site SET name = :campName, image = :campImage, description = :campDescription WHERE id = :campId'; 
                    // The next line creates the prepared statement using the phpmotors connection      
                    $stmt = $db->prepare($sql);
                    // The next four lines replace the placeholders in the SQL
                    // statement with the actual values in the variables
                    // and tells the database the type of data it is
                    $stmt->bindValue(':campName', $campName, PDO::PARAM_STR);
                    $stmt->bindValue(':campImage', $campImage, PDO::PARAM_STR);
                    $stmt->bindValue(':campDescription', $campDescription, PDO::PARAM_STR);
                    $stmt->bindValue(':campId', $campId, PDO::PARAM_INT);
                    // The next line runs the prepared statement 
                    $stmt->execute();
                    $stmt->closeCursor();  
             }
             catch(Exception $ex){
                 echo"Error with DB. Details:$ex";
                 die();
             }
             // Check and report the result
                header('Location: /idahocamp/index.php');
                exit;
            break;
    
    default:
     include 'views/campgrounds/index.php';
}

?>