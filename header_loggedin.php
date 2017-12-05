<?php

?>
<!DOCTYPE html>

<html lang="en">
    
    <head>
    <title>BookShare | Home</title>
    <link href="images/Icon.png" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link href="../CSS/Styles.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
    </head>
    
        <header>
            <div class="desktop-nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li class="logged-in"><a href="Model/logout.php">Logout</a></li>
                    <li class="logged-in"><a href="profile.php">My Profile</a></li>
                    <li><a href="support.php">Support</a></li>
					<li><a href="profile.php">Make a Listing</a></li>
                </ul>
            </div>
        </header>
    
         <nav class="mobile-nav">
            <div id="menuToggle">
                <input type="checkbox" />
                <span></span>
                <span></span>
                <span></span>
                <ul id="menu">
                    <a href="#"><li class="active">Home</li></a>
                    <a href="logout.php"><li class="logged-in">Logout</li></a>
                    <a href="profile.php"><li class="logged-in">My Profile</li></a>
                    <a href="support.php"><li>Support</li></a>
					<li><a href="profile.php">Make a Listing</a></li>
                </ul>
            </div>
        </nav>
        
    </html>
