<?php
// MAIN CONTROLER
require_once './library/connections.php';
require_once './models/accounts.php';
require_once './models/campgrounds.php';

#$db = get_db(); 
// Create or access a Session
session_start();

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

    case 'addNewCamp':
        //Fetch Data
        $campName = filter_input(INPUT_POST, 'campName', FILTER_SANITIZE_STRING);
        $campImage = filter_input(INPUT_POST, 'campImage', FILTER_SANITIZE_STRING);
        $campDescription = filter_input(INPUT_POST, 'campDescription', FILTER_SANITIZE_STRING);
        $campLocation = filter_input(INPUT_POST, 'campLocation', FILTER_SANITIZE_STRING);
        if(isset($_SESSION['clientData'])){
        $author = $_SESSION['clientData']['id'];
        }
        else{
            $author = 1;
        }
        //Check Data
        if(empty($campName) || empty($campDescription) || empty($campImage) || empty($campLocation) || empty($author)){
        $message = '<p>Please provide information for all empty fields.</p>';
        include './views/campgrounds/new.php';
        exit;
        }
         #$campImage = "images/".$file_name;
         //Send data to model
         try{
            createCamp($campName, $campImage, $campDescription, $campLocation, $author);
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
            die();
        break;

        case 'detail':
            $campId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            $campInfo = getCampInfo($campId);
            $authorName = getmemberById($campInfo['author']);
            include './views/campgrounds/show.php';
            die();
        break;

        case 'del':
            $campId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
            $campInfo = getCampInfo($campId);
            include './views/campgrounds/delete.php';
            die();
        break;

        case 'deleteCamp':
            //Fetch Data
            $campId = filter_input(INPUT_POST, 'campId', FILTER_SANITIZE_NUMBER_INT);
            //Check Data
            if(empty($campId)){
                $message = '<p>The deletion could not be completed. Please try again later</p>';
                include './views/campgrounds/delete.php';
                exit;
            }
             //Send data to model
             try{
                deleteCamp($campId);
             }
             catch(Exception $ex){
                 echo"Error with DB. Details:$ex";
                 die();
             }
             // Check and report the result
                header('Location: /idahocamp/index.php');
                exit;
            break;

        case 'updateCamp':
            //Fetch Data
            $campId = filter_input(INPUT_POST, 'campId', FILTER_SANITIZE_NUMBER_INT);
            $campName = filter_input(INPUT_POST, 'campName', FILTER_SANITIZE_STRING);
            $campImage = filter_input(INPUT_POST, 'campImage', FILTER_SANITIZE_STRING);
            $campLocation = filter_input(INPUT_POST, 'campLocation', FILTER_SANITIZE_STRING);
            $campDescription = filter_input(INPUT_POST, 'campDescription', FILTER_SANITIZE_STRING);
            //Check Data
            if(empty($campId) ||empty($campName) || empty($campDescription) || empty($campImage) || empty($campLocation)){
                $message = '<p>Please provide information for all empty fields.</p>';
                include './views/campgrounds/edit.php';
                exit;
            }
             //Send data to model
             try{
                updateCamp($campId, $campLocation, $campDescription, $campImage, $campName);
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