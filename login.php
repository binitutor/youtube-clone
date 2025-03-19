<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Clone / Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?php 
        session_start();
        // // include('./db_connect.php');
        if(isset($_SESSION['login_uid'])){ // authenticated
            header("location:../index.php?page=dashboard");
            // echo 'login id: '.$_SESSION['login_id'].'<br> login type: '.$_SESSION['login_type'].'<br> Successfully logged in';
        }
    ?>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">YouTube Clone / Login</h1>
                <a href="../index.php">Home</a> | <a href="./register.php">Register</a>

                <div class="row text-start">
                    <div class="col-2"></div>

                    <div class="col-8">
                        <h4 class="text-muted fw-lighter text-center  px-2 py-3">Login</h4>
                        <form id="login_form" enctype="multipart/form-data" 
                            class="text-bg-light border border-rounded shadow-sm p-5"
                            method="post" onsubmit="validateLoginForm(event);">
                            
                            <div class="mb-2">
                                <div id="emailHelp" class="form-text">Gmail address</div>
                                <input type="email" class="form-control" id="InputEmail" value=""
                                aria-describedby="emailHelp">@gmail.com
                            </div>
                            
                            <div class="mb-2">
                                <div id="pwHelp" class="form-text">Password</div>
                                <input type="password" class="form-control" id="InputPassword" value="">
                                <i style="font-size:24px" class="fa" onclick="view_password()">&#xf070;</i>
                            </div>

                            <button type="submit" class="btn btn-lg btn-primary next">Login</button>
                        </form>
                    </div>

                    <div class="col-2"></div>
                </div>

                <div class="m-5">
                    <p id="msg">logging....</p>

                    <hr>

                    Status check
                    <?php 
                            if(isset($_SESSION['login_uid'])){ // authenticated
                                echo '
                                    Login ID: '.$_SESSION['login_uid'].'<br>
                                    Username: '.$_SESSION['login_name'].'<br>
                                    User: '.$_SESSION['full_name'].'<br>
                                    Email: '.$_SESSION['login_email'].'<br>
                                    Profile URL: '.$_SESSION['login_ppurl'].'<br>
                                    Created date: '.$_SESSION['login_created_date'].'<br>
                                ';
                                // echo 'user: '.$_SESSION['full_name'].'<br>login id: '.$_SESSION['login_uid'].'<br> login type: '.$_SESSION['login_type'].'';
                            } else {
                                echo 'not set';
                            }
                    ?>
                    
                </div>

                
            </div>
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="main_script.js"></script>
</body>
</html>