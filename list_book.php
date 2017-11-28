<!DOCTYPE html>
<!--
Author: Jeremy Trantham
Date: 11/27/17

TODO: redirect if not logged in
-->


<html>
    <head>

        <title>List A Book</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <style>
            #options {
                display: none;
            }
        </style>
        <link href="CSS/styles" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script>
            $(document).ready(function() {
            $.getScript("JS/global_search.js");
        });
        </script>

    </head>

    <body>

        <div id ="search">
            <input type="text" id="isbnSearch" placeholder="ISBN">
            <button onclick="lookup()" type="submit">Search ISBN</button>
        </div>
        
        <div id="content"></div>
        
        <div id="options">
            <form id="listBook" action="TODO.php" method="post">
                <fieldset>
                    <legend>
                        Condition:
                    </legend>
                    <label>
                        <input type="radio" name="condition" value="new" />Like New
                    </label>
                    <label>
                        <input type="radio" name="condition" value="fine" required="required" checked="checked" />Fine
                    </label>
                    <label>
                        <input type="radio" name="condition" value="vg" />Very Good
                    </label>
                    <label>
                        <input type="radio" name="condition" value="good" />Good
                    </label>
                    <label>
                        <input type="radio" name="condition" value="fair" />Fair
                    </label>
                    <label>
                        <input type="radio" name="condition" value="poor" />Poor
                    </label>
                </fieldset>
                <br />
                <fieldset>
                    <legend>
                        Loan Type:
                    </legend>
                    <label>
                        <input type="checkbox" name="loan_type" value="free" />Free
                    </label>
                    <label>
                        <input type="checkbox" name="loan_type" value="loan" />Loan
                    </label>
                    <label>
                        <input type="checkbox" name="loan_type" value="barter" />Barter
                    </label>
                    <label>
                        <input type="checkbox" name="loan_type" value="sell" />Sell
                    </label>
                    <label>
                        <input type="checkbox" name="loan_type" value="other" />Other
                    </label>
                </fieldset><br />
                <button type="submit">List This Book</button>
            </form>
        </div>
        
    </body>
    
</html>