<?php
// MAIN CONTROLER
require_once '../library/connections.php';
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
    case 'addNewCamp':
        //Fetch Data
        $campName = filter_input(INPUT_POST, 'campName', FILTER_SANITIZE_STRING);
        $campImage = filter_input(INPUT_POST, 'campImage', FILTER_SANITIZE_STRING);
        $campDescription = filter_input(INPUT_POST, 'campDescription', FILTER_SANITIZE_STRING);
        $campLocation = filter_input(INPUT_POST, 'campLocation', FILTER_SANITIZE_STRING);
        $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING);
        //Check Data
        if(empty($campName) || empty($campImage) || empty($campDescription) || empty($campLocation) || empty($author)){
        $message = '<p>Please provide information for all empty fields.</p>';
        include './views/campgrounds/new.php';
        exit;
        }
        //Send data to model
        $vehicleOutcome = addNewCamp($campName,$campImage,$campDescription, $campLocation, $author);
        // Check and report the result
        if($vehicleOutcome === 1){
        $message = "<p>Camp added successfully.</p>";
        include './views/campgrounds/new.phpp';
        exit;
        } else {
        $message = "<p>Sorry but the process failed. Please try again.</p>";
        include './views/campgrounds/new.php';
        exit;
        }
  break;
    
    default:
     include 'views/campgrounds/index.php';
}

?>