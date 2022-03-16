<?php
    // include_once 'header.php';
    include_once 'nav.php'; 
    
//     if (!isset($_SESSION['sessionpatientUserID'])) {
//         header("Location: user-login.php");
//         die();
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <!--CSS Link-->
  <link  href="styling/hospital-overview.css" rel="stylesheet" type="text/css">
  <!--Bootstrap 5 Install-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <!--Google Material Icons-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <!--Bootstrap Masonry-->
  <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
  <!--Bootstrap Icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
  <title>Hospital Overview | SwiftCare PH</title>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="/js/hospital-overview.js" type="text/javascript"></script>
  <link rel = "icon" href ="/assets/undraw_secure_login_pdn4.svg" type = "image/x-icon">
</head>
<body>
    <div id="navPlaceholder">
    </div>

    <!--Navbar-->
    <!-- <nav class="navbar navbar-expand-lg navbarContainer">
        <div class="container-fluid navItems mx-5 my-3">
            <a class="navbar-brand navLogo" href="index.php"> SwiftCare PH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon burger"></span>
            </button>
            <a class="nav-link active mx-3" aria-current="page" href="index.html">About</a>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                            <a href="/html/user-login.html" class="btn btn-nav-login ml-5" role="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Login as User"><i class="bi bi-person-circle"></i> Login</a>   
                    </li>
                    <li class="nav-item">
                            <a href="/html/user-signup.html" class="btn btn-outline-primary btn-nav-signup" role="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Sign up as User">Sign up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->

    <!-- Main Container -->
    <div class="container">
        <!-- Header Row -->
        <div class="row">
            <!-- Primary Containter-->
            <div class="col-md-12">
                <!-- Secondary Containter-->
                <div class="col-md-12 mt-4 mainContainer">
                    <!-- Secondary Header Row-->
                    <div class="row">
                        
                        <!-- Booking Form-->
                        <div class="col-md-6 p-5">                        
                            <!-- Form-->
                            <form action="" class="bookingContainer">

                                <!--Title-->
                                <div class="mb-3">
                                    <h4 class="titleLabel text-start mb-1">Booking Form</h4>
                                </div>

                                <!--Patient Name Input-->
                                <div class="form-floating mb-3">
                                     <input type="text" class="form-control" id="floatingInput" placeholder="Patient Name"  required>
                                    <label for="floatingInput" class="form-labels"><i class="bi bi-person-fill"></i> Patient Name<span class="text-danger"> *</span></label>
                                </div>   
                                                        
                                <!--Enter Valid Email & Confirm Email-->
                                <div class="d-flex mb-3">
                                    <!--Enter Valid Email-->
                                    <div class="form-floating col-6">
                                        <input type="date" class="form-control first-input" id="floatingInput" required>
                                        <label for="floatingInput" class="form-label ">Date of Appointment<span class="text-danger"> *</span></label>
                                    </div>   

                                    <!--Confirm Email-->
                                    <div class="form-floating col-6">
                                        <input type="time" class="form-control second-input" id="floatingInput" required>
                                        <label for="floatingInput" class="form-label ">Time Slot<span class="text-danger"> *</span></label>
                                    </div>   
                                </div>

                                <!--Contact Number-->
                                <div class="form-floating mb-3">
                                    <input type="tel" class="form-control" id="floatingInput" placeholder="+639 XXXX XXXXX" name="mobileNumberInput" id="mobileNumberInput" autocomplete="off" value=" +63" minlength="4" maxlength="14" pattern="+639 XXXX XXXXX" required>
                                    <label for="floatingInput" class="form-label"> <i class="bi bi-telephone-fill"></i> Contact Number<span class="text-danger"> *</span></label>
                                </div>   

                                <!--Covid and Non-Covid Concern-->
                                <div class="d-flex mb-3">
                                    <!--Covid-->
                                    <div class="col-6">
                                        <label for="hospitalName" class="form-label hospital-name-label">Concern</label>
                                        <span class="text-danger"> *</span>
                                        <select class="form-control form-select first-input" required>
                                            <option selected disabled value="">-Select-</option>
                                            <option value="">Covid</option>
                                            <option value="">Non - Covid</option>
                                        </select>
                                    </div>   

                                    <!--Specific Concern-->
                                    <div class="col-6">
                                        <label for="branch" class="form-label">Specify your concern</label>
                                        <span class="text-danger"> *</span>
                                        <input type="text" name="branchInput" class="form-control second-input" id="branch" placeholder="" autocomplete="off" required>
                                    </div>
                                </div>    

                                <!--Bed or Room-->
                                <div class="mb-3">
                                    <label for="hospitalName" class="form-label hospital-name-label">Please select bed or room</label>
                                    <span class="text-danger"> *</span>
                                    <select class="form-control form-select" required>
                                        <option selected disabled value="">-Select-</option>
                                        <option value="">Bed</option>
                                        <option value="">Room</option>
                                    </select>
                                </div>

                                <!--Hospital & Branch-->
                                <div class="d-flex mb-3">
                                    <!--Hospital-->
                                    <div class="form-floating col-6">
                                        <input type="text" class="form-control first-input" id="floatingInput" placeholder="Hospital" required>
                                        <label for="floatingInput" class="form-label "><i class="bi bi-building"></i> Hospital Name<span class="text-danger"> *</span></label>
                                    </div>   

                                    <!--Branch-->
                                    <div class="form-floating col-6">
                                        <input type="text" class="form-control second-input" id="floatingInput" placeholder="Branch" required>
                                        <label for="floatingInput" class="form-label ">Branch<span class="text-danger"> *</span></label>
                                    </div>   
                                </div>                                    

                                <!--Attachment Button-->
                                <div class="mb-3">
                                    <label for="attachment" class="form-label">Attachment for refferal.</label> 
                                    <br>
                                    <input type="file" value="Add attachments" data-bs-toggle="modal" data-bs-target="#attachment" class="form-control">
                                </div>   
                                                                
                                <!--Login Button-->
                                <a href="#bookingForm" class="btn btn-success btnBook" role="button">Book Now</a>
                                <!--Signup Button-->
                                <div class="signupContainer">
                                    <hr>
                                    <h4 class="signupLink"><center>OR</center></h4>    
                                    <a href="index" class="btn btn-outline-dark btnBook" role="button">Back To Home Page</a>
                                </div> 

                            </form>                                                                        
                        </div>

                        <!--Description, Map & Slideshow Images-->
                        <div class="col-md-6 imagesContainer p-5">
                            <!-- Description -->
                            <div class="descriptionContainer">
                                <h3 class="mb-4"><i class="bi bi-building"></i> MCU Hospital</h3> <hr>
                                <h6>
                                    <i class="bi bi-telephone-fill"></i> +63 2 367-20-31 to 45 <br>
                                    <i class="bi bi-geo-alt-fill"></i> MCU Hospital, EDSA, Caloocan City, Metro Manila
                                </h6> 
                                <p>A modern 209- Bed Tertiary health care center strategically located in Caloocan City, north of Metro Manila offering complete and efficient medical and surgical services.</p>                                
                            </div>
                            <!-- Google Map -->
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <h5 class="text-white"><i class="bi bi-geo-alt-fill"></i> Landmark</h5>
                                <div class="map p-2">
                                     <iframe class="googleMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.9926021403926!2d120.98714038020043!3d14.656361247977395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b429ca9143f7%3A0x7dc98ed31712fe49!2sMCU%20Hospital%20-%20Filemon%20D.%20Tanchoco%2C%20Sr.%20Medical%20Foundation%20Inc.!5e0!3m2!1sen!2sph!4v1637676790012!5m2!1sen!2sph" width="550px" height="220px" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                             </div>

                             <!-- Slideshow Images -->
                            <div class="text-start pt-3">                          
                                <!-- Title -->
                                <div class="text-white text-start">
                                    <h5>Hospital Facilities</h5>
                                </div>
                                <!-- Carousel Images -->
                                <div id="carouselExampleIndicators" class="carousel slide p-2" data-bs-interval="4000" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                      <div class="carousel-item active">
                                        <img src="assets/mcu-1.jpg" class="d-block w-100" alt="..." height="300px">
                                      </div>
                                      <div class="carousel-item">
                                        <img src="assets/mcu-2.jpg" class="d-block w-100" alt="..." height="300px">
                                      </div>
                                      <div class="carousel-item">
                                        <img src="assets/mcu-3.jpg" class="d-block w-100" alt="..." height="300px">
                                      </div>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="visually-hidden">Next</span>
                                    </button>
                                  </div>
                            </div> 

                        </div> 

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

