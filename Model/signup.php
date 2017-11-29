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
    $password_confirm = filter_input(INPUT_POST, 'signup-password-conf');
    $memberemail = filter_input(INPUT_POST, 'signup-email');
} // end try

catch (Exception $ex) {
    $error_message = $ex->getMessage();
    echo 'Unexpected error:';
    echo $error_message;
    exit();
} // end catch

    
    
    function is_valid_name($membername) {
                // Validate name
        if ($membername == null ||  preg_match('/\s/',$membername) ){
            // $err_message = "No white spaces are permitted in the username, and a name must be entered. ";
            // echo $err_message;
            return false;
        }
        else {
            return true;
        }    
    } // end is_valid_name

    function is_valid_password($memberpassword,$password_confirm) {
        // Validate input
        if ($memberpassword == null || preg_match('/[A-Z]/', $memberpassword) === 0 || preg_match('#\d#',$memberpassword) === 0 ) {
          // $err_message = "Passwords must contain a capital letter and a digit, and a password must be entered. ";
          // echo $err_message;
           return false;
        }

        // Make sure passwords match 
        else if ($memberpassword != $password_confirm) {
            // The passwords do not match
           // $err_message = "The passwords do not match. Please check your input.";
           // echo $err_message;
            return false;
        }
        // Password valid and confirmed
        else {
            return true;
        }
} // End is_valid_password
    
 
    function is_valid_email($memberemail) {
        // validate email
        if ($memberemail == null || !filter_var($memberemail, FILTER_VALIDATE_EMAIL)) {
            // $err_message = "Invalid or missing email.";
            // echo $err_message;
            return false;
        } 

        else {
            return true;
        }

    } // end is_valid_email
    
    // Create variables for errors
    $err_username = !is_valid_name($membername);
    $err_password = !is_valid_password($memberpassword, $password_confirm);
    $err_email = !is_valid_email($memberemail);
    
    
    // Check if errors are present
    if ($err_username == true || $err_password == true || $err_email == true) {
        
        // Start a session
        session_start();
        
        // Pass error values via session
        $_SESSION['err_username'] = $err_username;
        $_SESSION['err_password'] = $err_password;
        $_SESSION['err_email'] = $err_email;
        
        
        // Call signup form
        header("Location:../signupform.php");
     } // end if 
     
     else {
        
        require_once('database.php');

 
    // Query database to find out if the user email is already registered
        
        $query = 'SELECT count(*) FROM user
            WHERE (email = :memberemail)' ;
        
       $statement1 = $db->prepare($query);
       $statement1->bindValue(':memberemail', $memberemail);
       $statement1->execute();
       $emailcount = $statement1->fetchColumn(); 
     
       $statement1->closeCursor();
       
        // Query database to find out if the username is already taken
        
        $query = 'SELECT count(*) FROM user
            WHERE (username = :membername)' ;
        
       $statement2 = $db->prepare($query);
       $statement2->bindValue(':membername', $membername);
       $statement2->execute();
       $usernamecount = $statement2->fetchColumn(); 
     
       $statement2->closeCursor();
       
       // if 1 value returned, then they are already registered. 
       if ($emailcount > 0 || $usernamecount > 0) {
        
            $err_duplicate = true;
            
            // start a session
            session_start();
            
            // Pass error via session
            $_SESSION['err_duplicate'] = $err_duplicate;
            header("Location:../signupform.php");
       }        
       
       else {

        // Add the user to the database
        $query = "INSERT INTO user
            (username, password, email)
            VALUES
            (:membername, :memberpassword, :memberemail)";

        $statement3 = $db->prepare($query);
        $statement3->bindValue(':membername', $membername);
        $statement3->bindValue(':memberpassword', $memberpassword);
        $statement3->bindValue(':memberemail', $memberemail);
        $statement3->execute();
        $statement3->closeCursor();
        

        // Start a session
        session_start();
        
        // Register valid user with session
        $_SESSION['valid_user'] = $membername;
        
        // Display the index page
        header("Location:../index.php");

       
    } // end else
    
     } // end else
     
   

    

?>
