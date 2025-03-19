<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './components/header.php'; ?>
</head>
<body >
    <?php include './components/navbar.php'; ?>

    <main>
        <div class="spacer-2"></div>

        <div class="jumbotron text-center bg-secondary text-light my-5 p-5">
            <div class="container">
                <h1>Contact Us</h1>
                <!-- <small>Apply now for upcoming orientation!</small> -->

                <!-- <p>ፊንላንድ በሚገኙ ሆስፒታሎች ስራ ለመቀጠር አፕሊኬሽን ያስገቡ</p> -->

                <!-- <a href="#" class="btn btn-lg" style="background-color: #fff">
                    <i class="fa fa-play-circle-o"></i> Testimonials
                </a>
                <a href="./pages/apply.php" class="btn btn-lg" style="background-color: #e3f2fd;">
                    <i class="fa fa-file-text-o"></i> Start Application
                </a> -->
            </div>
        </div>

        <div class="container" id="main-container">
            <div class="row">
                <div class="col-2"></div>

                <!-- Next steps  -->
                <div class="col-10 text-center">
                    
                    <div class="spacer-1"></div>

                    <div class="row text-start">
                        <div class="col-10">
                            <div id="app_resp">
                                <h1 class="text-blackish-grey fw-lighter">Word</h1>
                                <span class="text-simple-grey">
                                    more word
                                </span>
                            </div>

                            <div class="row text-bg-light border border-rounded shadow-sm p-5 my-3" id="partial_form">
                                <p class="lead">Notice</p>
                                <small class="text-muted"><strong>
                                    Mode <u>details</u> incoming <a href = "mailto: info@tophopepalvelu.com" class="text-decoration-none text-info">info@tophopepalvelu.com</a>
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
                            </div>                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-10 next border-primary-subtle border rounded">
                            <p class="align-middle pt-3 pb-1">ያስገቡት አፕሊኬሽን ተቀባይነት ከአገኘ በቀጣይ ምን ይጠብቃሉ?</p>
                        </div>
                    </div>

                    <div class="spacer-1"></div>

                    <div class="row text-start">
                        <div class="col-10">
                            <h1 class="text-blackish-grey fw-lighter">Next Steps</h1>
                            <span class="text-simple-grey">
                                <a href="./pages/user_portal.php" class="text-light-blue link-underline-light">Application Status</a> | 
                                <a href="#" class="text-light-blue link-underline-light">Contact Us</a>
                            </span>

                            <div class="row">
                                <div class="col py-2 text-start">
                                    <div class="card text-bg-light shadow-sm mb-3" style="max-width: 18rem;">
                                        <div class="card-header">
                                            <code>አንደኛ</code></div>
                                        <div class="card-body">
                                        <h5 class="card-title">ቅድመ መመሪያ (Online Orientation) እንሰጣለን</h5>
                                        <p class="card-text small">
                                            በአመልካቾች ምልመላ ሂደት የመጀመሪያው ስራ በየሳምንቱ የምንሰጣቸው ቅድመ መመሪያዎች ናቸው። በእነዚህ መመሪያዎች ፊንላንድ ሃገር ያለውን የስራ እድል በግልጽ እናሳውቅዎታለን። በተጨማሪም ጥያቄዎች ካለዎት መልስ ለመስጠት ያስችላል። 
                                            ይህን የቅድመ መመሪያ በአካል ወይም በ <span>
                                                <a href="#" class="text-light-blue link-underline-light">
                                                Online Zoom
                                                </a>
                                            </span> መከታተል ይቻላል።
                                        </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col py-2 text-start">
                                    <div class="card text-bg-light shadow-sm mb-3" style="max-width: 18rem;">
                                        <div class="card-header"><code>ሁለተኛ</code></div>
                                        <div class="card-body">
                                        <h5 class="card-title">የፊኒሽኛ ቋንቋ ስልጠና እንሰጣለን</h5>
                                        <p class="card-text small">
                                            ከቅድመ መመሪያ ስብሰባ ቀጥሎ የፊኒሽኛ ቋንቋ ስልጠና መስጠት እንጀምራለን። የስራ እድሉ ተቀባይነት የሚያገኘው የፊኒሽኛ ቋንቋን በትክክል መስማት፣ መናገር እና መጻፍ ለሚችሉ አመልካቾች ነው።
                                        </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col py-2 text-start">
                                    <div class="card text-bg-light shadow-sm mb-3" style="max-width: 18rem;">
                                        <div class="card-header"><code>ሶስተኛ</code></div>
                                        <div class="card-body">
                                        <h5 class="card-title">ወደፊንላንድ እንኳን በደህና መጡ!</h5>
                                        <p class="card-text small">
                                            የፊኒሽኛ ቋንቋ ልምምድ እና ፈተና ከጨረሱ በኋላ የስምምነት ኮንትራክት በመፈረም የሃገሪቱ መኖሪያ ፈቃድ ያገኛሉ። በተጨማሪም ወደሃገሪቱ ተጉዘው ሲደርሱ የሚቀበሉ እና የሃገሪቱን ህይወት ስርአት የሚያላምዱ ሰዎች አዘገጅተናል።
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row p-3">
                                <div class="text-start bg-white border rounded shadow-sm py-5">
                                    <h3>
                                        <span class="glyphicon glyphicon-info-sign"></span> ተጨማሪ መረጃዎች
                                    </h3>
                                    <small>Helpful Links</small>

                                    <div class="row border-bottom border-secondary-subtle p-2">
                                        <div class="col-4">
                                            <h4>ቅድመ መመሪያ</h4>
                                            <small>Online Orientation</small>
                                        </div>
                                        <div class="col-6 text-simple-grey">
                                            <ul>
                                                <li><a href="#">ስብሰባው መቼ ይካሄዳል?</a></li>
                                                <li><a href="#">ስብሰባውን መከታተል የሚችሉት ምን ሲያሟሉ ነው?</a> </li>
                                                <li><a href="#">በኦንላይን ስብሰባውን መከታተል ይቻላል?</a> </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row border-bottom border-secondary-subtle p-2">
                                        <div class="col-4">
                                            <h4>የቋንቋ ትምህርት</h4>
                                            <small>Language lesson</small>
                                        </div>
                                        <div class="col-6 text-simple-grey">
                                            <ul>
                                                <li><a href="#">ትምህርቱ መቼ ይጀመራል?</a></li>
                                                <li><a href="#">ለትምህርቱ አስፈላጊ ክፍያ አለው?</a> </li>
                                                <li><a href="#">የቋንቋ ፈተናው መስፈርቶች</a> </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="row border-bottom border-secondary-subtle p-2">
                                        <div class="col-4">
                                            <h4>ወደፊንላንድ ጉዞን በተመለከተ</h4>
                                            <small>Traveling to Finland</small>
                                        </div>
                                        <div class="col-6 text-simple-grey">
                                            <ul>
                                                <li><a href="#">ወደሃገሪቱ ለመግባት መሟላት ያለባቸው መስፈርቶች</a></li>
                                                <li><a href="#">ወደሃገሪቱ ሲደርሱ የሚኖረው አቀባበል</a> </li>
                                                <li><a href="#">በፊንላንድ ስለሚኖሩበት አካባቢዎች አጫጭር መረጃዎች</a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="text-simple-grey">
                                                <a href="#" class="text-light-blue link-underline-light">ተጨማሪ እርዳታ ለሚፈልጉ | FAQ</a>
                                            </span>
                                        </div>
                                        <div class="col-3 text-center border-end border-secondary-subtle">
                                            <a href="#" class="text-hard-blue link-underline-light">Application Status</a>
                                        </div>
                                        <div class="col-3 text-center">
                                            <a href="#" class="text-hard-blue link-underline-light">Contact Us</a>
                                        </div>
                                    </div>
            
                                </div>
                            </div>
                        </div>

                        <!-- Side cards  -->
                        <div class="col-2">
                            <h1 class="text-blackish-grey fw-lighter">Testimonials</h1>
                            <div class="col-lg-12 ">
                    
                                    <div class="card shadow-sm mb-3">
                                        <a href="#">
                                            <img src="./assets/img/property-img-1.jpg" class="card-img-top" alt="...">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title">Upcoming Applicants</h5>
                                            <p class="card-text">Year 2022 applicants...</p>
                                        </div>
                                    </div>
                    
                                    <div class="card shadow-sm mb-3">
                                        <a href="#">
                    
                                            <!-- <iframe class="card-img-top" 
                                            src="https://www.youtube.com/embed/w72h__2T2TM?controls=0" 
                                            title="Travellers" 
                                            frameborder="0" 
                                            allow="autoplay" 
                                            
                                            ></iframe> -->
                    
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title">Upcoming Applicants</h5>
                                            <p class="card-text">Year 2022 applicants...</p>
                                        </div>
                                    </div>
                    
                                    <div class="card shadow-sm mb-3">
                                        <a href="./pages/blogOne.html">
                                            <img src="./assets/img/property-img-1.jpg" class="card-img-top" alt="...">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title">Blog One</h5>
                                            <p class="card-text">Year 2022 applicants...</p>
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