<!DOCTYPE html>
<!--
Purpose: This program logs a user in
Author: Kat Farley
Date: 11/3/2017
-->
<?php
include 'database.php'; // for connecting to db



// if the user is logged in, send to home page
if(isset($_SESSION['valid_user'])) { 
   header("location: home.php"); 
   exit; 
}



?>


<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css"href="styles.css">
        <title>Durham Tech | Bookshare</title>
    </head>
    <body>
        <br>
        <h1>Login</h1>
        
        <form class="inputform" action="login.php" method="post">
            <div id="formelements">
                Username:<br>
                <input type="text" name="membername"><br>
                Password:<br>
                <input type="password" name="memberpassword"> <br>
                <input type="submit" value="Login">
                </div>
        </form>
        
        <form class="inputform" action="logout.php" method="post">
             <input type="submit" value="Logout">
        </form>
        
        
    </body>
</html>