<?php 
$video_cards = array();
foreach ($videos as $video) {
    $v_card = '
        <div class="vid-list">
            <a href="' . $video->vurl . '"> 
                <img src="'.$video->tmburl.'" class="thumbnail" >
            </a>
            <div class="flex-div">
                <img src="'. $video->ppurl .'">
                <div class="vid-info">
                    <a href="' . $video->vurl . '">'.$video->title.'</a>
                    <p>'. $video->description .'</p>
                    <p>'. $video->views .'</p>
                </div>
            </div>
        </div>
    ';
    array_push($video_cards, $v_card);
}

?>
