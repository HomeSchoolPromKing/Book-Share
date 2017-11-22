<?php
/* 
 * Purpose: This file establishes the database connection
 * Author: Kat Farley
 * Date: 11/3/2017
 * 
 * Zack's new test comment
 */

$dsn = 'mysql:host=localhost;dbname=bookshare';
$username = 'root';
$password = '';

// Check for exceptions 
try {
    $db = new PDO($dsn, $username, $password);
	echo "connected to database";
} // end try
catch (PDOException $ex) {
    $error_message = $ex->getMessage();
	echo "unknown error";
    include('database_error.php');
    exit();
} // end catch


?>