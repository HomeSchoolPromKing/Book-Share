<?php

/*
 * Author: Brian Oleniacz
 * Date Created: 11/28/2017
 *
 * requires "book_ID" variable from calling form.
 *
 * Returns the owner (? should it return 'user_ID'?) of a  given book_ID
 * as '$owner.'
 */

require_once 'database.php';

$book_ID = filter_input(INPUT_POST, 'book_ID');

try {

        $query = "SELECT `owner` FROM books"
                . " WHERE book_id = :book_id;";

       $statement = $db->prepare($query);
       $statement->bindValue(':book_id', $book_id);
       $statement->execute();
       $owner = $statement->fetchColumn();
       $statement->closeCursor();

    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
        echo "error: " . $msg;
        exit();
    }
?>