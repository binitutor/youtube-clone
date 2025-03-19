<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Online document submission portal">
    <meta name="author" content="Biniam Alemayehu">
    <title>THP - home</title>
    <link rel="icon" type="image/x-icon" href="./assets/img/favicon.ico" />
    <link rel="stylesheet" href="./assets/lib/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script> -->
    <link rel="stylesheet" href="./css/main_style.css">
    <script src="./assets/lib/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <?php session_start(); ?>
</head>
<body>
    <header>
        <div class="navbar row fixed-top px-5 navbar-expand-xxl bg-body-tertiary">
            <div class="col-2">
                <a class="navbar-brand text-light" href="./">
                    <span class="fa fa-home"></span> Top Hope Palvelu
                </a>
            </div>

            <div class="col-8 text-center">
                <ul class="text-simple-grey list-group list-group-horizontal">
                    <li class="list-group-item navitem-c border-0">
                        <a href="./pages/apply.php" class="text-light text-decoration-none">
                            <i class="fa fa-file-text-o"></i> Start Application
                        </a>
                    </li>
                    <li class="list-group-item navitem-c border-0">
                        <a href="./pages/testimonials.php" class="text-light text-decoration-none">
                            <i class="fa fa-play-circle-o"></i> Testimonials
                        </a>
                    </li>
                    <li class="list-group-item navitem-c border-0">
                        <a href="./pages/contact.php" class="text-light text-decoration-none">
                            <i class="fa fa-address-card-o"></i> Contact Us
                        </a>
                    </li>
                    <!-- href="./pages/contact.html" -->
                    <li class="list-group-item navitem-c border-0">
                        <a href="./pages/ecourse.php" class="text-light text-decoration-none">
                            <i class="fa fa-address-book-o"></i> Lecture Site
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col">
                <li class="list-group-item navitem-c dropdown list-group-item">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Your account
                    </a>
                    <ul class="dropdown-menu navitem-c">
                        <?php 
                            if(isset($_SESSION['full_name'])){
                                echo '<label>'.$_SESSION['full_name'].'</label>
                                    <li><hr class="dropdown-divider"></li>
                                    <li class="navitem-c-dropdown">
                                        <a class="dropdown-item navitem-c-dropdown" href="#">Profile</a>
                                    </li>
                                    <li class="navitem-c-dropdown">
                                        <a class="dropdown-item navitem-c-dropdown" href="#">Todo</a>
                                    </li>
                                    <li class="navitem-c-dropdown">
                                        <a class="dropdown-item navitem-c-dropdown clickable" onclick=logout("main")>Logout</a>
                                    </li>
                                ';
                            } else {
                                echo '
                                <label>Your Account</label>
                                <li><hr class="dropdown-divider"></li>
                                <li class="navitem-c-dropdown">
                                    <a class="dropdown-item navitem-c-dropdown" href="./php_actions/login.php">Login</a>
                                </li>';
                            }  
                        ?>
                    </ul>
                </li>
            </div>
        </div>
    </header>

    <main>
        <div class="spacer-2"></div>
        
        <div class="jumbotron text-center bg-secondary text-light my-5 p-5">
            <!-- <img src="./assets/img/nappy-6LV3V1gLrP8-unsplash.jpg" alt=""> -->
            <div class="container">
                <h1>የነርሲንግ አፕሊኬሽኖችን መቀበል ጀምረናል!</h1>
                <small>Apply now for upcoming orientation!</small>

                <p>ፊንላንድ በሚገኙ ሆስፒታሎች ስራ ለመቀጠር አፕሊኬሽን ያስገቡ</p>

                <a href="#" class="btn btn-lg" style="background-color: #fff">
                    <i class="fa fa-play-circle-o"></i> Testimonials
                </a>
                <a href="./pages/apply.php" class="btn btn-lg" style="background-color: #e3f2fd;">
                    <i class="fa fa-file-text-o"></i> Start Application
                </a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <!-- Next steps  -->
                <div class="col-10 text-center">
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

    <div class="blockcode bg-light">
        <footer class="page-footer shadow-sm">
            <div class="d-flex flex-wrap justify-content-between align-items-center mx-auto py-4"
                style="width: 80%">
                <div class="d-flex flex-wrap align-items-center">
                    <a href="./" class="d-flex align-items-center p-0 text-dark">
                        <img alt="logo" src="./assets/img/favicon.ico" width="30px" />
                        <span class="ms-4 h5 mb-0 font-weight-bold">Top Hope Palvelu</span>
                    </a>
                    <span
                        style="
                                    font-size: 3em;
                                    margin: -2rem 0px -1.5rem 1rem;
                                    color: #c4c4c4;
                                    "
                        >&#8226;</span
                    >
                    <small class="ms-2">Copyright &copy; THP, 2024. All rights reserved. 
                        <a href="http://portfolio.binitutor.com/" target="_blank">BiniTutor.com</a></small>
                </div>
                <div>
                    <button class="btn btn-dark btn-flat p-2">
                        <i class="fa fa-facebook"></i>
                    </button>
                    <button class="btn btn-dark btn-flat p-2">
                        <i class="fa fa-twitter"></i>
                    </button>
                    <button class="btn btn-dark btn-flat p-2">
                        <i class="fa fa-instagram"></i>
                    </button>
                </div>
            </div>
        </footer>
    </div>

    <script src="./js/main_script.js"></script>
</body>
</html>