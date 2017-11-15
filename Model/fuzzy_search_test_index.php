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
        include 'Model/fuzzy_search.php';
        
        if ($results){
        
            echo "<table> " ;
            echo "<tr>"
            . "<th>Title</th>"
                    . "<th>Author</th>"
                    . "<th>ISBN_10</th>"
                    . "<th>ISBN_13</th>"
                    . "<th>Owner</th>"
                    . "<th>Wants</th>"
                    . "</tr>";

            foreach($results as $result){

                echo "<tr><td>";
                echo $result['title'] . "</td><td>";
                echo $result['author'] . "</td><td>";
                echo $result['ISBN-10'] . "</td><td>";
                echo $result['ISBN-13'] . "</td><td>";
                echo $result['owner'] . "</td><td>";
                echo $result['wants'] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<br><br>No results found.";
        }
        ?>
    </body>
</html>
