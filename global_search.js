/*
Author: Jeremy Trantham
Purpose: searches Google Books based on user input in search field
allows user to add a result to the available database
Date: 11/18/2017

TODO: form validation, 
*/
function lookup(){
    
    q = "isbn:" + $("#isbnSearch").val();
    options = "&printType=books";
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

        // Loop through all the items one-by-one, even though should only get 1
        for (var i = 0; i < response.items.length; i++) {

            // set the item and get the fields we want
            var item = response.items[i].volumeInfo;
            var title = item.title;
            var authors = item.authors;
            var ISBN = item.industryIdentifiers[0].identifier;
            var image = item.imageLinks.smallThumbnail;
            
            var output = "<br /><img src=" + image + " alt='Book Cover' />" + 
                    title + "|" + authors + "|" + ISBN + "<br />";

            // set the ouput in the div
            $("#content").html(output);
            $("#options").show();
                    
          }
    });
}