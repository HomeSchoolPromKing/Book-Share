<?php

/* 
 * author: Brian Oleniacz
 * date created: 11/28/2017
 */

require_once database.php;

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

?>

