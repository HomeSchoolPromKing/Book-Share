<?php

/* 
 * Author: Jeremy Trantham
 * Date Created: 11/28/2017
 * 
 * requires "title", "author", "ISBN", "condition", "loan_type" and "wants" from calling page
 * 
 * Returns the owner (? should it return 'user_ID'?) of a  given book_ID 
 * as '$owner.'
 */
require_once 'database.php';

$user_ID = filter_input(INPUT_POST, 'user_ID');
$title = filter_input(INPUT_POST, $title);
$author = filter_input(INPUT_POST, $authors);
$ISBN = filter_input(INPUT_POST, $isbn);
$condition = filter_input(INPUT_POST, $condition);
$loan_type = filter_input(INPUT_POST, $loan_type);
$wants = filter_input(INPUT_POST, $wants);

try {
        
        $query = "INSERT INTO books (owner, title, author, ISBN, wants)"
                . "VALUES (owner = :user_id,"
                . "title = :title,"
                . "author = :author, "
                . "ISBN = :ISBN"
                . "wants = :wants);";

       $statement = $db->prepare($query);
       $statement->bindValue(':user_id', $user_id);
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