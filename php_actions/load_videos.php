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

else {
    // load all videos from database
    $db = new DBHelper();
    $query = $db->set_query(
        'SQL_GET_ALL_VIDEOS', 
        array(0)
    );
    $videos = $db->execute_query($query);
    $db->close_connection();
}


/****** TEST *******/

/*
    $videos = array();

    // load 5 videos
    for ($i = 0; $i < 5; $i++) {
        $vidObj = new stdClass();
        $vidObj->vid_id = 1001;
        $vidObj->title = "Vide Title " . ($i + 1);
        $vidObj->description = "This is a video description";
        // $vidObj->vurl = "./components/video_player.php?vid_id=". $vidObj->vid_id;
        $vidObj->vurl = "./?vid_id=". $vidObj->vid_id;
        $vidObj->length = 180; // 3 minutes
        $vidObj->upload_date = "2024-11-25";
        $vidObj->uid_fk = 10004;

        // thumbnail, view counts, profile pic comes from different tables
        $vidObj->tmburl = './assets/img/thumbnail1.png';
        $vidObj->views = '2k Views &bull; 2 days';
        $vidObj->ppurl = './assets/img/nilava.jpeg';

        $respJSON = json_encode($vidObj);
        array_push( $videos, $vidObj );
    }

*/







?>