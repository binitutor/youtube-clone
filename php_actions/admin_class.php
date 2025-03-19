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
        include './config/db_connect.php';
        $this->db = $conn;
	}
    function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

    function login(){
        // first check if user account exists using email address
        // secomd, check if user account is active or not
        // if active, attempt to login with the password provided
        // if not active, inform user that the account is not activated.
            // if recent (less than a week), give ability to enter token & activate.
            // if more than a week, please contact site admin to activate your account.
            // ** token expires in one week.

        /*
            when user submits application
                - temp account is created with username and generated token as pw
                - user can use this info to activate the account.
                - to activate the account, use just has to login once with token.
                - instruction to set a new password
                - token expires in one week. if so, then need to contact admin for new account
                ** this temp account is not the same as student account
            
            Accounts:
            1 = admin (developer)
            2 = user (temp account after application is submitted)
                pw updated at first login
            3 = viewer (assistant to tesfu)
            4 = reviewer (tesfu)
            5 = teacher
            6 = student account
                needs to be activated by admin/course admin
                user can request activation from dashboard.
            7 = auditor (optional)
                to check on user activities
        */


        extract($_POST);
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $qry = $this->db->query("SELECT *, concat(firstname,' ', middlename,' ', lastname) as name FROM users where email = '".$username."' and password = '".md5($password)."' ");
		$respObj = new stdClass();
        
        if($qry->num_rows > 0){
            // user found & authenticated
            // set session
            foreach ($qry->fetch_array() as $key => $value) {
                if($key != 'password' && !is_numeric($key)){
                    // save user entries to session, except for pw & acc_type
                    $_SESSION['login_'.$key] = $value;
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

    function load_apps_table(){
        $result = $this->db->query("SELECT * FROM users where type != 1");
        $docs = $this->db->query("SELECT * FROM documents");
        $respObj = new stdClass();

        $doc_rows = array();
        $usr_rows = array();

        // load documents
        if($docs->num_rows > 0){
            $doccount = mysqli_num_rows( $docs );
            $respObj->docss_found = $doccount;        
            while($row = mysqli_fetch_array($docs)) {
                $doc_rows[] = $row; // [{},{}]
                // $doc_key = 'file_path_'.$row['id'];
            }
        }
        $respObj->docs = $doc_rows; // loads docs 

        // load users
        if($result->num_rows > 0){
            $rowcount = mysqli_num_rows( $result );
            $respObj->users_found = $rowcount;            
            while($u_row = mysqli_fetch_array($result)) {
                $usr_rows[] = $u_row;

            }
            $respObj->usr_dta = $usr_rows; // loads users
        
            $respJSON = json_encode($respObj);
            return $respJSON;
        }else{
            // return count of users
            $respObj->users_found = 0;
            $respObj->usr_dta = "No user data available!";
            $respJSON = json_encode($respObj);
			return $respJSON; 
		}		
    }


}






