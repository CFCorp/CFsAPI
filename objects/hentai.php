<?php
class Hentai{
 
    // database connection and table name
    private $conn;
    private $table_name = "hentai";
 
    // object properties
    public $id;
    public $url;
 
    public function __construct($db){
        $this->conn = $db;
    }

    public function read(){
    
        //select all data
        $query = "SELECT
                    id, url
                FROM
                    " . $this->table_name . "
                ORDER BY RAND()
                LIMIT 1";
    
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
    
        return $stmt;
    }

    function create(){
    
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    url=:url";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->url=htmlspecialchars(strip_tags($this->url));
    
        // bind values
        $stmt->bindParam(":url", $this->url);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
        
    }
}
?>