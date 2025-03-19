<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Clone / Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <?php
        session_start();
    ?>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">YouTube Clone / Register</h1>
                <a href="./index.php">Home</a> | <a href="./login.php">Login</a>

                <div class="row text-start">
                    <div class="col-2"></div>

                    <div class="col-8">
                        <h4 class="text-muted fw-lighter text-center  px-2 py-3">Register</h4>

                        <!--  onsubmit="validateLoginForm(event);" -->
                        <form id="register_form" enctype="multipart/form-data" 
                            action="register_user_account.php" method="post" 
                            class="text-bg-light border border-rounded shadow-sm p-5">
                            
                            <div class="mb-2">
                                <div id="" class="form-text">Full Name</div>
                                <input type="text" class="form-control" name="regiterFullName" aria-describedby="regiter">
                            </div>
                            
                            <div class="mb-2">
                                <div id="" class="form-text">Gmail address</div>
                                <input type="email" class="form-control" name="regiterEmail" aria-describedby="email">@gmail.com
                            </div>
                            
                            <div class="mb-2">
                                <div id="" class="form-text">Password</div>
                                <input type="password" class="form-control" name="regiterPassword1" id="InputPassword">
                                <i class="fa fa-eye-slash" style="font-size:24px" onclick="view_password()"></i>
                            </div>
                            
                            <div class="mb-2">
                                <div id="" class="form-text">Confirm password</div>
                                <input type="password" class="form-control" name="regiterPassword2" id="InputPassword2">
                                <i style="font-size:24px" class="fa" onclick="view_password()">&#xf070;</i>
                            </div>
                            
                            <div class="mb-2">
                                <div id="" class="form-text">Upload profile picture</div>
                                <input type="file" class="form-control" name="pictures[]" >
                            </div>

                            <button type="submit" class="btn btn-lg btn-primary next">Register</button>
                        </form>

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

                    <div class="col-2"></div>
                </div>


            </div>
        </div>
    </div>

    <script src="main_script.js"></script>
</body>
</html>