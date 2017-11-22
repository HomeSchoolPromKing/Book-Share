<!DOCTYPE html>
<head>
	<title>BookShare</title>
	<link href="images/Icon.png" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="CSS/stylesheet.css">
</head>
<body>
	<!--///// Navbar /////-->
	<div class="nav">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="login.html">Login</a></li>
			<li><a href="#">My Profile</a></li>
		</ul>
	</div>
	
	<!--///// Results /////-->
	<div class="container">
		<div class="container-left">
			<img id="results-img" src="images/book-image.jpg" alt="Book Title by Author"/>
			<h3>Book Title</h3>
			<h4>Edition</h4>
			<p>by <a href="#">Author</a><p>
			
			<form>
				<input class="button-styles" type="button" value="Make a Listing"><br>
				<input class="button-styles" type="button" value="Save">
			</form>
		<!-- Book Description -->
		</div>

		<div class="container-right">
			<?php
        include 'Model/fuzzy_search.php';
		
		echo "You searched for '$search'.";
        
        if ($results){
        
            echo "<table> " ;
            echo "<tr>"
            . "<th>Title</th>"
                    . "<th>Author</th>"
                    . "<th>ISBN_10</th>"
                    . "<th>ISBN_13</th>"
                    . "<th>Owner</th>"
                    . "<th>Wants</th>"
                    . "</tr>";

			//"$results" is an associative array of the Search results
			//This loop iterates through each record
            foreach($results as $result){

                echo "<tr><td>";
                echo $result['title'] . "</td><td>";
                echo $result['author'] . "</td><td>";
                echo $result['ISBN-10'] . "</td><td>";
                echo $result['ISBN-13'] . "</td><td>";
                echo $result['owner'] . "</td><td>";
                echo $result['wants'] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<br><br>No results found.";
        }
        ?>
		</div>
	</div>
		
	<!--///// Footer /////-->
	<footer class="footer">
		<p>&copy; Bookshare 2017</p>
	</footer>	
</body>
</html>