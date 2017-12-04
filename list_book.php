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
        <link href="CSS/styles" rel="stylesheet">
        <style>
            #options {
                display: none;
            }
        </style>
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
        
        <ul>
            <div id="content"></div>
        </ul>
        
        <div id="options">
            <form id="listBook" action="TODO.php" method="post">
                <fieldset>
                    <legend>
                        Condition:
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
                        Loan Type:
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
                    Notes:
                    <textarea id="notes" name="notes" rows="4" maxlength ="255"
                              placeholder="i.e. What you want to trade in return"></textarea>
                <button type="submit" id="list">List This Book</button>
            </form>
        </div>
        
    </body>
    
</html>