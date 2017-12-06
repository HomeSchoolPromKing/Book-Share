<?php
/* 
 * Creator: Brian Oleniacz
 * Date created: 12/5/2017
 * 
 * This file retrieves all the books owned by a particular user and 
 * returns them as $results.
 */


require_once 'database.php';

$user_ID = $_SESSION['valid_user'];

try {

       
       $query = "SELECT * FROM books"
                . " WHERE owner = :user_ID ";

       $statement = $db->prepare($query);
       $statement->bindValue(':user_ID', $user_ID);
       $statement->execute();
       $results = $statement->fetchAll();
  


    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
        echo "Error: " . $msg;
        exit();
    }
?>