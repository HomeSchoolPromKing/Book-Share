<?php

/*
 * Author: Brian Oleniacz
 * Date Created: 11/28/2017
 *
 * requires "book_ID" variable from calling form.
 *
 * Returns the value of the user_ID (? should it return 'owner'?) of a
 * given book_ID
 * as '$user_ID.'
 */

require_once 'database.php';

$book_ID = filter_input(INPUT_POST, 'book_ID');

try {

        $query = "SELECT `user_id` FROM books"
                . "WHERE book_id = :book_id;";

       $statement = $db->prepare($query);
       $statement->bindValue(':book_id', $book_id);
       $statement->execute();
       $user_ID = $statement->fetchColumn();
       $statement->closeCursor();

    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
        echo "error: " . $msg;
        exit();
    }
