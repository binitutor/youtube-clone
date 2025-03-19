<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli('localhost', 'admin', '', 'youtube_c1');

/****** GET *******/
$query = "SELECT * FROM users";
$result = $mysqli->execute_query($query);
foreach ($result as $row) {
    printf(
        "%s) <strong>%s</strong> <br> %s %s <br>%s %s<br><br>", 
        $row["uid"], $row["name"],
        $row["email"], $row["password"], $row["ppurl"], 
        $row["created_date"]
    );
}

$query = "SELECT * FROM videos";
$result = $mysqli->execute_query($query);
foreach ($result as $row) {
    printf(
        "<strong>%s</strong> - %s seconds <br> %s", 
        $row["title"], $row["length"], $row["description"]
    );
}


?>