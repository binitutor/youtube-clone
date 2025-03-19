<?php

include_once 'db_helper.php';

$video_ID = $_POST['video_id'];

/****** DELETE VIDEO BY ID *******/
if( isset($video_ID) ) {
    $db = new DBHelper();
    $query = $db->set_query(
        'SQL_GET_SINGE_VIDEO_BY_ID', 
        array($video_ID)
    );
    $result = $db->execute_query($query);
    $db->close_connection();
    // print_r($result);
    // print_r($result[0]);
    /*
        Array
        (
            [video_id] => 1014
            [title] => video9
            [description] => bbb
            [video_url] => ./uploads//videos/video9_1732950418.mp4
            [duration] => 240
            [created_at] => 2024-11-30
            [user_id_fk] => 10024
            [thumbnail_url] => ./uploads//thumbnails/test-thumbnail_1732950418.png
            [updated_at] => 2024-11-30
            [view_count] => 0
        )
    */
    // return $result[0];
    $video_info = implode(',', $result[0]);
    echo $video_info;
} else {
    return [];
}

?>