/*
Author: Jeremy Trantham
Purpose: searches Google Books based on user input in search field
allows user to add a result to the available database
Date: 11/27/2017

TODO: form validation, 
*/

//global object for the book
var book = {
    isbn: 0,
    title: "",
    authors: [],
    imgLink: "",
    condition:"",
    loan_type: ""
};

//global array for returned books
var bookList = new Array;

// event listener to prevent form submission to server before validation
$('#listBook').on('submit', function(e) {
    e.preventDefault();    
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

            // set the item and create the book
            var item = response.items[i].volumeInfo;
            book.title = item.title;
            book.authors = item.authors;
            book.isbn = $("#isbnSearch").val().replace(/\-/g, '');
            book.imgLink = item.imageLinks.smallThumbnail;
            
            bookList.push(book);
            
            output += buttonCreate(i) + addListing(book);
            
            // add event listener for each book
            var eId = "#bookSelection" + i;
            $("#content").on("click", eId, function(e) {
                bookId = eId.replace(/\D/g,'');
                $("#content").html(addListing(bookList[bookId]));
                $("#options").show();
            });
            
            // set the ouput in the div
            $("#content").html(output);
          }
    });
}