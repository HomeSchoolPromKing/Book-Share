<!DOCTYPE html>

<html lang="en">

    <head>
    
    <title>BookShare | Home</title>
    <link href="images/Icon.png" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link href="CSS/Styles.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
          
    </head>

    
    <body id="home-body">
        
        
            
    <script>
        $(document).ready(function() {
            $("#signup-wrapper").hide();
        });
    </script>

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
        
        <script>
            $(document).ready(function() {
                $('#sign-up').click(() => {
                    document.getElementById("signup-wrapper").style.visibility = "visible";
                    $("#home-search").delay(250).fadeOut();
                    $("#signup-wrapper").delay(650).fadeIn();
                    document.getElementById("home-body").style.backgroundColor = "#222222";
                });
                
                $('#signup-close').click(() => {
                    document.getElementById("signup-wrapper").style.visibility = "hidden";
                    $("#signup-wrapper").delay(250).fadeOut();
                    $("#home-search").delay(650).fadeIn();
                    document.getElementById("home-body").style.backgroundColor = "#FFFFFF";
                });
            });
        </script>
        
        
        <!-- Moved to separate header pages
           
        <nav class="desktop-nav">
            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li class="logged-out"><a href="login.php">Login</a></li>
                <li id="sign-up2" class="logged-out"><a href="#">Sign-Up</a></li>
                <li class="logged-in"><a href="account.php">My Profile</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </nav>
        
        <nav class="mobile-nav">
            <div id="menuToggle">
                <input type="checkbox" />
                <span></span>
                <span></span>
                <span></span>
                <ul id="menu">
                    <a href="#"><li class="active">Home</li></a>
                    <a href="login.php"><li class="logged-out">Login</li></a>
                    <a href="#"><li id="sign-up" class="logged-out">Sign-Up</li></a>
                    <a href="account.php"><li class="logged-in">My Profile</li></a>
                    <a href="#"><li>About</li></a>
                </ul>
            </div>
        </nav>
        
        -->
		
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
		
        <!--
        <div id="signup-wrapper">
            <div id="main">
                <div id="signup-container">
                   <a id="signup-close">X</a>
                    <form id="signupForm" action="Model/signup.php" method="post">
                        <img src="images/bookshare-logo.png" alt="BookShare Logo" width="180" height="120" />
                        <label for="signup-email">Email:<input type="email" id="signup-email" name="signup-email" required /></label>
                        <label for="signup-username">Username:<input type="text" id="signup-username" name="signup-username" maxlength="18" required /></label>
                        <label for="signup-password">Password:<input type="text" id="signup-password" name="signup-password" maxlength="18" required /></label>
                        <input type="submit" value="Get Started" />
                    </form>
                </div>
            </div>
        </div>
        
        -->
		
    </body>
    
</html>
