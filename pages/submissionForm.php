<?php session_start(); ?>

<div class="container" id="partialContent">
    <p class="lead fst-italic alert alert-warning">Please fill the form and upload your document to submit your application.</p>
     
    <button onclick="bypassfortest()" class="btn btn-danger btn-lg">
        Fill data for test
    </button><br>
    <small>
        Your username (email): ambo@ambo.com<br>
        Your token: HdBMyexoif
    </small><br>

    <div class="row">
        <form id="sbmForm" class="row g-3 needs-validation" enctype="multipart/form-data" 
            method="post" onsubmit="validateMyForm(event);">
            
            <div class="col-md-10">
                <div class="mb-3">
                    <small class="text-muted"><strong>እባክዎን ሙሉ ስምዎን ያስገቡ</strong></small>
                    <br>
                    <small>Please enter your full name</small>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Full Name:</span>
                        <!-- <input type="text" name="full_name" aria-label="Name" id="validationName" class="form-control " placeholder="Your full name..." required> -->
                        <?php 
                            if(isset($_SESSION['login_id'])){
                                echo '
                                <input type="text" name="full_name" aria-label="Name" id="validationName" class="form-control disabled" placeholder="'.$_SESSION['login_name'].'" value="'.$_SESSION['login_name'].'" disabled>
                                <br><small class="text-warning">Information captured from your profile. 
                                If this is not your account, please logout and restart the application form.</small>
                                ';
                    
                            } else {
                                echo '<input type="text" name="full_name" aria-label="Name" id="validationName" class="form-control " placeholder="Your full name..." required>';
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-10">
                <div class="mb-3">
                    <small class="text-muted"><strong>
                        እባክዎን የኢሜል አድራሻዎን ያስገቡ
                    </strong></small>
                    <br>
                    <small>Please enter your most current email address</small>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Email:</span>
                        <!-- <input type="email" name="user_email" aria-label="Email" id="validationEmail" class="form-control " placeholder="eg@example.com" required> -->
                        <?php 
                            if(isset($_SESSION['login_id'])){
                                echo '
                                <input type="email" name="user_email" aria-label="Email" id="validationEmail" class="form-control disabled" placeholder="'.$_SESSION['login_email'].'" value="'.$_SESSION['login_email'].'" disabled>
                                <br><small class="text-warning">Information captured from your profile. 
                                If this is not your account, please logout and restart the application form.</small>
                                ';
                    
                            } else {
                                echo '<input type="email" name="user_email" aria-label="Email" id="validationEmail" class="form-control " placeholder="eg@example.com" required>';
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-md-10">
                <div class="mb-3">
                    <small class="text-muted"><strong>
                        እባክዎን የስልክ ቁጥርዎን ያስገቡ
                    </strong></small>
                    <br>
                    <small>Please enter your phone number</small>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Phone number:</span>
                        <!-- <input type="text" name="p_num" aria-label="Phone number" id="validationPn" class="form-control" placeholder="000-000-0000" required> -->
                        <?php 
                            if(isset($_SESSION['login_id'])){
                                echo '
                                <input type="text" name="p_num" aria-label="Phone number" id="validationPn" class="form-control disabled" placeholder="'.$_SESSION['login_contact'].'" value="'.$_SESSION['login_contact'].'" disabled>
                                <br><small class="text-warning">Information captured from your profile. 
                                If this is not your account, please logout and restart the application form.</small>
                                ';
                    
                            } else {
                                echo '<input type="text" name="p_num" aria-label="Phone number" id="validationPn" class="form-control" placeholder="000-000-0000" required>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        
            <small class="text-muted">
                ከዚህ በታች የሰፈሩት መረጃዎች ለዳታ መሰብሰቢያ ይጠቅማሉ። ነገር ግን በአፕሊኬሽኑ ተቀባይነት ላይ የሚያስከተሉት ለውጥ የለም።
            </small>
            <br>
            <small class="text-secondary py-3">The following entries are for data collection only. It will not affect your enrollment.</small>
            <br>

            <div class="col-md-10">
                <div class="mb-3">
                    <small class="text-muted"><strong>
                        እባክዎን ጾታዎን ይምረጡ
                    </strong></small>
                    <br>
                    <small>Please choose your gender.</small>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Gender:</span>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="" >Choose your gender...</option>
                            <option value="Male" >Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="col-md-10">
                <div class="mb-3">
                    <small class="text-muted"><strong>
                        እባክዎን የዜግነትዎን ሃገር ያስገቡ
                    </strong></small>
                    <br>
                    <small>Please enter your Citizenship status</small>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Citizenship:</span>
                        <input type="text" name="citizenship" aria-label="citizenship" id="validationCitizenship" class="form-control" placeholder="example: Ethiopian/American..." required>
                    </div>
                </div>
            </div>

            <div class="col-md-10">
                <div class="mb-3">
                    <small class="text-muted"><strong>
                        እባክዎን የሚናገሩትን የትውልድ ቋንቋ ስም ያስገቡ። ተጨማሪ ቋንቋ የሚናገሩ ከሆነ ቀጥለው ይጻፉ።
                    </strong></small>
                    <br>
                    <small>Primary and secondary language</small>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Spoken Language:</span>
                        <input type="text" name="lang" aria-label="Language" id="lang" class="form-control" placeholder="example: Amharic, English, Finnish..." required>
                    </div>
                </div>

                <div class="form-check mb-3">
                    <input name="finish_lang" type="checkbox" value="yes" class="form-check-input" id="finish_lang">
                    <label class="form-check-label" for="finish_lang">
                        <small class="text-muted">ፊኒሺኛ ቋንቋ በትክክል መስማት፣ መናገር እና መጻፍ ይችላሉ?</small><br>
                        Are you fluent in Finnish language?</label>
                    <div class="invalid-feedback">Fluent in speaking, reading, writing.</div>
                    <!-- <div class="valid-feedback">Yes</div> -->
                </div>

            </div>


            <div class="col-md-10">
                <div class="mb-3">
                    <small class="text-muted"><strong>
                        እባክዎን አሁን የሚሰሩበትን የስራ ዘርፍ ያስገቡ። በተጨማሪም ስለትምህርት ደረጃዎ፣ የተመረቁበት የስራ ዘርፍ፣ የያዙን ሰርትፊኬት በዝርዝር ይግለጹ።
                    </strong></small>
                    <br>
                    <small>Place describe your current occupation, graduation level, area of study...</small>
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">Additional Info:</span>
                        <textarea name="user_comment" value="" class="form-control" id="userComment" rows="3" type="text" placeholder="Any notes and descriptions (max 5000 characters)"></textarea>
                    </div>
                </div>
            </div>


            <div class="col-md-10">
                <div class="mb-3">
                    <small class="text-muted"><strong>
                        እባክዎን ያዘጋጁትን የማመልከቻ ዶክመትን ያስገቡ።
                        ይህ ዶክመንት የተለያዩ ዶክመንቶች ስብስብ የሆነ አንድ PDF ፋይል መሆን ይገባዋል። በውስጡ የሚይዛቸው መረጃዎች:-
                    </strong></small>
                    <br>
                    <small>Please upload your document. One pdf file that has your information for 
                        <ul>
                            <li>
                                <small class="text-muted">
                                    የስራ ማመልከቻ ሲቪ 
                                </small>
                                <br>
                                Job Resume/CV document
                            </li>
                            <li>
                                <small class="text-muted">
                                    ፕሮፌሽናል የስራ ላይሰንስ
                                </small>
                                <br>
                                Professional License document</li>
                            <li>
                                <small class="text-muted">
                                    ከኮሌጅ ወይም ዩኒቨርሲቲ የምርቃት ሰርቲፊኬት
                                </small>
                                <br>
                                Degree certificate from University or college</li>
                            <li>
                                <small class="text-muted">
                                    የተማሪነት ማመልከቻ (Studnet Copy)
                                </small>
                                <br>
                                Student Copy</li>
                            <li>
                                <small class="text-muted">
                                    የስራ ልምድ ማስረጃ
                                </small>
                                <br>
                                Evidence of work experience</li>
                        </ul>
                    </small>                        
                    <br>

                    <div class="form-check pb-4">
                        <input type="file" name="doc_upload" class="form-control" id="customFileCV" lang="en" placeholder="filename.pdf" required>
                        <small class="text-muted"><strong>
                            የአፕሊኬሽን PDF ፋይል ይጫኑ
                        </strong></small>
                        <br>
                        <label class="custom-file-label" for="customFileCV">Upload your document (.pdf)</label>
                    </div>
                </div>
            </div>

            <div class="row p-5">
                <div class="form-check mb-3">
                    <input type="checkbox" name="bot_check" class="form-check-input" id="validationFormCheck1" required>
                    
                    <label class="form-check-label" for="validationFormCheck1">
                        I am not a bot!</label>
                    <div class="invalid-feedback">
                        የቦት ሴኪውሪቲ በተን ይምረጡ
                        <br>Please validate your identity by checking the box.
                    </div>
                </div>

                <small class="text-muted"><strong>
                    አፕሊኬሽኑን በሙሉ ከሞሉ በኋላ ከታች ያለውን የማስገቢያ በተን ይጫኑ
                </strong></small>
                <br>
                <small class="form-text text-muted mb-2">Once you have filled out all contents, please click on <strong>Submit</strong>.</small><br>

            </div>

            <div class="col-12">
                <small>አፕሊኬሽኑን ያስገቡ</small><br>
                <button class="btn next border-primary-subtle border rounded" type="submit">Submit Application</button>
            </div>
        </form>
    </div>
</div>
