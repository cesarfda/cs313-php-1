<?php
//===========================
//FUNCTION TO ADD A Campsite
//===========================
require_once '/idahocamp/library/connections.php';

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

function createCamp($campName, $campImage, $campDescription, $campLocation, $author){
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

function updateCamp($campId, $campLocation, $campDescription, $campImage, $campName){
  // Create a connection object from the phpmotors connection function
  $db = get_db(); 
  // The SQL statement to be used with the database 
  $sql = 'UPDATE camp_site SET name = :campName, image = :campImage, description = :campDescription, location = :campLocation WHERE id = :campId'; 
  // The next line creates the prepared statement using the phpmotors connection      
  $stmt = $db->prepare($sql);
  // The next four lines replace the placeholders in the SQL
  // statement with the actual values in the variables
  // and tells the database the type of data it is
  $stmt->bindValue(':campName', $campName, PDO::PARAM_STR);
  $stmt->bindValue(':campImage', $campImage, PDO::PARAM_STR);
  $stmt->bindValue(':campDescription', $campDescription, PDO::PARAM_STR);
  $stmt->bindValue(':campLocation', $campLocation, PDO::PARAM_STR);
  $stmt->bindValue(':campId', $campId, PDO::PARAM_INT);
  // The next line runs the prepared statement 
  $stmt->execute();
  $stmt->closeCursor();  
}

function deleteCamp($campId){
  // Create a connection object from the phpmotors connection function
  $db = get_db(); 
  // The SQL statement to be used with the database 
  $sql = 'DELETE FROM camp_site WHERE id = :campId'; 
  // The next line creates the prepared statement using the phpmotors connection      
  $stmt = $db->prepare($sql);
  // The next four lines replace the placeholders in the SQL
  // statement with the actual values in the variables
  // and tells the database the type of data it is
  $stmt->bindValue(':campId', $campId, PDO::PARAM_INT);
  // The next line runs the prepared statement 
  $stmt->execute();
  $stmt->closeCursor();  
}
  ?>