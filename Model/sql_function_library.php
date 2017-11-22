<?php

/* 
 * @author Brian Oleniacz
 * This file contains various atomic functions for SQL database updates.
 * Created 11-21-2017
 */

require_once database.php;

/* Delete scrips */
function del_all_old_listings(){
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
} //end del_all_owner_listings


/* 
 * Increments the 'requests' field by one and returns the updated
 * 'requests' field.
 */
function incrmnt_requests($book_ID){
    try {
        //get the current number of requests
        $query = "SELECT requests FROM BOOKS"
                . "WHERE book_ID = :book_ID ;";

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
    } //end else
} //end incrmnt_requests()


 //function add_listing($title, $author, $isbn_10, $isbn_13, $owner)

?>