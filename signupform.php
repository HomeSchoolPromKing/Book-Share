<!DOCTYPE html>

<html lang="en">

    <head>
    
    <title>BookShare | Home</title>
    <link href="images/Icon.png" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link href="CSS/Styles.css" rel="stylesheet">
	<script src="JS/stopFlash.js"></script>
          
    </head>

    
    <body id="login-body" style="visibility: hidden;" onload="js_Load()"> <!-- Fixes the weird split second flash of unstyled page - Forces everything hidden, then visible once all loaded -->
        
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

        // Check for Boolean error flags - Front End/Chris, please feel free to reformat this/switch over to Javascript as needed

        if(isset($_SESSION['err_username'])) {
            echo "Error detected in username input. ";
            unset($_SESSION['err_username']);    // clear session data 
        }
        if(isset($_SESSION['err_password'])) {
            echo "Error detected in password input. "; 
            unset($_SESSION['err_password']);
        }
        if(isset($_SESSION['err_email'])) {
            echo "Error detected in email input. ";
            unset($_SESSION['err_email']);
        }
        
        if(isset($_SESSION['err_duplicate'])) {
            echo "It looks like that email address or username is already registered. Please try again.";
            unset($_SESSION['err_duplicate']);
        }
    ?>

	<!--<nav class="desktop-nav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li class="logged-out"><a href="login.php">Login</a></li>
            <li id="sign-up" class="logged-out"><a href="#" class="active">Sign-Up</a></li>
            <li class="logged-in"><a href="profile.php">My Profile</a></li>
            <li><a href="support.php">Support</a></li>
        </ul>
    </nav>
        
    <nav class="mobile-nav">
        <div id="menuToggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <ul id="menu">
                <a href="index.php"><li>Home</li></a>
                <a href="login.php"><li class="logged-out">Login</li></a>
                <a href="#"><li id="sign-up" class="logged-out active">Sign-Up</li></a>
                <a href="profile.php"><li class="logged-in">My Profile</li></a>
                <a href="support.php"><li>Support</li></a>
            </ul>
        </div>
    </nav>
-->
	
	<div id="signup-wrapper">
		<div id="main">
			<div id="signup-container">
				<form id="signupForm" action="Model/signup.php" method="post">
					<img src="images/bookshare-logo.png" alt="BookShare Logo" width="180" height="120" />
					<label for="signup-email">Email:<input type="email" id="signup-email" name="signup-email" required /></label>
					<label for="signup-username">Username:<input type="text" id="signup-username" name="signup-username" maxlength="18" required /></label>
					<label for="signup-password">Password:<input type="text" id="signup-password" name="signup-password" maxlength="18" required /></label>
					<label for="signup-password-conf">Confirm Password:<input type="text" id="signup-password-conf" name="signup-password-conf" maxlength="18" required /></label>
					<input type="submit" value="Get Started" />
				</form>
			</div>
		</div>
	</div>

        
    </body>
