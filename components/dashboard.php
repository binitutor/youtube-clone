<?php
    // depending on the user's action, the video player will be displayed
    // or the video lists will be displayed

    // check the url for the video ID
    $url = $_SERVER['REQUEST_URI'];

    // ****** PARSE URL
    // url 1: http://localhost:8888/clone/youtube/v4/
    // url 2: http://localhost:8888/clone/youtube/v4/?vid_id=1000

    // look at url path. if vid_id is not set, redirect to index.php
    // if vid_id is set, load video details from database
    if(!is_null(parse_url($url, PHP_URL_QUERY)) && str_contains(parse_url($url, PHP_URL_QUERY), '=')){
        $video_ID = explode('=', parse_url($url, PHP_URL_QUERY)); // arg=value
        if($video_ID[0] == 'vid_id'){
            $show_video_player = true;
        } else {
            $show_video_player = false;
        }
        $show_video_player = true;
    } 
    else {
        // redirect to index.php
        // header("Location: ./index.php");
        $show_video_player = false;
    }

    $dashboard_view = '';

    if($show_video_player){
        include_once 'components/video_player.php';
        include_once 'components/sidebar-right.php';
        $dashboard_view .= '
        <div class="container play-container">
            <div class="row">
                ';
        $dashboard_view .= $video_player;
        $dashboard_view .= $sidebar_right;
        $dashboard_view .= '
            </div>
        </div>
        ';
    } else {
        // load all videos from database
        include_once './php_actions/load_videos.php';
        include_once 'components/sidebar-left.php';
        include_once 'components/video_lists.php';
        $dashboard_view .= $sidebar_left;
        $dashboard_view .= '
        <div class="container">
            <div class="banner">
                <img src="./assets/img/banner.png" alt="" srcset="">
            </div>
            <div class="list-container">
                ';
                if( $video_cards ){
                    foreach ($video_cards as $v_card) {
                        $dashboard_view .= $v_card;
                    }
                } else {
                    $dashboard_view .= '<h1 class="m-5 text-center">No videos found</h1>';
                }
                
        $dashboard_view .= '
            </div>  
        </div>
        ';
    }
    echo $dashboard_view;

?>




