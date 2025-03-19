<?php
// *************** ROUTER SCRIPT

// $username = $_POST['user'];
// $password = $_POST['pass'];
$action = $_POST['action'];
ob_start();
include 'admin_class.php';
$autentication = new Action();

//**************** AUTHENTICATION **************/
if($action == 'login'){
    $login_status = $autentication->login();
    if($login_status)
        echo $login_status;
}
if($action == 'logout'){
    $logout_status = $autentication->logout();
    if($logout_status)
        echo $logout_status;
}


//**************** ROUTER **************/

if($action == 'load_apps_table'){
    $apps_resp = $autentication->load_apps_table();
    if($apps_resp)
        echo $apps_resp;
}


?>