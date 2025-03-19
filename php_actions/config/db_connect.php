<?php 

// $conn= new mysqli('localhost:8888','root','','odss_db')or die("Could not connect to mysql".mysqli_error($con));

$servername = "localhost";
$username = "filemanager";
$password = "filemanager";
$database = 'tesfu_web';

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";


