
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
