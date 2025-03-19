<?php

class DBHelper {
    private $conn;
    private $host = "localhost";
    private $username = "admin";
    private $password = "";
    private $database = "youtube_c1";
    
    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    
    public function execute_query($query) {
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
    
    public function set_query($query_id, $query_params) {
        $YT_DB_QUERY = array(
            "SQL_GET_ALL_VIDEOS"=>"SELECT * FROM videos", 
            "SQL_GET_SINGE_VIDEO_BY_ID"=>"SELECT * FROM videos WHERE vid_id = $query_params[0]", 
            "SQL_GET_"=>"", 
            "SQL_GET_"=>"", 
            "SQL_GET_"=>"", 
            "SQL_GET_"=>"", 
        
            "SQL_GET_"=>"", 
            "SQL_GET_"=>"", 
            "SQL_GET_"=>"", 
            "SQL_GET_"=>"", 
            "SQL_GET_"=>"", 
        
            "SQL_GET_"=>"", 
            "SQL_GET_"=>"", 
            "SQL_GET_"=>"", 
            "SQL_GET_"=>"", 
            "SQL_GET_"=>"", 
        
            "SQL_GET_"=>"", 
            "SQL_GET_"=>"", 
            "SQL_GET_"=>"", 
            "SQL_GET_"=>"", 
            "SQL_GET_"=>"", 
        ); 

        return $YT_DB_QUERY[$query_id];
    }
    
    public function close_connection() {
        $this->conn->close();
    }

}