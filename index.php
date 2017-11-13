<!DOCTYPE html>

<html lang="en">

    <head>
    
    <title>BookShare | Home</title>
    <link href="images/Icon.png" rel="shortcut icon" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link href="CSS/Styles.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
          
    
    </head>

    
    <body id="home-body">
        
        
            
    <script>
            $(document).ready(function() {
            $("#signup-wrapper").hide();
            
            
    </script>

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
        
        <script>
            $(document).ready(function() {
                $('#sign-up').click(() => {
                    document.getElementById("signup-wrapper").style.visibility = "visible";
                    $("#home-search").delay(250).fadeOut();
                    $("#signup-wrapper").delay(650).fadeIn();
                });
            });
        </script>
    
        <main id="home-search">
            <div id="logo">
                <img src="images/bookshare-logo.png" alt="Bookshare Logo" />
            </div>
            <form action="Model/fuzzy_search_test_index.php" method="get">
                <div id="booksearch">
                    <input id="search" name="search" type="text" placeholder="Search by Title, Author, ISBN" required />
                    <input id="submit" type="submit" value="Search" />
                </div>
            </form>
        </main>
        
        <div id="signup-wrapper">
            <div id="main">
                <div id="signup-container">
                    <form id="signupForm" action="Model/signup.php" method="post">
                        <img src="images/bookshare-logo.png" alt="BookShare Logo" width="180" height="120" />
                        <label for="signup-email">Email:<input type="email" name="signup-email" required /></label>
                        <label for="signup-username">Username:<input type="text" name="signup-username" maxlength="18" required /></label>
                        <label for="signup-password">Password:<input type="text" name="signup-password" maxlength="18" required /></label>
                        <input type="submit" value="Get Started" />
                    </form>
                </div>
            </div>
        </div>
        
        <footer class="footer">
            <p>&copy; Bookshare 2017</p>
        </footer>
    
    </body>
    
</html>