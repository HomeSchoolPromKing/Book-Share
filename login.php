<!DOCTYPE html>

<html lang="en">

	<head>

	<title>BookShare | Login</title>
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
    ?>
	
	<div id="login-wrapper">
		<div id="main">
			<div id="login-container">
                <form id="loginForm" action="Model/login.php" method="post">
					<img src="images/bookshare-logo.png" alt="BookShare Logo" width="180" height="120" />
					<label for="login-username">Username:<input type="text" name="login-username" maxlength="18" required /></label>
					<label for="login-password">Password:<input type="text" name="login-password" maxlength="18" required /></label>
					<input type="submit" id="sign-in" value="Sign In" />
				</form>
				<p>Not already a member? <a href="signupform.php">Sign-Up</a>!</p>
			</div>
		</div>
	</div>
	
	</body>
	
</html>
