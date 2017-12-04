<!--
Author: Kat Farley
Purpose: This page will perform the login process
Date: 11/7/2017
-->

        <?php
        
  require_once 'database.php'; //connect to db
  require_once 'log_to_file.php'; // function for logging success/failure

  session_start();

// create variables
  $membername = filter_input(INPUT_POST, 'login-username');
  $memberpassword = filter_input(INPUT_POST, 'login-password');

    try {
        
    // Query database
        
        $query = 'SELECT count(*) FROM user
            WHERE (username = :membername AND password = :memberpassword)' ;
        
       $statement = $db->prepare($query);
       $statement->bindValue(':membername', $membername);
       $statement->bindValue(':memberpassword', $memberpassword);
       $statement->execute();
       $usercount = $statement->fetchColumn(); 
     
       $statement->closeCursor();
       
       // if 1 value returned, start a session and register the username ($membername)
       if ($usercount == 1) {
        
            $_SESSION['valid_user'] = $membername;
		
			// Create log message with data and username
			$message = 'Success in logging in ' . $membername;
			
			// Call function to log results
			logToFile('loginResultsFile.txt', $message);
             // Display the index page
            header("Location:../index.php");
       }
       
       // if more than 1 or less than 1 value returned, display error message // KAT: Change to header at login page
       else {
		   $err_message = 'Error in searching user database.';
                    echo $err_message;
		 
			
			// Create log message with data and username
		   $message = 'Error in searching user database. Login of ' . $membername . ' failed.';
			
			// Call function to log results
			logToFile('loginResultsFile.txt', $message);
		   
           include 'login_error.php';
       }

       
        // Catch other errors and display error message
    } catch (Exception $ex) {
        // unsuccessful login
            // Display an error page
        include 'login_error.php';
        exit;
    }   
    
    

    
        ?>