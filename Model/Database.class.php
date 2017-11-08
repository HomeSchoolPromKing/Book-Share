<?php
/**********************************
 * Database Class
 * @author Brian Oleniacz
 * 
 * The Database class is designed for efficiency in using memory and resources
 * by using the Singleton pattern.  
 * 
 * For more information on the Singleton pattern, please see:
 * http://phpenthusiast.com/blog/the-singleton-design-pattern-in-php
 * 
 * Only one instance of the class is created in
 * memory.  This instance is accessed using the static getInstance() 
 * method like this:
 * 
 * $db = Database::getInstance();  //assigns the single instance of the Database
 *      class to $db  (the double colons are the static method accessor)
 
 * Then queries can be run like this:
 * 
 * $results = $db->runQuery(_SQL_); 
 * 
 * If the connection to the database is needed, use the
 * getConnection() method:
 * 
 * 
 * 
 * If necessary, the connection to the db can be closed like this:
 * 
 * $db = Database::getInstance();
 * $db->quit();
 *  
 ***********************************/


class Database {
   
    private $_connection;  //The connection to the database
    private static $_instance; //The single instance of the class
    
    private $_results;
      
    private $_host = "localhost";
    private $_usr = "root";
    private $_pwd = "";
    private $_db_name = "bookshare_db";
    
    
    /*
     * The getInstance() class checks to see if one instance of the class
     * has been created yet.  If not, it creates one by
     * calling the private constructor.  Then it returns the 
     * single instance to the calling method.
     * 
     * @return instance
     */
    public static function getInstance() {
        if(!self::$_instance) { 
            self::$_instance = new Database();
        }
        return self::$_instance;
    }
    
    
    /* 
     * 
     * The constructor connects to the database,
     * providing a single, global connection to the database for the entire
     * application.
     * 
     */
    private function __construct(){
        //Connect to the DB
        $this->_connection = mysqli_connect($this->_host, $this->_usr, 
                $this->_pwd, $this->_db_name);
        
        
        //For testing
        if ($this->_connection->connect_error) {
            die("Connection failed: " . $this->_connection->connect_error);
        } 
        else {
            echo "Connected successfully";
        }
    }  
    
    
    /* The connect() method is empty right now, since its functionality
     * has been moved to the constructor.
     
    function connect(){
        
    } //end __connect()
     * 
     */
    
    /* 
     * The runQuery() method runs an SQL query against the database
     * 
     * @return $results
     */
    function runQuery($sql){
        $this->_results = mysqli_query($this->_connection, $sql);
        return $this->_results;
    }
    
    
    /* 
     * The getConnection() method returns the connection to the 
     * database.
     * 
     * @return connection
     */
    function getConnection(){
        return $this->_connection;
    }
   
    
    /* 
     * The quit() method closes the connection to the database.
     * However, the connection to the database is designed to remain open
     * throughout the application's life cycle. 
     */
    function quit() {
        mysqli_close($this->_connection);
    }
    
    
    
    /* Making this method empty prevents the object from being duplicated. */    
    private function __clone() { }
    
} //end class Database()

?>

