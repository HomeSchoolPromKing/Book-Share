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


/*
 * Check for exceptions
 *
 * edit: add array(...PDO:ERROMODE_EXCEPTION)
 * to constructor to make PDOs
 * verbose with SQL syntax errors.
 */
try {
    $db = new PDO($dsn, $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

} // end try
catch (PDOException $ex) {
    $error_message = $ex->getMessage();
    include('database_error.php');
    exit();
} // end catch
?>
