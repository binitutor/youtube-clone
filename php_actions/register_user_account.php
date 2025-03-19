<?php
session_start();
date_default_timezone_set('America/New_York');

include_once './db_helper.php';


// ************ FUNCTIONS ************
function upload_file( $sourcePath, $targetPath, $relativePath ){
    $upload_info = array();
    if ( move_uploaded_file( $sourcePath, $targetPath ) ) {
        $upload_info['status'] = true;
        $upload_info['feedback'] = 'File is valid, and was successfully uploaded.';
        $upload_info['url'] = $relativePath;
        return $upload_info;
    } 
    else {
        $upload_info['status'] = false;
        $upload_info['feedback'] = 'Unable to upload file!';
        $upload_info['url'] = '';
        return $upload_info;
    }
}

function upload_profile( $profilePic ){
    // rename file before uploading
    $file_name = $profilePic["name"];
    $clean_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_name);
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $new_file_name = $clean_name . '_' . time() . "." . $ext;

    // upload file
    $sourcePath = $profilePic['tmp_name'];
    $targetPath = explode('php_actions', __DIR__)[0] . 'uploads/profiles/'.$new_file_name;
    $relativePath = './uploads/'. explode('uploads', $targetPath)[1];

    $upload_info = upload_file( $sourcePath, $targetPath, $relativePath );
    if($upload_info['status']){
        return $upload_info;
    } else {
        $upload_info['feedback'] .= '\nDEBUG: ' . $_FILES;
        return $upload_info;
    }
}

function update_database($query_key, $query_params){
    $db = new DBHelper();
    $query = $db->set_query( $query_key, $query_params );
    $result = $db->execute_query($query);
    $db->close_connection();
    return $result;
}


$full_name = $_POST['regiterFullName'];
$email = $_POST['regiterEmail'];
$enc_password = md5($_POST['regiterPassword1']);
// $password1 = $_POST['regiterPassword1'];
// $password2 = $_POST['regiterPassword2'];
$profile_picture = $_FILES['profile_pic'];
$created_date = date('Y-m-d h:i:s', time());
// $result = $date->format(' H:i:s');

$upload_url = './uploads/profiles/';


if( isset( $full_name ) && isset( $email ) && isset( $enc_password ) ){
    /****** UPLOAD PROFILE *******/
    if( isset( $profile_picture ) ){
        $profile_info = upload_profile( $profile_picture );
        if( $profile_info['status'] ){
            $upload_url = $profile_info['url'];
            $_SESSION['login_ppurl'] = $upload_url;
            // echo 'Profile picture uploaded successfully!';
        } else {
            // echo 'Profile picture upload failed!';
        }
    } else {
        // echo 'Profile picture not set!';
    }

    /****** CREATE PROFILE *******/
    $query_key = 'SQL_CREATE_USER_PROFILE';
    $query_params = array($full_name, $email, $enc_password, $upload_url, $created_date);
    $result = update_database($query_key, $query_params);
    if( $result ){
        // echo 'Profile created successfully!';
        // get user data to update session
        $query_key_e = 'SQL_GET_USER_BY_EMAIL';
        $query_params_e = array($email);
        $result_e = update_database($query_key_e, $query_params_e);
        if( $result_e ){
            /****** UPDATE SESSION USER INFO *******/
            // if( $videos ){
            //     $video_count = 0;
            //     foreach ($videos as $video) {
            //         $video_count++;
            //         $video_id = $video['video_id'];
            //         $video_title = $video['title'];
            $user = $result_e[0];
            $_SESSION['login_uid'] = $user['uid'];
            $_SESSION['login_name'] = $user['name'];
            $_SESSION['full_name'] = $user['name'];
            $_SESSION['login_email'] = $user['email'];
            $_SESSION['login_ppurl'] = $user['ppurl'];
            $_SESSION['login_created_date'] = $user['created_date'];
            // unset($_SESSION["login_uid"]);
            // update url path
            $url = './register.php?user='.$_SESSION['full_name'];
            $url .= '&email='.$_SESSION['login_email'];
            $url .= '&date='.$_SESSION['login_created_date'];
            // var_dump($result_e);
            header('Location: '.$url);
        } else {
            echo 'Profile creation failed!';
        }
        
    } else {
        echo 'Profile creation failed!';
    }

}

?>

