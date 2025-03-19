<?php

    // connect to the remote server
    // create a file and write to it, or
    // upload an existing file from my local server to the remote server.
    // output file path to db
    
    include '../php_actions/form_submission.php';
    include '../php_actions/config/db_connect.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $full_name = $_POST['full_name'];
    $user_email = $_POST['user_email'];
    $p_num = $_POST['p_num'];
    $gender = $_POST['gender'];
    $citizenship = $_POST['citizenship'];
    $lang = $_POST['lang'];
    $finnishLang = $_POST['finnishLang'];
    $user_comment = $_POST['user_comment'];
    $doc_upload = $_FILES['doc_upload'];
    $bot_check = $_POST['bot_check'];

    // $resp = $full_name . '<br>';
    // $resp .= $user_email . '<br>';
    // $resp .= $p_num . '<br>';
    // $resp .= $gender . '<br>';
    // $resp .= $citizenship . '<br>';
    // $resp .= $lang . '<br>';
    // $resp .= $finnishLang . '<br>';
    // $resp .= $user_comment . '<br>';
    // $resp .= $doc_upload['name'] . '<br>';
    // $resp .= $bot_check . '<br>';
    // echo $resp;
    

    /* ***************** VALIDATE DATA ***************** */


    $up_file = $_FILES["doc_upload"]["tmp_name"];
    $up_filename = basename($_FILES["doc_upload"]["name"]);
    $up_file_size = $_FILES["doc_upload"]["size"];
    $out_file = time() . '__' . $up_filename;
    $target_filename = $sftp_dir . $out_file;
    $file_type = strtolower(pathinfo($target_filename,PATHINFO_EXTENSION));

    
    // echo 'up_file:'.$up_file.'<br>';
    // echo 'up_filename:'.$up_filename.'<br>';
    // echo 'up_file_size:'.$up_file_size.'<br>';
    // echo 'out_file:'.$out_file.'<br>';
    // echo 'target_filename:'.$target_filename.'<br>';
    // echo 'file_type:'.$file_type.'<br>';
    
    /* ***************** UPDATE DATABASE ***************** */
    // 1. generate user token
    // 2. save to db: pii, token, temp_acc_status = 0
    // 3. output: token, instruction & link to register
    // ** once registered, account becomes active
        // temp_acc_status = 1



    // under user account management, admin can toggle activate / deactivate
    // when user user wants to login, first check account status
    $resp_msg = '';

    $fullnameArr = parseFullname($full_name);
    $user_token = getRandomWord(); // temporary user password, output to user
    $user_token_hashed = generateToken($user_token); // hashed value of password, save to db
    

    // $user_token = '098f6bcd4621d373cade4e832627b4f6';
    $default_address = '123 default lane';
    $account_type = 2;
    $profile_pic = 'pic.png';

    $query = $conn->prepare("insert into users (firstname, lastname, middlename, contact, address, email, password, type, avatar) 
    values(?, ?, ?, ?, ?, ?, ?, ?, ?)");  // uploaded_files
    $query->bind_param("sssssssss", $fullnameArr[0], $fullnameArr[2], $fullnameArr[1], $p_num, $default_address, $user_email, $user_token_hashed, $account_type, $profile_pic);

    $query->execute();
    $query->close();
    $conn->close();

    $resp_msg .= '
        <h1 class="text-blackish-grey fw-lighter">Success</h1>
        <p class="alert alert-success lead fst-italic">Your application has been submitted successfully.</p> 
        <p class="lead fst-italic">
            Your username (email): <strong>'.$user_email.'</strong><br>
            Your token: <strong>'.$user_token.'</strong>
        </p>
    ';

    /*
    email column should be unique value in database.
    ** it is also a user name for the user.

    1. on app submission, accept any email, even duplicate ones.
    2. before generating username, check if the email entered is unique.
        if yes, use it as username
        if not, append a number before @. compare with db until unique.
    3. output unique email and token
    
    <input type="hidden" value="" id="dup_sbm">

    */


    echo $resp_msg;


    // ************* UPLOAD TO SFTP **************

    // echo 'Submitting...<br>';
    //  
        
    $upload_status = file_validator($target_filename, $up_file, $up_file_size, $file_type);
    
    // Check if $uploadOk is set to 0 by an error
    if ($upload_status == 0) {
        echo '
        <p class="alert alert-danger lead fst-italic">Sorry, your file was not uploaded!</p>
        ';
    }
    // if everything is ok, try to upload file
    else {
        upload_to_sftp($sftpHost, $sftpUsername, $sftpPassword, $target_filename, $up_file, $up_filename);
        echo $out_file . '<br>';
    }
    // echo '<a href="../">Home</a>';

} else {
    echo $_SERVER['REQUEST_METHOD'].' METHOD NOT ALLOWED!!!';
}
    
   
    
?>