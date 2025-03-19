<?php

/****** VIDEO PLAYER *******/

include_once 'php_actions/load_videos.php';


/****** GET SINGLE VIDEO BY ID *******/

if(!is_null(parse_url($url, PHP_URL_QUERY)) && str_contains(parse_url($url, PHP_URL_QUERY), 'vid_id')){
    
    $video_id = $video[0]['video_id'];
    $video_title = $video[0]['title'];
    $video_description = $video[0]['description'];
    $video_url = $video[0]['video_url'];
    $video_length = $video[0]['duration'];
    $video_created_at = $video[0]['created_at'];
    $video_created_by = $video[0]['user_id_fk'];
    $video_thumbnail = $video[0]['thumbnail_url'];
    $video_uupdated_at = $video[0]['updated_at'];
    $video_view_count = $video[0]['view_count'];

    $video_player = '

    <div class="play-video">
        <video  controls autoplay>
            <source src="'. $video_url .'" type="video/mp4">
        </video>

        <div class="tags">
            <a href="">#Entreprenuers</a> <a href="">#billionaires</a> <a href="">#RatanTata</a> <a
                href="">#India</a>
        </div>
        <h3>'. $video_title .'</h3>
        <div class="play-video-info">
            <p>'. $video_view_count .' Views &bull; '. $video_created_at .'</p>
            <div>
                <a href="http://"><img src="./assets/img/like.png">488K</a>
                <a href="http://"><img src="./assets/img/dislike.png">5.9K</a>
                <a href="http://"><img src="./assets/img/share.png">SHARE</a>
                <a href="http://"><img src="./assets/img/save.png">SAVE</a>
            </div>
        </div>
        <hr>


        <div class="owner">
            <img src="./assets/img/thumbnail1-owner.jpg">
            <div>
                <p>megan summers</p>
                <span>19.4K subscribers</span>
            </div>
            <button type="button">Subscribe</button>
        </div>


        <div class="vid-des">
            <p>'. $video_description .'</p>
            <p>Subscribe to megan summers</p>

            <hr>

            <div class="cmnt">
                <h4>16,303 Commnets</h4>
                <img src="./assets/img/menu.png" alt="" srcset="">
                <span>SORT BY</span>
            </div>

            <div class="add-cmnt">
                <img src="./assets/img/nilava.jpeg" alt="" srcset="">
                <input type="text" placeholder="Add a Public Comment">
            </div>

            <div class="old-cmnt">
                <img src="./assets/img/Harpreet.jpg" alt="" srcset="">
                <div>
                    <h3>
                        Atinder Kumar <span>2 Day ago</span>
                    </h3>
                    <p>Look at elon’s expression and body language at the mention of Ratan Tata and the self
                        correction he does when he <br> talks about him. Ratan Tata is a gem .</p>

                        <div class="cmnt-react">
                            <img src="./assets/img/like.png" alt="" srcset="">
                            <span>1.2K</span>
                            <img src="./assets/img/dislike.png" alt="" srcset="">
                            <span></span>
                            <span>REPLY</span>
                            <!-- <a href="http://">ALL Replies</a> -->
                            <div> &bull; View 9 Replies</div>
                        </div>
                </div>
            </div>

            <div class="old-cmnt">
                <img src="./assets/img/Harpreet.jpg" alt="" srcset="">
                <div>
                    <h3>
                        Atinder Kumar <span>2 Day ago</span>
                    </h3>
                    <p>Look at elon’s expression and body language at the mention of Ratan Tata and the self
                        correction he does when he <br> talks about him. Ratan Tata is a gem .</p>

                        <div class="cmnt-react">
                            <img src="./assets/img/like.png" alt="" srcset="">
                            <span>1.2K</span>
                            <img src="./assets/img/dislike.png" alt="" srcset="">
                            <span></span>
                            <span>REPLY</span>
                            <!-- <a href="http://">ALL Replies</a> -->
                            <div> &bull; View 9 Replies</div>
                        </div>
                </div>
            </div>

            <div class="old-cmnt">
                <img src="./assets/img/Harpreet.jpg" alt="" srcset="">
                <div>
                    <h3>
                        Atinder Kumar <span>2 Day ago</span>
                    </h3>
                    <p>Look at elon’s expression and body language at the mention of Ratan Tata and the self
                        correction he does when he <br> talks about him. Ratan Tata is a gem .</p>

                        <div class="cmnt-react">
                            <img src="./assets/img/like.png" alt="" srcset="">
                            <span>1.2K</span>
                            <img src="./assets/img/dislike.png" alt="" srcset="">
                            <span></span>
                            <span>REPLY</span>
                            <!-- <a href="http://">ALL Replies</a> -->
                            <div> &bull; View 9 Replies</div>
                        </div>
                </div>
            </div>
            
        </div>
        <hr class="hide-hr">
    </div>
    
    ';
} else {
    $video_player = '';
}
    
?>

