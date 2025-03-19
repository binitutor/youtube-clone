
const fileInput = document.getElementById('userfile');
const fileThumbnail = document.getElementById('thumbnail');
const visibilityChecked = document.getElementById('visibilityChecked');


fileInput.addEventListener('change', (event) => {
    const videoFile = event.target.files[0];
    if (videoFile) {
        // reveal the hidden form
        // hiddenForm.style.display = 'block';
        document.getElementById('hidden-form').style.display = 'block';
        // document.getElementById('upload-form').setAttribute('style', 'display: none');
        document.getElementById('upload-form').style.display = 'none';

        // animate progress bar
        animateProgressBar();

        // set video url
        const videoUrl = URL.createObjectURL(videoFile);
        document.getElementById('video-replay').src = videoUrl;
        // const videoUrl = './uploads/videos/' + file.name;

        // set the file name
        // document.getElementById('video-title').innerText = videoFile.name;
        // videoFile_noExt = videoFile.name.split('.').slice(0, -1).join('.');
        videoFile_noExt = videoFile.name.split('.')[0];
        document.getElementById('video-title').value = videoFile_noExt;

        // // set video duration
        // const videoDuration = videoFile.duration;

        // get user info
        let login_name = document.getElementById('login_name').value;
        let user_email = document.getElementById('login_email').value;

        // set video info
        let video_info = `
        <pre>VIDEO FILE: ${videoFile.name}
            <small>
            Uploader: ${login_name}
            ${user_email}
            Duration: 24 seconds
            File Size: ${videoFile.size}
            File Type: ${videoFile.type}
            File lastModified: ${videoFile.lastModified}
            File lastModifiedDate: ${videoFile.lastModifiedDate}
            File rel Path: ${videoFile.webkitRelativePath}
            File URL: ${videoUrl}
            </small>
        </pre>`;

        document.getElementById('video-info').innerHTML = video_info
    }
});

fileThumbnail.addEventListener('change', (event) => {
    const thumbnail = event.target.files[0];
    // console.log(event);
    // console.log(event.target); // input field
    // console.log(event.target.files); // FileList object, FileList {0: File, length: 1}
    // console.log(thumbnail); // the file
    if (thumbnail) {
        // console.log("File Name:", thumbnail.name);
        // console.log("File Size:", thumbnail.size);
        // console.log("File Type:", thumbnail.type);

        let thumbnailUrl = URL.createObjectURL(thumbnail);

        let output = `OUTPUT =========>>>>>
        File Name: ${thumbnail.name}
        File Size: ${thumbnail.size}
        File Type: ${thumbnail.type}
        File lastModified: ${thumbnail.lastModified}
        File lastModifiedDate: ${thumbnail.lastModifiedDate}
        File rel Path: ${thumbnail.webkitRelativePath}
        File URL: ${thumbnailUrl}
        `;
        console.log(output);

        // hide the thumbnail input
        document.getElementById('thumbnail').style.display = 'none';
        
        // show the thumbnail
        document.getElementById('thumbnail-display').src = thumbnailUrl;
        document.getElementById('thumbnail-display').style.display = 'block';
        document.getElementById('thumbnail-change-btn').style.display = 'block';

        document.getElementById('thumbnail-upload-btn').style.display = 'none';
    }
    else {
        console.log("No thumbnail selected");
    }

    // for (const pfile of picfiles) {
    //     console.log(pfile.name);
    //     // set video thumbnail
    //     const videoThumbnail = './uploads/thumbnails/' + pfile.name;
    //     console.log(videoThumbnail);

    //     // hide the thumbnail input
    //     document.getElementById('thumbnail').style.display = 'none';
    //     // show the thumbnail
    //     document.getElementById('thumbnail-display').src = videoThumbnail;
    //     document.getElementById('thumbnail-display').style.display = 'block';
    //     document.getElementById('thumbnail-change-btn').style.display = 'block';

    //     document.getElementById('thumbnail-upload-btn').style.display = 'none';

    //     // // reveal the hidden form
    //     // // hiddenForm.style.display = 'block';
    //     // document.getElementById('hidden-form').style.display = 'block';
    //     // // document.getElementById('upload-form').setAttribute('style', 'display: none');
    //     // document.getElementById('upload-form').style.display = 'none';


    //     // // set video info
    //     // video_info = `<small>`;
    //     // video_info += `Uploader: John Doe <br>jdoe@gmail.com <br>URL: ${videoUrl} <br>Duration: 24 seconds`;
    //     // video_info += `</small>`;

    //     // document.getElementById('video-info').innerHTML = video_info


    // }
});

visibilityChecked.addEventListener('change', (event) => {
    const visibility = event.target.checked;
    console.log(visibility);
    if (visibility) {
        // document.getElementById('visibility').value = 'public';
        document.getElementById('visibilityCheckedLabel').innerText = 'Public';
        document.getElementById('schedule').style.display = 'none';
    }
    else {
        // document.getElementById('visibility').value = 'private';
        document.getElementById('visibilityCheckedLabel').innerText = 'Private';
        document.getElementById('schedule').style.display = 'block';
    }

});

function clickInput(inputId) {
    document.getElementById(inputId).click();
}


// function go_live() {
//     const mediaStream = navigator.mediaDevices.getUserMedia({ video: true });
//     const videoElement = document.getElementById('video-live');
//     // videoFile.srcObject = mediaStream;
//     videoElement.play();
// }


let startLiveButton = document.getElementById("startLiveButton");
let stopLiveButton = document.getElementById("stopLiveButton");
let downloadRecordingButton = document.getElementById("downloadRecordingButton");
let recording_span = document.getElementById("recording-span");

let recording_panel = document.getElementById("recording-panel");
let preview_panel = document.getElementById("preview-panel");
let recording_log = document.getElementById("recording-log");
let recordingTimeLimit = 15000; // 15 seconds


startLiveButton.addEventListener("click",() => {
    // reveal stop button
    stopLiveButton.removeAttribute('hidden');
    // hide start button
    startLiveButton.style.display = 'none';
    // reveal recording span
    recording_span.removeAttribute('hidden');

    // start recording
    start_recording();

},false,);

stopLiveButton.addEventListener("click",() => {
    // reveal start button
    startLiveButton.removeAttribute('style');
    startLiveButton.setAttribute('style', 'background: #224f9c;');
    // reveal download button
    downloadRecordingButton.removeAttribute('hidden');
    // hide stop button
    stopLiveButton.style.display = 'none';
    // hide recording span
    recording_span.style.display = 'none';

    // hide recording panel
    recording_panel.style.display = 'none';
    // reveal preview panel
    preview_panel.removeAttribute('hidden');

    // stop recording
    stop(recording_panel.srcObject);
    loading_animation();

},false,);

function start_recording() {
    navigator.mediaDevices
        .getUserMedia({
            video: true,
            audio: true,
        })
        .then((stream) => {
            recording_panel.srcObject = stream;
            downloadRecordingButton.href = stream;
            recording_panel.captureStream =
            recording_panel.captureStream || recording_panel.mozCaptureStream;
            return new Promise((resolve) => (recording_panel.onplaying = resolve));
        })
        .then(() => startLiveRecording(recording_panel.captureStream(), recordingTimeLimit))
        .then((recordedChunks) => {
            let recordedBlob = new Blob(recordedChunks, { type: "video/webm" });
            preview_panel.src = URL.createObjectURL(recordedBlob);
            downloadRecordingButton.href = preview_panel.src;
            downloadRecordingButton.download = "RecordedVideo.webm";
    
            streamLog(
                `Successfully recorded ${recordedBlob.size} bytes of ${recordedBlob.type} media.`,
            );
        })
        .catch((error) => {
            if (error.name === "NotFoundError") {
                streamLog("Camera or microphone not found. Can't record.");
            } else {
                streamLog(error);
            }
        });

}

function startLiveRecording(stream, lengthInMS) {
    let recorder = new MediaRecorder(stream);
    let data = [];
  
    recorder.ondataavailable = (event) => data.push(event.data);
    recorder.start();
    streamLog(`${recorder.state} for ${lengthInMS / 1000} seconds…`);
  
    let stopped = new Promise((resolve, reject) => {
      recorder.onstop = resolve;
      recorder.onerror = (event) => reject(event.name);
    });
  
    let recorded = delay_wait(lengthInMS).then(() => {
      if (recorder.state === "recording") {
        recorder.stop();
      }
    });
  
    return Promise.all([stopped, recorded]).then(() => data);
}

function streamLog(msg) {
    recording_log.innerText += `${msg}\n`;
}


function delay_wait(delayInMS) {
    // after stopped, it continues to record for the exact length
    // if the length is 15 seconds, it will record for additional 15 seconds
    return new Promise((resolve) => setTimeout(resolve, delayInMS));
}

// function stopLiveRecording(stream) {
//     stream.getTracks().forEach((track) => track.stop());
// }
function loading_animation(){
    // open modal for 3 seconds
    if($('#loadingModal').is(':hidden')){
        $('#loadingModal').modal('toggle');
    }

    // dismiss modal after 3 seconds
    setTimeout(function() {$('#loadingModal').modal('hide');}, 3000);
}

function loading_animation_short(){
    // open modal for 1 second
    if($('#loadingModal').is(':hidden')){
        $('#loadingModal').modal('toggle');
    }

    // dismiss modal after 1 second
    setTimeout(function() {$('#loadingModal').modal('hide');}, 1000);
}

// animate progress bar
function animateProgressBar(){
    const progressBar = document.querySelector('.progress-bar');
    let width = 0;

    function animateProgressBar() {
    if (width >= 100) {
        clearInterval(intervalId);
    } else {
        width++;
        progressBar.style.width = width + '%';
        progressBar.setAttribute('aria-valuenow', width);
    }
    }

    const intervalId = setInterval(animateProgressBar, 10); // Adjust the interval for animation speed
}

// Simulating Key Combinations (e.g., Ctrl+S):
function simulateCombination(keys) {
    keys.forEach(key => {
      const event = new KeyboardEvent('keydown', { 
        key: key, 
        ctrlKey: key === 'Control', 
        shiftKey: key === 'Shift',
        altKey: key === 'Alt', 
        metaKey: key === 'Meta' 
      });
      document.dispatchEvent(event);
    });
}
  
// Example: Simulate pressing Ctrl+S
// simulateCombination(['Control', 's']); 

// Simulate pressing Ctrl+Shift+Delete
// simulateCombination(['Control', 'Shift', 'Delete']); 


function delete_video(event){
    var tr = event.target.parentElement.parentElement.parentElement.parentElement.parentElement;
    var video_id = tr.getAttribute('video-id');
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this video file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            // console.log(video_id); 
            // delete video file

            // ajax call to php script
            $.ajax({
                url: './php_actions/delete_video.php',
                type: 'POST',
                data: {video_id: video_id},
                success: function(response){
                    console.log(response);
                    location.reload();
                }
            });

            swal("Success! Your video file has been deleted!", {
                icon: "success",
            });
        } else {
            swal("Action cancelled!");
        }
      });
}

function load_video(event){
    var tr = event.target.parentElement.parentElement.parentElement.parentElement.parentElement;
    var video_id = tr.getAttribute('video-id');
}

function edit_video(event) {
    var tr = event.target.parentElement.parentElement.parentElement.parentElement.parentElement;
    var video_id = tr.getAttribute('video-id');
    const editorModal = new bootstrap.Modal(document.getElementById('editorModal'));
    editorModal.show(); // Show the modal
    // editorModal.hide(); // Hide the modal
    // editorModal.toggle(); // Toggle the modal

    // fill the modal with video info

    // get video info from db
    $.ajax({
        url: './php_actions/get_video.php',
        type: 'POST',
        data: {video_id: video_id},
        success: function(response){
            var video_info = response.split(',');
            var video_id = video_info[0];
            var video_title = video_info[1];
            var video_description = video_info[2];
            var video_url = video_info[3];
            var video_duration = video_info[4];
            var video_created_at = video_info[5];
            var user_id_fk = video_info[6];
            var thumbnail_url = video_info[7];
            var updated_at = video_info[8];
            var view_count = video_info[9];

            // fill the modal with video info
            document.getElementById('video-title').value = video_title;
            document.getElementById('video-description').value = video_description;

            console.log(video_info);
            // location.reload();
            /*
                Array
                (
                    [video_id] => 1014
                    [title] => video9
                    [description] => bbb
                    [video_url] => ./uploads//videos/video9_1732950418.mp4
                    [duration] => 240
                    [created_at] => 2024-11-30
                    [user_id_fk] => 10024
                    [thumbnail_url] => ./uploads//thumbnails/test-thumbnail_1732950418.png
                    [updated_at] => 2024-11-30
                    [view_count] => 0
                )
            */
        }
    });

    // var video_title = tr.querySelector('.video-title').innerText;
    // var video_description = tr.querySelector('.video-description').innerText;


    // // searchBy = '#' + video_id + ' > td' // #myDiv > td
    // // const td_cells = document.querySelectorAll( searchBy ); 

    // // searchBy = '#' + video_id + ' > td' // #myDiv > td
    // var row = document.getElementById( video_id ); 
    // const td_cells = row.querySelectorAll( 'td' ); 
    // // console.log(td_cells)

    // // const paragraphs = document.querySelectorAll("#myDiv > td"); 
    // td_cells.forEach(td => {
    //     td.setAttribute('contenteditable', 'true');
    // }); 

    // // convertPToInput(element)

    // // contenteditable

}

function convertPToInput(element) {
    // Create an input element
    var input = document.createElement("input");
    input.type = "text";
    input.value = element.textContent;
  
    // Replace the <p> with the input
    element.parentNode.replaceChild(input, element);
  
    // Focus on the new input
    input.focus();
}