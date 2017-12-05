<?php
/*
$con=mysqli_connect("localhost","root","","bookshare");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = (int)$_GET['id'];

$update = $con->prepare("DELETE FROM books WHERE book_id = '$id'");
$update->bind_param('i', $id);
$update->execute();
$update->close();
*/


require_once 'database.php';

$book_ID = filter_input(INPUT_GET, 'id');
echo "book id is $book_ID";

try {

        $query = "DELETE FROM books"
              . " WHERE book_ID = :book_ID; ";
       $statement = $db->prepare($query);
       $statement->bindValue(':book_ID', $book_ID);
       $statement->execute();
       $statement->closeCursor();

    } catch (PDOException $ex) {
        $msg = $ex->getMessage();
        echo "error: " . $msg;
        exit();
    }

// header("Location: ../profile.php");
    ?>
