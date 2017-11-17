<html>
  <head>
      
    <title>Add Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link href="CSS/Styles.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
        $(document).ready(function() {
        $.getScript("global_search.js");
    });
    </script>
    
  </head>
  
  <body>
      
      <div id ="searchBox">
          <input type="text" id="userSearch" class="searchBox" placeholder="Book?">
          <button onclick="checkBooks()" type="submit" class="searchButton">Submit</button>
      </div>
      
      <div id="content"></div>
      
  </body>
</html>