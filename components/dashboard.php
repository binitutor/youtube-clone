<?php
    // depending on the user's action, the video player will be displayed
    // or the video lists will be displayed

    $show_video_player = true;
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
        $dashboard_view .= '
        <div class="container">

            <div class="banner">
                <img src="./assets/img/banner.png" alt="" srcset="">
            </div>
            <div class="list-container">

                ';
                foreach ($video_cards as $v_card) {
                    $dashboard_view .= $v_card;
                }
        $dashboard_view .= '
            </div>  

        </div>
        ';
    }
    echo $dashboard_view;

?>




