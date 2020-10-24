<?php
//===========================
//FUNCTION TO ADD A VEHICLE
//===========================
  function addNewCamp($campName,$campImage,$campDescription, $campLocation, $author){
    // Create a connection object from the phpmotors connection function
    $db = get_db(); 
    // The SQL statement to be used with the database 
    $sql = 'INSERT INTO `camp_site` (`id``name`, `image`, `description`, `location`, `creation_date`, `author`) 
    VALUES (NULL, :campName, :campImage, :campDescription, :campLocation, current_timestamp, :author)'; 
    // The next line creates the prepared statement using the phpmotors connection      
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':campName', $campName, PDO::PARAM_STR);
    $stmt->bindValue(':campImage', $campImage, PDO::PARAM_STR);
    $stmt->bindValue(':campDescription', $campDescription, PDO::PARAM_STR);
    $stmt->bindValue(':campLocation', $campLocation, PDO::PARAM_STR);
    $stmt->bindValue(':author', $author, PDO::PARAM_STR);
    // The next line runs the prepared statement 
    $stmt->execute(); 
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // The next line closes the interaction with the database 
    $stmt->closeCursor(); 
     // Return the indication of success (rows changed)
     return $rowsChanged;
  }