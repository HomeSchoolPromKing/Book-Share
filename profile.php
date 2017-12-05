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
<style>
table, td ,tr, th {
	border: 1px solid black;
}

table {
	margin-top: 50px;
}

td {
	max-width: 150px;
	word-wrap: break-word;
	text-align: center;
}

th {
	text-align: center;
}
</style>
</head>
<body>
<?php 
         
        // Check if a session is open before trying to start
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // If the user is logged in, display logged in header
        // NOTE: Alternatively, we can make one header file and control display inside of it
        if(isset($_SESSION['valid_user'])) {
            include 'header_loggedin.php'; 
        }
        // If the user is logged out, display logged out header
        else {
            include 'header_loggedout.php';
        }
        ?>



<?php
 $user = 'root';
 $pass = 'root';
 $db = new PDO( 'mysql:host=localhost;dbname=bookshare', $user, $pass );
 $sql = "SELECT * FROM books";
 $query = $db->prepare( $sql );
 $query->execute();
 $results = $query->fetchAll( PDO::FETCH_ASSOC );
?>
<!-- User Info -->
<div id="user">
	<h2>My Profile</h2><br />
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
        if ($results){
        
            echo "<table>" ;
            echo "<tr>"
					. "<th>book_id</th>"
                    . "<th>Owner</th>"
                    . "<th>Title</th>"
                    . "<th>Author</th>"
                    . "<th>ISBN-10</th>"
                    . "<th>ISBN-13</th>"
                    . "<th>Wants</th>"
                    . "<th></th>"
              . "</tr>";

	
            foreach($results as $result){

  
		echo "<tr>";
			echo "<td>" . $result['id'] . "</td>";
			echo "<td>" . $result['owner'] . "</td>";
			echo "<td>" . $result['title'] . "</td>";
			echo "<td>" . $result['author'] . "</td>";
			echo "<td>" . $result['ISBN-10'] . "</td>";
			echo "<td>" . $result['ISBN-13'] . "</td>";
			echo "<td>" . $result['wants'] . "</td>";
			echo "<td><a href=\"Model\delete.php?id=".$result['book_id']."\">Delete</a></td>";
		echo "</tr>";
	    
}
echo "</table>";
        } else {
            echo "<br><br>No active listings.";
        }
        ?>


	</div>
</div>


</body>
</html>
