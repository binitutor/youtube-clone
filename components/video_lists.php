<?php 

/****** GET ALL VIDEOS *******/

$video_cards = array();
foreach ($videos as $video) {    
    if(!$video['thumbnail_url']){
        $video['thumbnail_url'] = './assets/img/default_thumbnail.png';
    }  
    if(!$video['description']){
        $video['description'] = 'No description available';
    }

    $v_card = '
        <div class="vid-list">
            <a href="./?vid_id=' . $video['video_id'] . '"> 
                <img src="'.$video['thumbnail_url'].'" class="thumbnail" >
            </a>
            <div class="flex-div">
                <img src="./uploads/profiles/profile1.jpg" alt="$video->ppurl">
                <div class="vid-info">
                    <a href="' . $video['video_url'] . '">'.$video['title'].'</a>
                    <p>'. $video['description'] .'</p>
                    <p>'. $video['view_count'] .'</p>
                </div>
            </div>
        </div>
    ';
    array_push($video_cards, $v_card);
}

?>
