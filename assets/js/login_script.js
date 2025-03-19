// let menuIcon = document.querySelector(".menu-icon");
// let sidebar = document.querySelector(".sidebar");
// let container = document.querySelector(".container");

// menuIcon.onclick = function(){
//     sidebar.classList.toggle("small-sidebar");
//     container.classList.toggle("large-container");    
    
// }

function reload_home(){
    location.href= './index.php';
}

function load_public_videos(){
    console.log('loading public videos');

    // make a call to table: videos
    ajax_load_videos();

}

function ajax_load_videos() {
    $.ajax({
        url: 'load_videos.php',
        type: 'post',
        // data: { "callFunc1": "1"},
        success: function(response) { 
            // console.log(response);
            var vids = [];
            const totalVideos = JSON.parse(response);
            for (var key in totalVideos) {
                if (totalVideos.hasOwnProperty(key)) {
                    var val = totalVideos[key];
                    vid_card = generate_video_card(
                        val.title,
                        val.description,
                        val.vurl,
                    )
                    vids.push(vid_card);
                }
            }            
            var videos_output = document.getElementById('videos_output');
            var container = document.createElement('div');
            container.className = 'container row';
            vids.forEach(element => {
                container.appendChild(element);
            });
            videos_output.appendChild(container);
        }
    });
}

function generate_video_card(title, description, vurl){
    var video_card = document.createElement('div');
    video_card.className = 'card m-3 shadow-sm rounded';
    video_card.setAttribute('style', 'width: 18rem;');

    var video = document.createElement('video');
    video.controls = true;
    video.height = 250;
    video.className = 'card-img-top';
    video.alt = 'video';

    var source = document.createElement('source');
    source.src = vurl;
    source.type = 'video/mp4';
    video.appendChild(source);

    var download = document.createElement('a');
    download.href = vurl;
    download.innerHTML = 'Download the MP4 video.';
    video.appendChild(download);

    var card_body = document.createElement('div');
    card_body.className = 'card-body';

    var h5 = document.createElement('h5');
    h5.className = 'card-title';
    h5.innerHTML = title;

    var description_text = document.createTextNode(description);
    description_text.className = 'small';

    card_body.appendChild(h5);
    card_body.appendChild(description_text);

    video_card.appendChild(video);
    video_card.appendChild(card_body);

    return video_card;

    /*
    
    
                <div class="card" style="width: 18rem;">
                    <video controls height="250" class="card-img-top" alt="video">
                        <source src="./uploads/videos/20241125_154613.mp4" type="video/mp4" />
                        Download the <a href="./uploads/videos/20241125_154613.mp4">MP4</a> video.
                    </video>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <small class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</small>
                    </div>
                </div>
    
    */
}

function view_password(){
    var pw1 = document.getElementById('password');
    // var pw2 = document.getElementById('InputPassword2');
    pwInputType = pw1.getAttribute('type');
    if (pwInputType === 'password') {
        pw1.removeAttribute('type');
        // pw2.removeAttribute('type');
        pw1.setAttribute('type', 'text');
        // pw2.setAttribute('type', 'text');
    } else {
        pw1.removeAttribute('type');
        // pw2.removeAttribute('type');
        pw1.setAttribute('type', 'password');
        // pw2.setAttribute('type', 'password');
    }

    // const userEmailInput = document.getElementById("loginInputEmail");
    // const passwordInput = document.getElementById("loginInputPassword");
    // const toggleVisibility = document.getElementById("toggleVisibility");

    //     // profile_panel = document.getElementById('profile_panel')
    //     // panel = generic_profile()
    //     // profile_panel.innerHTML = panel.innerHTML
        

    // toggleVisibility.addEventListener("change", function() {
    //         if (toggleVisibility.checked) {
    //             passwordInput.type = "text";
    //         } else {
    //             passwordInput.type = "password";
    //         }
    // });
}

function validateLoginForm(e){
    e.preventDefault();

    const userEmailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const toggleVisibility = document.getElementById("toggleVisibility");

                                        
    // validate, make sure input valid

    // authenticate ajax call
    login(userEmailInput.value, passwordInput.value)
    // console.log('login form submitted');
}

function login(user, pass){
    // console.log('login function called');

    var xmlhttp = new XMLHttpRequest();
    var formData = new FormData();
    formData.append("user", user)
    formData.append("pass", pass)
    formData.append("action", 'login')
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            console.log(this.responseText)
            respObj = JSON.parse(this.responseText)
            console.log( respObj['msg'] );
            // container = document.getElementById('ouput')
            // container.innerHTML = this.responseText;

            // // display authentication feedback
            container = document.getElementById('msg')
            // // container.setAttribute("class", respObj['graphics'])
            container.innerHTML = respObj['msg'];


            // // modify profile menu items
            // profile_panel = document.getElementById('profile_panel')
            // panel = authed_profile(respObj['status'], respObj['name'], respObj['msg'])
            // profile_panel.innerHTML = panel.innerHTML

            // browse to user portal page
            loading_animation()
            if (respObj['status'] == 200) {

                setTimeout(function() {
                    location.href ='../index.php';
                    // location.href ='../index.php?page=dashboard';
                }, 3000);
                
            }        
        } else {
            // not authenticated
            console.log('not authenticated')
        }
    }
    var pageURL = '../php_actions/authenticate.php'
    xmlhttp.open('POST', pageURL, true);
    xmlhttp.send(formData); 
}
        
function generic_profile(){
            div = document.createElement('div')
            lbl = document.createElement('label')
            txt = document.createTextNode('Your Account')
            lbl.appendChild(txt)
            div.appendChild(lbl)

            li1 = document.createElement('li')
            hr = document.createElement('hr')
            hr.setAttribute('class', 'dropdown-divider')
            li1.appendChild(hr)
            div.appendChild(li1)

            li2 = document.createElement('li')
            li2.setAttribute('class', 'navitem-c-dropdown')
            a = document.createElement('a')
            a.setAttribute('class', 'dropdown-item navitem-c-dropdown')
            a.setAttribute('href', '#')
            txt = document.createTextNode('Login')
            a.appendChild(txt)
            li2.appendChild(a)
            div.appendChild(li2)

            return div
}

function authed_profile(status, name, msg){
            div = document.createElement('div')
            lbl = document.createElement('label')
            txt = document.createTextNode(name)
            lbl.appendChild(txt)
            div.appendChild(lbl)

            li1 = document.createElement('li')
            hr = document.createElement('hr')
            hr.setAttribute('class', 'dropdown-divider')
            li1.appendChild(hr)
            div.appendChild(li1)
            
            li2 = document.createElement('li')
            li2.setAttribute('class', 'navitem-c-dropdown')
            a = document.createElement('a')
            a.setAttribute('class', 'dropdown-item navitem-c-dropdown')
            a.setAttribute('href', '#')
            txt = document.createTextNode('Profile')
            a.appendChild(txt)
            li2.appendChild(a)
            div.appendChild(li2)
            
            li3 = document.createElement('li')
            li3.setAttribute('class', 'navitem-c-dropdown')
            a = document.createElement('a')
            a.setAttribute('class', 'dropdown-item navitem-c-dropdown')
            a.setAttribute('href', '#')
            txt = document.createTextNode('Todo')
            a.appendChild(txt)
            li3.appendChild(a)
            div.appendChild(li3)
            
            li4 = document.createElement('li')
            li4.setAttribute('class', 'navitem-c-dropdown')
            a = document.createElement('a')
            a.setAttribute('class', 'dropdown-item navitem-c-dropdown')
            a.setAttribute('href', '#')
            txt = document.createTextNode('Logout')
            a.appendChild(txt)
            li4.appendChild(a)
            div.appendChild(li4)

            return div
}

function logout(){
    var xmlhttp = new XMLHttpRequest();
    var formData = new FormData();
    formData.append("action", 'logout')
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            location.href ='./php_actions/login.php';
        }
    }
    var pageURL = './php_actions/authenticate.php'
    xmlhttp.open('POST', pageURL, true);
    xmlhttp.send(formData); 
}

// ======================== functionName()
/**
 * This function 
 */
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


// ======================== functionName()
/**
 * This function 
 */
function save_to_localStorage(lc_key, lc_value){
    // save to local storage
    lc_value  = JSON.stringify(lc_value)
    localStorage.setItem(lc_key, lc_value)
}

function load_from_localStorage(lc_key){
    // load from local storage
    lc_value = localStorage.getItem(lc_key)
    return JSON.parse(lc_value)
}   

function remove_from_localStorage(lc_key){
    // remove from local storage
    localStorage.removeItem(lc_key)
    // localStorage.clear()
}


function save_to_sessionStorage(){
    // save to session storage
    // sessionStorage.setItem('key', 'value
    // sessionStorage.getItem('key')
    // sessionStorage.removeItem('key')
    // sessionStorage.clear()
}

function load_from_sessionStorage(){
    // load from session storage
    // sessionStorage.setItem('key', 'value
    // sessionStorage.getItem('key')
    // sessionStorage.removeItem('key')
    // sessionStorage.clear()
}

function save_to_cookies(){
    // save to cookies
    // document
    // document
    // document
}

function load_from_cookies(){
    // load from cookies
    // document
    // document
    // document
}

function save_to_database(){
    // save to database
    // document
    // document
    // document
}

function load_from_database(){
    // load from database
    // document
    // document
    // document
}

function save_to_file(){
    // save to file
    // document
    // document
    // document
}

function load_from_file(){
    // load from file
    // document
    // document
    // document
}


