<?php include('../php_actions/config/db_connect.php'); ?>
<?php if($_SESSION['login_type'] == 1): ?>
    <h1 class="text-blackish-grey fw-lighter">Admin portal</h1>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" 
        aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="./user_portal.php">User Portal</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>

    <p class="text-light-blue link-underline-light">
        Welcome
        <?php 
            if(isset($_SESSION['login_id'])){
                echo $_SESSION['login_name']; 
            }
        ?>
    </p>
    <p class="text-blackish-grey fw-lighter">
        <?php 
            echo "Date: " . date('m/d/Y h:i:s a', time());
        ?>
    </p>
    <ul>
        <li class="btn btn-lg next my-2">
            <a href="./user_portal.php?page=accounts" class="no-underline">
                Manage User Accounts
            </a>
        </li>
        <li class="btn btn-lg next">
            <a href="./user_portal.php?page=documents" class="no-underline">
                Manage Documents
            </a>
        </li>
    </ul>
    
    <div class="row my-5">
        <div class="col my-5" id="user-info">
            <h6>Demeke C Birhanu</h6>
            <small class="text-blackish-grey fw-lighter">
                dmk@sample.com <br>
                +14526-5455-44
            </small>
        </div>
    </div>
    <!-- <button onclick="logout()">Logout - admin</button> -->
<?php else: ?>
    <h1>Welcome <?php 
        if(isset($_SESSION['login_id'])){
            echo $_SESSION['login_name']; 
        }
    ?></h1>
    <ul>
        <li>display document(s) submitted by the user</li>
        <li>display application status</li>
        <li>inform the user about next steps</li>
        <li>provide user with contact info</li>
        <li>provide user with ability to modify their profile</li>
        <li>upload profile pic, user pii</li>
    </ul>
    <!-- <button onclick="logout()">Logout - user</button> -->
<?php endif; ?>