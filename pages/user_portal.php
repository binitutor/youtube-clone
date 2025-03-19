<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './components/header.php'; ?>
    <title>THP >> User portal</title>
    <?php 
        // session_start();
        if(!isset($_SESSION['login_id'])){ // not authenticated
            header("location:../php_actions/login.php"); // go to login screen
        }
    ?>
</head>
<body>
    <?php include './components/navbar.php'; ?>

    <main>
        <div class="row my-5">
            <div class="spacer-1"></div>

            <div class="col-1"></div>
            <div class="col-3 bg-light border rounded shadow-sm ">
                <?php 
                    $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
                    include $page.'_sidebar.php'; // browse to page after authentication
                ?>
                <button onclick="logout('page')" class="btn btn-lg next">Logout</button>
            </div>

            <div class="col-8 text-start bg-white py-5">
                <?php 
                    $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
                    include $page.'.php'; // browse to page after authentication
                ?>
            </div>
            <div class="spacer-1"></div>
        </div>
    </main>
    <?php include './components/loadingModal.php';?>
    <?php include './components/footer.php'; ?>

</body>
</html>