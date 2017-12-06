<?php

/*
 * Author: Brian Oleniacz
 * Date Created: 11/28/2017
 *
 * requires 'book_ID' field from calling form
 *
 * This file updates the `requests` field in the Books table
 * and deletes the listing if num of requests = 5.
 *
 * $num_requests contains the updated new requests number if the
 * updated number of requests is less than 5.
 */

require_once 'database.php';

$book_ID = filter_input(INPUT_POST, 'book_ID');

try {
        //get the current number of requests
        $query = "SELECT requests FROM BOOKS"
                . " WHERE book_ID = :book_ID ;";

       $statement = $db->prepare($query);
       $statement->bindValue(':book_ID', $book_ID);
       $statement->execute();
       $num_requests = $statement->fetchColumn();
       $statement->closeCursor();

    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
        echo "error: " . $msg;
        exit();
    }

    if ($num_requests < 5) {
        //increment the requests field by 1
        try {

            $query = "UPDATE books"
                    . "SET requests = requests + 1"
                    . "WHERE book_ID = :book_ID ;";

           $statement = $db->prepare($query);
           $statement->bindValue(':book_ID', $book_ID);
           $statement->execute();
           $statement->closeCursor();

           $num_requests = $num_requests + 1;

        } catch (PDOException $ex) {
            $msg = $ex->getMessage();
            echo "error: " . $msg;
            exit();
        }


    }
    //if requests == 5, delete listing
    else {
        try {

            $query = "DELETE FROM books"
                    . " WHERE book_ID = :book_ID ;";

           $statement = $db->prepare($query);
           $statement->bindValue(':book_ID', $book_ID);
           $statement->execute();
           $statement->closeCursor();

        } catch (PDOException $ex) {
            $msg = $ex->getMessage();
            echo "error: " . $msg;
            exit();
        }
    } //end else

    ?>
