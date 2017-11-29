<!DOCTYPE html>

<html lang="en">

	<head>
	
	<title>BookShare | Support</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link href="CSS/Styles.css" rel="stylesheet">
	<script src="JS/stopFlash.js"></script>
	
	</head>
	
	<body style="visibility: hidden;" onload="js_Load()"> <!-- Fixes the weird split second flash of unstyled page - Forces everything hidden, then visible once all loaded -->
	
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
	
	<div id="about">
		<h1>About</h1>
		<p>BookShare assists those within the DTCC community in loaning, or selling, used college textbooks to others in the community.  Users will post multiple books for sale or loan.  Others can search the postings using a Google-like keyword search.   If an interesting post is found, the user requests their email address be sent to the poster.  After that the two individuals work out an arrangement for selling or loaning the book through private email.   
		We believe this would encourage students to help each other out in the struggle for finding cheap textbooks by providing textbooks for a fraction of the cost in a small localized location.  The service would be available for all who have a DTCC email address. BookShare is a project created by Dr. Margie Dietz's WEB 250 class. The Front-End team: Chris Thomas, Jervin Ocampo, Spencer Doiron and Jin Hyuk Song. The Back-End team: Zach Elliot, Kat Farley, Jeremy Trantham and Brian Oleniacz.</p>
	</div>
	<div id="heading2"><h1>Support</h1></div>
	<div id="support">
		<form action="#" method="">
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
