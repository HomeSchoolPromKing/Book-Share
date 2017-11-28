<?php

/* 
 * Author: Brian Oleniacz
 * Date Created: 11/28/2017
 * 
 * This file deletes all the listings for a specified owner.
 * 
 * Should the foreign key in the Books table be 'owner' or 'user_ID'?
 */

require_once database.php;

$owner = filter_input(INPUT_POST, 'owner');

try {
        
        $query = "DELETE FROM books"
                . "WHERE owner=:owner ;";

       $statement = $db->prepare($query);
       $statement->bindValue(':owner', $owner);
       $statement->execute();     
       $statement->closeCursor();
       
    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
        echo "error: " . $msg;
        exit();
    }

