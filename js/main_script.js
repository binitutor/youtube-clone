
function bypassfortest(){
    document.getElementById('validationName').value = 'Biniam A.'
    document.getElementById('validationEmail').value = 'bha@example.com'
    pNum = document.getElementById('validationPn').value = '000-000-0000'
    gender = document.getElementById('gender').value = 'Male'
    citizenship = document.getElementById('validationCitizenship').value = 'American'
    lang = document.getElementById('lang').value = 'Amharic, English'
    finnishLang = document.getElementById('finish_lang').value = 'yes'
    userComment = document.getElementById('userComment').value = 'No comment'
    // customFile = document.getElementById('customFile').value = 'C:/Users/binialex/Desktop/Resume_Alemayehu.pdf'
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


// ======================== browser refresh warning
// no longer supported
// $(window).bind("beforeunload",function(event) {
//     return "You have some unsaved changes";
// });
// window.onbeforeunload = function() {
//     // // check which page it is on. if it is on apply.php, warn against refresh
//     // var path = window.location.pathname;
//     // var page = path.split("/").pop();
//     // return "Data will be lost if you leave the page, are you sure? page";
//     return '';
//   };


// ======================== 
/**
 * This function loads partial page form
 */
function load_form(){
    loading_animation_short();
    container = document.getElementById("partial_form");
    pageURL = "./submissionForm.php";
    ajax_call(pageURL, container);
}

function load_success_page(resp){
    document.getElementById('app_resp').setAttribute('style','display: none'); // hide
    // scroll up
    document.getElementById("main-container").scrollIntoView();
    // block refresh
    $(window).bind("beforeunload",function(event) {
        return "Please save this info";
    });

    loading_animation_short();
    container = document.getElementById("partialContent");
    pageURL = "./success_page.php";
    ajax_call(pageURL, container);
    
    setTimeout(function() {
        // console.log(resp)
        // load the response
        document.getElementById('sts_json').innerHTML = resp
    }, 2000);


    // xhr.upload.addEventListener("progress", ({loaded, total}) =>{
    //     let fileLoaded = Math.floor((loaded / total) * 100);
    //     let fileTotal = Math.floor(total / 1000);
        
    //     console.log("UPLOADING: ", xhr.status);

    //     // $("#sts_json").html(JSON.stringify(response));

    //     // let fileLoaded = Math.floor((loaded / total) * 100);
    //     // let fileTotal = Math.floor(total / 1000);
    //     // let fileSize;
    //     // (fileTotal < 1024) ? fileSize = fileTotal + " KB" : fileSize = (loaded / (1024*1024)).toFixed(2) + " MB";
    //     // let progressHTML = `<li class="row">
    //     //                     <i class="fas fa-file-alt"></i>
    //     //                     <div class="content">
    //     //                         <div class="details">
    //     //                         <span class="name">${name} • Uploading</span>
    //     //                         <span class="percent">${fileLoaded}%</span>
    //     //                         </div>
    //     //                         <div class="progress-bar">
    //     //                         <div class="progress" style="width: ${fileLoaded}%"></div>
    //     //                         </div>
    //     //                     </div>
    //     //                     </li>`;
    //     // uploadedArea.classList.add("onprogress");
    //     // progressArea.innerHTML = progressHTML;
    //     // if(loaded == total){
    //     // progressArea.innerHTML = "";
    //     // let uploadedHTML = `<li class="row">
    //     //                         <div class="content upload">
    //     //                         <i class="fas fa-file-alt"></i>
    //     //                         <div class="details">
    //     //                             <span class="name">${name} • Uploaded</span>
    //     //                             <span class="size">${fileSize}</span>
    //     //                         </div>
    //     //                         </div>
    //     //                         <i class="fas fa-check"></i>
    //     //                     </li>`;
    //     // uploadedArea.classList.remove("onprogress");
    //     // uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);
    //     // }

    // });
    
    // xhr.onload = () => {
    //     console.log("DONE: ", xhr.status);
    // };

}

// ======================== printPageArea()
/**
 * This function loads partial page form
 */
function printPageArea(){
    var printContent = document.getElementById("printable").innerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}

// ======================== ajax_call()
/**
 * This function loads partial page form
 */
function ajax_call(pageURL, container){
    const xhr = new XMLHttpRequest();  
    
    xhr.onload = function(){
        if(this.status === 200) {
            container.innerHTML = xhr.responseText;


            // setTimeout(function() { 
            //     // load the cards to user profile
            //     container.innerHTML = xhr.responseText;
                
            // }, 3000);
            
            // console.log(assignedSys);
            // activeCardsHandlers(assignedSys);
            // hiddenCardsHandler(); 
            // alert('test');

        } else {
            console.warn('Did not receive 200 OK - partial page SP');
            alert("Your request is not valid. Please contact the site developer.");
        }
    };

    xhr.open('get', pageURL);
    xhr.send();
}


// ======================== functionName()
/**
 * This function loads ...
 * 
 */
function validateMyForm(e){
    e.preventDefault();
    loading_animation_short()

    // perform form validation
    
    // capture form values
    data = capture_form_values()

    // make ajax req to php
    upload_file(data)
}

function capture_form_values(){
    var fullName, thisEmail, pNum, gender, citizenship, lang,
    finishLang, userComment, customFileCV, botCheck;
    fullName = document.getElementById('validationName').value;
    thisEmail = document.getElementById('validationEmail').value;
    pNum = document.getElementById('validationPn').value;
    gender = document.getElementById('gender').value;
    citizenship = document.getElementById('validationCitizenship').value;
    lang = document.getElementById('lang').value;
    finishLang = document.getElementById('finish_lang').value;
    userComment = document.getElementById('userComment').value;
    // customFileCV = document.getElementById('customFileCV').value;
    // customFileCV = document.getElementsByName("doc_upload")[0].value
    customFileCV = document.querySelector('#customFileCV').files[0];
    // formData.append('fileToUpload' , fileToUpload.files[0]);
    botCheck = document.getElementById('validationFormCheck1').value;

    data = [fullName, thisEmail, pNum, gender, citizenship, lang, finishLang, userComment, customFileCV, botCheck]
    return data
}

function upload_file(userData){
    // data = [fullName, thisEmail, pNum, gender, citizenship, lang, finishLang, userComment, customFileCV, botCheck]
    var xmlhttp = new XMLHttpRequest();
    var formData = new FormData();
    formData.append("full_name", userData[0])
    formData.append("user_email", userData[1])
    formData.append("p_num", userData[2])
    formData.append("gender", userData[3])
    formData.append("citizenship", userData[4])
    formData.append("lang", userData[5])
    formData.append("finnishLang", userData[6])
    formData.append("user_comment", userData[7])
    formData.append("doc_upload", userData[8])
    formData.append("bot_check", userData[9])
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            // load success page
            load_success_page(this.responseText)
        }
    }
    var url = 'sbmData.php';
    xmlhttp.open('POST', url, true);
    xmlhttp.send(formData); 
}

function submitForm(e){
    e.preventDefault();
    alert('here')
    // // var variable = document.getElementById('input_id').value;
    // // document.getElementById('alert').innerHTML = 'The user input is: ' + variable;

    // var fullName, thisEmail, pNum, gender, citizenship, lang, finishLang, userComment, customFileCV;
    // fullName = document.getElementById('fullName').value;
    // thisEmail = document.getElementById('thisEmail').value;
    // pNum = document.getElementById('pNum').value;
    // gender = document.getElementById('gender').value;
    // citizenship = document.getElementById('citizenship').value;
    // lang = document.getElementById('lang').value;
    
    // // finishLang = document.getElementById('finishLang').value;
    // finishLang = document.getElementById('finishLang').checked;

    // userComment = document.getElementById('userComment').value;
    // customFileCV = document.getElementById('customFileCV').value;

    // console.log('>> Full name: ' + fullName);
    // console.log('>> Email: ' + thisEmail);
    // console.log('>> Phone number: ' + pNum);
    // console.log('>> Gender: ' + gender);
    // console.log('>> Citizenship: ' + citizenship);
    // console.log('>> Language: ' + lang);
    
    // // if checked, get value
    // if(finishLang == 1){
    //     console.log('>> Finish Language? Yes');
    // }else{
    //     console.log('>> Finish Language? No');
    // }

    // console.log('>> User Comments: ' + userComment);
    // console.log('>> CV uploaded: ' + customFileCV);
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

/** ======================== AUTHENTICATION
 * Logout function
 */
function logout(page){
    loading_animation()
    if (page == "main"){
        pageURL = './php_actions/authenticate.php'
        target_page = './'
    } else {
        pageURL = '../php_actions/authenticate.php'
        target_page = '../php_actions/login.php'
    }

    var xmlhttp = new XMLHttpRequest();
    var formData = new FormData();
    formData.append("action", 'logout')
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            location.href = target_page
        }
    }    
    xmlhttp.open('POST', pageURL, true);
    xmlhttp.send(formData); 
}

function validateLoginForm(e){
    e.preventDefault();
    const userEmailInput = document.getElementById("loginInputEmail");
    const passwordInput = document.getElementById("loginInputPassword");
                                
    // validate, make sure input valid

    // authenticate ajax call
    login(userEmailInput.value, passwordInput.value)
}

function login(user, pass){
    loading_animation()
    var xmlhttp = new XMLHttpRequest();
    var formData = new FormData();
    formData.append("user", user)
    formData.append("pass", pass)
    formData.append("action", 'login')
    xmlhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            respObj = JSON.parse(this.responseText)
            
            // display authentication feedback
            container = document.getElementById('ouput')
            container.setAttribute("class", respObj['graphics'])
            container.innerHTML = respObj['msg'];
            
            // browse to user portal page
            if (respObj['status'] == 200) {
                location.href ='../pages/user_portal.php?page=dashboard';
            }
        }
    }
    var pageURL = 'authenticate.php'
    xmlhttp.open('POST', pageURL, true);
    xmlhttp.send(formData); 
}

function pw_view_toggler(){
    const userEmailInput = document.getElementById("loginInputEmail");
    const passwordInput = document.getElementById("loginInputPassword");
    const toggleVisibility = document.getElementById("toggleVisibility");        

    toggleVisibility.addEventListener("change", function() {
        if (toggleVisibility.checked) {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    });
}




/** ======================== ACCOUNT MANAGEMENT
 * profile, new users, 
 */



/** ======================== DOCUMENT MANAGEMENT
 * profile, new users, 
 */




function user_management(){
    alert('user_management')
    // var xmlhttp = new XMLHttpRequest();
    // var formData = new FormData();
    // formData.append("action", 'logout')
    // xmlhttp.onreadystatechange = function() {
    //     loading_animation_short()
    //     if(this.readyState == 4 && this.status == 200) {
    //         // location.href ='../php_actions/login.php';
    //         // load users
    //     }
    // }
    // var pageURL = '../php_actions/authenticate.php'
    // xmlhttp.open('POST', pageURL, true);
    // xmlhttp.send(formData);
}

function document_management(){
    alert('document_management')
    // var xmlhttp = new XMLHttpRequest();
    // var formData = new FormData();
    // formData.append("action", 'logout')
    // xmlhttp.onreadystatechange = function() {
    //     loading_animation_short()
    //     if(this.readyState == 4 && this.status == 200) {
    //         // location.href ='../php_actions/login.php';
    //     }
    // }
    // var pageURL = '../php_actions/authenticate.php'
    // xmlhttp.open('POST', pageURL, true);
    // xmlhttp.send(formData); 
}

function review_applications(){
    // load apps table
    // ajax call to php router
    // if partial page value is set, then send
    var xmlhttp = new XMLHttpRequest();
    var formData = new FormData();
    formData.append("action", 'load_apps_table')
    xmlhttp.onreadystatechange = function() {
        loading_animation_short()
        if(this.readyState == 4 && this.status == 200) {
            // load users
            // console.log(this.responseText)

            respObj = JSON.parse(this.responseText)
            load_table(respObj)
            // respStr = JSON.stringify(this.responseText)
            // console.log(this.responseText)  
        }
    }
    var pageURL = '../php_actions/authenticate.php'
    xmlhttp.open('POST', pageURL, true);
    xmlhttp.send(formData);
}

function review_documents(){
    // load documents
    alert('review_documents')
}

function load_table(tbl_data){ 
    set_elem_attr('admin_summary', "class", 'd-none')
    swap_elem_attr('admin_table_th', 'class', 'table table-striped table-hover')
    swap_elem_attr('admin_table_wrapper', 'class', 'admin-table-scrollable')

    table = document.getElementById('admin_table')
    counter = 0
    tbl_data.usr_dta.forEach(function(object) {
        // iterate through each user record
        
        // TODO: using user id and subm date, match doc to user
        // then link doc name to tbl row

        usrId = object.id               // 2
        sbmDate = object.date_created   // 2020-11-11 15:39:50
        doc_links = []
        old_doc_links = []
        // iterate through each doc record
        tbl_data.docs.forEach(function(docObj) {
            doc_usrId = docObj.user_id
            doc_sbmDate = docObj.date_created
            doc_file_path = docObj.file_json.replaceAll('"','').replaceAll('[','').replaceAll(']','').split(',')
            
            // filter file by id
            if(usrId == doc_usrId){
                // filter file by submission date
                if(sbmDate == doc_sbmDate){
                    s = ''
                    for(i = 0; i < doc_file_path.length; i++){
                        s += doc_file_path[i] + '#'
                    }
                    doc_links.push(s)
                    // doc_links += doc_file_path
                } else {
                    // print files submitted by user on different date
                    old_doc_links.push(doc_file_path)
                }
            }
        })
        
        // load table content
        // TODO: printout submissions from recent to olderst
        counter ++
        var tr = document.createElement('tr');
        tr.innerHTML = 
            '<td>' + counter + '</td>' +
            '<td><h6>' + 
                object.firstname + ' ' +
                object.middlename + ' ' +
                object.lastname + 
                '</h6><small class="text-blackish-grey fw-lighter">' +
                object.email + '<br>' +
                object.contact + '</small>' +
            '</td>' +
            '<td>' + object.date_created + '</td>' +
            '<td> <a class="text-light-blue link-underline-light clickable"' + 
                'onclick="preview_pdf(\'' + doc_links + '\')"' + 
                'title="load document">Review PDF File </a>' + 
            '</td>' +
            '<td>Under review</td>' + 
            '<td class="text-center"> ' +
                '<button class="btn btn-sm next" data-bs-toggle="dropdown" aria-expanded="false">Action</button>' +
                '<ul class="dropdown-menu navitem-c">' +
                '<li><a class="dropdown-item navitem-c-dropdown-preview" href="#">View</a></li>' +
                // '<li><hr class="dropdown-divider"></li>' +
                '<li><a class="dropdown-item navitem-c-dropdown-approve" href="#">Approve</a></li>' +
                // '<li><hr class="dropdown-divider"></li>' +
                '<li><a class="dropdown-item navitem-c-dropdown-reject" href="#">Reject</a></li>' +
            '</td>'
            
        table.appendChild(tr);
    });
}

function load_table_old(tbl_data){ 
    set_elem_attr('admin_summary', "class", 'd-none')
    swap_elem_attr('admin_table_th', 'class', 'table table-striped table-hover')
    swap_elem_attr('admin_table_wrapper', 'class', 'admin-table-scrollable')

    
    // hide_elem()
    // reveal_elem()
    // set_elem_attr()
    // remove_elem_attr()
    // swap_elem_attr()

    // hide summary
    // sum = document.getElementById('admin_summary')
    // sum.setAttribute("class", 'd-none')

    // display table 
    // tbl_th = document.getElementById('admin_table_th')
    // tbl_th.removeAttribute('class')
    // tbl_th.setAttribute("class", 'table table-striped table-hover')

    // tbl_wrp = document.getElementById('admin_table_wrapper')
    // tbl_wrp.removeAttribute('class')
    // tbl_wrp.setAttribute("class", 'admin-table-scrollable')

    table = document.getElementById('admin_table')
    counter = 0
    tbl_data.usr_dta.forEach(function(object) {
        // iterate through each user record
        
        // TODO: using user id and subm date, match doc to user
        // then link doc name to tbl row

        usrId = object.id               // 2
        sbmDate = object.date_created   // 2020-11-11 15:39:50
        doc_links = []
        old_doc_links = []
        // iterate through each doc record
        tbl_data.docs.forEach(function(docObj) {
            doc_usrId = docObj.user_id
            doc_sbmDate = docObj.date_created
            doc_file_path = docObj.file_json.replaceAll('"','').replaceAll('[','').replaceAll(']','').split(',')
            
            // console.log(
            //     "USER ID: " + usrId + 
            //     "\nsbmDate: " + sbmDate +
            //     "\ndoc_usrId: " + doc_usrId +
            //     "\ndoc_sbmDate: " + doc_sbmDate + 
            //     "\ndoc_file_path: " + doc_file_path
            // )

            // filter file by id
            if(usrId == doc_usrId){
                // console.log(
                //     "USER ID: " + usrId + 
                //     "\nsbmDate: " + sbmDate +
                //     "\ndoc_usrId: " + doc_usrId +
                //     "\ndoc_sbmDate: " + doc_sbmDate + 
                //     "\ndoc_file_path: " + doc_file_path
                // )

                // filter file by submission date
                if(sbmDate == doc_sbmDate){
                    // console.log(
                    //     "\n\nCurrent submissions --> " + 
                    //     "USER ID: " + usrId + 
                    //     "\nsbmDate: " + sbmDate +
                    //     "\ndoc_usrId: " + doc_usrId +
                    //     "\ndoc_sbmDate: " + doc_sbmDate + 
                    //     "\ndoc_file_path: " + doc_file_path
                    // )


                    s = ''
                    for(i = 0; i < doc_file_path.length; i++){
                        s += doc_file_path[i] + '#'
                    }
                    doc_links.push(s)
                    // doc_links += doc_file_path
                } else {
                    // print files submitted by user on different date
                    old_doc_links.push(doc_file_path)
                    // console.log(
                    //     "\n\nOlder submissions --> " + 
                    //     "USER ID: " + usrId + 
                    //     "\nsbmDate: " + sbmDate +
                    //     "\ndoc_usrId: " + doc_usrId +
                    //     "\ndoc_sbmDate: " + doc_sbmDate + 
                    //     "\ndoc_file_path: " + doc_file_path
                    // )
                }
            }

        })
        // console.log("\n====== END OF USER (" + usrId + ")DATA =======> \n\n")
        
        // load table content
        // TODO: printout submissions from recent to olderst
        counter ++
        var tr = document.createElement('tr');
        tr.innerHTML = 
            '<td>' + counter + '</td>' +
            '<td><h6>' + 
                object.firstname + ' ' +
                object.middlename + ' ' +
                object.lastname + 
                '</h6><small class="text-blackish-grey fw-lighter">' +
                object.email + '<br>' +
                object.contact + '</small>' +
            '</td>' +
            '<td>' + object.date_created + '</td>' +
            '<td> <a class="text-light-blue link-underline-light clickable"' + 
                'onclick="preview_pdf(\'' + doc_links + '\')"' + 
                'title="load document">Review PDF File </a>' + 
            '</td>' +
            '<td>Under review</td>' + 
            '<td class="text-center"> ' +
                '<button class="btn btn-sm next" data-bs-toggle="dropdown" aria-expanded="false">Action</button>' +
                '<ul class="dropdown-menu navitem-c">' +
                '<li><a class="dropdown-item navitem-c-dropdown-preview" href="#">View</a></li>' +
                // '<li><hr class="dropdown-divider"></li>' +
                '<li><a class="dropdown-item navitem-c-dropdown-approve" href="#">Approve</a></li>' +
                // '<li><hr class="dropdown-divider"></li>' +
                '<li><a class="dropdown-item navitem-c-dropdown-reject" href="#">Reject</a></li>' +
            '</td>'
                    
                    
                    //   <a class="dropdown-item view_user" href="javascript:void(0)" data-id="<?php //echo $row['id'] ?>">View</a>
                    //   <div class="dropdown-divider"></div>
                    //   <a class="dropdown-item" href="./index.php?page=edit_user&id=<?php //echo $row['id'] ?>">Edit</a>
                    //   <div class="dropdown-divider"></div>
                    //   <a class="dropdown-item delete_user" href="javascript:void(0)" data-id="<?php //echo $row['id'] ?>">Delete</a>
                    
            
        table.appendChild(tr);
    });
}

function preview_pdf(doc_links){
    filesArr = doc_links.split('#') 
    filesArr.pop()
    // console.log(filesArr)

    loading_animation_short()
    // list user info on the left

    // hide table
    tbl_th = document.getElementById('admin_table_th')
    tbl_th.setAttribute("class", 'd-none')
    

    // load pdf
    p_div = document.getElementById('mount_pdf_p')
    p_div.removeAttribute('class')
    p_div.setAttribute('class','col-10 border dashboard-custom-scrollbar')
    
    const fruits = ["apple", "orange", "cherry"];
    filesArr.forEach(generateLink);

    function generateLink(file, index){
        document.getElementById('rvusr_sbm').innerHTML = ''
        
        filename = document.createElement('h5')
        filename.setAttribute('class', 'text-light-blue link-underline-light mt-4')
        text = document.createTextNode(file);
        filename.appendChild(text)
        p_div.appendChild(filename)

        embed = document.createElement('embed')
        embed.setAttribute('src','../test/'+ file)
        embed.setAttribute('width','100%')
        embed.setAttribute('height','100%')
        embed.setAttribute('class','my-2')
        p_div.appendChild(embed)
    }

}


// *********** 

function hide_elem(id){
    item = document.getElementById(id)
    item.setAttribute('class', 'd-none')
}

function reveal_elem(id){
    // item = document.getElementById(id)
    // item.setAttribute('class', 'd-none')
}

function set_elem_attr(id, attr, val){
    item = document.getElementById(id)
    item.setAttribute(attr, val)
}

function remove_elem_attr(id, attr){
    item = document.getElementById(id)
    item.removeAttribute(attr)
}

function swap_elem_attr(id, attr, val){
    item = document.getElementById(id)
    item.removeAttribute(attr)
    item.setAttribute(attr, val)
}

// for apply.php, checks status for the 5 requirements
function form_load_checker(){
    // check to see all 5 requirements are met
    // if yes, load form
    htmlCollection = document.getElementsByClassName('form-load-checker')
    btn = document.getElementById('start_submission')
    info = document.getElementById('start_submission_info')
    all_checked = true

    user_inputs = Array.prototype.slice.call( htmlCollection )
    user_inputs.forEach(function(checkbox, index) {
        if ( !checkbox.checked ){
            all_checked = false
            // console.log(index + 1)
        }
    })

    if (all_checked){
        btn.removeAttribute('class')
        btn.setAttribute('class', 'btn btn-lg next')

        msg = document.createElement('small')
        msg.setAttribute('class', 'text-success')
        txt = document.createTextNode('Ready!')
        msg.appendChild(txt)
        info.innerHTML = ''
        info.appendChild(msg)
    } else {
        btn.removeAttribute('class')
        btn.setAttribute('class', 'btn btn-lg next disabled')

        msg = document.createElement('small')
        msg.setAttribute('class', 'text-danger')
        txt = document.createTextNode('* To proceed, you must agree with the statements above.')
        msg.appendChild(txt)
        info.innerHTML = ''
        info.appendChild(msg)
    }
}


