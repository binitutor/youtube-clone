<?php

include '../php_actions/config/sftp_config.php';
require_once('../vendor/autoload.php');
use phpseclib3\Net\SFTP;
 
function file_validator($f_name, $file, $f_size, $f_type){
    $fileStatus = 1;
    // Check if image file is a actual image or fake image
    $fileStatus = check_content($fileStatus, $file);
    
    // Check if file already exists
    if ($fileStatus){
        $fileStatus = check_file_exists($f_name, $fileStatus);
    }

    // Check file size
    if ($fileStatus){
        $fileStatus = check_file_size($f_size, $fileStatus);
    }
    
    // Allow certain file formats
    if ($fileStatus){
        $fileStatus = check_file_format($fileStatus, $f_type);
    }
    
    return $fileStatus;
}

function check_content($uploadOk, $file){
    // Check if image file is a actual image or fake image
    // $check = getimagesize($file);
    $check_filetype = mime_content_type($file);
    // print_r($check_filetype);
    return $uploadOk;

    if($check_filetype == 'application/pdf') {
        echo "File is a - " . $check_filetype . ".<br>";
        $uploadOk = 1;
        return $uploadOk;
    } else {
        echo "File is not in a PDF format.";
        $uploadOk = 0;
        return $uploadOk;
    }
}

function check_file_exists($f_name, $uploadOk){
    // Check if file already exists
    if (file_exists($f_name)) {
        echo "Sorry, file already exists.<br>";
        echo $f_name.'<br>';
        $uploadOk = 0;
        return $uploadOk;
    } else {
        return $uploadOk;
    }
}

function check_file_size($f_size, $uploadOk){
    // Check file size
    // 5Mb = 5000 kb = 5,000,000 bytes
    // print_r($f_size);
    if ($f_size > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        return $uploadOk;
    } else {
        return $uploadOk;
    }
}

function check_file_format($uploadOk, $f_type){
    // Allow certain file formats
    if($f_type != "pdf"){
        echo "Sorry, only PDF files are accepted.<br>";
        $uploadOk = 0;
        return $uploadOk;
    } else{
        return $uploadOk;
    }

    // if($f_type != "jpg" && $f_type != "png" && $f_type != "jpeg"
    // && $f_type != "gif" ) {
    //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //     $uploadOk = 0;
    //     return $uploadOk;
    // } else{
    //     return $uploadOk;
    // }
}

function upload_to_sftp($sftpHost, $sftpUsername, $sftpPassword, $f_name, $up_file, $up_filename){
    $sftp = new SFTP($sftpHost);
    $sftp->login($sftpUsername, $sftpPassword);
    // upload a file
    // $sftp->put($sftp_dir.'/'.$remoteFilename, $localFilename, SFTP::SOURCE_LOCAL_FILE);
    if($sftp->put($f_name, $up_file, SFTP::SOURCE_LOCAL_FILE)){
        echo "The file ". htmlspecialchars( $up_filename ). " has been uploaded successfully!<br>";
        // echo '
        // <p class="alert alert-danger lead fst-italic">The file has been uploaded successfully!</p>
        // ';
    }else{
        echo '
        <p class="alert alert-danger lead fst-italic">Sorry, there was an error uploading your file!</p>
        ';
    }
}

function parseFullname($full_name){
    $str = explode(" ",$full_name);
    $strLen = count($str);
    if($strLen == 2){
        $firstname = $str[0];
        $lastname = $str[1];
        $middlename = '';
    } else if ($strLen > 2){
        $firstname = $str[0];
        $lastname = $str[2];
        $middlename = $str[1];
    }else if ($strLen < 2){
        $firstname = $str[0];
        $lastname = '';
        $middlename = '';
    }
    $names = [$firstname, $middlename, $lastname];

    return $names;
}

function generateToken($word){
    // $word = getRandomWord();
    $hashCode = md5($word);
    return $hashCode;
}

function getRandomWord($len = 10) {
    $word = array_merge(range('a', 'z'), range('A', 'Z'));
    shuffle($word);
    return substr(implode($word), 0, $len);
}

?>