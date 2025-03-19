<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../pages/components/header.php'; ?>
    <title>THP >> Login</title>
    <?php 
        // session_start();
        include('./config/db_connect.php');
        if(isset($_SESSION['login_id'])){ // authenticated
            // header("location:user_portal.php?page=dashboard");
            echo 'login id: '.$_SESSION['login_id'].'<br> login type: '.$_SESSION['login_type'].'<br> Successfully logged in';
        }
    ?>
</head>
<body onload="pw_view_toggler()">
    <?php 
        // include '../pages/components/navbar.php';
    ?>

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
                        <a href="../pages/apply.php" class="text-light text-decoration-none">
                            <i class="fa fa-file-text-o"></i> Start Application
                        </a>
                    </li>
                    <li class="list-group-item navitem-c border-0">
                        <a href="../pages/testimonials.php" class="text-light text-decoration-none">
                            <i class="fa fa-play-circle-o"></i> Testimonials
                        </a>
                    </li>
                    <li class="list-group-item navitem-c border-0">
                        <a href="../pages/contact.php" class="text-light text-decoration-none">
                            <i class="fa fa-address-card-o"></i> Contact Us
                        </a>
                    </li>
                    <!-- href="./pages/contact.html" -->
                    <li class="list-group-item navitem-c border-0">
                        <a href="../pages/ecourse.php" class="text-light text-decoration-none">
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
                                    <a class="dropdown-item navitem-c-dropdown" href="./login.php">Login</a>
                                </li>';
                            }  
                        ?>
                    </ul>
                </li>
            </div>
        </div>
    </header>


    <main>
        <div class="container" id="main-container">
            <div class="row">
                <div class="col-2"></div>

                <!-- Next steps  -->
                <div class="col-10 text-center">
                    
                    <div class="spacer-1"></div>

                    <div class="row text-start">
                        <div class="col-10">
                            <div class="row text-bg-light border border-rounded shadow-sm m-5 px-2 py-1">
                                <small class="text-muted fw-lighter text-center">
                                    <strong>
                                        ያስገቡት አፕሊኬሽን ያለበትን ደረጃ ለመመልከት ከታች ያለውን ፎርም ይሙሉ!
                                    </strong>
                                </small>
                                
                                <p class="lead text-center border-bottom border-secondary-subtle">
                                    <code class="small">Login to view the status of your application!</code>
                                </p>

                                <div class="row py-2">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <form id="login_form" enctype="multipart/form-data" 
                                            method="post" onsubmit="validateLoginForm(event);">
                                            <div class="mb-2">
                                                <label for="loginInputEmail" class="form-label">የኢሜል አድራሻዎን ያስገቡ</label>
                                                <div id="emailHelp" class="form-text">Email address</div>
                                                <input type="email" class="form-control" id="loginInputEmail" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-2">
                                                <label for="loginInputPassword" class="form-label">አፕሊኬሽን ሲያስገቡ የተቀበሉትን የሚስጥር ኮድ ያስገቡ</label>
                                                <div id="emailHelp" class="form-text">Confirmation code</div>
                                                <input type="password" class="form-control" id="loginInputPassword">
                                                <span>
                                                    <input type="checkbox" id="toggleVisibility">
                                                    <i class="fa fa-eye-slash"></i>
                                                </span>
                                            </div>
                                            <button type="submit" class="btn btn-lg next">ያስገቡ | Login</button>
                                        </form>
                                        <h4 id="ouput"></h4>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>

    </main>
    <?php include '../pages/components/loadingModal.php';?>
    <?php include '../pages/components/footer.php'; ?>

</body>
</html>


