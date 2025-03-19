<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './components/header.php'; ?>
</head>
<body onload="form_load_checker()">
    <?php include './components/navbar.php'; ?>

    <main>
        <div class="spacer-2"></div>

        <div class="container" id="main-container">
            <div class="row">
                <div class="col-2"></div>

                <!-- Next steps  -->
                <div class="col-10 text-center">
                    
                    <div class="spacer-1"></div>

                    <div class="row text-start">
                        <div class="col-10">
                            <div id="app_resp">
                                <h1 class="text-blackish-grey fw-lighter">Application</h1>
                                <span class="text-simple-grey">
                                    አፕሊኬሽን ያስገቡ
                                </span>

                                <?php 
                                    
                                    if(isset($_SESSION['login_id'])){
                                        echo $_SESSION['login_name']; 
                                    } else {
                                        echo '<br>
                                    Testing to see if session is active
                                    <br>';
                                    }
                                ?>
                            </div>

                            <div class="row text-bg-light border border-rounded shadow-sm p-5 my-3" id="partial_form">
                                <p class="lead">ማሳሰቢያ / Instruction:</p>
                                <small class="text-muted"><strong>
                                    ይህን አፕሊኬሽን ለማስገባት ከመጀመርዎ በፊት ከታች የተጠቀሱትን አምስት ዶክመንቶች ማዘጋጀትዎን ያረጋግጡ። እነዚህን ዶክመንቶች ስካን በማድረግ ወደ አንድ የ <u>PDF</u> ፋይል መቀየር ይኖርብዎታል። አፕሊኬሽኑን እነዚህ ዶክመንቶች ሳይሟሉ ካስገቡት ወዲያው ውድቅ እንደምናደርገው ልናሳስብዎት እንወዳለን። ለተጨማሪ መረጃ ወይም ጥያቄዎች በኢሜል አድራሻችን <a href = "mailto: info@tophopepalvelu.com" class="text-decoration-none text-info">info@tophopepalvelu.com</a> ይጻፉልን።
                                </strong></small>
                                
                                <p class="lead">
                                    <code class="small">Before you begin your first screening phase, please confirm that you have the following documents are ready. Convert a scanned copy each document into <u>one PDF file</u> and prepare for upload.</code>
                                </p>

                                <div class="row border-bottom border-secondary-subtle py-2">
                                    <div class="col-md-8">
                                        <small class="text-muted">የስራ ማመልከቻ ሲቪ አዘጋጅቻለሁ።</small>
                                        <p class="lead">I have my Job Resume/CV document.</p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input form-load-checker" type="checkbox" 
                                            value="" id="flexCheckChecked1" onclick="form_load_checker()" checked>
                                            <label class="form-check-label" for="flexCheckChecked1">
                                                <div class="small">አዎ / Yes</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row border-bottom border-secondary-subtle py-2">
                                    <div class="col-md-8">
                                        <small class="text-muted">ፕሮፌሽናል የስራ ላይሰንስ አለኝ።</small>
                                        <p class="lead">I have my professional License document (example, COC test from government).</p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input form-load-checker" type="checkbox" 
                                            value="" id="flexCheckChecked2" onclick="form_load_checker()" checked>
                                            <label class="form-check-label" for="flexCheckChecked2">
                                                <div class="small">አዎ / Yes</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row border-bottom border-secondary-subtle py-2">
                                    <div class="col-md-8">
                                        <small class="text-muted">ከኮሌጅ ወይም ዩኒቨርሲቲ የምርቃት ሰርቲፊኬት አለኝ።</small>
                                        <p class="lead">I have my degree certificate from University or college.</p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input form-load-checker" type="checkbox" 
                                            value="" id="flexCheckChecked3" onclick="form_load_checker()" checked>
                                            <label class="form-check-label" for="flexCheckChecked3">
                                                <div class="small">አዎ / Yes</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row border-bottom border-secondary-subtle py-2">
                                    <div class="col-md-8">
                                        <small class="text-muted">ከኮሌጅ ወይም ዩኒቨርሲቲ የተማሪነት ማመልከቻ (Studnet Copy) አለኝ።</small>
                                        <p class="lead">I have my Student Copy of courses and grades list from University or College.</p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input form-load-checker" type="checkbox" 
                                            value="" id="flexCheckChecked4" onclick="form_load_checker()" checked>
                                            <label class="form-check-label" for="flexCheckChecked4">
                                                <div class="small">አዎ / Yes</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row py-2 mb-3">
                                    <div class="col-md-8">
                                        <small class="text-muted">የስራ ልምድ ማስረጃ ከምሰራበት መስሪያ ቤት ተቀብያለሁ።</small>
                                        <p class="lead">I have evidence of work experience from workplace.</p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input form-load-checker" 
                                                type="checkbox" value="" id="flexCheckChecked5" 
                                                onclick="form_load_checker()" checked>
                                            <label class="form-check-label" for="flexCheckChecked5">
                                                <div class="small">አዎ / Yes</div>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <a class="btn btn-lg next " id="start_submission" 
                                        onclick="loading_animation(); load_form()">
                                            Start Application &gt; &gt;
                                        </a> 
                                        <div id="start_submission_info"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>

    </main>
    <?php include './components/loadingModal.php';?>
    <?php include './components/footer.php'; ?>
</body>
</html>