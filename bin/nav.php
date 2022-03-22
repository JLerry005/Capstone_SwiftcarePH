<?php
    session_start();
    // include_once 'header.php';
    // include_once 'nav-header.php';
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap CDN CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!--Bootstrap CDN JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <!--CSS Link---->
    <!-- <link href="styling/indexStyling.css" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!--Lord Icon-->
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js" ></script>
    <!--Jquery | Isotope | JS File Links / CDN-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <script src="js/isotope.pkgd.min.js"></script> 

    <!-- <script src="/js/script.js"></script> -->
    <!--lightGallery JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>    
    <!-- <title>Homepage - SwiftCare PH</title> -->
    <link rel="icon" href="assets/main-logo-line.png" type="image/x-icon">
</head>

<body>
<!-- <link rel="stylesheet" href="/styling/indexStyling.css"> -->

    <!--Navbar-->
    <nav class="navbar fixed-top navbar-light navbar-expand-lg sticky-lg-top transparent navbarContainer">
        <div class="container-fluid navItems mx-5">
            <a class="navbar-brand navLogo" href="index">
                <img src="assets/logo-transparent.png" class="img-fluid" alt="" title="sample" style="pointer-events: none;">
            </a>      
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon burger"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <!--Right Side Links and Button-->
            <ul class="navbar-nav ms-auto">

            <?php
                if (isset($_SESSION["sessionPatientFirstName"])) {
                echo "

                        <li class='nav-item dropdown'>
                            <a class='nav-link bi bi-bell-fill' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                            <span class='position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle'>
                                <span class='visually-hidden'>New alerts</span>
                            </span>
                            </a>
                            <ul class='dropdown-menu dropdown-menu-dark dropdown-menu-end dropdown-menu-lg-start' aria-labelledby='navbarDropdown'>
                            <li><h6 class='dropdown-header fw-bold'>Notifications</h6></li>
                            <li><a class='dropdown-item' href='#'>1 New Reservation(s)</a></li>
                            <li><a class='dropdown-item' href='#'>Another action</a></li>
                            <li><hr class='dropdown-divider'></li>
                            <li><a class='dropdown-item' href='#'>Something else here</a></li>
                            </ul>
                        </li>

                        <li class='nav-item'>
                            <a class='nav-link bi bi-person-fill fw-bold' href='user-dashboard'> ". $_SESSION["sessionPatientFirstName"] ."</a>
                        </li>";
                    
                    echo "
                        <li class='nav-item'>
                            <a href='includes/logout-inc' class='btn btn-outline-warning btn-nav-signup' role='button' >Logout <i class='bi bi-box-arrow-right'></i></a>
                        </li>";
                }
                else {
                    echo "
                        <li class='nav-item'>
                            <a class='nav-link' href='user-login'>Login</a>
                        </li>";
                    echo "
                        <li class='nav-item'>
                            <a class='nav-link' href='user-signup'>Signup</a>
                        </li>";
                }
            ?>

            <!-- Username Display Link
            <li class="nav-item mr-4 username">
                <a href="#" class="btn btn-nav-login" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Login as User"><i class="bi bi-person-fill"></i> John</a>   
            </li>
            <!--Logout Link--
            <li class="nav-item">
                <a href="#" class="btn btn-outline-primary btn-nav-signup" role="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Sign up as User">Logout <i class="bi bi-box-arrow-right"></i></a>
            </li> -->
            </ul>
        </div>
        </div>
    </nav>