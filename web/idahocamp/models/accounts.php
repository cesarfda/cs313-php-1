<?php
// ACCOUNTS MODEL
    

    function checkPassword($clientPassword){
        $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
        return preg_match($pattern, $clientPassword);
    }
    function checkEmail($clientEmail){
        $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
        return $valEmail;
       }

    // FUNCTION THAT HANDLES member REGISTRATION
    function regmember($username, $password, $email, $fullName){
        // Create a connection object using the phpmotors connection function
        $db = get_db();
        // The SQL statement
        $sql = 'INSERT INTO member (username, password, email, full_name)
            VALUES (:username, :password, :email, :fullName)';
        // Create the prepared statement using the phpmotors connection
        $stmt = $db->prepare($sql);
        // The next four lines replace the placeholders in the SQL
        // statement with the actual values in the variables
        // and tells the database the type of data it is
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':fullName', $fullName, PDO::PARAM_STR);
        // Insert the data
        $stmt->execute();
        // Ask how many rows changed as a result of our insert
        $rowsChanged = $stmt->rowCount();
        // Close the database interaction
        $stmt->closeCursor();
        // Return the indication of success (rows changed)
        return $rowsChanged;
    }

    // CHECK FOR THAT THE EMAIL ADRESS BEING USED TO REGISTER IS NOT ALREADY IN THE DB
    function checkExistingUsername($username) {
        $db = get_db();
        $sql = 'SELECT username FROM member WHERE username = :username';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $matchUsername = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if(empty($matchUsername)){
        return 0;
        } else {
        return 1;
        }
    }

    // Get member data based on an email address
    function getmember($username){
        $db = get_db();
        $sql = 'SELECT * FROM member WHERE username = :username';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $memberData = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $memberData;
    }

    // Get member data based on ID
    function getmemberById($id){
        $db = get_db();
        $sql = 'SELECT * FROM member WHERE id = :id';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
        $memberData = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $memberData;
   }

   

    // FUNCTION THAT UPDATES member INFO
    function updatemember($username,  $email, $fullName, $id){
        // Create a connection object using the phpmotors connection function
        $db = get_db();
        // The SQL statement
        $sql = 'UPDATE member SET username = :username, email = :email, full_name =:fullName WHERE id = :id';
        // Create the prepared statement using the phpmotors connection
        $stmt = $db->prepare($sql);
        // The next four lines replace the placeholders in the SQL
        // statement with the actual values in the variables
        // and tells the database the type of data it is
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':fullName', $fullName, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        // Update the data
        $stmt->execute();
        // Ask how many rows changed as a result of our insert
        $rowsChanged = $stmt->rowCount();
        // Close the database interaction
        $stmt->closeCursor();
        // Return the indication of success (rows changed)
        return $rowsChanged;
    }

    // FUNCTION THAT UPDATES member PASSWORD
    function updatePassowrd($password, $id){
        // Create a connection object using the phpmotors connection function
        $db = get_db();
        // The SQL statement
        $sql = 'UPDATE members SET password = :password WHERE id = :id';
        // Create the prepared statement using the phpmotors connection
        $stmt = $db->prepare($sql);
        // The next four lines replace the placeholders in the SQL
        // statement with the actual values in the variables
        // and tells the database the type of data it is
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        // Update the data
        $stmt->execute();
        // Ask how many rows changed as a result of our insert
        $rowsChanged = $stmt->rowCount();
        // Close the database interaction
        $stmt->closeCursor();
        // Return the indication of success (rows changed)
        return $rowsChanged;
    }

   
?>