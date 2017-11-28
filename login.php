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
	
    <nav class="desktop-nav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li class="logged-out"><a href="login.php" class="active">Login</a></li>
            <li id="sign-up" class="logged-out"><a href="signupform.php">Sign-Up</a></li>
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
                <a href="index.php"><li>Home</li></a>
                <a href="login.php"><li class="logged-out active">Login</li></a>
                <a href="signupform.php"><li id="sign-up" class="logged-out">Sign-Up</li></a>
                <a href="account.php"><li class="logged-in">My Profile</li></a>
                <a href="#"><li>About</li></a>
            </ul>
        </div>
    </nav>
	
	<div id="login-wrapper">
		<div id="main">
			<div id="login-container">
                <form id="loginForm" action="Model/login.php" method="post">
					<img src="images/bookshare-logo.png" alt="BookShare Logo" width="180" height="120" />
					<label for="login-username">Username:<input type="text" name="login-username" maxlength="18" required /></label>
					<label for="login-password">Password:<input type="text" name="login-password" maxlength="18" required /></label>
					<input type="submit" id="sign-in" value="Sign In" />
				</form>
			</div>
		</div>
	</div>
	
	</body>
	
</html>