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
	<div class="desktop-nav">
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
$dbname = "test";

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
			if($result = mysqli_query($conn, $sql)){
				if(mysqli_num_rows($result) > 0){
					echo '<table class="my_table" border=1>';
						echo "<tr>";
							echo "<th>ID</th>";
							echo "<th>ISBN</th>";
							echo "<th>Title</th>";
							echo "<th>Author</th>";
							echo "<th></th>";
						echo "</tr>";
			while($row = mysqli_fetch_array($result)){
						echo "<tr>";
							echo "<td>" . $row['id'] . "</td>";
							echo "<td>" . $row['ISBN'] . "</td>";
							echo "<td>" . $row['Title'] . "</td>";
							echo "<td>" . $row['Author'] . "</td>";
							echo "<td><a href=\"Model\delete.php?id=".$row['id']."\">Delete</a></td>";
						echo "</tr>";
        }
					echo '</table>';
		} 	
		else {
			echo "You do not have any active listings.";
		}
		} else {
			echo "Could not execute $sql. " . mysqli_error($conn);
}
 
		// Close connection
		mysqli_close($conn);

		?>
	</div>
</div>
</body>
</html>