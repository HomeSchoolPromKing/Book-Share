<!--
  Purpose: This file registers a user
  Author: Kat Farley
  Date: 11/20/2017
 -->
 
 
  <?php
// Try block
try {
    // Get user input from form
    $membername = filter_input(INPUT_POST, 'signup-username');
    $memberpassword = filter_input(INPUT_POST, 'signup-password');
    $memberemail = filter_input(INPUT_POST, 'signup-email');

    // Validate inputs
    if ($membername == null || $memberpassword == null || $memberemail == null) {
        $error = "Invalid or missing data. Check all fields and try again.";
        echo $error;
        include('../index.php');
    } // end if

    else {
        require_once('database.php');

        
    // Query database to find out if the user is already registered
        
        $query = 'SELECT count(*) FROM user
            WHERE (email = :memberemail)' ;
        
       $statement = $db->prepare($query);
       $statement->bindValue(':memberemail', $memberemail);
       $statement->execute();
       $emailcount = $statement->fetchColumn(); 
     
       $statement->closeCursor();
       
       // if 1 value returned, then they are already registered. Display error
       if ($emailcount > 0) {
        
            $error = "It looks like an account already exists for that email. Please try logging in.";
            echo $error;
            
            // Commented out for now, but we should probably redirect to the index page or a separate login page. Styles don't show using this configuration
            // include("../index.php");
       }        
       
       else {

        // Add the user to the database
        $query = "INSERT INTO user
            (username, password, email)
            VALUES
            (:membername, :memberpassword, :memberemail)";

        $statement = $db->prepare($query);
        $statement->bindValue(':membername', $membername);
        $statement->bindValue(':memberpassword', $memberpassword);
        $statement->bindValue(':memberemail', $memberemail);
        $statement->execute();
        $statement->closeCursor();
        
        // Do we want to display a success message?

        // Start a session
        session_start();
        $_SESSION['valid_user'] = $membername;
             // Display the index page
        header("Location:../index.php");

         } // end else
    } // end else

} // end try

catch (Exception $ex) {
    $error_message = $ex->getMessage();
    echo 'Unexpected error:';
    echo $error_message;
    exit();
} // end catch
?>