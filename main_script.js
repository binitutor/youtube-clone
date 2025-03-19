
function load_videos() {
    $.ajax({
        url:"load_videos.php",    //the page containing php script
        type: "post",    //request type,
        dataType: 'json',
        // data: {registration: "success", name: "xyz", email: "abc@gmail.com"},
        success:function(result){
            console.log(result);
        }
    });
}

function load_vids(){
    $.ajax({
        url: 'load_videos.php',
        type: 'post',
        // data: { "callFunc1": "1"},
        success: function(response) { 
            var vids = [];
            const totalVideos = JSON.parse(response);
            for (var key in totalVideos) {
                if (totalVideos.hasOwnProperty(key)) {
                    var val = totalVideos[key];
                    vid_card = create_vid_card(
                        val.title,
                        val.description,
                        val.vurl,
                    )
                    vids.push(vid_card);
                }
            }            
            var output = document.getElementById('output');
            var container = document.createElement('div');
            container.className = 'container row';
            vids.forEach(element => {
                container.appendChild(element);
            });
            output.appendChild(container);
        }
    });
}


function create_vid_card(title, description, vurl){
    var url = document.createElement('a');
    url.href = vurl;
    url.target = '_blank';
    url.className = 'text-decoration-none text-dark col-md-6 ';

    var video = document.createElement('div');
    video.className = 'video bg-light p-2 m-3 shadow-sm rounded';

    var h1 = document.createElement('h6');
    // h1.className = 'display-5';
    h1.innerHTML = title;

    var description_text = document.createTextNode(description);
    description_text.className = 'small';

    video.appendChild(h1);
    video.appendChild(description_text);
    url.appendChild(video);

    return url;
}