<?php

/* 
 * Author: Brian Oleniacz
 * Date Created: 11/28/2017
 * 
 * returns all the information for a given user_ID
 * 
 * Stores the results in the associative array $results.
 */

require_once database.php;
 
$user_ID = filter_input(INPUT_POST, 'user_ID');

try {
        
        $query = "SELECT * FROM books"
                . "WHERE user_id = :user_id;";

       $statement = $db->prepare($query);
       $statement->bindValue(':user_id', $user_id);
       $statement->execute();
       $results = $statement->fetchAll();
       $statement->closeCursor();
       
    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
        echo "error: " . $msg;
        exit();
    }



