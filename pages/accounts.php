<?php include('../php_actions/config/db_connect.php'); ?>
<?php if($_SESSION['login_type'] == 1): ?>
    <div class="alert alert-warning" role="alert">
        WARNING!!! you are on admin page.
    </div>
    
    <div class="row text-start" id="admin_dashboard">
        <div class="col-12 border-bottom my-2">
            <h5 class="text-center text-light-blue link-underline-light clickable"
                onclick="review_applications()" id="rvusr_sbm"
            >
                User Account Management
            </h5>
        </div>
        <div class="col-1"></div>
        <div class="col-10" id="mount_pdf_p"></div>

        <div id="admin_table_wrapper">
            
            <table class="table ">
                <thead>
                    <tr>
                        <th></th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <small>
                                Demeke C Birhanu <br>
                                dmk@sample.com <br>
                                +14526-5455-44 <br>
                                last modified: 2020-11-11 09:24:40
                            </small>
                        </td>
                        <td>Active</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <small>
                                Demeke C Birhanu <br>
                                dmk@sample.com <br>
                                +14526-5455-44 <br>
                                last modified: 2020-11-11 09:24:40
                            </small>
                        </td>
                        <td>Active</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            <small>
                                Demeke C Birhanu <br>
                                dmk@sample.com <br>
                                +14526-5455-44 <br>
                                last modified: 2020-11-11 09:24:40
                            </small>
                        </td>
                        <td>Active</td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            </div>
                        </td>
                    </tr>
                </tbody>             
                
            </table>
        </div>       
        
    </div>

<?php else: ?>
    <div class="alert alert-light" role="alert">
        Welcome <?php 
            if(isset($_SESSION['login_id'])){
                echo $_SESSION['login_name']; 
            }
        ?>
    </div>
    <div class="row text-center">
        <div class="col border rounded shadow-sm m-5">
            <p>Profile Information</p>
            <h4 class="glyphicon glyphicon-info-sign border-bottom">
                User name
            </h4>
            <div class="row text-start border-right">
                <div class="col-8">
                    <small>
                        contact info
                    </small>
                </div>
                <div class="col-4 text-center">
                    <h5>13</h5>
                </div>
            </div>
            <div class="row border-right">
                <p>
                    <a class="text-light-blue link-underline-light clickable"
                    onclick="review_applications()"
                    title="load application table"
                    >Review Applications</a>
                </p>
            </div>
        </div>
        <div class="col border rounded shadow-sm m-5">
            <p>Application status</p>
            <h4 class="glyphicon glyphicon-info-sign border-bottom">
                <?php echo $conn->query("SELECT * FROM documents  where user_id = {$_SESSION['login_id']}")->num_rows; ?>
            </h4>
            <div class="row text-start border-right">
                <div class="col-8">
                    <small>
                        Submitted this week<br>
                        Monday - Sunday<br>
                        3/4/2024 - 3/10/2024
                    </small>
                </div>
                <div class="col-4 text-center">
                    <h5>13</h5>
                </div>
            </div>
            <div class="row border-right">
                <p>
                    <a class="text-light-blue link-underline-light clickable"
                    onclick="review_documents()"
                    title="load submitted documents"
                    >Review Documents</a>
                </p>
            </div>
        </div>
    </div>
    <ul>
        <li>display document(s) submitted by the user</li>
        <li>display application status</li>
        <li>inform the user about next steps</li>
        <li>provide user with contact info</li>
        <li>provide user with ability to modify their profile</li>
        <li>upload profile pic, user pii</li>
    </ul>
<?php endif; ?>