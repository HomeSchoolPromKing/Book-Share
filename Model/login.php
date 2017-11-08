<!--
Author: Kat Farley
Purpose: This page will perform the login process
Date: 11/7/2017
-->

        <?php
        
//include 'database.php'; //connect to db


  // session_start();




        

// create variables
  $membername = filter_input(INPUT_POST, 'login-username');
  $memberpassword = filter_input(INPUT_POST, 'login-password');
  echo ("Member name: " . $membername . "Password: " . $memberpassword);
  



    // 
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
       }
       
       // if more than 1 or less than 1 value returned, display error message
       else {
           echo 'Error in searching user database.';
       }
              // Display the index page, which will redirect to home if the user is logged in
        include('../index.html');
       
        // Catch other errors and display error message
    } catch (Exception $ex) {
        // unsuccessful login
        echo 'You could not be logged in.';
        exit;
    }   
    
    

    
        ?>
