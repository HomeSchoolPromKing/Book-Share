<!DOCTYPE html>
<!--
Author: Kat Farley
Purpose: This page acts as the home page and will have a listing of books 
Date: 11/7/2017
-->
<?php
include 'database.php'; //connect to db

// start session if the session not yet started
if (empty($_SESSION)) {
    session_start();
}

// if user not logged in, send to login
if(!isset($_SESSION['valid_user'])) { 
   header("Location: index.php");
}
?>
<html>
<body>
<p>Welcome, <?php echo $_SESSION['valid_user']; ?>. Please browse our booklist or
    <a href="logout.php">logout</a>.</p>
</body>
</html> 