<?php
    session_start();
    // if (!isset($_SESSION['sessionpatientUserID'])) {
    //         header("Location: user-login.php");
    //         die();
    // }
    include_once 'includes/dbh-inc.php';

    if (!isset($_GET["listingID"])) {
        header("location: index");
    }

    $listingID = $_GET["listingID"];
    $hospitalName; 
    $hospitalAddress;
    $hospitalPhone;
    $hospitalType;
    $hospitalDescription;
    $bed;
    $bedSlot;
    $room;
    $roomSlot;
    $referral;
    $hospitalWebsite;

    $getDetails = $conn->query("SELECT * FROM hospitallisting WHERE listing_id = $listingID;") or die($conn->error);
    while ($data = mysqli_fetch_assoc($getDetails)) {
        $hospitalName = $data["hospital_name"];
        $hospitalAddress = $data["hospital_location"];
        $hospitalPhone = $data["hospital_phone"];
        $hospitalType = $data["hospital_type"];
        $hospitalDescription = $data["hospital_description"];
        $referral = $data["additional_docs"];
        $hospitalWebsite = $data["website_link"];

        // slots
        $bed = $data["bed"];
        $bedSlot = $data["bed_slot"];

        $room = $data["room"];
        $roomSlot = $data["room_slot"];
    }
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth"></html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Flowbite minified stylesheet -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.3.4/dist/flowbite.min.css"/>
    <!--lightGallery CSS CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <!--CSS Link-->
    <link  href="styling/hospital-overview.css" rel="stylesheet" type="text/css">
    <!-- TAILWIND CSS Link -->
    <link rel="stylesheet" href="dist/output.css">
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <!-- TITLE -->
    <title><?php echo $hospitalName?> | SwiftCare PH</title>
    <!-- JQUERY LINK -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- <script src="/js/hospital-overview.js" type="text/javascript"></script> -->
    <link rel="icon" href="assets/main-logo-line.png" type="image/x-icon">
</head>
<body class="bg-blue-50 text-gray-700 text-xs sm:text-sm md:text-md font-poppins">
    <!-- Nav Bar -->
    <nav class="text-white py-5 lg:px-12 w-full bg-gray-900">
        <div class="relative flex flex-row justify-between items-center border-slate-600">
            <div class="flex flex-row items-center space-x-4 pl-5">
            <a href="index" class="flex items-center text-center">
                <img src="assets/main-logo-transparent.png" class="mr-3 h-8" alt="Swiftcare PH Logo">
                <span class="self-center text-lg md:text-2xl font-semibold whitespace-nowrap dark:text-white">Swiftcare PH</span>
                </a>

                <a href="#" class="hover:underline hidden md:block">About</a>
            </div>

            <?php
                if (isset($_SESSION["sessionpatientUserID"])) {
                    echo '

                    <!-- Hamburger Button -->
                    <div class="md:hidden flex flex-row items-center pr-5">
                        <button class="hamburger-button" id="hamburger-button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                        </button>
                    </div>

                    <!-- Burger Menu -->
                    <div class="absolute text-lg top-0 right-0 md:hidden mobileMenu hidden z-10 h-screen w-full bg-gray-900 transition ease-out duration-200 p-10 space-y-6" id="mobileMenu">
                        <div class="flex justify-end w-full">
                            <button class="hover:underline flex items-center btn-close-menu" id="btn-close-menu">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                  </svg>
                                &nbsp;Close
                            </button>
                        </div>
                        
                        
                        <div class=" hover:text-blue-400 text-blue-100 transition-all">
                            <a href="user-reservations" class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                  </svg>
                                &ensp;My Reservations
                            </a>
                        </div>
                        
                        <p class="flex flex-row items-center capitalize hover:text-blue-400 text-blue-100 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                              </svg>
                              <a href="user-dashboard"> &nbsp;'.$_SESSION['sessionPatientFirstName'].'</a>
                        </p>
                        
                        <a href="includes/logout-inc" class="hover:bg-red-500 border-2 border-red-500 hover:drop-shadow-md py-1 px-5 rounded-full flex justify-center items-center transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            &nbsp;Logout
                        </a>
                    </div>

                    <div class="hidden md:flex md:flex-row md:items-center space-x-5 pr-5">
                        <div class="px-3 hover:text-blue-400 text-blue-100 transition-all">
                            <a href="user-reservations" target="_blank" class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                  </svg>
                                &ensp;My Reservations
                            </a>
                        </div>

                        <p class="flex flex-row items-center capitalize px-3 hover:text-blue-400 text-blue-100 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                              </svg>
                              <a href="user-dashboard" target="_blank"> &nbsp;'.$_SESSION['sessionPatientFirstName'].'</a>
                        </p>
                        <a href="includes/logout-inc" class=" hover:bg-red-500 border-2 border-red-500 hover:drop-shadow-md py-1 px-5 rounded-full flex items-center text-sm transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            &nbsp;Logout
                        </a>
                    </div>
                    ';
                }
                else {
                    echo '
                        <div class="hidden md:block">
                            <a href="user-login.php" class="bg-green-600 hover:bg-green-500 hover:drop-shadow-md py-2 px-7 rounded-lg hover:rounded-md hover:scale-105 flex flex-row text-sm transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                &nbsp;Login
                            </a>
                        </div>


                        <!-- Burger Menu -->
                        <div class="absolute text-lg top-0 right-0 md:hidden mobileMenu hidden z-10 h-screen w-full bg-gray-900 transition ease-out duration-200 p-10 space-y-6" id="mobileMenu">
                            <div class="flex justify-end w-full">
                                <button class="hover:underline flex items-center btn-close-menu" id="btn-close-menu">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                      </svg>
                                    &nbsp;Close
                                </button>
                            </div>

                            <a href="user-login.php" class="hover:bg-green-500 border-2 border-green-500 hover:drop-shadow-md py-1 px-5 rounded-full flex items-center text-sm transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                &nbsp;Login
                            </a>

                            <a href="about" class="block py-2 text-sm hover:bg-gray-500">About</a>
                        </div>

                        <!-- Hamburger Button -->
                        <div class="md:hidden flex flex-row items-center pr-5">
                            <button class="hamburger-button" id="hamburger-button">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>
                            </button>
                        </div>
                    ';
                }
            ?>

    
            <!-- Hamburger Button
            <div class="md:hidden flex flex-row items-center">
                <button class="hamburger-button id="hamburger-button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                </button>
            </div>
        </div>

        <- Burger Menu -
        <div class="mobileMenu hidden md:hidden transition ease-out duration-200" id="mobileMenu">
            <a href="" class="block py-2 text-sm hover:bg-gray-500">More</a>
            <a href="" class="block py-2 text-sm hover:bg-gray-500">About</a>
            <button class="block py-2 text-sm hover:bg-gray-500">Login</button>
        </div> -->
    </nav>


    <!-- Main Container -->
    <div class="container mx-auto flex flex-col lg:p-5">

        <!-- Google Maps -->
        <div class="w-full h-[350px] lg:h-[450px]" id="map-canvas">
            [Google Maps is loading..]
        </div>
        <div class="mb-5 text-center hidden md:block">
            <p class=""><i>Drag the <b>A Marker</b> (this represents your location) or use the Search Field below to find your location to get Directions. </i></p>
        </div>

        <!-- Get directions -->
        <div class="flex flex-col mb-10 px-5 mt-5 md:mt-0 md:px-0">
            <div id="getDirectionsInput">

                <div class="flex items-end md:items-center justify-between"> 
                    <label for="fromInput" class="flex items-center mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                            </svg>
                        &nbsp;Get Directions
                    </label>


                    <div class="flex flex-col items-start md:flex-row md:items-center space-y-1 md:space-y-0 md:space-x-4">
                        <!-- Driving Time -->
                        <p class="flex items-center font-semibold text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                              </svg>
                            Driving Time:&nbsp;<span class="duration-container text-gray-900" id="duration-container">0</span>
                        </p> 
        
                        <!-- Distance In km -->
                        <p class="flex items-center font-semibold text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M8 5a1 1 0 100 2h5.586l-1.293 1.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L13.586 5H8zM12 15a1 1 0 100-2H6.414l1.293-1.293a1 1 0 10-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L6.414 15H12z" />
                              </svg>
                            Distance (km):&nbsp;<span class="distance-container text-gray-900" id="distance-container">0</span>
                        </p>
                    </div>
                </div>  
                

                <div class="border-b-2 bg-white drop-shadow-sm flex flex-row items-center p-1">
                    <input class="text-sm border-0 rounded-md focus:ring-0 w-full" type="search" placeholder="enter your current location.." id="user-location">
                    
                    <!-- get Current location Button -->
                    <button class="bg-gray-700 p-2 sm:p-3 text-white rounded-md flex items-center" id="getLocationButton">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                        
                    </button>
                </div>
            </div>
        </div>


        <input class="text-sm" type="hidden" placeholder="To:" disabled id="listingID" value="<?php echo $listingID ?>">


        <!-- Container for hospital Details -->
        <div class="my-2 space-y-3 px-5 md:px-0">

            <!-- Header for Hospital Name and Get Directions Input -->
            <div class="xl:flex xl:items-start xl:justify-between">

                <!-- Address, Phone, Hospital name, etc.. -->
                <div class="flex flex-col">
                    <!-- Hospital Name -->
                    <p class="text-gray-900 text-xl md:text-2xl lg:text-3xl font-bold uppercase mb-2"><?php echo $hospitalName ?></p>
                    <!-- Hospital Type -->
                    <div class="flex flex-row mb-5">
                        <span class="font-bold uppercase"><?php echo $hospitalType?> </span>
                    </div>
                    <!-- Hospital Address -->
                    <div class="flex flex-row mb-2">
                        <i class="bi bi-geo-alt-fill text-red-500"></i>
                        <p class="font-semibold">&ensp; Address: <span class="font-medium">&nbsp;<?php echo $hospitalAddress ?></span></p>
                    </div>

                    <!-- Details for Large Screen -->
                    <div class="hidden xl:flex xl:flex-row space-x-3">
                        <!-- Hospital Phone Number -->
                        <div class="flex flex-row bg-white px-3 py-2 drop-shadow-md rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>
                            <p class="font-semibold text-xs">&ensp;Phone:</p> <span class="text-blue-500 font-medium">&nbsp;<?php echo $hospitalPhone?></span>
                        </div>

                        <!-- Bed Slot-->
                        <div>
                            <?php
                                // Check if bed is available
                                if ($bedSlot > 0) {
                                    echo '
                                        <div class="flex flex-row bg-white px-3 py-2 drop-shadow-md rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                                              </svg>
                                            <p class="font-semibold text-xs">&ensp; Bed Slot:</p> &nbsp;<span>'.$bedSlot.'</span> 
                                        </div>
                                    ';
                                }else {
                                    echo '';
                                }
                            ?>
                        </div>

                        <!-- Room Slot -->
                        <div>
                            <?php
                                if ($roomSlot ) {
                                    echo '
                                        <div class="flex flex-row bg-white px-3 py-2 drop-shadow-md rounded-full">
                                            <i class="bi bi-collection"></i>
                                            <p class="font-semibold text-xs">&ensp; Room Slot:</p> &nbsp;<span>'.$roomSlot.'</span> 
                                        </div> 
                                    ';
                                }else {
                                    echo '';
                                }
                            ?>
                        </div>

                        <!-- Referral -->
                        <div>
                            <?php if($referral == "Yes"){
                                echo '
                                    <div class="flex flex-row bg-white px-3 py-2 drop-shadow-md rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                        </svg>
                                        <p class="font-semibold text-xs">&nbsp; Referral Documents required</p>
                                    </div>
                                ';
                                }else {
                                    echo '';
                                }
                            ?>
                            
                        </div>
                    </div>
                </div>
                
                <!-- BOOK NOW Button -->
                <div class="pt-4">
                    <button onclick="anchor_to_form()" class="w-full bg-gray-900 p-4 rounded-md text-white flex justify-center items-center hover:bg-gray-800" type="button" id="book-now-anchor">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                        &nbsp;BOOK NOW!
                    </button>
                </div>

                <!-- Details for smaller screen -->
                <div class="xl:hidden space-y-2 mt-3">
                    <!-- Hospital Phone Number -->
                    <div class="flex flex-row">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                        <p class="font-semibold">&ensp;Phone:</p> <span class="text-blue-500 font-medium">&nbsp;<?php echo $hospitalPhone?></span>
                    </div>

                    <!-- Bed Slot -->
                    <div class="flex flex-row">
                        <?php
                            if ($bedSlot > 0) {
                                echo '
                                    <i class="bi bi-collection-fill"></i>
                                    <p class="font-semibold">&ensp; Bed Slot:</p> &nbsp;<span>'.$bedSlot.'</span> 
                                ';
                            }else {
                                echo '';
                            }
                        ?>
                    </div>

                    <!-- Room Slot -->
                    <div class="flex flex-row">
                        <?php
                            if ($roomSlot > 0) {
                                echo '
                                    <i class="bi bi-collection"></i>
                                    <p class="font-semibold">&ensp; Room Slot:</p> &nbsp;<span>'.$roomSlot.'</span> 
                                ';
                            }else {
                                echo '';
                            }
                        ?>
                    </div>
                </div>
            </div>

            <!-- Hospital Description -->
            <div class="pt-3 pb-1 xl:w-[800px]">
                <h1 class="flex items-start lg:items-center mb-2 font-bold text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-1 lg:mt-0 viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                      </svg>
                    &ensp;About <?php echo $hospitalName?>&nbsp;
                </h1>
                <p class="text-justify text-gray-800 font-medium"><?php echo $hospitalDescription?></p>
            </div>

            <!-- Image -->
            <div class="image-gallery grid items-center grid-cols-6 lg:grid-cols-4 xl:grid-cols-5 gap-x-4 gap-y-4 p-2" id="image-gallery">
                <?php
                    $imageDir;
                    $getImages = $conn->query("SELECT * FROM listingimages WHERE listing_idFK = $listingID") or die($conn->error);
                    while ($imageRow = mysqli_fetch_assoc($getImages)) {
                        $imageDir = $imageRow["image_dir"];
                        echo '
                            <a href="Capstone/'.$imageDir.'" class="fetched-image col-span-3 sm:col-span-2 lg:col-span-1 xl:col-span-1 bg-gray-900 rounded-lg border-solid border-2 border-gray-900 hover:scale-105 transition duration-200">
                                <img id="" class="card-img w-full h-36 md:h-48 border-solid border-2 border-gray-800 rounded-md" alt="..." src="Capstone/'.$imageDir.'"/>
                            </a>
                        ';

                        // echo '
                        // <a href="Capstone/'.$imageDir.'" class="fetched-image mr-3 xl:col-span-1 flex items-center bg-gray-900 rounded-lg border-solid border-2 border-sky-500 hover:scale-105 transition duration-200">
                        //     <img id="" class="card-img w-fit h-fit" alt="..." src="Capstone/'.$imageDir.'"/>
                        // </a>
                        // ';
                    }

                ?>  
            </div>

            <!-- Hospital Website Link -->
            <div class="flex flex-row">
                <i class="bi bi-globe"></i>
                <p class="font-semibold">&ensp;Visit Us: <a class="text-blue-500 underline underline-offset-2" href="<?php echo $hospitalWebsite?>">&nbsp;<?php echo $hospitalWebsite?></a></p>
            </div>

            <!-- Booking Form and Login Container -->
            <div id="booking-form-login-container">
                <!-- Booking Form Content -->
                <div class="drop-shadow-sm rounded-md mt-32 pt-10" id="booking-form-container">
                    <!-- Booking Header -->
                    <div class="lg:flex lg:justify-between lg:items-center mb-16">
                        <div>
                            <h1 class="font-bold text-gray-700 text-sm md:text-2xl flex items-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                  </svg>
                                &ensp;Book a Reservation Now!
                            </h1>
                            <p class="leading-relaxed lg:w-[600px] text-sm md:text-lg text-gray-600">
                                Conveniently book a <b>Bed</b> or <b>Room</b> for you or your loved ones just
                                by filling up the form below! Keep yourself safe lessening physical Contact out on the public.
                            </p>
                        </div>
                        
                        <img src="assets\booking-form\Calendar-with-pencil.svg" class="w-80 lg:block hidden" alt="">
                    </div>
                    
                    <input type="hidden" name="" value="<?php echo $_SESSION['sessionpatientUserID'] ?>" id="user-id-placeholder">
                    <!-- Form -->
                    <form id="bookingForm">
                        <!-- Bookin Form Body -->
                        <div class="space-y-2">
                            <!-- Patient Name Text -->
                            <div class="flex items-center justify-between">
                                <p class="text-gray-500">*Please fill in the form with correct details.*</p>
                                <p class="text-gray-500">Active booking is only limited to <b>five</b> (5) per account.</p>
                            </div>
                            
                            <div class="mb-3 font-bold flex justify-row uppercase items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-900" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                                <p>&ensp;Patient Name</p><span class="text-red-500">&nbsp;*</span>
                            </div>

                            <!-- Patient First & Last Name -->
                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                <!-- Patient First Name -->
                                <div class="relative z-0 mb-4 w-full group">
                                    <input type="text" name="firstName" id="firstName" class="bg-blue-50 border-2 font-bold capitalize border-gray-500 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-3 px-4" placeholder="First Name" required/>
                                    <div id="firstName-error" class="text-red-500 text-center mt-2 font-medium"></div>
                                </div>
                                <!-- Patient Last Name -->
                                <div class="relative z-0 mb-4 w-full group">
                                    <input type="text" name="lastName" id="lastName" class="bg-blue-50 border-2 font-bold capitalize border-gray-500 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-3 px-4" placeholder="Last name" required />
                                    <div id="lastName-error" class="text-red-500 text-center mt-2 font-medium"></div>
                                </div>
                            </div>

                            <!-- Appointment Schedule Text -->
                            <div class="mb-3 font-bold flex justify-row uppercase items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                                <p>&ensp;Appointment Schedule</p><span class="text-red-600">&nbsp;*</span>
                            </div>


                            <!-- Date and time  -->
                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                <!-- Date -->
                                <div class="relative z-0 mb-4 w-full group">
                                    <label for="date" class="block mb-2 text-sm font-semibold">Date</label>
                                    <input type="date" name="date" id="date_picker" class="bg-blue-50 border-2 font-bold border-gray-500 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-3 px-4" required/>
                                    <div id="dateInput-error"  class="text-red-500 text-center mt-2 font-medium"></div>
                                </div>

                                <!-- Time -->
                                <div class="relative z-0 mb-4 w-full group">
                                    <label for="time" class="block mb-2 text-sm font-semibold">Time</label>
                                    <input type="time" name="time" id="time" class="bg-blue-50 border-2 font-bold uppercase border-gray-500 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-3 px-4" value="09:00" required />
                                    <div id="timeInput-error"  class="text-red-500 text-center mt-2 font-medium"></div>
                                </div>
                            </div>

                            <!-- Contact Details Text -->
                            <div class="mb-3 font-bold flex justify-row uppercase items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                                <p>&ensp;Contact Details</p><span class="text-red-600">&nbsp;*</span>
                            </div>

                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                <!-- Contact Number -->
                                <div class="relative mb-3">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-1 pointer-events-none">
                                        <img src="assets\Philippines-Flag.svg" alt="Philippines Flag" class="w-10 h-10 p-1 pb-3" >
                                    </div>
                                    <input type="tel" id="phoneNumber" name="phoneNumber" maxlength="11" class="pl-12 bg-blue-50 border-2 font-bold capitalize border-gray-500 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-3 px-4" placeholder="Phone number (09X-XXXX-XXXX)" required>
                                    <div id="phoneNumber-error"  class="text-red-500 text-center mt-2 font-medium"></div>
                                </div>

                                <!-- Email Address Input -->
                                <div class="relative mb-3">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <svg class="w-6 h-6 text-gray-600 mb-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                                    </div>
                                    <input type="text" id="emailAddress" name="emailAddress" class="pl-12 bg-blue-50 border-2 font-bold border-gray-500 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-3 px-4" placeholder="Email Address">
                                    <div id="emailAddress-error"  class="text-red-500 text-center mt-2 font-medium"></div>
                                </div>

                            </div>

                            <!-- Select & Specify your concern -->
                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                <!-- Select concern -->
                                <div class="relative z-0 pt-4 w-full group">
                                    <!-- Label -->
                                    <div class="flex justify-row">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                                        </svg>
                                        <label for="concern" class="block mb-2 text-sm font-bold uppercase ">&ensp;Select your Concern&nbsp;</label>                                        
                                        <div id="select-concern-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div> 
                                    
                                    <!-- Select Concern -->
                                    <select id="concern" name="concern" class="bg-blue-50 border-2 font-bold capitalize border-gray-500 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-3 px-4">
                                        <option selected disabled value="" class="font-medium text-gray-900 text-center">-Select-</option> -->
                                        <!-- <option value="Covid">Covid</option>
                                        <option value="Non-Covid">Non - Covid</option>  -->


                                        <!-- Covid -->
                                        <optgroup label="Covid">
                                                <?php
                                                    $sql = $conn->query("SELECT * FROM patientdata WHERE patientConcern = 'Covid';") or die($conn->error);
                                                    while ($row = mysqli_fetch_assoc($sql)) {
                                                        echo '
                                                            <option value="'.$row["concernType"].'">'.$row["concernType"].'</option>
                                                        ';
                                                    }
                                                ?>
                                        </optgroup>

                                        
                                        <!-- Non covid  -->
                                        <optgroup label="Non - Covid">
                                                <?php
                                                    $sql = $conn->query("SELECT * FROM patientdata WHERE patientConcern = 'Non-Covid';") or die($conn->error);
                                                    while ($row = mysqli_fetch_assoc($sql)) {
                                                        echo '
                                                            <option value="'.$row["concernType"].'">'.$row["concernType"].'</option>
                                                        ';
                                                    }
                                                ?>
                                        </optgroup>
                                    </select>
                                    <div id="selecetConcern-error" class="text-red-500 text-center mt-2 font-medium"></div>
                                </div>

                                <input type="hidden" name="hidden-variable" id="hidden-variable">
                                <!-- Specify your concern input -->
                                <div name="" id="" class="relative z-0 mt-10 w-full group">
                                    <input id="specifyConcern" type="text" class="mt-1 bg-blue-50 border-2 font-bold capitalize border-gray-500 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-3 px-4" placeholder="Specify your concern">
                                    <div id="specifyConcern-error" class="text-red-500 text-center mt-2 font-medium"></div>
                                </div>

                                <!-- <div class="relative z-0 mt-10 w-full group" id="specifyConcernCovid" name="specifyConcernCovid">
                                    <select  class="mt-1 bg-blue-50 border-2 font-bold capitalize border-gray-500 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-3 px-4">
                                        <option selected disabled value="" class="font-medium text-gray-900 text-center">-Covid Variant-</option> -->

                                        <!-- Non covid  -->
                                        <!-- <?php
                                        //     $sql = $conn->query("SELECT * FROM patientdata WHERE patientConcern = 'Covid Variant';") or die($conn->error);
                                        //     while ($row = mysqli_fetch_assoc($sql)) {
                                        //         echo '
                                        //             <option value="'.$row["covidVariant"].'">'.$row["covidVariant"].'</option>
                                        //         ';
                                        //     }
                                        // ?>
                                    </select>    -->
                                <!-- </div> -->
                       
                            
                            </div>

                            <!-- Hospital Details Text -->
                            <div class="pt-4 font-bold flex justify-row uppercase items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-orange-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />
                                </svg>
                                <p>&ensp;Hospital Details</p><span class="text-red-600">&nbsp;*</span>
                            </div>

                            <!-- Hospital Name and City  -->
                            <div class="grid xl:grid-cols-2 xl:gap-6">
                                <!-- Hospital Name -->
                                <div class="relative z-0 mt-2 mb-6 w-full group">
                                    <input type="text" name="hospitalName" id="hospitalName" class="bg-blue-50 border-2 font-bold capitalize border-gray-500 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-3 px-4" placeholder="" value="<?php echo $hospitalName ?>" disabled />
                                </div>

                                <!-- Bed or Room -->
                                <div class="relative mt-2 z-0 w-full group">

                                    <!-- <div class="flex justify-row">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                                        </svg>
                                        <label for="concern" class="block mb-2 text-sm font-medium text-gray-900">Select your Reservation Type</label><span class="text-red-600">&nbsp;*</span>
                                    </div>  -->

                                    <select id="reservationType" name="reservationType" class="bg-blue-50 border-2 font-bold capitalize border-gray-500 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-3 px-4" >
                                        <option selected disabled value="" class="font-medium text-gray-900">-Select your Reservation Type-</option>
                                            
                                            <?php 
                                                if ($bedSlot > 0) {
                                                echo '<option value="bed">Bed</option>';
                                                }

                                                if ($roomSlot > 0) {
                                                echo '<option value="room">Room</option>';
                                                }
                                            ?>     
                                    </select>
                                    <div id="reservationType-error" class="text-red-500 text-center mt-2 font-medium"></div>    
                                </div>
                                
                            </div>

                            <!-- Hospital Referral -->
                            <div>
                                <?php
                                if($referral == "Yes"){
                                    echo '
                                        <div class="flex flex-col lg:flex-row lg:items-center mb-2">
                                            <label class="block text-gray-900 text-sm font-bold uppercase mb-1 lg:mb-0" for="user_avatar">Attachment for Referral<span class="text-red-600">&nbsp;*</span></label>
                                            <p>&nbsp;This Hospital requires a proof of your referral certificate from your last hospital. Please attach a clear copy.</p>
                                        </div>
                                        <input class="block w-full text-md text-gray-900 bg-blue-50 rounded-lg border-2 border-gray-500 cursor-pointer focus:outline-none focus:border-transparent" id="referralFilesInput" type="file" multiple>
                                        <div id="referralFiles-error" class="text-red-500 text-center mt-2 font-medium"></div>
                                        ';
                                    }else {
                                        echo '';
                                    }
                                ?>

                                <input type="hidden" name="" id="referral-placeholder" value="<?php echo $referral ?>">
                            </div>
                            

                            <!-- <div class="flex flex-rows">
                                <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar">Attachment for Referal</label><span class="text-red-600">&nbsp;*</span>
                            </div>
                            <input class="block w-full text-sm text-gray-900 bg-blue-50 rounded-lg border border-gray-400 cursor-pointer focus:outline-none focus:border-transparent " aria-describedby="user_avatar_help" id="user_avatar" type="file"> -->


                            <div class="flex justify-end justify-row">
                                <button type="button" name="btnBookingNow" id="btnBookingNow" class="w-40 bg-gray-900 p-3 mt-3 mr-2 rounded-lg text-white flex justify-center items-center hover:bg-gray-800 text-md font-semibold tracking-wide">Continue&nbsp; <i class="bi bi-box-arrow-in-right font-bold"></i></button>
                            </div>
                        </div> 
                    </form>
                </div>

                <!-- Login or signup for booking form -->
                <form action="user-login?listingID=<?php echo $listingID ?>" method="post" id="login-for-booking" class="h-52 py-16"> 
                    <div class="flex flex-col items-center justify-center">
                        <p class="mb-4 text-gray-900 text-lg">You need to be <b>Logged in</b> first before you can book a reservation.</p>
                        <button type="submit" name="booking-login" id="booking-login" class="w-40 bg-gray-900 p-4 rounded-md text-white flex justify-center items-center hover:bg-gray-800 text-md uppercase font-semibold tracking-wide">Login</button>
                    </div> 
                </form>
            </div>

            <!-- Alert Modal -->
            <div id="alertModal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-gray-900 rounded-lg shadow">
                        <!-- Modal header -->
                        <div class="flex justify-end p-2">
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 pt-0 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 w-14 h-14 text-yellow-400" stroke="currentColor" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                            <!-- <svg class="mx-auto mb-4 w-14 h-14 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> -->
                            <h3 class="mb-5 text-lg font-normal text-gray-300">You can't choose the date today! </h3>
                            <!-- <button data-modal-toggle="alertModal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Yes, I'm sure
                            </button> -->
                            <button data-modal-toggle="alertModal" type="button" class="hidden text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Close</button>
                            <button type="button" class="text-gray-400 bg-gray-900 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10" onclick="btnClose()">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Review Details Modal -->
            <div id="reviewDetailsModal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative rounded-lg shadow bg-gray-900">
                        <!-- Modal header -->
                        <div class="flex justify-center items-center text-center pt-10">
                            <h3 class="text-xl font-medium text-white flex items-center tracking-wide">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>
                                &ensp;Double-check the Information you provided before proceeding.
                            </h3>
                        </div>

                        <!-- Modal body -->
                        <div class="px-24 py-10 space-y-6 text-gray-200" id="booking-modal-body">
                            <!-- Patiend Details -->
                            <div class="uppercase font-bold flex justify-row items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                                <p class="text-blue-500 text-lg">&ensp;Patient name</p>
                            </div>
                            
                            <!-- First name and Last name -->
                            <div class="grid grid-cols-2 gap-6 mb-6">
                                <!-- First name -->
                                <div class="relative z-0 w-full group flex justify-row items-center text-lg">
                                    <p class="font-semibold">&nbsp;</p>
                                    <p id="firstnameContainer" class="capitalize">First name</p>
                                </div>
                                <!-- Last name -->
                                <div class="relative z-0 w-full group flex justify-row items-center text-lg">
                                    <p class="font-semibold">&nbsp;</p>
                                    <p id="lastnameContainer" class="capitalize">Last name</p>
                                </div>
                            </div>

                            <!-- Appointment Schedule -->
                            <div class="uppercase font-bold flex justify-row items-center">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg> -->
                                <p class="text-blue-500 text-lg">Appointment Schedule</p>
                            </div>

                            <!-- Date and TIme -->
                            <div class="grid grid-cols-2 gap-6">
                                <!-- Date -->
                                <div class="relative z-0 w-full group flex justify-row items-center text-lg">
                                    <p class="font-semibold"><i class="bi bi-calendar-event"></i> &nbsp;</p>
                                    <p id="dateContainer" class="capitalize">Date</p>
                                </div>
                                <!-- Time-->
                                <div class="relative z-0 w-full group flex justify-row items-center text-lg">
                                    <p class="font-semibold"><i class="bi bi-clock"></i> &nbsp;</p>
                                    <p id="timeContainer" class="capitalize">Time</p>
                                </div>
                            </div>

                             <!-- Contact Details -->
                            <div class="uppercase font-bold flex justify-row items-center">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg> -->
                                <p class="text-blue-500 text-lg">Contact Details</p>
                            </div>

                            <!-- Phone number and Email -->
                            <div class="grid grid-cols-2 gap-6">
                                <!-- Phone number -->
                                <div class="relative z-0 w-full group flex justify-row items-center text-lg">
                                    <p class="font-semibold"><i class="bi bi-telephone"></i> &nbsp;</p>
                                    <p id="phoneNuberContainer" class="capitalize">Phone Number</p>
                                </div>
                                <!-- Email-->
                                <div class="relative z-0 w-full group flex justify-row items-center text-lg">
                                    <p class="font-semibold"><i class="bi bi-envelope"></i> &nbsp;</p>
                                    <p id="emailContainer" class="">Email</p>
                                </div>
                            </div>

                            <!-- selected concern -->
                            <div class="uppercase font-bold flex justify-row items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                                <p class="text-blue-500 text-lg">&ensp;Selected concern</p>
                            </div>

                            <!-- Concern and Speciy concern -->
                            <div class="grid grid-cols-2 gap-6">
                                <!-- Concern -->
                                <div class="relative z-0 w-full group flex justify-row items-center text-lg">
                                    <p class="font-semibold">&nbsp;</p>
                                    <p id="selectConcernContainer" class="capitalize">Concern</p>
                                </div>
                                <!--  Speciy concern-->
                                <div class="relative z-0 w-full group flex justify-row items-center text-lg">
                                    <p class="font-semibold">&nbsp;</p>
                                    <p id="specifyConcernContainer" class="capitalize"></p>
                                </div>
                            </div>

                            <!-- Hospital Details -->
                            <div class="uppercase font-bold flex justify-row items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                <p class="text-blue-500 text-lg">&ensp;Hospital Details</p>
                            </div>

                            <!-- Hospital Name and Reservation Type -->
                            <div class="grid grid-cols-2 gap-6">
                                <!-- Hospital Name -->
                                <div class="relative z-0 w-full group flex justify-row items-center text-lg">
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg> -->
                                    <p class="font-semibold">&nbsp;</p>
                                    <p id="hospitalNameContainer" class="">Hospital Name</p>
                                </div>
                                <!-- Reservation Type-->
                                <div class="relative z-0 w-full group flex justify-row items-center text-lg">
                                    <p class="font-semibold"><i class="bi bi-file-medical"></i> &nbsp;</p>
                                    <p id="reservationTypeContainer" class="">Reservation Type</p>
                                </div>
                            </div>

                        </div>

                        <!-- Modal footer -->
                        <div class="flex justify-end items-center p-6 space-x-4 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <button class="hidden" data-modal-toggle="reviewDetailsModal"></button>
                            <!-- Loading Message -->
                            <div class="animate-pulse flex items-center text-lg" style="display: none;" id="reservation-loader">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                                    <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                                  </svg>
                                  &ensp;<p>Your Reservation is being submitted..</p>
                            </div>
                            <button id="cancelButton" name="cancelButton" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 mr-2 mb-2">Cancel</button>
                            <button id="submitButton" name="submitButton" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>


    <!-- FLOWBITE CDN -->
    <script src="node_modules\flowbite\dist\flowbite.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>

    <?php include_once 'includes/footer.php'; ?>

    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <!-- Tippy JS -->
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>

    <!-- Light Gallery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>
    
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApEvr9yiQv-yXwXp2HRpzyW5HXwB18BxE&libraries=places"></script>

    <!-- Hospital Overview JS -->
    <script src="js\hospital-overview.js" defer></script>
</body>
</html>