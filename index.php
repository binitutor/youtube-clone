<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Clone</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?php
        session_start();
    ?>
</head>
<body onload="load_public_videos()">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">YouTube Clone</h1>
                <p>load videos for public from database</p>
                <a href="./login.php">Login</a> | <a href="./register.php">Register</a> | <a onclick="logout()">Logout</a>



                <button type="button" onclick="load_public_videos()" 
                    class="btn btn-sm btn-outline-secondary">Load Videos
                </button>

                <hr>

                <?php
                    // var_dump($_SESSION);
                    // login type: '.$_SESSION['login_type'].'<br>
                    if(isset($_SESSION['login_uid'])){ // authenticated
                        echo '
                            Login ID: '.$_SESSION['login_uid'].'<br>
                            Username: '.$_SESSION['login_name'].'<br>
                            User: '.$_SESSION['full_name'].'<br>
                            Email: '.$_SESSION['login_email'].'<br>
                            Profile URL: '.$_SESSION['login_ppurl'].'<br>
                            Created date: '.$_SESSION['login_created_date'].'<br>
                        ';
                    } else {
                        echo 'not set';
                    }
                ?>

                <p>Parse URL</p>
                <?php
                    // $url = 'http://username:password@hostname:9090/path?arg=value#anchor';
                    $url = 'http://www.binitutor.com/youtube?page=dashboard#jump-to-page';

                    echo '
                    URL: '.$url.'<br><br>
                    
                    ssl - '.parse_url($url, PHP_URL_SCHEME).'<br>
                    user - '.parse_url($url, PHP_URL_USER).'<br>
                    pass - '.parse_url($url, PHP_URL_PASS).'<br>
                    host - '.parse_url($url, PHP_URL_HOST).'<br>
                    port - '.parse_url($url, PHP_URL_PORT).'<br>
                    path - '.parse_url($url, PHP_URL_PATH).'<br>
                    arguments - '.parse_url($url, PHP_URL_QUERY).'<br>
                    anchor - '.parse_url($url, PHP_URL_FRAGMENT).'<br>
                    
                    ';
                    // var_dump($url);
                    // var_dump(parse_url($url, PHP_URL_SCHEME)); // http
                    // var_dump(parse_url($url, PHP_URL_USER)); // username
                    // var_dump(parse_url($url, PHP_URL_PASS)); // password
                    // var_dump(parse_url($url, PHP_URL_HOST)); // hostname
                    // var_dump(parse_url($url, PHP_URL_PORT)); // 9090
                    // var_dump(parse_url($url, PHP_URL_PATH)); // /path
                    // var_dump(parse_url($url, PHP_URL_QUERY)); // arg=value
                    // var_dump(parse_url($url, PHP_URL_FRAGMENT)); // anchor


                    // header("Location: <LOCATION_TO_REDIRECT>");
                ?>

                

                <div id="videos_output"></div>
                
                <!-- <div class="card" style="width: 18rem;">
                    <video controls height="250" class="card-img-top" alt="video">
                        <source src="./uploads/videos/20241125_154613.mp4" type="video/mp4" />
                        Download the <a href="./uploads/videos/20241125_154613.mp4">MP4</a> video.
                    </video>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <small class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</small>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="main_script.js"></script>
</body>
</html>