<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli('localhost', 'admin', '', 'youtube_c1');

/****** GET *******/

$videos = array();
$query = "SELECT * FROM videos";
$result = $mysqli->execute_query($query);
foreach ($result as $row) {
    // printf(
    //     "<strong>%s</strong> - %s seconds <br> %s", 
    //     $row["title"], $row["length"], $row["description"]
    // );
    // $videos[] = $row;
    array_push($videos, $row);
}
echo json_encode($videos);
// echo 'Success!';

?>