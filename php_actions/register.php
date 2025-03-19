<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Clone / Register</title>
    <meta name="description" content="YouTube Clone Website">
    <meta name="author" content="Biniam Alemayehu">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/login_style.css">
    <?php 
        session_start();
        // // include('./db_connect.php');
        if(isset($_SESSION['login_uid'])){ // authenticated
            // header("location:./index.php?page=dashboard");
            // header("location:../index.php");
        }
    ?>
</head>
<body class="bg-body-secondary">
    
    
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-8 offset-lg-2">
                <div class="row">

                    <div class="col-lg-4 register-left">
                        <img src="../assets/img/gmail.png" alt="" srcset="" class="img-thumbnail">
                        <p class="display-4">Create your gmail account.</p>
                    </div>

                    <div class="col-lg-8 register-right">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">YouTube Clone / Register</h4>
                                <!-- <a href="./index.php">Home</a> | <a href="./login.php">Login</a> -->
                            </div>

                            <div class="card-body">
                                
                                <!--  onsubmit="validateLoginForm(event);" -->
                                <form id="register_form" enctype="multipart/form-data" 
                                    action="register_user_account.php" method="post" 
                                    class="text-bg-light border border-rounded shadow-sm px-5 py-2">
                                    <h4 class="text-muted fw-lighter text-center">Register</h4>

                                    <div class="mb-2 pp-form">
                                        <div id="" class="form-text">Full Name</div>
                                        <input type="text" class="form-control" name="regiterFullName" aria-describedby="regiter">
                                    </div>
                                    
                                    <div class="mb-2 pp-form">
                                        <div id="" class="form-text">Gmail address</div>
                                        <input type="email" class="form-control" name="regiterEmail" aria-describedby="email">@gmail.com
                                    </div>
                                    
                                    <div class="mb-2 pp-form">
                                        <div id="" class="form-text">Password</div>
                                        <input type="password" class="form-control" name="regiterPassword1" id="InputPassword">
                                        <i class="fa fa-eye-slash" style="font-size:24px" onclick="view_password()"></i>
                                    </div>
                                    
                                    <div class="mb-2 pp-form">
                                        <div id="" class="form-text">Confirm password</div>
                                        <input type="password" class="form-control" name="regiterPassword2" id="InputPassword2">
                                        <!-- <i style="font-size:24px" class="fa" onclick="view_password()">&#xf070;</i> -->
                                    </div>
                                    
                                    <div class="mb-2">
                                        
                                        <div class="row">
                                            <div class="col-md-6 profile" onclick="upload_profile()">
                                                <img src="" id="profile_pic_preview" hidden alt="preview profile" class="img-thumbnail">
                                                <span id="profile_pic_label">
                                                    <i class="fa fa-user text-muted img-thumbnail px-4" style="font-size: 100px"></i>
                                                    <div class="form-text" >Upload profile picture</div>
                                                </span>
                                                
                                                <input id="profile_pic" hidden type="file" class="form-control" name="profile_pic" >
                                            </div>

                                            <div class="col-md-6 pt-2 bg-white rounded">
                                                <small class="text-muted">
                                                    <!-- <input type="text" name="" id="pp-form-status" hidden> -->
                                                    Status update: <br>
                                                    <?php
                                                        // read profile update from url
                                                        $url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                                        
                                                        $url_args = parse_url($url, PHP_URL_QUERY); // arg=value & arg2=value2
                                                        if( $url_args ){
                                                            $url_args = explode('&', $url_args); // arg=value, arg2=value2
                                                            $output = `Your account is successfully created!<br><hr>`;
                                                            foreach ($url_args as $argv) {
                                                                $argkv = explode('=', $argv);
                                                                if($argkv[0] == 'user'){
                                                                    $output .= 'User: '.$argkv[1].'<br>';
                                                                    // if %20 exists, replace with space
                                                                    $output = str_replace('%20', ' ', $output);
                                                                };
                                                                if($argkv[0] == 'email'){
                                                                    $output .= 'Email: '.$argkv[1].'<br>';
                                                                };
                                                                if($argkv[0] == 'date'){
                                                                    $output .= 'Created on: '.$argkv[1].'<br>';
                                                                };
                                                            }

                                                            // update profile picture preview
                                                            $ppurl = '.'. $_SESSION['login_ppurl']; // ../uploads/profiles/BT-Profile-square_1732580774.png
                                                            $output .= '
                                                            <script>
                                                                document.getElementById("profile_pic_preview").src = "'. $ppurl .'";
                                                                const profile_form_inputs = document.querySelectorAll(".pp-form");
                                                                profile_form_inputs.forEach(inputElement => {
                                                                    setTimeout(function(){
                                                                        inputElement.setAttribute("hidden", true);
                                                                    }, 100);
                                                                });
                                                            </script>';
                                                            
                                                            
                                                            echo $output;
                                                        } else {
                                                            echo 'Profile not created!';
                                                        }
                                                    ?>
                                                </small>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <button type="submit" class="btn pp-form" style="background: #224f9c; color: #eee">Register</button>
                                </form>

                                <div class="row">
                                    <div class="col-md-8">
                                        <p>
                                            <a href="../index.php" class="btn" >
                                                <img src="../assets/img/favicon.png" alt="Youtube" width="40px">
                                                YouTube Clone Home
                                            </a>
                                        </p>
                                    </div>

                                    <!-- <div class="col-md-6">
                                        <button type="submit" class="btn offset-md-4 my-5" style="background: #224f9c; color: #eee">
                                            <i class="fa fa-sign-in"></i> Login
                                        </button>                        
                                    </div> -->
                                </div>
                                
                                
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
    
    <div class="bg-light fixed-bottom text-muted">
        <small class="text-center">This clone website is intended for educational purposes only. Utilizing the content for the purposes other than learning webdesign is unlawful!</small>
    </div>
    
    <?php include('../components/loading-modal.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/register_script.js"></script>
</body>
</html>