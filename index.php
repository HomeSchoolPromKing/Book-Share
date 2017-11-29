<!DOCTYPE html>

<html lang="en">

    <head>
    
    <title>BookShare | Home</title>
    <link href="images/Icon.png" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link href="CSS/Styles.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="JS/stopFlash.js"></script>
	
    </head>

    
    <body id="home-body" style="visibility: hidden;" onload="js_Load()"> <!-- Fixes the weird split second flash of unstyled page - Forces everything hidden, then visible once all loaded -->

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
		
		<main id="home-search">
            <div id="logo">
                <img src="images/bookshare-logo.svg" alt="Bookshare Logo" />
            </div>
            <form action="results.php" method="get">
                <div id="booksearch">
                    <input id="search" name="search" type="text" placeholder="Search by Title, Author, ISBN" required />
					<button type="submit" id="search-submit">
						<i class="material-icons">search</i>
					</button>
                </div>
            </form>
		<p>BookShare is website that connects people interested in exchanging used textbooks</p>
        </main>
		
    </body>
    
</html>
