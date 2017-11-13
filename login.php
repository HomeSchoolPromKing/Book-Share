<!DOCTYPE html>

<html lang="en">

	<head>

	<title>BookShare | Login</title>
	<link href="images/Icon.png" rel="shortcut icon" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link href="CSS/Styles.css" rel="stylesheet">
	
	</head>
	
	<body id="login-body">
	
	<div class="login-wrapper">
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