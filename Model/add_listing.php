<?php

/* 
 * Author: Jeremy Trantham
 * Date Created: 11/28/2017
 * 
 * requires "title", "author", "ISBN", "condition", "loan_type" and "wants" from calling page
 * 
 * 
 */

require_once 'database.php';

$book = json_decode(filter_input(INPUT_POST, 'data'));

$user_ID = filter_input(INPUT_POST, 'user_ID');
$title = $book->title;
$author = $book->author;
$ISBN = $book->isbn13;
$condition = $book->condition;
$loan_type = $book->loan_type;
$wants = $book->wants;

try {
        
        $query = "INSERT INTO books (owner, title, author, ISBN, wants)"
                . "VALUES (owner = :user_id,"
                . "title = :title,"
                . "author = :author, "
                . "isbn = :isbn"
                . "condition= :condition"
                . "loan_type= :loan_type"
                . "wants = :wants);";

       $statement = $db->prepare($query);
       $statement->bindValue(":user_id", $user_id);
       $statement->bindValue(":title", $title);
       $statement->bindValue(":author", $author);
       $statement->bindValue(":isbn", $isbn);
       $statement->bindValue(":condition", $condition);
       $statement->bindValue("loan_type", $loan_type);
       $statement->bindValue(":wants", $wants);
       $statement->execute();
       $statement->closeCursor();
       echo json_encode(array('is_error => false'));
       
    } catch (PDOException $ex) {
        echo json_encode(array('is_error' => false, 'errorMsg' =>$ex->getMessage())); 
    }