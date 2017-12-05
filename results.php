<!DOCTYPE html>
<html>

    <head>
    
    <title>BookShare | <?php $search = filter_input(INPUT_GET, 'search'); echo $search; ?></title>
    <link href="images/Icon.png" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link href="CSS/Styles.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="JS/stopFlash.js"></script>
	
    </head>
	
<body id="results-body">
	 
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
	
	<!--///// Results /////-->
	<div class="container">
		
		<h1>Active Listings</h1>
		<?php
        include 'Model/fuzzy_search.php';
		
		echo "You searched for '$search'.";
        
        if ($results){
        
            echo "<table> " ;
            echo "<tr>"
            . "<th id='title-th'>Title</th>"
                    . "<th>Author</th>"
                    . "<th>ISBN_10</th>"
                    . "<th id='isbn13-th'>ISBN_13</th>"
                    . "<th>Owner</th>"
                    . "<th>Wants</th>"
					. "<th id='contact-th'>Contact</th>"
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
                echo $result['wants'] . "</td><td class='contact-td'>";
				echo "  <a href='request.php?book_id='".$result['book_ID']."' class='button' role='button'>
							<i class='material-icons'>email</i> 
						</a>
					 </td></tr>";
            }
            echo "</table>";
        } else {
            echo "<br><br>No results found.";
        }
        ?>

	</div>
		
</body>
</html>
