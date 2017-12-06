<?php

/*
 * @author Brian Oleniacz
 * This file contains various atomic functions for SQL database updates.
 * Created 11-21-2017
 */

require_once 'database.php';

function add_listing($owner, $title, $author, $ISBN, $condition, $loan_type, $wants){

    global $db;

     try {

            $query = "INSERT INTO books (owner, title, author, ISBN, wants) "
                    . "VALUES (owner = :owner, "
                    . "title = :title, "
                    . "author = :author, "
                    . "ISBN = :ISBN, "
                    . "wants = :wants);";

           $statement = $db->prepare($query);
           $statement->bindValue(':owner', $owner);
           $statement->bindValue(':title', $title);
           $statement->bindValue(':author', $author);
           $statement->bindValue(':isbn', $ISBN);
           $statement->bindValue(':wants', $wants);
           $statement->execute();
           $statement->closeCursor();

        } catch (PDOException $ex) {
            $msg = $ex->getMessage();
            echo "error: " . $msg;
            exit();
        }
 }

/* Delete scrips */
function del_all_old_listings(){

    global $db;

    try {

        //update with new information
        $date = "insert date here";

        $query = "DELETE FROM books"
                . "WHERE date=:date ";

       $statement = $db->prepare($query);
       $statement->bindValue(':date', $date);
       $statement->execute();
       $results = $statement->fetchAll();
       $statement->closeCursor();

    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
        echo "error: " . $msg;
        exit();
    }
} //end del_all_old_listings




function del_all_owner_listings($owner){

    global $db;

    try {

        $query = "DELETE FROM books"
                . " WHERE owner=:owner ;";

       $statement = $db->prepare($query);
       $statement->bindValue(':owner', $owner);
       $statement->execute();
       $statement->closeCursor();

    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
        echo "error: " . $msg;
        exit();
    }
} //end del_all_owner_listings



 /*
  * returns $email of a given $username
  */
 function get_email($username){

    global $db;

    try {

           $query = "SELECT `email` FROM user"
                   . " WHERE username = :username;"; //user_id is lowercase in db

          $statement = $db->prepare($query);
          $statement->bindValue(':username', $username);
          $statement->execute();
          $email = $statement->fetchColumn();
          $statement->closeCursor();
          return $email;

       } catch (PDOException $ex) {
           $msg = $ex->getMessage();
           echo "error: " . $msg;
           exit();
       }
    }

    /*
     * requires $book_ID as parameter.
     * returns $owner
     */
    function get_owner($book_ID){

        global $db;

        try {

        $query = "SELECT `owner` FROM books"
                . " WHERE book_ID = :book_ID;";

       $statement = $db->prepare($query);
       $statement->bindValue(':book_ID', $book_ID);
       $statement->execute();
       $owner = $statement->fetchColumn();
       $statement->closeCursor();
       return $owner;

        } catch (PDOException $ex) {
            $msg = $ex->getMessage();
            echo "error: " . $msg;
            exit();
        }
    }  //end get_owner()



    /*
    * Increments the 'requests' field by one and returns the updated
    * 'requests' field.
    */
    function increment_requests($book_ID){

    global $db;

    try {
        //get the current number of requests
        $query = "SELECT requests FROM books"
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

        } catch (PDOException $ex) {
            $msg = $ex->getMessage();
            echo "error: " . $msg;
            exit();
        }

        return $num_requests;
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
} //end increment_requests()

?>
