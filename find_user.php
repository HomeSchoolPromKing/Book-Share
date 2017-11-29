<?php

/* 
 * Author: Brian Oleniacz
 * Date Created: 11/28/2017
 * 
 * returns all the information for a given 'owner'
 * 
 * Stores the results in the associative array $results.
 */

require_once database.php;  //returns a PDO database connection called $db
 
$owner = filter_input(INPUT_POST, 'owner');

try {
        
        $query = "SELECT * FROM books"
                . "WHERE owner = :owner;";

       $statement = $db->prepare($query);
       $statement->bindValue(':owner', $owner);
       $statement->execute();
       $results = $statement->fetchAll();
       $statement->closeCursor();
       
    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
        echo "error: " . $msg;
        exit();
    }



