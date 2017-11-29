<!DOCTYPE html>

<html lang="en">
    
    <head>

	<title>BookShare | Request</title>
	<link href="images/Icon.png" rel="shortcut icon" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link href="CSS/Styles.css" rel="stylesheet">
	
    </head>
    
    <body>
        <form method="post" name="emailform" action="Model/request.php">
            Subject: <textarea name=subject>Default TODO</textarea>
            Enter Message: <textarea name=message>Default TODO</textarea>
            <input type="submit" value="Send Email" />
            <input type="button" value="Cancel" onclick="window.location='index.php'" />

        </form>
    </body>
</html>
