  
    <nav class="flex-div">
        <div class="nav-left flex-div">
            <img src="./assets/img/menu.png" class="menu-icon" alt="" srcset="">
            <img src="./assets/img/logo.png" class="logo" onclick="reload_home()" alt="" srcset="">
        </div>
        <div class="nav-middle flex-div">
           <div class="search-box flex-div">
               <input type="text" placeholder="Search..">
               <img src="./assets/img/search.png" alt="" srcset="">
           </div>
           <img src="./assets/img/voice-search.png" class="mic-icon" alt="" srcset="">
        </div>
        <div class="nav-right flex-div">
            <?php
                // authenticate
                // $_SESSION['login_uid'] = 1;

                if(isset($_SESSION['login_uid'])){
                    // SIGNED IN !!
                    $nav_update = '
                    <a href="./yt_studio.php">
                        <img src="./assets/img/upload.png" alt="" srcset="">
                    </a>
                    
                    <img src="./assets/img/more.png" alt="" srcset="">
                    <img src="./assets/img/notification.png" alt="" srcset="">
                    <div class="dropdown">
                        <img src="./uploads/profiles/main-profile.jpg" class="user-icon" alt="" srcset="">
                        <div class="dropdown-content">
                    
                    ';
                    $nav_update .= '
                            <p>
                                '. $_SESSION['full_name'] .'<br>
                                <small>'. $_SESSION['login_email'] .'</small>
                            </p>
                    ';
                    $nav_update .= '
                            <p><a href="#"><i class="fa fa-home" style="font-size:24px" ></i> Profile</a></p>
                            <p><a href="#"><i class="fa fa-gear" style="font-size:24px" ></i> Settings</a></p>
                            <p><a onclick="logout()"><i class="fa fa-sign-out" style="font-size:24px" ></i> Logout</a></p>
                        </div>
                    </div>
                    ';

                    echo $nav_update;

                }else{
                    // SIGNED OUT !!
                    echo '
                    <div>
                        <a href="./php_actions/login.php"  style="color: #224f9c"><i class="fa fa-sign-in" style="font-size:24px" ></i> Sign in</a>
                    </div>
                    
                    ';
                }
            ?>
        </div>
    </nav>