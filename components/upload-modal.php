
    <!-- upload modal -->
    <div class="modal fade modal-xl" id="uploadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Video</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- onsubmit="upload_video(event)" -->
                    <form enctype="multipart/form-data" action="./php_actions/upload.php"
                    method="POST" class="was-validated border rounded p-4 m-2" id="upload-video">
                        <div class="row">

                            <div class="col-md-12 text-center" id="upload-form" onclick="clickInput('userfile')">
                                <input name="userfile" type="file" placeholder="Select file"
                                class="my-5 d-none" id="userfile" accept="video/mp4" />
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
                                        <label for="videoTitle" class="form-label">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control is-valid" id="videoTitle" name="videoTitle" value="" required>
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
                                            <label for="videoDescription" class="form-label">Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="videoDescription" 
                                            placeholder="Enter video description" name="videoDescription"></textarea>
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