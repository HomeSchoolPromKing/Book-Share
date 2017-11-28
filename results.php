<!DOCTYPE html>
<html>

    <head>
    
    <title>BookShare | Results</title>
    <link href="images/Icon.png" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link href="CSS/Styles.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
          
    </head>
	
<body id="home-body">
	<!--///// Navbar /////-->
	<div class="desktop-nav">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li class="logged-out"><a href="login.php">Login</a></li>
			<li id="sign-up2" class="logged-out"><a href="signupform.php">Sign-Up</a></li>
			<li class="logged-in"><a href="account.php">My Profile</a></li>
			<li><a href="#">About</a></li>
		</ul>
	</div>
	
	<!--///// Results /////-->
	<div class="container">
		<div class="container-left">
			<h2>Sort Results</h2>
			
			<div id="sort-condition">
				<h3>Condition</h3>
					<form action="" method="post">
						<input type="checkbox" id="condition-new" name="book_condition" value="new">
							 <label for="condition-new">New</label><br />

						<input type="checkbox" id="condition-fine" name="book_condition" value="fine">
							 <label for="condition-fine">Fine</label><br />
							 
						<input type="checkbox" id="condition-vgood" name="book_condition" value="vgood">
							 <label for="condition-vgood">Very Good</label><br />
							 
						<input type="checkbox" id="condition-good" name="book_condition" value="good">
							 <label for="condition-good">Good</label><br />
							 
						<input type="checkbox" id="condition-fair" name="book_condition" value="fair">
							 <label for="condition-fair">Fair</label><br />
							 
						<input type="checkbox" id="condition-poor" name="book_condition" value="poor">
							 <label for="condition-poor">Poor</label><br />
					</form>
			</div>
			
			<div id="sort-loan-type">
				<h3>Loan Type</h3>
					<form action="" method="post">
						<input type="checkbox" id="free" name="loan_type" value="free">
							 <label for="free">Free</label><br />
							 
						<input type="checkbox" id="loan" name="loan_type" value="loan">
							 <label for="loan">Loan</label><br />
							 
						<input type="checkbox" id="barter" name="loan_type" value="barter">
							 <label for="barter">Barter</label><br />
							 
						<input type="checkbox" id="sell" name="loan_type" value="sell">
							 <label for="sell">Sell</label><br />
							 
						<input type="checkbox" id="other" name="loan_type" value="other">
							 <label for="other">Other</label><br />
					</form>
			</div>
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