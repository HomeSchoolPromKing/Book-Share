<!--
Author: Kat Farley
Purpose: This page will perform the logout process
Date: 11/7/2017
-->

<?php


require_once 'database.php'; //connect to db
        

session_start();


 // logout a user if they are logged in
    
if(isset($_SESSION['valid_user'])) {
    unset($_SESSION['valid_user']);
    session_destroy();
   
    // Display index page
    header("Location:../index.php");
        
}


else {
 
    // Display an error page
     include 'Model/logout_error.php';
   
}
    
    ?>
