  
    <nav class="flex-div">
        <div class="nav-left flex-div">
            <img src="./assets/img/menu.png" class="menu-icon" alt="" srcset="">
            <img src="./assets/img/logo.png" class="logo" alt="" srcset="">
        </div>
        <div class="nav-middle flex-div">
           <div class="search-box flex-div">
               <input type="text" placeholder="Search..">
               <img src="./assets/img/search.png" alt="" srcset="">
           </div>
           <img src="./assets/img/voice-search.png" class="mic-icon" alt="" srcset="">
        </div>
        <div class="nav-right flex-div">
            <img src="./assets/img/upload.png" alt="" srcset="">
            <img src="./assets/img/more.png" alt="" srcset="">
            <img src="./assets/img/notification.png" alt="" srcset="">
            
            <!--  -->
            <?php
                // authenticate
                // $_SESSION['login_uid'] = 1;

                if(isset($_SESSION['login_uid'])){
                    echo '
                    <div class="dropdown">
                        <img src="./assets/img/nilava.jpeg" class="user-icon" alt="" srcset="">
                        <div class="dropdown-content">
                            <p>
                                Bini H Alex<br>
                                <small>binitutor1@gmail.com</small>
                            </p>
                            <p><a href="#"><i class="fa fa-home" style="font-size:24px" ></i> Profile</a></p>
                            <p><a href="#"><i class="fa fa-gear" style="font-size:24px" ></i> Settings</a></p>
                            <p><a onclick="logout()"><i class="fa fa-sign-out" style="font-size:24px" ></i> Logout</a></p>
                        </div>
                    </div>
                    ';
                }else{
                    echo '
                    <div class="dropdown">
                        <img src="./assets/img/nilava.jpeg" class="user-icon" alt="" srcset="">
                        <div class="dropdown-content">
                            <p>
                                User<br>
                                <small>Welcome</small>
                            </p>
                            <p><a href="./php_actions/login.php"><i class="fa fa-sign-in" style="font-size:24px" ></i> Login</a></p>
                            <p><a href="./php_actions/register.php"><i class="fa fa-plus" style="font-size:24px" ></i> Register</a></p>
                            <p><a href="#"><i class="fa fa-gear" style="font-size:24px" ></i> Settings</a></p>
                        </div>
                    </div>
                    ';
                }
            ?>
        </div>
    </nav>