
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
                                        <label for="videoTitle" class="form-label">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control is-valid" id="videoTitle" name="videoTitle">
                                        <div class="valid-feedback">
                                            Uploaded!
                                        </div>
                                    </div>

                                    <!-- description -->
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="videoDescription" class="form-label">Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="videoDescription" 
                                            placeholder="Enter video description" name="videoDescription"></textarea>
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
