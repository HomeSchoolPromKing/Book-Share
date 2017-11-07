<?php
/********************************
 * The Search class is a class with a library of static methods to run 
 * different kinds of SQL queries against the database.
 *
 * Each new static search method aquires a connection to the database:
 * 
 * $db = Database::getInstance();
 * 
 * Then the $sql variable is written out, and run against the 
 * database by calling the Database class's runQuery() method:
 * 
 * $sql ="SELECT foo WHERE bar"; 
 * $results = $db->runQuery(sql);
 * return $results;
 *
 * To run the static method from outside the class, use this notation:
 * 
 * $my_search = Search::fuzzy_search("Hello");
 *
 * @author Brian Oleniacz
 */

require_once 'Database.class.php';

class Search { 
     
    /* 
     * The static search() method runs the sql query against the database,
     * and returns the results.  
     */
    static function go($sql){
        $db = Database::getInstance();
        $results = $db->runQuery($sql);
        return $results;
    }
    
    
    /*
     * The static fuzzy_search() method runs a full text search
     * against the whole table to find any matches.  Results are returned
     * in order of relevance.
     */
    
    static function fuzzy_search($query){
        $db = Database::getInstance();
        
        $sql = "SELECT * FROM Books "
                . "WHERE MATCH('Title', 'Author', 'ISBN') "
                . "AGAINST ('$query')" ;
        
        $results = $db->runQuery($sql);
        return $results;
    }
    
}  //end class
    
    
    
    
    

