<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../pages/components/header.php'; ?>
    <title>THP >> Login</title>
    <?php 
        session_start();
        include('./db_connect.php');
        if(isset($_SESSION['login_id'])){ // authenticated
            // header("location:user_portal.php?page=dashboard");
            // echo 'login id: '.$_SESSION['login_id'].'<br> login type: '.$_SESSION['login_type'].'<br> Successfully logged in';
        }
    ?>
</head>
<body>
    <?php 
        include '../pages/components/navbar.php'; 
        // include '../pages/components/navbar_menu.php'; 
    ?>
    <!-- profile menu goes here ... -->
            <!-- <div class="col">
                <li class="list-group-item navitem-c dropdown list-group-item">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Your account
                    </a>
                    <ul class="dropdown-menu navitem-c" id="profile_panel">
                        <?php
                            // if(isset($_SESSION['full_name'])){
                            //     echo '<label>'.$_SESSION['full_name'].'</label>
                            //         <li><hr class="dropdown-divider"></li>
                            //         <li class="navitem-c-dropdown">
                            //             <a class="dropdown-item navitem-c-dropdown" href="#">Profile</a>
                            //         </li>
                            //         <li class="navitem-c-dropdown">
                            //             <a class="dropdown-item navitem-c-dropdown" href="#">Todo</a>
                            //         </li>
                            //         <li class="navitem-c-dropdown">
                            //             <a class="dropdown-item navitem-c-dropdown" href="#" onclick=logoug()>Logout</a>
                            //         </li>
                            //     ';
                            // } else {
                            //     echo '
                            //     <label>Your Account</label>
                            //     <li><hr class="dropdown-divider"></li>
                            //     <li class="navitem-c-dropdown">
                            //         <a class="dropdown-item navitem-c-dropdown" href="#">Login</a>
                            //     </li>';
                            // }
                        ?>

                    </ul>
                </li>
            </div>
        </div>
    </header> -->

    <!-- profile menu ends / -->


    <main>
        <div class="container" id="main-container">
            <div class="row">
                <div class="col-2"></div>

                <!-- Next steps  -->
                <div class="col-10 text-center">
                    
                    <div class="spacer-1"></div>

                    <div class="row text-start">
                        <div class="col-10">
                            <div class="row text-bg-light border border-rounded shadow-sm m-5 px-2 py-1">
                                <small class="text-muted fw-lighter text-center">
                                    <strong>
                                        ያስገቡት አፕሊኬሽን ያለበትን ደረጃ ለመመልከት ከታች ያለውን ፎርም ይሙሉ!
                                    </strong>
                                </small>
                                
                                <p class="lead text-center border-bottom border-secondary-subtle">
                                    <code class="small">Login to view the status of your application!</code>
                                </p>

                                <div class="row py-2">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <form id="login_form" enctype="multipart/form-data" 
                                            method="post" onsubmit="validateLoginForm(event);">
                                            <div class="mb-2">
                                                <label for="loginInputEmail" class="form-label">የኢሜል አድራሻዎን ያስገቡ</label>
                                                <div id="emailHelp" class="form-text">Email address</div>
                                                <input type="email" class="form-control" id="loginInputEmail" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-2">
                                                <label for="loginInputPassword" class="form-label">አፕሊኬሽን ሲያስገቡ የተቀበሉትን የሚስጥር ኮድ ያስገቡ</label>
                                                <div id="emailHelp" class="form-text">Confirmation code</div>
                                                <input type="password" class="form-control" id="loginInputPassword">
                                                <span>
                                                    <input type="checkbox" id="toggleVisibility">
                                                    <i class="fa fa-eye-slash"></i>
                                                </span>
                                            </div>
                                            <button type="submit" class="btn btn-lg next">ያስገቡ | Login</button>
                                        </form>
                                        <h4 id="ouput"></h4>
                                        <?php 
                                            // if(isset($_SESSION['login_id'])){ // authenticated
                                            //     echo 'user: '.$_SESSION['full_name'].'<br>login id: '.$_SESSION['login_id'].'<br> login type: '.$_SESSION['login_type'].'';
                                            // } else {
                                            //     echo 'not set';
                                            // }
                                        ?>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>

    </main>
    <?php include '../pages/components/loadingModal.php';?>
    <?php include '../pages/components/footer.php'; ?>


    <script>
        const userEmailInput = document.getElementById("loginInputEmail");
        const passwordInput = document.getElementById("loginInputPassword");
        const toggleVisibility = document.getElementById("toggleVisibility");

        // profile_panel = document.getElementById('profile_panel')
        // panel = generic_profile()
        // profile_panel.innerHTML = panel.innerHTML
        

        toggleVisibility.addEventListener("change", function() {
            if (toggleVisibility.checked) {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        });

        function validateLoginForm(e){
            e.preventDefault();
                                        
            // validate, make sure input valid

            // authenticate ajax call
            login(userEmailInput.value, passwordInput.value)
        }

        function login(user, pass){
                                        var xmlhttp = new XMLHttpRequest();
                                        var formData = new FormData();
                                        formData.append("user", user)
                                        formData.append("pass", pass)
                                        formData.append("action", 'login')
                                        xmlhttp.onreadystatechange = function() {
                                            if(this.readyState == 4 && this.status == 200) {
                                                // container = document.getElementById('ouput')
                                                // container.innerHTML = this.responseText;

                                                respObj = JSON.parse(this.responseText)

                                                // display authentication feedback
                                                container = document.getElementById('ouput')
                                                container.setAttribute("class", respObj['graphics'])
                                                container.innerHTML = respObj['msg'];

                                                // // modify profile menu items
                                                // profile_panel = document.getElementById('profile_panel')
                                                // panel = authed_profile(respObj['status'], respObj['name'], respObj['msg'])
                                                // profile_panel.innerHTML = panel.innerHTML

                                                // browse to user portal page
                                                loading_animation()
                                                if (respObj['status'] == 200) {
                                                    location.href ='../pages/user_portal.php?page=dashboard';
                                                }
                                                
                                            } 
                                            // else {
                                            //     // not authenticated
                                            //     console.log('not authenticated')
                                            // }
                                        }
                                        var pageURL = 'authenticate.php'
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
                    location.href ='../php_actions/login.php';
                }
            }
            var pageURL = '../php_actions/authenticate.php'
            xmlhttp.open('POST', pageURL, true);
            xmlhttp.send(formData); 
        }
    </script>
</body>
</html>


