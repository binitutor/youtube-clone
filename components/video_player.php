<?php


    /****** VIDEO PLAYER *******/

    // var_dump($url);
    // var_dump(parse_url($url, PHP_URL_SCHEME)); // http
    // var_dump(parse_url($url, PHP_URL_USER)); // username
    // var_dump(parse_url($url, PHP_URL_PASS)); // password
    // var_dump(parse_url($url, PHP_URL_HOST)); // hostname
    // var_dump(parse_url($url, PHP_URL_PORT)); // 9090
    // var_dump(parse_url($url, PHP_URL_PATH)); // /path
    // var_dump(parse_url($url, PHP_URL_QUERY)); // arg=value
    // var_dump(parse_url($url, PHP_URL_FRAGMENT)); // anchor


    // *********** GET URL
    $url = $_SERVER['REQUEST_URI']; // /youtube/v3/components/video_player.php?vid_id=1000
    // basename($_SERVER['REQUEST_URI']); // video_player.php?vid_id=1000
    // $_SERVER['PHP_SELF']; // /youtube/v3/components/video_player.php
    // $_SERVER['SCRIPT_NAME']; // /youtube/v3/components/video_player.php
    // $_SERVER['SCRIPT_FILENAME']; // /var/www/html/youtube/v3/components/video_player.php
    // $_SERVER['REQUEST_URI']; // /youtube/v3/components/video_player.php?vid_id=1000
    // $_SERVER['QUERY_STRING']; // vid_id=1000
    // $_SERVER['HTTP_HOST']; // www.binitutor.com
    // $_SERVER['HTTP_USER_AGENT']; // Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36
    // $_SERVER['HTTP_REFERER']; // http://www.binitutor.com/youtube?page=dashboard#jump-to-page
    // $_SERVER['HTTP_ACCEPT_LANGUAGE']; // en-US,en;q=0.9
    // $_SERVER['HTTP_ACCEPT_ENCODING']; // gzip, deflate, br
    // $_SERVER['HTTP_ACCEPT']; // text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8
    // $_SERVER['HTTP_CONNECTION']; // keep-alive
    // $_SERVER['HTTP_UPGRADE_INSECURE_REQUESTS']; // 1
    // $_SERVER['HTTP_CACHE_CONTROL']; // max-age=0

    // ****** PARSE URL
    // look at url path. if vid_id is not set, redirect to index.php
    // if vid_id is set, load video details from database
    if(!is_null(parse_url($url, PHP_URL_QUERY)) && str_contains(parse_url($url, PHP_URL_QUERY), '=')){
        $video_ID = explode('=', parse_url($url, PHP_URL_QUERY)); // arg=value
        // echo 'Video ID: '.$video_ID[1].'<br>';

        // query the database for video details using the video ID
        // $query = "SELECT * FROM videos WHERE vid_id = $video_ID[1]";

        // include_once '../php_actions/db_helper.php';
        include_once 'php_actions/db_helper.php';

        $db = new DBHelper();
        // $query = "SELECT * FROM videos WHERE vid_id = $video_ID[1]";
        // $query = $YT_DB_QUERY['SQL_GET_SINGE_VIDEO_BY_ID'];
        $query = $db->set_query(
            'SQL_GET_SINGE_VIDEO_BY_ID', 
            array($video_ID[1])
        );

        // $video = $db->execute_query($query)[0];
        $video = $db->execute_query($query);
        $db->close_connection();
        // var_dump($video);
        // array(1) { 
        //     [0]=> array(7) { 
        //         ["vid_id"]=> string(4) "1000" 
        //         ["title"]=> string(11) "Video Title" 
        //         ["description"]=> string(27) "This is a video description" 
        //         ["vurl"]=> string(36) "./uploads/videos/20241125_154613.mp4" 
        //         ["length"]=> string(3) "180" 
        //         ["upload_date"]=> string(10) "2024-11-25" 
        //         ["uid_fk"]=> string(5) "10004" 
        //     } 
        // }




        // echo json_encode($video);
        
    } else {
        // redirect to index.php
        // header("Location: ./index.php");
    }




    /*

        INSERT INTO videos(title, description, vurl, length, upload_date,
                        uid_fk)
        VALUES("Video Title", "This is a video description",
            "./uploads/videos/20241125_154613.mp4",
            180, "2024-11-25", 10004);


        $video = array(
            "vid_id" => 1000,
            "title" => "Video Title",
            "description" => "This is a video description",
            "vurl" => "./components/video_player.php?vid_id=1000",
            "length" => 180, // 3 minutes
            "upload_date" => "2024-11-25",
            "uid_fk" => 10004,
            "tmburl" => './assets/img/thumbnail1.png',
            "views" => '2k Views &bull; 2 days',
            "ppurl" => './assets/img/nilava.jpeg'
        );

        INSERT INTO videos(title, description, vurl, length, upload_date,
                        uid_fk, tmburl, 'views', ppurl)
        VALUES("Video Title", "This is a video description",
            "./uploads/videos/20241125_154613.mp4",
            180, "2024-11-25", 10004,
            './assets/img/thumbnail1.png',
            '2k Views &bull; 2 days',
            './assets/img/nilava.jpeg');


    */






    // header("Location: <LOCATION_TO_REDIRECT>");



    // <div id="videos_output"></div>










    // include_once 'db_config.php';

    /****** GET *******/

    // $videos = array();
    // $query = "SELECT * FROM videos";
    // $result = $conn->execute_query($query);
    // foreach ($result as $row) {
    //     // printf(
    //     //     "<strong>%s</strong> - %s seconds <br> %s", 
    //     //     $row["title"], $row["length"], $row["description"]
    //     // );
    //     // $videos[] = $row;
    //     array_push($videos, $row);
    // }
    // echo json_encode($videos);





    // if(isset($_SESSION['login_uid'])){ // authenticated
    //     echo '
    //         Login ID: '.$_SESSION['login_uid'].'<br>
    //         Username: '.$_SESSION['login_name'].'<br>
    //         User: '.$_SESSION['full_name'].'<br>
    //         Email: '.$_SESSION['login_email'].'<br>
    //         Profile URL: '.$_SESSION['login_ppurl'].'<br>
    //         Created date: '.$_SESSION['login_created_date'].'<br>
    //     ';
    //     // echo 'user: '.$_SESSION['full_name'].'<br>login id: '.$_SESSION['login_uid'].'<br> login type: '.$_SESSION['login_type'].'';
    // } else {
    //     echo 'not set';
    // }

    // $videos = array();

    //     // load 10 videos
    //     for ($i = 0; $i < 5; $i++) {
    //         $vidObj = new stdClass();
    //         $vidObj->vid_id = 1000;
    //         $vidObj->title = "Vide Title " . ($i + 1);
    //         $vidObj->description = "This is a video description";
    //         $vidObj->vurl = "./components/video_player.php?vid_id=1000";
    //         $vidObj->length = 180; // 3 minutes
    //         $vidObj->upload_date = "2024-11-25";
    //         $vidObj->uid_fk = 10004;

    //         // thumbnail, view counts, profile pic comes from different tables
    //         $vidObj->tmburl = './assets/img/thumbnail1.png';
    //         $vidObj->views = '2k Views &bull; 2 days';
    //         $vidObj->ppurl = './assets/img/nilava.jpeg';

    //         $respJSON = json_encode($vidObj);
    //         array_push( $videos, $vidObj );
    //     }





?>

<?php
    $video_player = '

    <div class="play-video">
        <video  controls autoplay>
            <source src="./assets/img/thumbnail1 video.mp4" type="video/mp4">
        </video>

        <div class="tags">
            <a href="">#Entreprenuers</a> <a href="">#billionaires</a> <a href="">#RatanTata</a> <a
                href="">#India</a>
        </div>
        <h3> Surprisingly a good singer</h3>
        <div class="play-video-info">
            <p>18,406,599 Views &bull; May 20, 2015</p>
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
            <p>Dude at my school turns out to have a voice.</p>
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

?>







