<?php

include_once 'db_config.php';

/****** GET *******/

// $videos = array();
// $query = "SELECT * FROM videos";
// $result = $conn->execute_query($query);
// foreach ($result as $row) {
//     // printf(
//     //     "<strong>%s</strong> - %s seconds <br> %s", 
//     //     $row["title"], $row["length"], $row["description"]
//     // );
//     // $videos[] = $row;
//     array_push($videos, $row);
// }
// echo json_encode($videos);




/****** TEST *******/

$videos = array();

    // load 10 videos
    for ($i = 0; $i < 5; $i++) {
        $vidObj = new stdClass();
        $vidObj->vid_id = 1000;
        $vidObj->title = "Vide Title " . ($i + 1);
        $vidObj->description = "This is a video description";
        // $vidObj->vurl = "./components/video_player.php?vid_id=". $vidObj->vid_id;
        $vidObj->vurl = "./?vid_id=". $vidObj->vid_id;
        $vidObj->length = 180; // 3 minutes
        $vidObj->upload_date = "2024-11-25";
        $vidObj->uid_fk = 10004;

        // thumbnail, view counts, profile pic comes from different tables
        $vidObj->tmburl = './assets/img/thumbnail1.png';
        $vidObj->views = '2k Views &bull; 2 days';
        $vidObj->ppurl = './assets/img/nilava.jpeg';

        $respJSON = json_encode($vidObj);
        array_push( $videos, $vidObj );
    }





?>