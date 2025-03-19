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



/****** INSERT *******/
$query = "INSERT INTO videos (title, description, vurl, length, upload_date, uid_fk)
VALUES('Video Title 1', 'Description for the video', 
'http://localhost:8888/clone/youtube/v1', '180',
'2024-11-24', '10000')";
$result = $mysqli->execute_query($query);
echo 'Success!';















// $query = 'SELECT Name, District FROM City WHERE CountryCode=? ORDER BY Name LIMIT 5';
// $result = $mysqli->execute_query($query, ['DEU']);




// $query = "SELECT * FROM users";
// $sql = mysqli_query($success, $query);
// $row = mysqli_num_rows($sql);
// print_r($row);

// $mysqli = new mysqli("localhost","admin","","youtube_c1");
// $commands = file_get_contents($location)
// // Check connection
// if ($mysqli -> connect_errno) {
//   echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
//   exit();
// }

// Perform query
// 
// $query = mysqli_query()
// $row = mysqli_num_rows($query);
// print_r($row);

// $sql = mysqli_query($success, "SELECT * FROM login WHERE username = '".$_POST['username']."' and password = '".md5($_POST['password'])."'");
// $row = mysqli_num_rows($sql);
// print_r($row);



// $result = mysql_query($query);
// while ($row = mysql_fetch_assoc($result)) {
//     print_r($row);
//     // do stuff with $row
// }


// if ($result = $mysqli -> query($query)) {
//   echo "Returned rows are: " . $result -> num_rows;
//   // Free result set
//   $result -> free_result(); // Returned rows are: 2
//   echo $result;
// //   while($row = mysql_fetch_array($result))
// // {
// //    // This will loop through each row, now use your loop here

// // }
// //     while($row = mysql_fetch_assoc($result))
// //     {
// //     echo $row['name']." ";
// //     echo $row['email']." ";
// //     }
// }

// $mysqli -> close();
?>