<?php include('../php_actions/config/db_connect.php'); ?>
<?php if($_SESSION['login_type'] == 1): ?>
    <div class="alert alert-warning" role="alert">
        WARNING!!! you are on admin page.
    </div>
    
    <div class="row text-center" id="admin_dashboard">
        <div class="col-12 border-bottom my-2">
            <h5 class="text-light-blue link-underline-light clickable"
                onclick="review_applications()" id="rvusr_sbm"
            >
                Review user submissions
            </h5>
        </div>
        <div class="col-1"></div>
        <div class="col-10" id="mount_pdf_p"></div>

        <table class="table d-none" id="admin_table_th">
            <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Applicant</th>
                        <th scope="col">Submission date</th>
                        <th scope="col">Document</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
            </thead>
        </table>

        <div id="admin_table_wrapper" class="d-none">
            
            <table class="table ">
                <tbody id="admin_table"></tbody>
                <!-- <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                Demeke C Birhanu <br>
                                dmk@sample.com <br>
                                +14526-5455-44
                            </td>
                            <td>2020-11-11 09:24:40</td>
                            <td>Review PDF File</td>
                            <td>Under review</td>
                            <td>Action</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>
                                Demeke C Birhanu <br>
                                dmk@sample.com <br>
                                +14526-5455-44
                            </td>
                            <td>2020-11-11 09:24:40</td>
                            <td>Review PDF File</td>
                            <td>Under review</td>
                            <td>Action</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>
                                Demeke C Birhanu <br>
                                dmk@sample.com <br>
                                +14526-5455-44
                            </td>
                            <td>2020-11-11 09:24:40</td>
                            <td>Review PDF File</td>
                            <td>Under review</td>
                            <td>Action</td>
                        </tr>
                </tbody> -->                
                
            </table>
        </div>

        <div class="row" id="admin_summary">
            <div class="col border rounded shadow-sm m-5">
                <div class="row p-2">
                    <div class="col-4 h2 text-end">
                        <span class="info-box-icon"><i class="fa fa-users"></i></span>
                    </div>
                    <div class="col-8 h4 text-start">Total Applicants</div>
                </div>
                <div class="row">
                    <h4 class="glyphicon glyphicon-info-sign border-bottom">
                        2<?php echo $conn->query("SELECT * FROM users where type = 2")->num_rows; ?>
                    </h4>
                </div>
                <div class="row text-start">
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
                <div class="row">
                    <div class="col-8 text-end">Processed</div>
                    <div class="col-4">8</div>
                </div>
                <div class="row">
                    <div class="col-8 text-end">Approved</div>
                    <div class="col-4">4</div>
                </div>
                <div class="row">
                    <div class="col-8 text-end">Rejected</div>
                    <div class="col-4">4</div>
                </div>
                <div class="row">
                    <p>
                        <a class="text-light-blue link-underline-light clickable"
                        onclick="review_applications()"
                        title="load application table"
                        >Review Applications</a>
                    </p>
                </div>
            </div>
            <div class="col border rounded shadow-sm m-5">
                <div class="row p-2">
                    <div class="col-4 h2 text-end">
                        <span class="info-box-icon"><i class="fa fa-folder"></i></span>
                    </div>
                    <div class="col-8 h4 text-start">Total Documents</div>
                </div>
                <div class="row">
                    <h4 class="glyphicon glyphicon-info-sign border-bottom">
                        2<?php echo $conn->query("SELECT * FROM documents  where user_id = {$_SESSION['login_id']}")->num_rows; ?>
                    </h4>
                </div>

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
        
    </div>


    <?php 
                // // Parse PDF file and build necessary objects.
                // require_once('../vendor/autoload.php');
                // $parser = new \Smalot\PdfParser\Parser();
                // $pdf = $parser->parseFile('../test/test9kb.pdf');

                // // 134217728 bytes
                // // = 134,217.728 KB = 

                // $text = $pdf->getText();
                // echo $text;
            ?>

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