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

    
    <body id="signup-body"> <!-- FRONT END: I removed this while debugging because it hides the display on my computer: style="visibility: hidden;" onload="js_Load()" - Please move back if needed (KaF 11/29)
                            
                            Front end's comment: "Fixes the weird split second flash of unstyled page - Forces everything hidden, then visible once all loaded" --> 
        
	<?php 
  
          // Check if a session is open before trying to start
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // initialize variables for holding error boolean
        $err_username = false;
        $err_password = false;
        $err_email = false;
        $err_duplicate = false;
        
        // Check for Boolean error flags - 
        // Front End/Chris, I've moved these errors into Javascript variables below to make it easier for you all to work with these. Please feel free to adjust (KaF 11/29)

        if(isset($_SESSION['err_username'])) {
            if (($_SESSION['err_username']) == true) {
                $err_username = true;
            }
            unset($_SESSION['err_username']);    // clear session data 
        }
        if(isset($_SESSION['err_password'])) {
            if (($_SESSION['err_password']) == true) {
                $err_password = true; 
            }
            unset($_SESSION['err_password']);
        }
        if(isset($_SESSION['err_email'])) {
            if (($_SESSION['err_email']) == true) {
                $err_email = true; 
            }
            unset($_SESSION['err_email']);
        }
        
        if(isset($_SESSION['err_duplicate'])) {
            if (($_SESSION['err_duplicate']) == true) {
                $err_duplicate = true; 
            }
            unset($_SESSION['err_duplicate']);
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
        
        <script type="text/javascript">
            // pass error messages
            var error_username = "<?php echo $err_username ?>"; 
            var error_password = "<?php echo $err_password ?>"; 
            var error_email = "<?php echo $err_email ?>"; 
            var error_duplicate = "<?php echo $err_duplicate ?>"; 
            
            // Display alert messages for errors - Front End, feel free to reformat this in whatever way is user friendly
            if (error_username == true) 
            {
                alert("error_username");
            }
            if (error_password == true) 
            {
                alert("error_password");
            }
            if (error_email == true) 
            {
                alert("error_email");
            }
            if (error_duplicate == true) 
            {
                alert("error_duplicate");
            }

        </script>
	
	<<div id="signup-wrapper">
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
