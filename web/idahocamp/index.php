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
    case 'template':
        include 'view/template.php';
     break;
    
    default:
     include 'views/campgrounds/index.php';
}

?>