<?php
$con=mysqli_connect("localhost","root","root","bookshare");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = (int)$_GET['id'];

$update = $con->prepare("DELETE FROM books WHERE book_id = '$id'");
$update->bind_param('i', $id);
$update->execute();
$update->close();

header("Location: ../profile.php");

?>
