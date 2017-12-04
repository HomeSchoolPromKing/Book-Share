/*
Author: Jeremy Trantham
Purpose: searches Google Books based on user input in search field
allows user to add a result to the available database
Date: 11/27/2017


*/

// global object for the book
var book = {
    isbn10: null,
    isbn13: null,
    title: "",
    authors: [],
    imgLink: "",
    condition:"",
    loan_type: [],
    wants: ""
};

//global array for returned books
var bookList = new Array;

// event listener to prevent form submission to server before validation, and 
// send ajax request to the server with the selected book information
$("#listBook").on("submit", function(e) {
    e.preventDefault();
    
    //validate that at least one checkbox is selected
    checked = $("input[type=checkbox]:checked").length;

    if(!checked) {
        $("#checked").html("Please check at least one type of loan type.");
    }
    else {
        
        // add book condition to the book object
        book.condition = $('input[name=condition]:checked').val();
        
        //clear any old array info before storing loan_type
        book.loan_type = [];
        $.each($("input[name=loan_type]:checked"), function(){            
                    book.loan_type.push($(this).val());
                });
                
        // grab user input from the notes/wants field
        book.wants = $('#notes').val();
        
        // send ajax json to add_listing.php
        $.ajax({
            url: "../Model/add_listing.php",
            type: "POST",
            data: {data: JSON.stringify(book)}
            }).done(function(e) {
                if (e.is_error === true) {
                    $('#options').hide();
                    var errorMsg = "Something went wrong, book is not listed. Error: ";
                    errorMsg += e.errorMsg;
                    var tryAgain = "<a href='list_book.php'>Try Again</a>";
                    var cancel = "<a href='index.php'>Home</a>";
                    $('#content').html(errorMsg + "<br>" + tryAgain + cancel);
                }
                else {
                    $('#options').hide();
                    var addAnother = "<a href='list_book.php'>Add Another</a>";
                    var home = "<a href='index.php'>Home</a>";
                    $('#content').html("Your book has been added.<br>" + addAnother + "<br>" + home);
             
                }
            });
    }
});

function addListing(book) {
    return "<img src=" + book.imgLink + " alt='Book Cover' />" + 
            "<li id='title'>Title:&nbsp" + book.title + "</li>" +
            "<li id='author'>Author(s):&nbsp" + book.authors + "</li><br />";
}

// creates a submit button with the id of "bookSelection0" where n = 0
function buttonCreate(n) {
    
    // set button id and add button
    var buttonID = "bookSelection" + n;
    var output = "<button type='submit' id='" + buttonID + 
            "'>List This Book</button><br />";
    return output;
};

function lookup(){
    
    //set query to ISBN input, removes dashes if included
    q = "isbn:" + $("#isbnSearch").val().replace(/\-/g, '');
    //set query to only return books
    options = "&printType=books";
    // API key
    key = "&key=AIzaSyC5WM3fu0fZMBpPeQuGAc4O9MEsU9T0_rw";
    
    // Set the api variable
    var APIQuery = "https://www.googleapis.com/books/v1/volumes?q=";
    APIQuery += q + options; 

    // Make a ajax call to get the json data as response.
    $.getJSON(APIQuery, function (response) {
        
        // Clear old results, if any
        $("#content").html("");
        
        
        // Hide options
        $("#options").hide();
        
        var output = "";

        // Loop through all the items one-by-one
        for (var i = 0; i < response.items.length; i++) {

            // grab each item returned, and use the info to create the book
            var item = response.items[i].volumeInfo;
            book.title = item.title;
            book.authors = item.authors;
            book.imgLink = item.imageLinks.smallThumbnail;
            industryId = item.industryIdentifiers;
            for (var j=0; j<industryId.length; j++) {
                if (industryId[j].type === "ISBN_10") {
                    book.isbn10 = industryId[j].identifier;
                }
                else if (industryId[j].type === "ISBN_13") {
                    book.isbn13 = industryId[j].identifier;
                }
            }
            
            //verify return of ISBN information, if not, set to query
            if (book.isbn10 === null && book.isbn13 === null) {
                isbn = q.slice(5);
                if (isbn.length === 10) {
                    book.isbn10 = isbn;
                }
                else {
                    book.isbn13 = isbn;
                }
            }
            
            bookList.push(book);
            
            output += buttonCreate(i) + addListing(book);
            
            // add event listener for each book
            var eId = "#bookSelection" + i;
            $("#content").on("click", eId, function(e) {
                bookId = eId.replace(/\D/g,'');
                book = bookList[bookId];
                $("#content").html(addListing(book));
                $("#options").show();
            });
            
            // set the ouput in the div
            $("#content").html(output);
          }
    });
}