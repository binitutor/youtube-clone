<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Clone / Login</title>
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
            header("location:../index.php");
        }
    ?>
</head>
<body class="bg-body-secondary">

    <div class="container">
        <div class="row my-5">
            <div class="col-lg-8 offset-lg-2">
                <div class="row">

                    <div class="col-lg-4 login-left">
                        <img src="../assets/img/google.png" alt="" srcset="" class="img-thumbnail">
                        <p class="display-4">Verify it is you</p>
                    </div>

                    <div class="col-lg-8 login-right">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">YouTube Clone / Login</h4>
                            </div>

                            <div class="card-body">

                                <form method="post" id="login_form" enctype="multipart/form-data"
                                    onsubmit="validateLoginForm(event);"
                                    class="text-bg-light border border-rounded shadow-sm px-5 py-2">
                                    <h4 class="text-muted fw-lighter text-center">Login</h4>

                                    <div class="form-group">
                                        <label for="email">Gmail</label>
                                        <input type="email" name="email" id="email" class="form-control mb-3" required>

                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                        <i style="font-size:24px" id="toggleVisibility" class="fa fa-eye-slash mb-3" 
                                        onclick="view_password()"></i>
                                    </div>

                                    <span class="mx-3 text-center">
                                        <a href="./update_password.php" style="color: #224f9c;" class="text-decoration-none">Forgot your password?</a>
                                    </span>
                                    <button type="submit" class="btn" style="background: #224f9c; color: #eee">Login</button>
                                </form>

                                <p>Don't have an account? <a href="./register.php" style="color: #224f9c;" class="text-decoration-none">Register</a></p>
                                
                                <div class="m-5" id="msg">
                                    <?php 
                                        if(isset($_SESSION['login_uid'])){ // authenticated
                                            echo '
                                            <small class="text-muted">
                                                Login ID: '.$_SESSION['login_uid'].'<br>
                                                Username: '.$_SESSION['login_name'].'<br>
                                                User: '.$_SESSION['full_name'].'<br>
                                                Email: '.$_SESSION['login_email'].'<br>
                                                Profile URL: '.$_SESSION['login_ppurl'].'<br>
                                                Created date: '.$_SESSION['login_created_date'].'<br>
                                            </small>';
                                        } else {
                                            echo '<small class="text-muted">You are not authenticated!</small>';
                                        }
                                    ?>
                                    <p><a href="../index.php" class="btn" >
                                        <img src="../assets/img/favicon.png" alt="Youtube" width="40px">
                                    YouTube Clone Home
                                    </a></p>
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
    <script src="../assets/js/login_script.js"></script>
</body>
</html>