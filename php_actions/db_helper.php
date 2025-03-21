<?php

class DBHelper {
    private $conn;
    
    public function __construct() {
        $this->load_env();
        $host = getenv('DB_HOST');
        $username = getenv('DB_USER');
        $password = getenv('DB_PASSWORD');
        $database = getenv('DB_NAME');
        $this->conn = new mysqli($host, $username, $password, $database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    
    public function execute_query($query) {
        $result = $this->conn->query($query);
        if( is_bool($result) ) {
            return $result;
        } else {
            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return [];
            }
        }
    }
    
    public function set_query($query_id, $query_params) {
        // SQL Queries
        // get all queries from assets.sql. names & content.
        // if query name matches, return the query content.
        $YT_DB_QUERY = array(
            "SQL_GET_ALL_VIDEOS"=>"SELECT * FROM videos ORDER BY created_at DESC", 
            "SQL_GET_"=>"", 
        );

        if( $query_params ) {
            foreach( $query_params as $param ) {
                if( count($query_params) == 1) { // if one parameter passed
                    $query = "SELECT * FROM videos WHERE video_id = $param";
                    $YT_DB_QUERY["SQL_GET_SINGE_VIDEO_BY_ID"] = $query;
                    $query = "SELECT * FROM users WHERE email = '$param'";
                    $YT_DB_QUERY["SQL_GET_USER_BY_EMAIL"] = $query;

                    $query = "DELETE FROM videos WHERE video_id = $param";
                    $YT_DB_QUERY["SQL_DELETE_VIDEO"] = $query;
                } else if( count($query_params) == 5) { // if five parameters passed

                    // confirm the user doesnt exist first using email.

                    $query = "INSERT INTO users (name, email, password, ppurl, created_date)
                        VALUES('$query_params[0]', '$query_params[1]', '$query_params[2]', 
                        '$query_params[3]', '$query_params[4]')";
                    $YT_DB_QUERY["SQL_CREATE_USER_PROFILE"] = $query;
                } else if( count($query_params) == 6) { // if six parameters passed
                    $query = "INSERT INTO videos(title, description, video_url, duration, 
                        created_at, user_id_fk, thumbnail_url, updated_at, view_count) 
                        VALUES ('$query_params[0]', '$query_params[1]', '$query_params[2]', 
                        $query_params[3], NOW(), $query_params[4], '$query_params[5]', NOW(), 0)";
                    $YT_DB_QUERY["SQL_CREATE_VIDEO"] = $query;
                }
            }
        }

        return $YT_DB_QUERY[$query_id];
    }
    
    public function close_connection() {
        $this->conn->close();
    }

    private function load_env(){
        $env =file_get_contents(__DIR__ . "/../.env");
        $env_vals = explode("\n", $env);
        foreach ($env_vals as $val){
            preg_match("/([^#]+)\=(.*)/", $val, $matches);
            if ( isset($matches[2]) ) { putenv( trim($val) ); }
        }
    }

}