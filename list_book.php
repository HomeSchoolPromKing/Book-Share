<!DOCTYPE html>
<!--
Author: Jeremy Trantham
Date: 12/3/17

-->


<html>
    <head>

        <title>List A Book</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link href="CSS/styles.css" rel="stylesheet">
        <style>
            #options {
                display: none;
            }
        </style>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<script src="JS/stopFlash.js"></script>
        <script>
            $(document).ready(function() {
            $.getScript("JS/global_search.js");
        });
        </script>

    </head>

    <body id="listBook-body" style="visibility: hidden;" onload="js_Load()"> <!-- Fixes the weird split second flash of unstyled page - Forces everything hidden, then visible once all loaded -->
		
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
		
		<h1>Add Listing</h1>
		<p>
			Search for the book using its ISBN number.<br>
			The ISBN is usually found on the back cover of the book, near the barcode.
		</p>
		
		<div id ="isbnSearch-div">
			<input type="text" id="isbnSearch" placeholder="ISBN (10 or 13)">
            <button class="button" onclick="lookup()" type="submit">Search</button>
        </div>
        
		
        <ul id="ul">
            <div id="content"></div>
        </ul>
        
        <div id="options">
            <form id="listBook" action="TODO.php" method="post">
                <fieldset>
                    <legend>
                        <strong>Condition:</strong>
                    </legend>
                    <label>
                        <input type="radio" name="condition" value="New" required />Like New
                    </label>
                    <label>
                        <input type="radio" name="condition" value="Fine" required />Fine
                    </label>
                    <label>
                        <input type="radio" name="condition" value="Very Good" required />Very Good
                    </label>
                    <label>
                        <input type="radio" name="condition" value="Good" required />Good
                    </label>
                    <label>
                        <input type="radio" name="condition" value="Fair" required />Fair
                    </label>
                    <label>
                        <input type="radio" name="condition" value="Poor" required />Poor
                    </label>
                </fieldset>
                <br />
                <fieldset>
                    <legend>
                        <strong>Loan Type:</strong>
                    </legend>
                    <label>
                        <input type="checkbox" name="loan_type" value="Free" />Free
                    </label>
                    <label>
                        <input type="checkbox" name="loan_type" value="Loan" />Loan
                    </label>
                    <label>
                        <input type="checkbox" name="loan_type" value="Trade" />Barter
                    </label>
                    <label>
                        <input type="checkbox" name="loan_type" value="Sell" />Sell
                    </label>
                    <label>
                        <input type="checkbox" name="loan_type" value="Other" />Other
                    </label>
                    <div id="checked"></div>
                </fieldset><br />
                <label>
                    <strong>Notes:</strong>
                    <textarea id="notes" name="notes" rows="4" maxlength ="255"
                              placeholder="i.e. What you want to trade in return"></textarea>
                <button class="button" type="submit" id="list">List This Book</button>
            </form>
        </div>
        
    </body>
    
</html>