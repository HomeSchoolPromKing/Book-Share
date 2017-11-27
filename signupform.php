<!DOCTYPE html>

<html lang="en">

    <head>
    
    <title>BookShare | Home</title>
    <link href="images/Icon.png" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link href="CSS/Styles.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
          
    </head>

    
    <body>  
        
  <?php 
  
          // Check if a session is open before trying to start
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
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



    <form id="signupForm" action="Model/signup.php" method="post">
        <img src="images/bookshare-logo.png" alt="BookShare Logo" width="180" height="120" />
        <label for="signup-email">Email:<input type="email" id="signup-email" name="signup-email" required /></label>
        <label for="signup-username">Username:<input type="text" id="signup-username" name="signup-username" maxlength="18" required /></label>
        <label for="signup-password">Password:<input type="text" id="signup-password" name="signup-password" maxlength="18" required /></label>
        
        <!-- Added confirmation field for password - KaF 11/27 -->
        
        <label for="signup-password">Confirm Password:<input type="text" id="signup-password-conf" name="signup-password-conf" maxlength="18" required /></label>
        <input type="submit" value="Get Started" />
    </form>

        
    </body>