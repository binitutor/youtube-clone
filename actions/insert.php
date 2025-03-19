<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli('localhost', 'admin', '', 'youtube_c1');

/****** INSERT *******/
$query = "INSERT INTO videos (title, description, vurl, length, upload_date, uid_fk)
VALUES('Video Title 1', 'Description for the video', 
'http://localhost:8888/clone/youtube/v1', '180',
'2024-11-24', '10000')";
$result = $mysqli->execute_query($query);
echo 'Success!';



?>