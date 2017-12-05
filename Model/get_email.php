<?php

/*
 * Author: Brian Oleniacz
 * Date created: 11/28/2017
 *
 * This file returns the email address of a requested user.
 * email is stored in the variable $email.
 *
 * requires the user_ID from the calling form.
 * note: the current "Books" table has "owner" with username as the foreign key.
 */

require_once 'database.php';

$user_ID = filter_input(INPUT_POST, 'user_ID');

try {

        $query = "SELECT `email` FROM users"
                . "WHERE user_id = :user_id;";

       $statement = $db->prepare($query);
       $statement->bindValue(':user_id', $user_id);
       $statement->execute();
       $email = $statement->fetchColumn();
       $statement->closeCursor();


    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
        echo "error: " . $msg;
        exit();
    }
