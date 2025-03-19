<?php
session_start();

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

function upload_video( $videoFile, $video_title ){
    // rename file before uploading
    $file_name = $videoFile["name"];
    $clean_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_name);
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $new_file_name = $clean_name . '_' . time() . "." . $ext;
    
    // use filename from title field
    if (isset ( $video_title )) {
        $new_file_name = $video_title . '_' . time() . "." . $ext;
    }
    

    // upload file
    $sourcePath = $videoFile['tmp_name'];
    // echo __DIR__; // /Applications/MAMP/htdocs/clone/youtube/v5/php_actions
    $targetPath = explode('php_actions', __DIR__)[0] . 'uploads/videos/'.$new_file_name;
    $relativePath = './uploads/'. explode('uploads', $targetPath)[1];

    $upload_info = upload_file( $sourcePath, $targetPath, $relativePath );
    if($upload_info['status']){
        return $upload_info;
    } else {
        $upload_info['feedback'] .= '\nDEBUG: ' . $_FILES;
        return $upload_info;
    }
}

function upload_thumbnail( $thumbnailFile ){
    // rename file before uploading
    $file_name = $thumbnailFile["name"];
    $clean_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $file_name);
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $new_file_name = $clean_name . '_' . time() . "." . $ext;

    // upload file
    $sourcePath = $thumbnailFile['tmp_name'];
    $targetPath = explode('php_actions', __DIR__)[0] . 'uploads/thumbnails/'.$new_file_name;
    $relativePath = './uploads/'. explode('uploads', $targetPath)[1];

    $upload_info = upload_file( $sourcePath, $targetPath, $relativePath );
    if($upload_info['status']){
        return $upload_info;
    } else {
        $upload_info['feedback'] .= '\nDEBUG: ' . $_FILES;
        return $upload_info;
    }
}

function update_database(){
    // ************
}

// ************ GET USER INFO FROM SESSION ************
if(isset($_SESSION['login_uid'])){ // authenticated
    // echo '
    //     Login ID: '.$_SESSION['login_uid'].'<br>
    //     Username: '.$_SESSION['login_name'].'<br>
    //     User: '.$_SESSION['full_name'].'<br>
    //     Email: '.$_SESSION['login_email'].'<br>
    //     Profile URL: '.$_SESSION['login_ppurl'].'<br>
    //     Created date: '.$_SESSION['login_created_date'].'<br>
    // ';
    
    // echo 'title: ' . $title . '<br>
    // description: ' . $description . '<br>
    // visibility: ' . $visibility . '<br>
    // scheduled: ' . $scheduled . '<br>
    // thumbnail: ' . basename($thumbnail['name']) . '<br>
    // ';

    // ************ GET USER INFO FROM SESSION ************
    $uploader_id = $_SESSION['login_uid'];
    $uploader_name = $_SESSION['full_name']; // $_SESSION['login_name']
    $uploader_email = $_SESSION['login_email'];
    $uploader_ppurl = $_SESSION['login_ppurl'];
    $uploader_created_date = $_SESSION['login_created_date'];
    
    // ************ GET VIDEO INFO FROM FORM ************
    $video_title = $_POST['video-title'];
    $description = $_POST['description'];
    // $tags = $_POST['tags'];
    $video = $_FILES['userfile'];
    $visibility = $_POST['visibility']; // on or null
    $scheduled = $_POST['schedule'];
    $thumbnail = $_FILES['thumbnail'];
    
    if (isset ( $video )) {

        // ************ UPLOAD VIDEO ************
        $video_upload_info = upload_video( $video, $video_title );
        $video_upload_status = $video_upload_info['status']; // true or false
        $video_upload_feedback = $video_upload_info['feedback'];
        $video_upload_url = $video_upload_info['url'];
        // echo $upload_feedback;

        // ************ UPLOAD THUMBNAIL ************
        if (isset ( $thumbnail )){
            $thumbnail_upload_info = upload_thumbnail( $thumbnail );
            $thumbnail_upload_status = $thumbnail_upload_info['status'];
            $thumbnail_upload_feedback = $thumbnail_upload_info['feedback'];
            $thumbnail_upload_url = $thumbnail_upload_info['url'];
        } else {    
            $thumbnail_upload_status = false;
            $thumbnail_upload_feedback = 'Thumbnail not uploaded!';
            $thumbnail_upload_url = './uploads/thumbnails/default_thumbnail.png';   
        }

        // ************ UPDATE DATABASE ************
        // update_database()
        include_once './db_helper.php';
        $db = new DBHelper();
        $query = $db->set_query(
            'SQL_CREATE_VIDEO', 
            array($video_title, $description, $video_upload_url, 240,
                $uploader_id, $thumbnail_upload_url)
        );
        $result = $db->execute_query($query);
        $db->close_connection();

        // ************ REDIRECT TO STUDIO ************
        // then send back to studio and append the new video row to the table top
        header('Location: ../yt_studio.php');
    }
    


} else {
    echo '<h1>Not authenticated! Redirecting to login page in 4 seconds...</h1>';
}



?>