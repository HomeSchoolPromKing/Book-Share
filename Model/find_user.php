<?php

/*
 * Author: Brian Oleniacz
 * Date Created: 11/28/2017
 *
 * returns all the information for a given 'owner'
 *
 * Stores the results in the associative array $results.
 */

require_once 'database.php';  //returns a PDO database connection called $db

//calling page must pass in POST array a variable called 'owner'
$username = $_SESSION['valid_user'];

try {

        $query = "SELECT * FROM books"
                . "WHERE owner = :username;";

       $statement = $db->prepare($query);
       $statement->bindValue(':username', $username);
       $statement->execute();
       $results = $statement->fetchAll();
       $statement->closeCursor();

    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
        echo "error: " . $msg;
        exit();
    }
