<?php
class Anime{
 
    // database connection and table name
    private $conn;
    private $table_name = "anime";
 
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
}
?>