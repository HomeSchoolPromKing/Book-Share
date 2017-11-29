<?php

?>
<!DOCTYPE html>

<html lang="en">

    <head>
    <title>BookShare | Home</title>
    <link href="images/Icon.png" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link href="CSS/Styles.css" rel="stylesheet">
    
    </head>
		
		<nav class="desktop-nav">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li class="logged-out"><a href="login.php">Login</a></li>
				<li class="logged-out"><a href="signupform.php">Sign-Up</a></li>
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
                    <a href="index.php"><li class="active">Home</li></a>
                    <a href="login.php"><li class="logged-out">Login</li></a>
                    <a href="signupform.php"><li id="sign-up" class="logged-out">Sign-Up</li></a>
                    <a href="support.php"><li>Support</li></a>
                </ul>
            </div>
        </nav>
    
</html>
