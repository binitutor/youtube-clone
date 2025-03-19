<?php

include_once 'db_helper.php';

$video_ID = $_POST['video_id'];

/****** DELETE VIDEO BY ID *******/
if( isset($video_ID) ) {
    $db = new DBHelper();
    $query = $db->set_query(
        'SQL_DELETE_VIDEO', 
        array($video_ID)
    );
    $db->execute_query($query);
    $db->close_connection();
    echo 'Video deleted successfully';
} else {
    echo 'Video ID not provided';
}

?>