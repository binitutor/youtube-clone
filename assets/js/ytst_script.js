
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

        // set video info
        let video_info = `
        <pre>VIDEO FILE: ${videoFile.name}
            <small>
            Uploader: John Doe
            jdoe@gmail.com
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


