<?php 

// $conn= new mysqli('localhost:8888','root','','odss_db')or die("Could not connect to mysql".mysqli_error($con));

$servername = "localhost";
$username = "admin";
$password = "";
$database = 'youtube_c1';

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// $mysqli = new mysqli('localhost', 'admin', '', 'youtube_c1');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>