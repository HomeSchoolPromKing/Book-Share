<!DOCTYPE html>
<html lang="en">
<head>
<title>BookShare | My Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link href="CSS/Styles.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script>
$(function() {
    $( "#toggle" ).click(function() {
        $( "#active" ).toggle();
    });
});
</script>
</head>
<body>
<header>
	<div class="nav">
		<ul>
			<li><a href="index.html">Home</a></li>
			<li class="logged-out"><a href="login.html">Login</a></li>
			<li id="sign-up" class="logged-out"><a href="#">Sign-Up</a></li>
			<li class="logged-in"><a href="profile.php" class="active">My Profile</a></li>
			<li><a href="#">About</a></li>
		</ul>
	</div>
</header>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "bookshare";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
<!-- User Info -->
<div id="user">
	<h2><?php echo $username; ?>'s Profile</h2><br />
</div>
<!-- Logo -->
<img src="images/bookshare-logo.png" id="profileLogo" alt="BookShare Logo">
<!-- New Listing Link -->
<div id="links">
	<div id="newListing">
		<a href="list_book.php">New Listing</a>
	</div>
	<!-- Active Listings Toggle -->
	<a id="toggle" href="#">Active Listings</a>
	<div id="active">
		<?php
		$sql = "SELECT * FROM books";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<br> ISBN: ". $row["ISBN"]. " -- Title: ". $row["Title"]. " -- Author: " . $row["Author"] . "<br>";
			}
		} else {
			echo "0 results";
		}

		$conn->close();
		?> 
	</div>
</div>
<!-- Footer -->
<footer class="footer">
    <p>&copy; Bookshare 2017</p>
</footer>
</body>
</html>