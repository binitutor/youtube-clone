<?php

include_once 'db_helper.php';
global $video;
global $videos;

$url = $_SERVER['REQUEST_URI'];

/****** GET SINGLE VIDEO BY ID *******/

if(!is_null(parse_url($url, PHP_URL_QUERY)) && str_contains(parse_url($url, PHP_URL_QUERY), 'vid_id')){
    $video_ID = explode('=', parse_url($url, PHP_URL_QUERY)); // arg=value
        
    $db = new DBHelper();
    $query = $db->set_query(
        'SQL_GET_SINGE_VIDEO_BY_ID', 
        array($video_ID[1])
    );
    $video = $db->execute_query($query);
    $db->close_connection();
} 

/****** GET ALL VIDEOS *******/
// load all videos from database
$db = new DBHelper();
$query = $db->set_query(
    'SQL_GET_ALL_VIDEOS', 
    array(0)
);
$videos = $db->execute_query($query);
$db->close_connection();


?>