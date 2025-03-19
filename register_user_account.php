<?php

date_default_timezone_set('America/New_York');


$full_name = $_POST['regiterFullName'];
$email = $_POST['regiterEmail'];
$enc_password = md5($_POST['regiterPassword1']);
// $password1 = $_POST['regiterPassword1'];
// $password2 = $_POST['regiterPassword2'];
$profile_picture = $_FILES['pictures'];
$created_date = date('Y-m-d h:i:s', time());
// $result = $date->format(' H:i:s');

$upload_url = './uploads/profiles/';

/****** UPLOAD PROFILE *******/

foreach ($profile_picture["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $profile_picture["tmp_name"][$key];
        $name = basename($profile_picture["name"][$key]);
        $filename = explode('.', $name)[0];
        $fileext = explode('.', $name)[1];
        $filename = $filename . '_' . time() . '.' . $fileext;
        $upload_url .= $filename; // ./uploads/thumbnails/$name
        move_uploaded_file($tmp_name, $upload_url);
        echo "File uploaded: $name<br>";
    } else {
        echo "Error: " . $error;
    }
}


/****** CREATE USER *******/

// echo '<br><br><br>
//     ORIGINAL FILE: '.$name.'<br>
//     FILE: '.$filename.'<br>
//     FULL NAME: '.$full_name.'<br>
//     EMAIL: '.$email.'<br>
//     DATE: '.$created_date.'<br>
//     PP: '.$upload_url.'<br>
// ';

function getPosts(mysqli $con) {
    global $con;
    $query = mysqli_query($con,"SELECT * FROM Blog");
     while($row = mysqli_fetch_array($query)) {
            {
                echo "<div class=\"blogsnippet\">";
                echo "<h4>" . $row['Title'] . "</h4>" . $row['SubHeading'];
                echo "</div>";
            }
    }
}

function createProfile(mysqli $con, $query) {
    // global $con;
    // $query = "INSERT INTO users2 (user_name, user_email, user_password, created_date, ppurl)
    //     VALUES('John Doe', 'admin@gmail.com', 
    //     'fc1d44205d3cb2926efd39e30630cdc2', '2024-11-25',
    //     './uploads/profiles/BT-Profile-square_1732577974.png')";

    try { 
        $result = mysqli_query($con, $query);
        echo 'Profile created successfully! <a href="./index.html">Home</a> | <a href="./login.php">Login</a>';

        // while($row = mysqli_fetch_array($result))
        //     {
        //         echo "<div class=\"blogsnippet\">";
        //         echo "<h4>" . $row['Title'] . "</h4>" . $row['SubHeading'];
        //         echo "</div>";
        //     }
        // }

        
    }
    catch (mysqli_sql_exception $e) { 
        var_dump($e);
        exit; 
    } 
    finally { 
        $con->close(); 
    }
}


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // throw exceptions
$con=mysqli_connect("localhost","admin","","youtube_c1");

$query = "INSERT INTO users (name, email, password, ppurl, created_date)
    VALUES('$full_name', '$email', '$enc_password', '$upload_url', '$created_date')";
// getPosts($con);
createProfile($con, $query);


// strval($full_name), strval($email), strval($enc_password)


/****** LOG ERRORS *******/

function createLog($data){ 
    $file = "Your path/incompletejobs.txt";
    $fh = fopen($file, 'a') or die("can't open file");
    fwrite($fh,$data);
    fclose($fh);
}

?>

