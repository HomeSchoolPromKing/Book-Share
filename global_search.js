/*
Author: Jeremy Trantham
Purpose: searches Google Books based on user input in search field
allows user to add a result to the available database
Date: 11/16/2017
*/
function checkBooks(){
    
    q = $("#userSearch").val();
    options = "&maxResults=20&printType=books&projection=lite";
    key = "&key=AIzaSyC5WM3fu0fZMBpPeQuGAc4O9MEsU9T0_rw";
    
    // Set the api variable
    var APIQuery = "https://www.googleapis.com/books/v1/volumes?q=";
    APIQuery += q + options; 

    // Make a ajax call to get the json data as response.
    $.getJSON(APIQuery, function (response) {
        
        // Clear old results, if any
        $("#content").html("");

        // Loop through all the items one-by-one
        for (var i = 0; i < response.items.length; i++) {

            // set the item from the response object
            var item = response.items[i];

            // Set the book title in the div
            document.getElementById("content").innerHTML += "<br>" + item.volumeInfo.title;
          }
    });
}