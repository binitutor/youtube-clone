<header>
        <div class="navbar row fixed-top px-5 navbar-expand-xxl bg-body-tertiary">
            <div class="col-2">
                <a class="navbar-brand text-light" href="../">
                    <span class="fa fa-home"></span> Top Hope Palvelu
                </a>
            </div>

            <div class="col-8 text-center">
                <ul class="text-simple-grey list-group list-group-horizontal">
                    <li class="list-group-item navitem-c border-0">
                        <a href="./apply.php" class="text-light text-decoration-none">
                            <i class="fa fa-file-text-o"></i> Start Application
                        </a>
                    </li>
                    <li class="list-group-item navitem-c border-0">
                        <a href="./testimonials.php" class="text-light text-decoration-none">
                            <i class="fa fa-play-circle-o"></i> Testimonials
                        </a>
                    </li>
                    <li class="list-group-item navitem-c border-0">
                        <a href="./contact.php" class="text-light text-decoration-none">
                            <i class="fa fa-address-card-o"></i> Contact Us
                        </a>
                    </li>
                    <!-- href="./pages/contact.html" -->
                    <li class="list-group-item navitem-c border-0">
                        <a href="./ecourse.php" class="text-light text-decoration-none">
                            <i class="fa fa-address-book-o"></i> Lecture Site
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col">
                <li class="list-group-item navitem-c dropdown list-group-item">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Your account
                    </a>
                    <ul class="dropdown-menu navitem-c">
                        <?php // session_start(); ?>
                        <?php 
                            if(isset($_SESSION['full_name'])){
                                echo '<label>'.$_SESSION['full_name'].'</label>
                                    <li><hr class="dropdown-divider"></li>
                                    <li class="navitem-c-dropdown">
                                        <a class="dropdown-item navitem-c-dropdown" href="#">Profile</a>
                                    </li>
                                    <li class="navitem-c-dropdown">
                                        <a class="dropdown-item navitem-c-dropdown" href="#">Todo</a>
                                    </li>
                                    <li class="navitem-c-dropdown">
                                        <a class="dropdown-item navitem-c-dropdown" href="#" onclick=logout("page")>Logout</a>
                                    </li>
                                ';
                            } else {
                                echo '
                                <label>Your Account</label>
                                <li><hr class="dropdown-divider"></li>
                                <li class="navitem-c-dropdown">
                                    <a class="dropdown-item navitem-c-dropdown" href="../php_actions/login.php">Login</a>
                                </li>';
                            }  
                        ?>
                    </ul>
                </li>
            </div>
        </div>
    </header>