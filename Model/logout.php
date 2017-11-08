<!--
Author: Kat Farley
Purpose: This page will perform the logout process
Date: 11/7/2017
-->

<?php


include 'database.php'; //connect to db
        

session_start();


 // logout a user if they are logged in
    
if(isset($_SESSION['valid_user'])) {
    unset($_SESSION['valid_user']);
    session_destroy();

    echo 'You are now logged out.';

           // Display the index page
            include('index.php');
        
}

// else display an error message
else {
    echo 'User not logged in.';
    // Display the index page
    include('index.php');
}
    
    ?>
