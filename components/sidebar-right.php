<?php

/****** GET ALL VIDEOS *******/
// $videos - imported from load_videos.php
$video_cards_right = array();
foreach ($videos as $video) {   
    $v_card_right = '
        <div class="side-video-list">
            <a href="./?vid_id=' . $video['video_id'] . '" class="small-thumbnail"> 
                <img src="'.$video['thumbnail_url'].'" alt="" srcset="">
            </a>
            <div class="vid-info">
                <a href="./?vid_id=' . $video['video_id'] . '">'.$video['title'].'</a>
                <p>Avalin Vines</p>
                <p>'. $video['view_count'] .'M Views</p>
            </div>
        </div>
    ';
    array_push($video_cards_right, $v_card_right);
}

// <div class="side-video-list">
//         <a href="" class="small-thumbnail"> <img src="./assets/img/thumbnail19.png" alt="" srcset=""></a>
//         <div class="vid-info">
//             <a href="">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestias, nostrum?</a>
//             <p>Avalin Vines</p>
//             <p>1.1M Views</p>
//         </div>
//     </div>

$sidebar_right = '
<div class="right-sidebar">
';
foreach ($video_cards_right as $v_card) {
    $sidebar_right .= $v_card;
}
$sidebar_right .= '
</div>
';