<?php

// *********** WARNING !!! ********* //
/*
    This page is intended for admin use only.
            Handle carefully!
*/


session_start();
ini_set('display_errors', 1);
Class Action {
    private $db;

    /*
        400 -- not found
        200 -- success
        403 -- forbidden
    */
    public function __construct() {
		ob_start();
        // include 'db_config.php';
        // $this->db = $conn;
        $this->load_env();
        $host = getenv('DB_HOST');
        $username = getenv('DB_USER');
        $password = getenv('DB_PASSWORD');
        $database = getenv('DB_NAME');
        $this->db = new mysqli($host, $username, $password, $database);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
	}
    function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

    function login(){
        extract($_POST);
        $username = $_POST['user'];
        $password = $_POST['pass'];
        // $qry = $this->db->query("SELECT *, concat(firstname,' ', middlename,' ', lastname) as name FROM users where email = '".$username."' and password = '".md5($password)."' ");
		$qry = $this->db->query("SELECT * FROM users WHERE email = '".$username."' AND password = '".md5($password)."' ");
		$respObj = new stdClass();
        
        if($qry->num_rows > 0){
            // user found & authenticated
            // set session
            foreach ($qry->fetch_array() as $key => $value) {
                // echo 'Authenticated...';
                if($key != 'password' && !is_numeric($key)){
                    $_SESSION['login_'.$key] = $value;
                }
                if($key == 'name'){
                    $respObj->name = $value;
                    $_SESSION['full_name'] = $value;
                }
                $respObj->status = 200;
                $respObj->msg = "Successfully logged in.";
                $respObj->graphics = "text-success";
                // return 200;
            }
            $respJSON = json_encode($respObj);
            return $respJSON;
		}else{
            // forbidden
            $respObj->status = 403;
            $respObj->name = '';
            $respObj->msg = "Resource forbidden from access. Please enter the correct username and password.";
            $respObj->graphics = "text-danger";
            $respJSON = json_encode($respObj);
			return $respJSON; 
		}
        
        /*
            qry
            object(mysqli_result)#3 (5) 
            { 
                ["current_field"]=> int(0) 
                ["field_count"]=> int(12) 
                ["lengths"]=> NULL 
                ["num_rows"]=> int(1) 
                ["type"]=> int(0) 
            }

            key
            int(0) string(2) "id" 
            int(1) string(9) "firstname" 
            int(2) string(8) "lastname" 
            int(3) string(10) "middlename" 
            int(4) string(7) "contact" 
            int(5) string(7) "address" 
            int(6) string(5) "email" 
            int(7) string(8) "password" 
            int(8) string(4) "type" 
            int(9) string(6) "avatar" 
            int(10) string(12) "date_created" 
            int(11) string(4) "name"


            value

            string(1) "4" 
            string(6) "Biniam" 
            string(1) "A" 
            string(0) "" 
            string(10) "1234567890" 
            string(8) "123 home" 
            string(15) "bini@sample.com" 
            string(32) "098f6bcd4621d373cade4e832627b4f6" 
            string(1) "1" 
            string(0) "" 
            string(19) "2024-03-06 02:28:15" 
            string(10) "A, Biniam " 


        */



        // if($qry->num_rows > 0){
		// 	foreach ($qry->fetch_array() as $key => $value) {
		// 		if($key != 'password' && !is_numeric($key))
		// 			$_SESSION['login_'.$key] = $value;
		// 	}
        //     $respObj = new stdClass();
        //     $respObj->status = 200;
        //     $respObj->name = "Biniam Alemayehu";
        //     $respObj->msg = "Successfully logged in.";
        //     $respJSON = json_encode($respObj);
		// 	return $respJSON;
    }

    function logout(){
        session_destroy();
        foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
        // animate for 1 sec and redirect to login screen
		header("location:login.php");
        // echo '403';
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






