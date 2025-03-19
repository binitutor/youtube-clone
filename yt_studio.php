<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Clone / Upload</title>
    <meta name="description" content="YouTube Clone Website">
    <meta name="author" content="Biniam Alemayehu">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="./assets/css/main_style.css">
    <link rel="stylesheet" href="./assets/css/ytst_style.css">

    <?php 
        session_start();
        if(!isset($_SESSION['login_uid'])){ // not authenticated
            header("location:./index.php");
        }
    ?>
</head>
<body class="bg-body-secondary">
       
    <!-- navigation -->

    <nav class="flex-div">

        <div class="nav-left flex-div">
            <img src="./assets/img/menu.png" class="menu-icon" alt="" srcset="">
            <img src="./assets/img/yt_studio_logo.svg" width="80px" class="ytst-logo" 
            onclick="reload_studio()" alt="" srcset="" title="YouTube Studio Dashboard">
        </div>

        <div class="nav-middle flex-div">
           <div class="search-box flex-div">
               <input type="text" placeholder="Search..">
               <img src="./assets/img/search.png" alt="" srcset="">
           </div>
        </div>

        <div class="nav-right flex-div">
            <?php
                if(isset($_SESSION['login_uid'])){
                    // SIGNED IN !!
                    $nav_update = '
                    <div class="mx-5 btn" id="ytst-upload">
                        <div class="dropdown text-start">
                            <img src="./assets/img/upload.png" alt="upload" width="30px" title="Upload video"> 
                            <div class="dropdown-content">
                                <p>
                                    <a data-bs-toggle="modal" data-bs-target="#uploadModal" title="Upload video">
                                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24" focusable="false" aria-hidden="true" style="pointer-events: none; display: inherit; width: 24px; height: 24px;"><path d="m10 8 6 4-6 4V8zm11-5v18H3V3h18zm-1 1H4v16h16V4z"></path></svg>
                                        <span class="mx-2">Upload</span>
                                    </a>
                                </p>
                                <p>
                                    <a data-bs-toggle="modal" data-bs-target="#goLiveModal" title="Go live">
                                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="10" viewBox="0 0 24 24" width="10" focusable="false" aria-hidden="true" style="pointer-events: none; display: inherit; width: 24px; height: 24px;"><g><path d="M14 12c0 1.1-.9 2-2 2s-2-.9-2-2 .9-2 2-2 2 .9 2 2zM8.48 8.45l-.71-.7C6.68 8.83 6 10.34 6 12s.68 3.17 1.77 4.25l.71-.71C7.57 14.64 7 13.39 7 12s.57-2.64 1.48-3.55zm7.75-.7-.71.71c.91.9 1.48 2.15 1.48 3.54s-.57 2.64-1.48 3.55l.71.71C17.32 15.17 18 13.66 18 12s-.68-3.17-1.77-4.25zM5.65 5.63l-.7-.71C3.13 6.73 2 9.24 2 12s1.13 5.27 2.95 7.08l.71-.71C4.02 16.74 3 14.49 3 12s1.02-4.74 2.65-6.37zm13.4-.71-.71.71C19.98 7.26 21 9.51 21 12s-1.02 4.74-2.65 6.37l.71.71C20.87 17.27 22 14.76 22 12s-1.13-5.27-2.95-7.08z"></path></g></svg>
                                        <span class="mx-2">Go live</span>
                                    </a>
                                </p>
                                <p>
                                    <a onclick="" title="Create post">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" focusable="false" aria-hidden="true" style="pointer-events: none; display: inherit; width: 24px; height: 24px;">
                                            <path d="M15.01,7.34l1.64,1.64L8.64,17H6.99v-1.64L15.01,7.34 M15.01,5.92l-9.02,9.02V18h3.06l9.02-9.02L15.01,5.92L15.01,5.92z M17.91,4.43l1.67,1.67l-0.67,0.67L17.24,5.1L17.91,4.43 M17.91,3.02L15.83,5.1l3.09,3.09L21,6.11L17.91,3.02L17.91,3.02z M21,10h-1 v10H4V4h10V3H3v18h18V10z"></path>
                                        </svg>
                                        <span class="mx-2">Create post</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>                    

                    <div class="dropdown">
                        <img src="./uploads/profiles/main-profile.jpg" class="user-icon" alt="" srcset="">
                        <div class="dropdown-content">
                    
                    ';
                    $nav_update .= '
                            <p>
                                '. $_SESSION['full_name'] .'<br>
                                <small>'. $_SESSION['login_email'] .'</small>
                            </p>
                    ';
                    $nav_update .= '
                            <p><a href="#"><i class="fa fa-home" style="font-size:24px" ></i> Profile</a></p>
                            <p><a href="#"><i class="fa fa-gear" style="font-size:24px" ></i> Settings</a></p>
                            <p><a onclick="logout()"><i class="fa fa-sign-out" style="font-size:24px" ></i> Logout</a></p>
                        </div>
                    </div>
                    ';

                    echo $nav_update;

                }else{
                    // SIGNED OUT !!
                    echo '
                    <div>
                        <a href="./php_actions/login.php"  style="color: #224f9c"><i class="fa fa-sign-in" style="font-size:24px" ></i> Sign in</a>
                    </div>
                    
                    ';
                }
            ?>
        </div>
    </nav>

    <!-- sidebar left -->

    <div class="sidebar">
         <div class="shortcut-links">
             <a href="#"><img src="./assets/img/home.png"><p>Home</p></a>
             <a href="#"><img src="./assets/img/explore.png"><p>explore</p></a>
             <a href="#"><img src="./assets/img/subscriprion.png"><p>subscriprion</p></a>
             <hr>
             <a href="#"><img src="./assets/img/library.png"><p>library</p></a>
             <a href="#"><img src="./assets/img/history.png"><p>History</p></a>
             <a href="#"><img src="./assets/img/playlist.png"><p>playlist</p></a>
             <a href="#"><img src="./assets/img/messages.png"><p>messages</p></a>
             <a href="#"><img src="./assets/img/show-more.png"><p>Show more</p></a>
             <hr>
        </div>
        <div class="subscribed-list">
              <h3>SUBSCRIPTIONS</h3>
              <a href="#"><img src="./assets/img/Jack.png"><p>Jack   &bull;</p></a>
              <a href="#"><img src="./assets/img/simon.png"><p>simon </p></a>
              <a href="#"><img src="./assets/img/tom.png"><p>Tom  &bull;</p></a>
              <a href="#"><img src="./assets/img/megan.png"><p>Megan Fox  &bull;</p></a>
              <a href="#"><img src="./assets/img/cameron.png"><p>Cameron Green </p></a>
        </div>
    </div>

    <!-- studio  -->
    <main>
        <div class="row bg-light ">
            
            <div class="col-md-10 offset-md-2">
                <div class="studio-container m-5">
                    <div class="studio-header">
                        <h3>YouTube Studio</h3>
                        <p>Dashboard</p>
                        
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">
                                    Videos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Shorts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Live</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Posts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Playlists</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Podcasts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Promotions</a>
                            </li>
                        </ul>

                    </div>

                    <div class="studio-content">
                        <?php
                            include_once './php_actions/db_helper.php';
                            /****** GET ALL VIDEOS *******/
                            $db = new DBHelper();
                            $query = $db->set_query(
                                'SQL_GET_ALL_VIDEOS', 
                                array(0)
                            );
                            $videos = $db->execute_query($query);
                            $db->close_connection();

                            $table = '
                            <div class="tbodyDiv">
                                <table class="table table-bordered table-striped text-center">
                                    <thead class="sticky-top bg-white">
                                        <tr>
                                            <th colspan="2"></th>
                                            <th colspan="3">Video</th>
                                            <th>Visibility</th>
                                            <th>Restriction</th>
                                            <th>Date</th>
                                            <th>Views</th>
                                            <th>Comments</th>
                                            <th>Likes vs Dislikes</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">';
                            
                            if( $videos ){
                                $video_count = 0;
                                foreach ($videos as $video) {
                                    $video_count++;
                                    $video_id = $video['video_id'];
                                    $video_title = $video['title'];
                                    $video_description = $video['description'];
                                    $video_url = $video['video_url'];
                                    $video_length = $video['duration'];
                                    $video_created_at = $video['created_at'];
                                    $video_created_by = $video['user_id_fk'];
                                    $video_thumbnail = $video['thumbnail_url'];
                                    $video_updated_at = $video['updated_at'];
                                    $video_view_count = $video['view_count'];

                                    if(!$video_thumbnail){
                                        $video_thumbnail = './assets/img/default_thumbnail.png';
                                    } else{
                                        echo 'no thumbnail';
                                    }

                                    $table .= '
                                    <tr id="'. $video_id .'" video-id="'. $video_id .'">
                                        <th scope="row">'. $video_count .'</th>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault_'. $video_count .'">
                                            </div>
                                        </th>
                                    ';
                                    $table .= '
                                        <td colspan="3">
                                            <div class="row m-1" style="font-size:16px">
                                                <div class="col-5">
                                                    <img src="'. $video_thumbnail .'" class="rounded img-fluid">
                                                </div>
                                                <div class="col-7">
                                                    <p>'. $video_title .'</p>
                                                    <div class="video-actions">
                                                        <i class="fa fa-pencil btn" title="Edit title and description"
                                                        onclick="edit_video(event)"></i>
                                                        <i  class="fa fa-youtube btn" title="Watch on YouTube"
                                                        onclick="load_video(event)"></i>
                                                        <i class="fa fa-trash btn" title="Delete video"
                                                        onclick="delete_video(event)"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Public</td>
                                        <td>None</td>
                                        <td>'. $video_created_at .'</td>
                                        <td>'. $video_view_count .'M</td>
                                        <td>15</td>
                                        <td>66.7%</td>
                                    ';

                                    $table .= '
                                    </td>';
                                }
                            }
                            else{
                                $table .= '<tr><td colspan="11"><h1 class="m-5 text-center">No videos found</h1></td></tr>';
                            }

                            $table .= '
                                    </tbody>
                                </table>    
                            </div>';

                            echo $table;

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- upload modal -->
    <div class="modal fade modal-xl" id="uploadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Video</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="./php_actions/upload.php" 
                    method="POST" class="was-validated border rounded p-4 m-2">
                        <div class="row">

                            <div class="col-md-12 text-center" id="upload-form" onclick="clickInput('userfile')">
                                <input name="userfile" type="file" placeholder="Select file"
                                class="my-5 d-none" id="userfile" />
                                <i class="fa fa-upload my-5 upload-fa text-secondary card-img-top" 
                                style="font-size: 150px"></i>
                                <br>
                                Select file
                            </div>

                            <div class="col-md-12 my-3" id="hidden-form" 
                            style="display: none;">
                                <div class="row">
                                    <!-- title -->
                                    <div class="col-md-6">
                                        <label for="video-title" class="form-label">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control is-valid" id="video-title" name="video-title" value="" required>
                                        <div class="valid-feedback">
                                            Uploaded!
                                        </div>
                                        
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success" style="width:0%"></div>
                                        </div>

                                        <div class="my-4" id="video-info"></div>
                                    </div>

                                    <!-- replay video -->
                                    <div class="col-md-6">
                                        <div class="card" style="width: 18rem;">
                                            <video  controls autoplay>
                                                <source src="" id="video-replay" type="video/mp4"
                                                class="card-img-top" alt="uploaded video">
                                            </video>
                                        </div>
                                    </div>

                                    <!-- visibility public/private/scheduled -->
                                    <div class="col-md-6">
                                        <div class="">
                                            <small>Visibility</small>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" 
                                                id="visibilityChecked" name="visibility" checked>
                                                <label class="form-check-label" for="visibilityChecked" id="visibilityCheckedLabel">Public</label>
                                            </div> 
                                        </div>

                                        <div id="schedule" style="display: none;">
                                            <input type="text" name="schedule" style="display: none;" value="none">

                                            <small>Schedule</small>
                                            <table class="table-condensed table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                    <th colspan="7">
                                                        <span class="btn-group">
                                                            <a class="btn"><i class="icon-chevron-left"></i></a>
                                                            <a class="btn active">February 2012</a>
                                                            <a class="btn"><i class="icon-chevron-right"></i></a>
                                                        </span>
                                                    </th>
                                                    </tr>
                                                    <tr>
                                                        <th>Su</th>
                                                        <th>Mo</th>
                                                        <th>Tu</th>
                                                        <th>We</th>
                                                        <th>Th</th>
                                                        <th>Fr</th>
                                                        <th>Sa</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="muted">29</td>
                                                        <td class="muted">30</td>
                                                        <td class="muted">31</td>
                                                        <td>1</td>
                                                        <td>2</td>
                                                        <td>3</td>
                                                        <td>4</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>6</td>
                                                        <td>7</td>
                                                        <td>8</td>
                                                        <td>9</td>
                                                        <td>10</td>
                                                        <td>11</td>
                                                    </tr>
                                                    <tr>
                                                        <td>12</td>
                                                        <td>13</td>
                                                        <td>14</td>
                                                        <td>15</td>
                                                        <td>16</td>
                                                        <td>17</td>
                                                        <td>18</td>
                                                    </tr>
                                                    <tr>
                                                        <td>19</td>
                                                        <td class="btn-primary"><strong>20</strong></td>
                                                        <td>21</td>
                                                        <td>22</td>
                                                        <td>23</td>
                                                        <td>24</td>
                                                        <td>25</td>
                                                    </tr>
                                                    <tr>
                                                        <td>26</td>
                                                        <td>27</td>
                                                        <td>28</td>
                                                        <td>29</td>
                                                        <td class="muted">1</td>
                                                        <td class="muted">2</td>
                                                        <td class="muted">3</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>

                                    <!-- thumbnail -->
                                    <div class="col-md-6">
                                        <div class="mb-3" onclick="clickInput('thumbnail')" id="thumbnail-upload-btn">
                                            <input type="file" class="form-control d-none" 
                                            aria-label="Upload thumbnail" name="thumbnail" id="thumbnail">
                                            <div class="card" style="width: 18rem;" >
                                                <div class="card-body">
                                                    <a href="#" ><i class="fa fa-upload"></i> Upload thumbnail</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="card" style="width: 18rem;" >
                                                <img src="" 
                                                class="card-img-top" alt="thumbnail" id="thumbnail-display" style="display: none;">
                                                <div class="card-body" id="thumbnail-change-btn" style="display: none;"
                                                onclick="clickInput('thumbnail')">
                                                    <a href="#" ><i class="fa fa-pencil"></i> Change thumbnail</a>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <!-- description -->
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="descriptionTextarea" class="form-label">Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="descriptionTextarea" 
                                            placeholder="Enter video description" name="description"></textarea>
                                            <div class="invalid-feedback">
                                                Please enter description of the video
                                            </div>
                                        </div>
                                    </div>

                                </div>                                                             

                                <button class="btn" type="submit" style="background: #224f9c; color: #eee">
                                    <i class="fa fa-upload"></i> Upload video
                                </button>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Go Live modal -->
    <div class="modal fade modal-xl" id="goLiveModal" tabindex="-1" aria-labelledby="goLiveModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="goLiveModalLabel">Go Live</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-8 offset-md-4 my-3">
                            <button class="btn text-light my-2" style="background: #224f9c;" 
                                id="startLiveButton">
                                <i class="fa fa-video-camera"></i> 
                                Go Live
                            </button>
                            <a class="btn text-light my-2" style="background: #224f9c;" 
                                id="downloadRecordingButton" hidden>
                                <i class="fa fa-download"></i>
                                Download
                            </a>

                            <button class="btn text-light my-2" style="background: #224f9c;" 
                                id="stopLiveButton" hidden>
                                <i class="fa fa-stop"></i>
                                Stop
                            </button>
                            <span class="mx-3" id="recording-span" hidden>
                                <i class="fa fa-video-camera recording"></i> 
                                <span class="loading-elipsis">Recording</span>
                            </span>
                            
                        </div>

                        <div class="col-md-10 offset-md-1 my-3 border rounded shadow-sm p-5">
                            <video id="recording-panel" width="100%" height="auto" 
                            autoplay muted controls class="img-thumbnail"></video>

                            <video id="preview-panel" width="100%" height="auto" 
                            controls class="img-thumbnail" hidden></video>

                            <small class="mt-2 text-muted">
                                <span id="recording-log">
                                    Your live stream log will appear here...
                                </span>
                            </small>
                            
                        </div>
                        
                    </div>

                </div>
                
            </div>
        </div>
    </div>


    <!-- editor modal -->
    <div class="modal fade modal-xl" id="editorModal" tabindex="-1" aria-labelledby="editorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editorModalLabel">Edit video</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6 offset-md-2">
                            <form enctype="multipart/form-data" action="./php_actions/update_video.php" 
                                method="POST" class="was-validated border rounded p-4 m-2">
                                <div class="row">
                                    <!-- title  -->
                                    <div class="col-md-6">
                                        <label for="video-title" class="form-label">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control is-valid" id="video-title" name="video-title">
                                        <div class="valid-feedback">
                                            Uploaded!
                                        </div>
                                    </div>

                                    <!-- description -->
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="video-description" class="form-label">Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="video-description" 
                                            placeholder="Enter video description" name="description"></textarea>
                                            <div class="invalid-feedback">
                                                Please enter description of the video
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-12 text-center" id="upload-form" onclick="clickInput('userfile')">
                                        <input name="userfile" type="file" placeholder="Select file"
                                        class="my-5 d-none" id="userfile" />
                                        <i class="fa fa-upload my-5 upload-fa text-secondary card-img-top" 
                                        style="font-size: 150px"></i>
                                        <br>
                                        Select file
                                    </div> -->


                                </div>
                            </form>

                            <button class="btn text-light my-2" style="background: #224f9c;" 
                                id="startLiveButton">
                                <i class="fa fa-save"></i> 
                                Save changes
                            </button>
                        </div>

                        <div class="col-md-4 border rounded shadow-sm p-5">
                            <!-- thumbnail -->
                            <div class="col-md-6">
                                <div class="mb-3" onclick="clickInput('thumbnail')" id="thumbnail-upload-btn">
                                    <input type="file" class="form-control d-none" 
                                    aria-label="Upload thumbnail" name="thumbnail" id="thumbnail">
                                    <div class="card" style="width: 18rem;" >
                                        <div class="card-body">
                                            <a href="#" ><i class="fa fa-upload"></i> Upload thumbnail</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="card" style="width: 18rem;" >
                                        <img src="" 
                                        class="card-img-top" alt="thumbnail" id="thumbnail-display" style="display: none;">
                                        <div class="card-body" id="thumbnail-change-btn" style="display: none;"
                                        onclick="clickInput('thumbnail')">
                                            <a href="#" ><i class="fa fa-pencil"></i> Change thumbnail</a>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <video id="recording-panel" width="100%" height="auto" 
                            autoplay muted controls class="img-thumbnail"></video>

                            <video id="preview-panel" width="100%" height="auto" 
                            controls class="img-thumbnail" hidden></video>

                            <small class="mt-2 text-muted">
                                <span id="recording-log">
                                    Your live stream log will appear here...
                                </span>
                            </small>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- hidden inputs -->
    <div hidden>
        <input type="text" id="login_name" value="<?php echo $_SESSION['login_name']?>">
        <input type="text" id="login_email" value="<?php echo $_SESSION['login_email']?>">
        <input type="text" id="video_title" value="">
        <input type="text" id="video_description" value="">
    </div>

    <?php include('./components/loading-modal.php'); ?>

    <div class="bg-light fixed-bottom text-muted">
        <small class="text-center">This clone website is intended for educational purposes only. Utilizing the content for the purposes other than learning webdesign is unlawful!</small>
        <a href="./index.php" class="position-absolute bottom-0 end-0">
            <img src="./assets/img/favicon.png" alt="Youtube" width="40px" title="YouTube Clone Home">
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="./assets/js/main_script.js"></script>
    <script src="./assets/js/ytst_script.js"></script>
</body>
</html>