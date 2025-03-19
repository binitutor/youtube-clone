<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Clone</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">YouTube Clone</h1>
                <form action="execute.php" method="GET">
                    <div class="form-group"></div>
                    <input type="text" name="search" class="form-control" placeholder="Search">
                    <button type="submit" class="btn btn-primary mt-3">Search</button>
                </form>
            </div>
        </div>

        <table class="table border-0">
            <tr>
                <td>
                    <div class="d-grid gap-1">
                        <button type="button" onclick="load_vids()" 
                            class="btn btn-sm btn-outline-secondary">Load Videos
                        </button>
                    </div>
                </td>
                <td>
                    <div class="d-grid gap-1">
                        <button type="button" onclick="load_vids()" 
                            class="btn btn-sm btn-outline-secondary">Upload Video
                        </button>
                    </div>
                </td>
                <td>
                    <div class="d-grid gap-1">
                        <button type="button" onclick="load_vids()" 
                            class="btn btn-sm btn-outline-secondary">Load Videos
                        </button>
                    </div>
                </td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>List Videos</td>
                <td colspan="4">
                    <div class="m-5 p-5 bg-body-secondary border">
                        <h2 class="text-center">Videos</h2>
                        <div id="output"></div>
                    </div>
                </td>
            </tr>
            
            <tr>
                <td>Upload Video</td>
                <td colspan="4">
                    <!-- The data encoding type, enctype, MUST be specified as below -->
                    <form enctype="multipart/form-data" action="upload_video.php" method="POST">
                        <!-- MAX_FILE_SIZE must precede the file input field -->
                        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->

                        <!-- Name of input element determines name in $_FILES array -->
                        Send this file: <input name="userfile" type="file" />
                        <input type="submit" value="Send File" />
                    </form>
                </td>
            </tr>

            <tr>
                <td>Upload Thumbnails</td>
                <td colspan="4">
                    <form action="upload_tmb.php" method="post" enctype="multipart/form-data">
                        <p>Pictures:
                        <!-- <input type="file" name="pictures[]" />
                        <input type="file" name="pictures[]" /> -->
                        <input type="file" name="pictures[]" />
                        <input type="submit" value="Send" />
                        </p>
                    </form>
                </td>
            </tr>
        </table>
        
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="main_script.js"></script>
</body>
</html>




