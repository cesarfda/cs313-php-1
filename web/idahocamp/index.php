<?php
// MAIN CONTROLER
require_once './library/connections.php';
$db = get_db(); 
// Create or access a Session
session_start();

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
        
        if(isset($_FILES['image'])){
            $errors= array();
            $file_name = $_FILES['image']['name'];
            $file_size =$_FILES['image']['size'];
            $file_tmp =$_FILES['image']['tmp_name'];
            $file_type=$_FILES['image']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
            
            $extensions= array("jpeg","jpg","png");
            
            if(in_array($file_ext,$extensions)=== false){
               $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }
            
            if($file_size > 2097152){
               $errors[]='File size must be excately 2 MB';
            }
            
            if(empty($errors)==true){
               move_uploaded_file($file_tmp,"images/".$file_name);
            }else{
               print_r($errors);
            }
         }

         #$campImage = "images/".$file_name;
         //Send data to model
         $campOutcome = addNewCamp($campName,$campImage,$campDescription, $campLocation, $author);
         // Check and report the result
         if($campOutcome === 1){
            $message = "<p>Camp added successfully.</p>";
            include './views/campgrounds/new.php';
            exit;
         } 
         else {
            $message = "<p>Sorry but the process failed. Please try again.</p>";
            include './views/campgrounds/new.php';
            exit;
         }
        
        break;
    
    default:
     include 'views/campgrounds/index.php';
}

?>