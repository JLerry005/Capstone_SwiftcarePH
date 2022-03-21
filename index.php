<?php
    // include_once 'header.php';
    include_once 'nav.php'; 
    
//     if (!isset($_SESSION['sessionpatientUserID'])) {
//         header("Location: user-login.php");
//         die();
// }
?>
<header>
    <title>SwiftCare PH</title>
</header>
<!--CSS Link-->
<link href="styling/indexStyling.css" rel="stylesheet" type="text/css">

<body class="">   
    <!--Header Main Container -->
    <div class="container-fluid mainContainer">
        <!-- Header-->
        <div class="row row1 pt-3 pb-3">        
            <!-- Column Container for Main Elements-->
            <div class="col-xl-12 mt-5 headerElements">

                <!--Row for Header-->
                <div class="row header-row mt-4">
                    <!-- First Column-->
                    <div class="col-xl-3">
                    </div>
                    <!--Second Column-->
                    <div class="col-xl-6">
                        <div class="row headerRow mb-5">
                            <!-- Header Image -->
                            <div class="col-xl-6"> 
                                    <img src="assets/HeaderLogo.svg" class="img-fluid headerLogo" alt="Responsive image" width="500" height="600"> 
                            </div>
                            <!-- Header Description -->
                            <div class="col-xl-6 my-auto textDescription">
                                <div id="carouselExampleControls" class="carousel slide" data-bs-interval="5000" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                      <div class="carousel-item active">
                                            <h1 class="my-4 header"> SwiftCare PH</h1>
                                            <h2 class="my-2 tagline">Waste no time, Every second Counts!</h2>
                                            <p class="description">
                                            Don't waste your time and energy walking-in for Hospital Room Reservations.
                                            User SwiftCare PH to search and reserve for available hospital rooms near you.
                                            </p>
                                      </div>
                                      <div class="carousel-item">
                                        <h1 class="my-4 header">Sample</h1>
                                        <h2 class="my-2 tagline"> Sample Tagline</h2>
                                        <p class="description">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non nemo possimus, 
                                        eum quia maxime cumque harum commodi.
                                        </p>
                                      </div>
                                      <div class="carousel-item">
                                        <h1 class="my-4 header">Another</h1>
                                        <h2 class="my-2 tagline">Healing galing for Everyone</h2>
                                        <p class="description">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        </p>
                                      </div>
                                    </div>
                                   
                                </div>                
                                <!--<h1 class="my-4 header"> SwiftCare PH </h1>
                                <h2 class="my-2 tagline"> Healing Galing For Everyone.</h2>
                                <p class="description">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non nemo possimus, 
                                    eum quia maxime cumque harum commodi. Placeat vero provident doloremque. Quas sunt accusamus,
                                    quos tenetur in unde facilis quisquam.
                                </p>-->
                            </div>
                        </div>
                    </div>
                    <!--Third Column-->
                    <div class="col-xl-3">
                    </div>
                </div>

                <!--Row for Main-->
                <div class="row main-row mt-4 my-auto">
                    <!--Column 1-->
                     <div class="col-xl-2 col-lg-0">
                </div>
                    <!-- Middle Column-->
                    <div class="col-xl-8 col-lg-12 midColumn">
                    <!-- Search Bar-->
                    <p class="searchBarDesc">Type here the Hospital you are looking for or click the buttons below.</p>
                    <div class="input-group mb-3" id="SearchBar">
                         <input type="search" class="form-control searchBar" placeholder="Search for a Hospital" aria-label="Recipient's username" aria-describedby="button-addon2">
                         <button class="btn btn-outline-primary btnSearch" type="button" id="button-addon2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Search">
                        <!--<img src="/assets/search-icon.svg" class="img-fluid" alt="Responsive image" width="40px">
                                    -->
                         <lord-icon src="https://cdn.lordicon.com/msoeawqm.json"
                                            trigger="click"
                                            colors="primary:#000000,secondary:#FF0000"
                                            class="icon">
                        </lord-icon>
                        </button>
                    </div>
                    
                <!-- Buttons -->
                <div class="Button headerButton p-2">                              
                        <button class="btn btnNearMe" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hospital Near Me">Near Me </button>
                        <a href="browse-all">
                            <button class="btn btnBrowseAll" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Browse All">Browse All</button>
                        </a>   
                </div>
                </div>
                        <!-- Thirds Column-->
                        <div class="col-xl-2 col-lg-0">
                        </div> 
                </div>

        <!-- Scroll Down Button -->
        <a href="#nextpage">
            <div class="scroll-down" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Scroll Down"></div>
        </a>
            </div>
        </div>
        
        <!-- Second Row Main container -->
        <div class="row row-containers" id="nextpage">
            <!-- Header -->
            <div class="row">

                <!--First Column-->
                <div class="col-xl-2 my-auto">
                    <div>
                       
                    </div>
                </div>

                <!--Second Column-->
                <div class="col-xl-8">

                        <div class="col-xl-12">
                            <h1 class="Title"> SwiftCare PH </h1>
                        </div>
                    <div class="row my-auto">
                        <div class="card col-xl-4" style="width: 26rem;">
                        <img src="assets/Clip_animated_illustrations_by_Icons8/Clip_Distance_education_transparent_by_Icons8.gif" class="card-img-top" alt="Responsive image">
                           <div class="card-body">
                               <h1>Time Efficient</h1>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>

                        <div class="card col-xl-4" mx-3" style="width: 26rem;">
                        <img src="assets/Clip_animated_illustrations_by_Icons8/Clip_Brainstorm_transparent_by_Icons8.gif" class="card-img-top" alt="Responsive image">
                            <div class="card-body">
                                <h1>Convenient</h1>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>  

                        <div class="card col-xl-4" style="width: 26rem;">
                            <img src="assets/Clip_animated_illustrations_by_Icons8/Clip_Financial_report_transparent_by_Icons8.gif" class="card-img-top" alt="Responsive image">
                            <div class="card-body">
                                <h1>Rapid Care</h1>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <!--Third Column-->
                <div class="col-xl-2">
                    <div>                
                    </div>
                </div>     
            </div>      
        </div>

        <!-- Parallax Effect -->
        <div class="row parallax">
            <div class="caption">
                <span class="border">THE POWER OF HEAL</span>
            </div>
        </div>

        <!-- User Login and Signup-->
        <div class="row userSignup" id="userSignup">   

            <div class="col-xl-12 my-auto">
                <div class="row userSignupInnerRow">

                    <!--USER LOGO-->
                    <div class="col-xl-6 userSignupImage">
                        <img src="assets/Login-logo-user.svg" class="img-fluid" alt="Responsive image">
                    </div>

                    <!-- DESCRIPTION -->
                    <div class="col-xl-6 my-auto userSignupDescContainer">
                        <div class="userSignupDesc mb-3">
                            <h1 class="mb-4">Signup & Reserve Now!</h1>
                            <p>Lorem ipsum dolor sit amet consectetur,
                                adipisicing elit. Nemo quis ipsum id minima veniam quibusdam ratione officiis.</p>
                        </div>
                        <div class="text-center">
                            <a href="user-signup" class="btn btnUserSignup" role="button">Sign up</a>
                            <label class="loginUnderSignups mt-3">Already have an Account? Login<a href="user-login" class="hereLabel"> Here!</a></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Parallax Effect -->
        <div class="row parallaxSecond">            
            <div class="caption">
                <span class="border">Your Health, Our Priority</span>
            </div>
        </div>
        
        <!-- Hospital Login and Signup-->
        <div class="row row3">

            <!--  Login and Signup-->
            <div class="col-xl-12 my-auto">
                <div class="row">
                    <div class="col-xl-6 descriptionColumn my-auto">
                        
                        <div class="hospitalSignupDesc mb-3">
                            <h1>Sign up your Hospital Now!</h1>
                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nemo quis ipsum id minima veniam quibusdam ratione officiis.</p>
                        </div>

                        <div class="text-center">
                                <a href="hospital-signup" class="btn btnHospitalSignup">Signup Access</a>
                                <label class="hospital-login-desc mt-3">Already Signed up? Login <b><a href="hospital-login" class="hereLabel">Here!</a></b></label>
                            </div>
                        </div>
                        <div class="col-xl-6 my-auto sideImageColumn">
                            <img src="assets/login-logo-hospital.svg" class="img-fluid" alt="Responsive image" >
                        </div>
                    </div>
                </div>
            </div>

        <!--Back To Top Button-->
        <a id="button"></a>
        
        <!-- Footer -->
        <div class="row row4">
            <!--Column-->
            <div class="col-xl-2">                   
            </div>

            <div class="col-xl-8 my-auto">
                <div class="row my-auto">
                    <div class="col-xl-4 text-center mt-5">
                        <h1>ABOUT US</h1> <br>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, possimus magni sed officia neque eveniet ea suscipit dignissimos temporibus labore quidem obcaecati deleniti amet non rem quisquam esse eos animi?</p>  
                    </div>
                    <div class="col-xl-4 d-flex justify-content-center">
                        <img src="assets/main-logo-footer.png" class="img-fluid" alt="Responsive image" style="pointer-events: none;" height="350px" width="380px">          
                    </div>
                    <div class="col-xl-4 text-center mt-5">
                        <h1>CONTACT US</h1> <br>
                        <p><strong>Contact Number:</strong> 0912142425 
                            <br><strong>Email Address:</strong>  awdaw@gmail.com
                        </p>

                        <a href="https://www.facebook.com/joshpagayunan23">
                        <img src="assets/ICONS/DrawKit Free 3D Social Media Icons v1.0/PNG/Front View/Facebook.png" alt="" width="50px" height="50px" id="icons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Facebook"></a>
                        <img src="assets/ICONS/DrawKit Free 3D Social Media Icons v1.0/PNG/Front View/Twitter.png" alt="" width="50px" height="50px" id="icons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Twitter">
                        <img src="assets/ICONS/DrawKit Free 3D Social Media Icons v1.0/PNG/Front View/Viber.png" alt="" width="50px" height="50px" id="icons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Google Mail">
                        <img src="assets/ICONS/DrawKit Free 3D Social Media Icons v1.0/PNG/Front View/Youtube.png" alt="" width="50px" height="50px" id="icons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Instagram">
                    </div>
                </div>
            </div>  

            <div class="col-xl-2">                    
            </div>        

        </div>

        <div class="row row6">
            <div class="col-xl-12 my-auto text-center">
                <p>© 2021 SwiftCare PH – All rights reserved | <a href="">Terms and Conditions</a> </p> 
            </div>
        </div> 
</body>

    <!-- JavaScript Function -->
    <script>

        //Back To Top Button//
        var btn = $('#button');

        $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
        });

        btn.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({scrollTop:0}, '300');
            });

    </script>

    <?php
        include_once 'footer.php';
    ?>
  