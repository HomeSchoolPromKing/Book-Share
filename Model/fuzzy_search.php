<?php

/* 
 * Author: Brian Oleniacz
 * Purpose: This page performs a fuzzy search on the 
 * Date: 11/7/2017
 */

    require_once 'database.php';
    
    $search = filter_input(INPUT_GET, 'search');
    
    echo "You searched for '$search'.";

    
    try {
        
        $index_books_table = "ALTER TABLE Books "
                . "ADD FULLTEXT KEY (title, author, `ISBN-10`, `ISBN-13`);";
                
        $statement = $db->prepare($index_books_table);
        $statement->execute(); 
        
        $better_query = "SELECT * FROM Books "
                . "WHERE CONCAT_WS(' ', title, author, `ISBN-10`, `ISBN_13`) "
                . "LIKE :search " ;
        
        $query = "SELECT * FROM Books "
                . "WHERE MATCH(title, author, `ISBN-10`, `ISBN-13`) "
                . "AGAINST (:search)" ;
        
       $search = "%" . $search . "%";
        
       $statement = $db->prepare($query);
       $statement->bindValue(':search', $search);
       $statement->execute();     
       $results = $statement->fetchAll();
       $statement->closeCursor();
       
    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
        echo "error: " . $msg;
        exit();
    }

?>