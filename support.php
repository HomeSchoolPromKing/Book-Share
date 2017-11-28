<!DOCTYPE html>

<html lang="en">

	<head>
	<title>BookShare | Support</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link href="CSS/Styles.css" rel="stylesheet">
	</head>
	
	<body>
	
    <nav class="desktop-nav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li class="logged-out"><a href="login.php" class="active">Login</a></li>
            <li id="sign-up" class="logged-out"><a href="signupform.php">Sign-Up</a></li>
            <li class="logged-in"><a href="profile.php">My Profile</a></li>
            <li><a href="support.php">Support</a></li>
        </ul>
    </nav>
        
   
	
	<div id="about">
		<h1>About</h1>
		<p>BookShare assists those within the DTCC community in loaning, or selling, used college textbooks to others in the community.  Users will post multiple books for sale or loan.  Others can search the postings using a Google-like keyword search.   If an interesting post is found, the user requests their email address be sent to the poster.  After that the two individuals work out an arrangement for selling or loaning the book through private email.   

		We believe this would encourage students to help each other out in the struggle for finding cheap textbooks by providing textbooks for a fraction of the cost in a small localized location.  The service would be available for all who have a DTCC email address.</p>
	</div>
	<div id="heading2"><h1>Support</h1></div>
	<div id="support">
		<form action="">
			<label for"email">Email:</label>
			<input type="text" id="email" name="email" placeholder="Enter your email address">
		
			<label for"problem">Problem:</label>
			<select id="problem" name="problem">
				<option value="abuse">Report Abuse</option>
				<option value="website">Report Website Problem</option>
				<option value="login">Username/Password Problem</option>
				<option value="other">Other</option>
			</select>
			
			<label for="comments">Comments:</label>
			<textarea id="comments" name="comments" placeholder="Enter any comments here..." style="height:200px"></textarea>

			<input type="submit" value="Submit">
		</form>
	</div>
	</body>
	</html>
