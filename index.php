<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once 'Search.class.php';
        
        $books = Search::fuzzy_search("adam");
        
        echo "<table> "
        . "<tr><th>ISBN</th><th>Title</th><th>Author</th></tr>";
        foreach($books as $book){
        
            echo "<tr><td>";
            echo $book['ISBN'] . "</td><td>";
            echo $book['Title'] . "</td><td>";
            echo $book['Author'] . "</td><tr>";
        }
        echo "</table>"
        ?>
    </body>
</html>
