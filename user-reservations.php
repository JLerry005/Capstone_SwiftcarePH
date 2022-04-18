<?php
    session_start();
    require_once 'includes/dbh-inc.php';

    if (!isset($_SESSION["sessionpatientUserID"])) {
        header("location: user-login");
    }

    $userID = $_SESSION["sessionpatientUserID"];
    // $userID = $_SESSION["sessionPatientPhoneNumber"];
    // $userID = $_SESSION["sessionPatientFirstName"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Flowbite minified stylesheet -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.3.4/dist/flowbite.min.css"/>
    <!--lightGallery CSS CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <!-- TAILWIND CSS Link -->
    <link rel="stylesheet" href="dist\output.css">
    <!-- CSS Link -->
    <link rel="stylesheet" href="styling/_pending-booking-details.css">
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <!-- Remix Icon CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- TITLE -->
    <title>Reservations | SwiftCare PH</title>
    <!-- JQUERY LINK -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- HEADER ICON -->
    <link rel="icon" href="assets/main-logo-line.png" type="image/x-icon">
</head>
<body class="bg-gray-900 font-poppins text-gray-200 text-sm">

    <input type="hidden" name="userID" id="userID" value="<?php echo $userID ?>">
    
    <div class="container mx-auto flex flex-col space-y-10 py-5 px-5 relative min-h-screen" id="main-container">
        <!-- nav links -->
        <div class="flex items-center justify-between mb-10 mt-3">
            <div class="hover:bg-gray-700 bg-gray-800 p-2 rounded-lg cursor-pointer transition-all">
                <a href="user-dashboard" class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                      </svg>
                    &ensp;My Dashboard
                </a>
            </div>

            <div class="hover:bg-gray-700 bg-gray-800 p-2 rounded-lg cursor-pointer transition-all">
                <a href="index" class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                      </svg>
                    &ensp;Home
                </a>
            </div>
        </div>

        <!-- contents container -->
        <div class="pb-52" id="contents-container">

            <!-- Main Menus -->
            <div id="main-menus" class="space-y-10" style="display: none;">
                <div class="">
                    <h1 class="text-blue-500 text-lg font-bold">Manage Your Reservations</h1>
                </div>
                <!-- Buttons -->
                <div class="space-y-5">
                    <!-- Pending Reservations Button -->
                    <div id="pending-button" class="flex justify-between p-6 bg-gray-800 hover:bg-gray-700 transition-all rounded-lg drop-shadow-lg hover:cursor-pointer">
                        <div class="md:flex items-start space-x-4">
                            <!-- <p class="text-xs text-gray-400">You have <b>4</b> Pending Request</p> -->
                            <div class="hidden md:block">
                                <img src="assets/reservations-images/hourglass.png" alt="" class="w-16 ml-2">
                            </div>
                            <div class="space-y-6">
                                <p class="text-2xl font-bold">PENDING RESERVATIONS</p>
                                <p class="text-gray-500">Manage your Pending Reservations.</p>
                            </div>
                        </div>
                        
                        <div class="flex flex-col justify-between">
                            <div>
                                <!-- <i class="bi bi-hourglass-top text-4xl"></i> -->
                                <!-- <img src="assets/reservations-images/hourglass.png" alt="" class="w-10"> -->
                                <h1 class="text-4xl font-bold hover:underline cursor-pointer" id="pending-count"></h1>
                            </div>
                        
                            <div class=""> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:underline hover:text-gray-500 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
        
                    <!-- Upcoming Reservations Button -->
                    <div id="upcoming-button" class="flex justify-between p-6 bg-gray-800 hover:bg-gray-700 transition-all rounded-lg drop-shadow-lg hover:cursor-pointer">
                        <div class="md:flex items-start space-x-4">
                            <!-- <p class="text-xs text-gray-400">You have <b>4</b> Pending Request</p> -->
                            <div class="hidden md:block">
                                <img src="assets/reservations-images/calendar.png" alt="" class="w-16">
                            </div>
                            <div class="space-y-6">
                                <p class="text-2xl font-bold">UPCOMING RESERVATIONS</p>
                                <p class="text-gray-500">Manage your Upcoming Reservations.</p>
                            </div>
                        </div>
                        
                        <div class="flex flex-col justify-between">
                            <div>
                                <!-- <i class="bi bi-hourglass-top text-4xl"></i> -->
                                <!-- <img src="assets/reservations-images/hourglass.png" alt="" class="w-10"> -->
                                <h1 class="text-4xl font-bold hover:underline cursor-pointer" id="upcoming-count"></h1>
                            </div>
                        
                            <div class=""> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:underline hover:text-gray-500 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
        
                    <!-- Reservations History Reservations Button -->
                    <div id="history-button" class="flex justify-between p-6 bg-gray-800 hover:bg-gray-700 transition-all rounded-lg drop-shadow-lg hover:cursor-pointer">
                        <div class="md:flex items-start space-x-4">
                            <!-- <p class="text-xs text-gray-400">You have <b>4</b> Pending Request</p> -->
                            <div class="hidden md:block">
                                <img src="assets/reservations-images/history.png" alt="" class="w-16">
                            </div>
                            <div class="space-y-6">
                                <p class="text-2xl font-bold">RESERVATIONS HISTORY</p>
                                <p class="text-gray-500">View your Reservations History.</p>
                            </div>
                        </div>
                        
                        <div class="flex flex-col justify-between">
                            <div>
                                <!-- <i class="bi bi-hourglass-top text-4xl"></i> -->
                                <!-- <img src="assets/reservations-images/hourglass.png" alt="" class="w-10"> -->
                                <h1 class="text-4xl font-bold hover:underline cursor-pointer" id="history-count"></h1>
                            </div>
                        
                            <div class=""> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:underline hover:text-gray-500 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Reservations Content -->
            <div id="pending-contents" style="display: none;">
                <div id="pending-back" class="mb-10">
                    <button class="hover:underline btn-back-to-menu" id="" onclick="back()">
                        <i class="bi bi-arrow-left-circle"></i> Back</a>
                    </button> 
                    
                    
                </div>
                
                <p class="text-blue-500 font-bold text-lg"><i class="bi bi-hourglass-top text-gray-300"></i>&ensp;Pending Reservations</p>
                <div>
                    <!-- Pending Cards Container -->
                    <div class="px-5 py-5 lg:grid grid-cols-12 gap-4" id="pending-cards-container">
                        
                        <!-- Cards -->
                        <!-- <div onclick="" class="text-xs md:text-sm md:col-span-12 lg:col-span-4 bg-blue-600 rounded-lg text-gray-400 hover:scale-105 hover:drop-shadow-md hover:cursor-pointer transition duration-100 ease-out"> 
                            <div class="p-2 pt-3 sm:p-4 flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <a href="#" class="bg-blue-700 hover:bg-blue-800 rounded-full w-fit py-0.5 px-2 text-white flex items-center capitalize">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4 mr-1"><path fill="none" d="M0 0H24V24H0z"/><path d="M2 21v-2h2V4.835c0-.484.346-.898.821-.984l9.472-1.722c.326-.06.638.157.697.483.007.035.01.07.01.107v1.28L19 4c.552 0 1 .448 1 1v14h2v2h-4V6h-3v15H2zM13 4.396L6 5.67V19h7V4.396zM12 11v2h-2v-2h2z" fill="rgba(255,255,255,1)"/></svg>Bed
                                    </a>
                                    <a href="#" class="flex items-center bg-white hover:bg-gray-300 cursor-pointer rounded-full py-0.5 px-2 w-fit text-blue-700 font-bold">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4 mr-1 ="><path fill="none" d="M0 0H24V24H0z"/><path d="M8 3v2H6v4c0 2.21 1.79 4 4 4s4-1.79 4-4V5h-2V3h3c.552 0 1 .448 1 1v5c0 2.973-2.162 5.44-5 5.917V16.5c0 1.933 1.567 3.5 3.5 3.5 1.497 0 2.775-.94 3.275-2.263C16.728 17.27 16 16.22 16 15c0-1.657 1.343-3 3-3s3 1.343 3 3c0 1.371-.92 2.527-2.176 2.885C19.21 20.252 17.059 22 14.5 22 11.462 22 9 19.538 9 16.5v-1.583C6.162 14.441 4 11.973 4 9V4c0-.552.448-1 1-1h3zm11 11c-.552 0-1 .448-1 1s.448 1 1 1 1-.448 1-1-.448-1-1-1z" fill="rgba(26,86,219,1)"/></svg>Covid
                                    </a>
                                </div>
                                
                                <a href="#" class="flex items-center text-blue-300">
                                    <i class="bi bi-clock-history hover:text-blue-500"></i> &nbsp;March 10, 2020
                                </a>
                            </div>
            
                            <a href="#" class="mb-2 px-4 flex items-center space-x-3">
                                <img src="https://avatars.dicebear.com/api/big-smile/'.$firstName.''.$lastName.'.svg?b=%231a56bb&r=50" alt="" srcset="" class="w-10">
                                <h1 class="text-lg font-bold text-white capitalize">John Doe</h1>
                            </a>
                            <div class="flex items-start justify-between px-4">
                                <div class="text-sm font-light pb-4 text-blue-200">
                                    <p class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 hover:text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                        '.$date.'
                                    </p>
                                    <p class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 hover:text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                        </svg>
                                        '.$time.'
                                    </p>
                                    <p class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 hover:text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                        </svg>
                                        '.$contactNumber.'
                                    </p>
            
                                </div>
                            </div>
            
                            <div class="bg-blue-700 p-4 rounded-b-lg flex justify-between">
                                <div class="px-2 bg-blue-600 rounded-lg">
                                    <p class="text-blue-200">Status: <b>Pending <i class="bi bi-hourglass-top"></i></b></p>
                                </div>
                                
                                <a href="#" class="text-white hover:text-blue-200 hover:underline flex items-center">
                                    View Full Details&ensp;
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>

            <!-- Upcoming Reservations Content -->
            <div id="upcoming-contents" style="display: none;">
                <div class="mb-10">
                    <button class="hover:underline btn-back-to-menu" id="" onclick="back()">
                        <i class="bi bi-arrow-left-circle"></i> Back</a>
                    </button> 
                </div>

                <p class="flex items-center text-blue-500 font-bold text-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6"><path fill="none" d="M0 0h24v24H0z"/><path d="M17 3h4a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h4V1h2v2h6V1h2v2zm-2 2H9v2H7V5H4v4h16V5h-3v2h-2V5zm5 6H4v8h16v-8zM6 14h2v2H6v-2zm4 0h8v2h-8v-2z" fill="rgba(195,221,253,1)"/></svg>     
                    &ensp;Upcoming Reservations
                </p>

                <!-- Upmcoming Cards Container -->
                <div class="px-5 py-5 lg:grid grid-cols-12 gap-4" id="upcoming-cards-container">

                    <!-- Cards -->
                    <div class="text-xs md:text-sm md:col-span-12 lg:col-span-4 bg-blue-600 rounded-lg text-gray-400 hover:scale-105 hover:drop-shadow-md hover:cursor-pointer transition duration-100 ease-out"> 
                        <div class="bg-blue-700 p-2 rounded-t-lg">
                            <p class="flex items-center cursor-default py-0.5 px-2 w-fit text-blue-50 font-medium tracking-wider">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 mr-2"><path fill="none" d="M0 0H24V24H0z"/><path d="M17 2v2h3c.552 0 1 .448 1 1v16c0 .552-.448 1-1 1H4c-.552 0-1-.448-1-1V5c0-.552.448-1 1-1h3V2h10zM7 6H5v14h14V6h-2v2H7V6zm6 5v2h2v2h-2.001L13 17h-2l-.001-2H9v-2h2v-2h2zm2-7H9v2h6V4z" fill="rgba(0,0,0,1)"/></svg>SCPHRES149206
                            </p>
                        </div>
                        <div class="p-2 pt-3 sm:p-4 flex items-center justify-between">
                            <div class="flex items-center space-x-1 sm:space-x-3">
                                <a href="#" class="bg-gray-900 hover:bg-blue-800 rounded-full w-fit py-0.5 px-2 text-white flex items-center capitalize">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4 mr-1"><path fill="none" d="M0 0H24V24H0z"/><path d="M2 21v-2h2V4.835c0-.484.346-.898.821-.984l9.472-1.722c.326-.06.638.157.697.483.007.035.01.07.01.107v1.28L19 4c.552 0 1 .448 1 1v14h2v2h-4V6h-3v15H2zM13 4.396L6 5.67V19h7V4.396zM12 11v2h-2v-2h2z" fill="rgba(255,255,255,1)"/></svg>Room
                                </a>
                                <a href="#" class="flex items-center bg-white hover:bg-gray-300 cursor-pointer rounded-full py-0.5 px-2 w-fit text-gray-900 font-bold truncate">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4 mr-1"><path fill="none" d="M0 0H24V24H0z"/><path d="M8 3v2H6v4c0 2.21 1.79 4 4 4s4-1.79 4-4V5h-2V3h3c.552 0 1 .448 1 1v5c0 2.973-2.162 5.44-5 5.917V16.5c0 1.933 1.567 3.5 3.5 3.5 1.497 0 2.775-.94 3.275-2.263C16.728 17.27 16 16.22 16 15c0-1.657 1.343-3 3-3s3 1.343 3 3c0 1.371-.92 2.527-2.176 2.885C19.21 20.252 17.059 22 14.5 22 11.462 22 9 19.538 9 16.5v-1.583C6.162 14.441 4 11.973 4 9V4c0-.552.448-1 1-1h3zm11 11c-.552 0-1 .448-1 1s.448 1 1 1 1-.448 1-1-.448-1-1-1z" fill="rgba(17,24,39)"/></svg>Non-Covid
                                </a>
                            </div>
                            
                            <p class="flex items-center text-white ml-1">
                                <i class="bi bi-clock-history hover:text-blue-500"></i> &nbsp;April 25, 2022
                            </p>
                        </div>
        
                        <div class="mb-2 px-4 flex items-center space-x-3">
                            <img src="https://avatars.dicebear.com/api/big-smile/'.$firstName.'.svg?b=%23111827&r=50&scale=93" alt="" srcset="" class="w-10">
                            <h1 class="text-lg font-bold text-white capitalize">Son Goku</h1>
                        </div>
                        <div class="flex items-start justify-between px-4 text-white">
                            <div class="text-sm font-light pb-4">
                                <p class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 hover:text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                    </svg>
                                    '.$date.'
                                </p>
                                <p class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 hover:text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                    '.$time.'
                                </p>
                                <p class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 hover:text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                    </svg>
                                    '.$contactNumber.'
                                </p>
        
                            </div>
                        </div>
        
                        <div class="bg-blue-700 p-4 rounded-b-lg flex justify-between">
                            <div class="px-2 bg-blue-600 rounded-lg">
                                <p class="text-blue-200">Status: <b>Upcoming <i class="bi bi-hourglass-top"></i></b></p>
                            </div>
                            
                            <a href="#" class="text-white hover:text-blue-200 hover:underline flex items-center">
                                View Full Details&ensp;
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reservastions History Content -->
            <div id="history-contents" style="display: none;">
                <div class="mb-10">
                    <button class="hover:underline btn-back-to-menu" id="" onclick="back()">
                        <i class="bi bi-arrow-left-circle"></i> Back</a>
                    </button> 
                </div>
            
                <p class="text-blue-500 font-bold text-lg mb-5"><i class="bi bi-clock-history text-gray-300"></i>&ensp;Reservations History</p>
                
                <!-- History Cards Container -->
                <div class="px-5 lg:grid grid-cols-12 gap-4" id="completed-cards-container">

                </div>
            </div>
        </div>
        
        

        <!-- Footer -->
        <div class="absolute bottom-0 pb-10 left-0 right-0 2xl:hidden">
            <p class="text-center text-slate-400 text-xs">© <a href="#" class="hover:underline">Swiftcare PH</a>  2022 | All Rights Reserved.</p>
        </div>

        <div class="absolute bottom-0 pb-10 left-0 right-0 hidden 2xl:block">
            <p class="text-center text-slate-400 text-xs">© <a href="#" class="hover:underline">Swiftcare PH</a>  2022 | All Rights Reserved.</p>
        </div>
    </div>

    <!-- Full PEnding Details Modal -->
    <div id="full-details-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative rounded-lg shadow bg-blue-800">
                <button class="hidden" data-modal-toggle="full-details-modal"></button>
                <!-- Modal header -->
                <div class="flex justify-center items-center text-center pt-10 space-x-2">
                    <img src="assets/reservations-images/calendar.png" alt="" class="w-8">
                    <h1 class="font-bold md:text-2xl">Full Booking Details</h1>
                </div>

                <!-- Modal body -->
                <div class="px-5 py-10 space-y-6 text-gray-200" id="details-modal-body">
                    <!-- For Mobile -->
                    <div class="md:hidden space-y-7">
                        <!-- Timestamp -->
                        <div class="flex justify-end mb-10">
                            <p class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                &ensp;March 10, 2022
                            </p>
                        </div>
                        <!-- Status -->
                        <div class="flex items-start space-x-5">
                            <div>
                                <img src="assets/reservations-images/status.png" alt="" class="w-10">
                            </div>

                            <div class="">
                                <div class="mb-4">
                                    <h1 class="text-slate-400">Status</h1>
                                    <h1 class="font-bold text-lg">Pending For Review</h1>
                                </div>
                            </div>
                        </div>

                        <!-- First and Last Name -->
                        <div class="flex items-start space-x-5"> 
                            <div>
                                <img src="https://avatars.dicebear.com/api/big-smile/'.$firstName.''.$lastName.'.svg?b=%231a56bb&r=50" alt="" class="w-10">
                            </div> 

                            <div class="flex items-start space-x-5">
                                <!-- Firstname -->
                                <div class="mb-4">
                                    <h1 class="text-slate-400">Firstname</h1>
                                    <h1 class="font-bold text-lg">Larry</h1>
                                </div>

                                <!-- Lastname -->
                                <div class="mb-4">
                                    <h1 class="text-slate-400">Lastname</h1>
                                    <h1 class="font-bold text-lg">Goods</h1>
                                </div>
                            </div>
                        </div>

                        <!-- Date and Time -->
                        <div class="flex items-start space-x-5">
                            <div>
                                <img src="assets/reservations-images/schedule.png" alt="" class="w-10">
                            </div>

                            <div class="flex items-start space-x-5">
                                <!-- date -->
                                <div class="mb-4">
                                    <h1 class="text-slate-400">Date</h1>
                                    <h1 class="font-bold text-lg">2022-04-20</h1>
                                </div>

                                <!-- time -->
                                <div class="mb-4">
                                    <h1 class="text-slate-400">Time</h1>
                                    <h1 class="font-bold text-lg">09:30 AM</h1>
                                </div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start space-x-5">
                            <div>
                                <img src="assets/reservations-images/email.png" alt="" class="w-10">
                            </div>

                            <div class="">
                                <div class="mb-4">
                                    <h1 class="text-slate-400">Email</h1>
                                    <h1 class="font-bold text-lg">asd@gmail.com</h1>
                                </div>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start space-x-5">
                            <div>
                                <img src="assets/reservations-images/mobile.png" alt="" class="w-10">
                            </div>

                            <div class="">
                                <div class="mb-4">
                                    <h1 class="text-slate-400">Mobile number</h1>
                                    <h1 class="font-bold text-lg">09123456789</h1>
                                </div>
                            </div>
                        </div>

                        <!-- Concern -->
                        <div class="flex items-start space-x-5">
                            <div>
                                <img src="assets/reservations-images/stethoscope.png" alt="" class="w-10">
                            </div>

                            <div class="">
                                <div class="mb-4">
                                    <h1 class="text-slate-400">Concern</h1>
                                    <h1 class="font-bold text-lg">Non-Covid</h1>
                                </div>
                            </div>
                        </div>

                        <!-- Specify Concern -->
                        <div class="flex items-start space-x-5">
                            <div>
                                <img src="assets/reservations-images/text.png" alt="" class="w-10">
                            </div>

                            <div class="">
                                <div class="mb-4">
                                    <h1 class="text-slate-400">Concern Details</h1>
                                    <h1 class="font-medium text-sm">Lorem ipsum dolor sit amet consectetur.</h1>
                                </div>
                            </div>
                        </div>

                        <!-- hospital Name -->
                        <div class="flex items-start space-x-5">
                            <div>
                                <img src="assets/reservations-images/hospitalbuilding.png" alt="" class="w-10">
                            </div>

                            <div class="">
                                <div class="mb-4">
                                    <h1 class="text-slate-400">Hospital</h1>
                                    <h1 class="font-medium text-sm">Amang rodriguez General Hospital</h1>
                                </div>
                            </div>
                        </div>

                        <!-- Reservation Type -->
                        <div class="flex items-start space-x-5">
                            <div>
                                <img src="assets/reservations-images/bed.png" alt="" class="w-10">
                            </div>

                            <div class="">
                                <div class="mb-4">
                                    <h1 class="text-slate-400">Reservation Type</h1>
                                    <h1 class="font-medium text-lg">Bed</h1>
                                </div>
                            </div>
                        </div>

                        <!-- Attatchments -->
                        <div class="flex items-start space-x-5">
                            <div>
                                <img src="assets/reservations-images/text.png" alt="" class="w-10">
                            </div>

                            <div class="">
                                <div class="mb-4">
                                    <h1 class="text-slate-400">Referral Images Attachment</h1>
                                    <a class="font-medium text-lg hover:underline cursor-pointer">See images</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                     <!-- for MD up new -->
                    <div class="hidden md:block text-sm px-8">
                        <!-- Timestamp -->
                        <div class="flex justify-end mb-10">
                            <p class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                    </svg>
                                &ensp;March 10, 2022
                            </p>
                        </div>

                        <!-- First and Last Name -->
                        <div class="flex justify-between items-start border-dotted border-b-2 mb-14">
                            <div class="flex items-start space-x-5 mb-3"> 
                                <div>
                                    <img src="https://avatars.dicebear.com/api/big-smile/'.$firstName.''.$lastName.'.svg?b=%231a56bb&r=50" alt="" class="w-10">
                                </div> 

                                <div class="flex items-start space-x-3">
                                    <!-- Firstname -->
                                    <div class="mb-4">
                                        <h1 class="text-slate-400">Full Name</h1>
                                        <h1 class="font-bold text-md md:text-xl">Larry Goods</h1>
                                    </div>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="flex items-start space-x-5 mb-3">
                                <div>
                                    <img src="assets/reservations-images/status.png" alt="" class="w-10">
                                </div>

                                <div class="">
                                    <div class="mb-4">
                                        <h1 class="text-slate-400">Status</h1>
                                        <h1 class="font-bold text-md md:text-xl">Pending For Review</h1>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- First Row -->
                        <div class="flex items-start justify-between space-x-20 mb-5">
                            <!-- hospital name -->
                            <div class="flex items-start space-x-2 mb-3 border-dotted border-b-2 shrink">
                                <div>
                                    <img src="assets/reservations-images/hospitalbuilding.png" alt="" class="w-8">
                                </div>
                                <div class="">
                                    <div class="mb-4">
                                        <h1 class="text-slate-400">Hospital</h1>
                                        <h1 class="font-bold text-sm">Amang rodriguez General hospital</h1>
                                    </div>
                                </div>
                            </div>

                            <!-- Reservation Type -->
                            <div class="flex items-start space-x-2 mb-3 border-dotted border-b-2 shrink-0">
                                <div>
                                    <img src="assets/reservations-images/bed.png" alt="" class="w-8">
                                </div>
                                <div class="">
                                    <div class="mb-4">
                                        <h1 class="text-slate-400">Reservation Type</h1>
                                        <h1 class="font-bold text-sm">Bed</h1>
                                    </div>
                                </div>
                            </div>

                            <!-- Concern -->
                            <div class="flex items-start space-x-2 mb-10 border-dotted border-b-2 shrink-0">
                                <div>
                                    <img src="assets/reservations-images/stethoscope.png" alt="" class="w-8">
                                </div>
                                <div class="">
                                    <div class="mb-4">
                                        <h1 class="text-slate-400">Concern</h1>
                                        <h1 class="font-bold text-sm">Covid</h1>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Second Row -->
                        <div class="flex items-start justify-between space-x-20 mb-5">
                            <!-- Date -->
                            <div class="flex items-start space-x-2 mb-3 border-dotted border-b-2 shrink-0">
                                <div>
                                    <img src="assets/reservations-images/calendar.png" alt="" class="w-8">
                                </div>
                                <div class="">
                                    <div class="mb-4">
                                        <h1 class="text-slate-400">Date</h1>
                                        <h1 class="font-bold text-sm">2022-04-20</h1>
                                    </div>
                                </div>
                            </div>

                            <!-- Time -->
                            <div class="flex items-start space-x-2 mb-3 border-dotted border-b-2 shrink-0">
                                <div>
                                    <img src="assets/reservations-images/hourglass.png" alt="" class="w-8">
                                </div>
                                <div class="">
                                    <div class="mb-4">
                                        <h1 class="text-slate-400">Time</h1>
                                        <h1 class="font-bold text-sm">09:30 AM</h1>
                                    </div>
                                </div>
                            </div>

                             <!-- Email -->
                             <div class="flex items-start space-x-2 mb-10 border-dotted border-b-2 shrink-0">
                                <div>
                                    <img src="assets/reservations-images/email.png" alt="" class="w-8">
                                </div>
                                <div class="">
                                    <div class="mb-4">
                                        <h1 class="text-slate-400">Email</h1>
                                        <h1 class="font-bold text-sm">asd@gmail.com</h1>
                                    </div>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="flex items-start space-x-2 mb-10 border-dotted border-b-2 shrink-0">
                                <div>
                                    <img src="assets/reservations-images/mobile.png" alt="" class="w-8">
                                </div>
                                <div class="">
                                    <div class="mb-4">
                                        <h1 class="text-slate-400">Mobile number</h1>
                                        <h1 class="font-bold text-sm">09123456789</h1>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Third Row -->
                        <div class="flex items-start justify-between space-x-5">
                            <!-- Attatchments -->
                            <div class="flex items-start space-x-5 mb-10 border-dotted border-b-2">
                                <div>
                                    <img src="assets/reservations-images/attachments.png" alt="" class="w-10">
                                </div>

                                <div class="">
                                    <div class="mb-4">
                                        <h1 class="text-slate-400">Referral Attachment</h1>
                                        <a class="font-medium text-md hover:underline cursor-pointer">See images</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Concern Details -->
                            <div class="flex items-start space-x-2 mb-10 border-dotted border-b-2">
                                <div>
                                    <img src="assets/reservations-images/text.png" alt="" class="w-8">
                                </div>
                                <div class="">
                                    <div class="mb-4">
                                        <h1 class="text-slate-400">Concern Details</h1>
                                        <h1 class="font-bold text-sm">Lorem ipsum dolor sit, amet dolor. Lorem ipsum dolor sit, amet dolor.</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="flex justify-center items-center p-6 space-x-4 rounded-b">
                    
                    <button id="cancelButton" name="cancelButton" type="button" class="flex items-center rounded-full bg-white text-blue-600 hover:bg-blue-300 py-2 px-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                        &ensp;Close
                    </button>
                </div>
            </div>
        </div>
    </div> 

    
    <!-- Full upcoming Details Modal -->
    <div id="upcoming-details-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative rounded-lg shadow bg-blue-800">
                <button class="hidden" data-modal-toggle="upcoming-details-modal"></button>
                <!-- Modal header -->
                <div class="flex justify-center items-center text-center pt-10 space-x-2">
                    <img src="assets/reservations-images/calendar.png" alt="" class="w-8">
                    <h1 class="font-bold md:text-2xl">Full Booking Details</h1>
                </div>

                <!-- Modal body -->
                <div class="px-5 py-10 space-y-6 text-gray-200" id="upcoming-modal-body">
                    
                </div>

                <!-- Modal footer -->
                <div class="flex justify-center items-center p-6 space-x-4 rounded-b">
                    
                    <button id="upcoming-close-button" name="upcoming-close-button" type="button" class="flex items-center rounded-full bg-white text-blue-600 hover:bg-blue-300 py-2 px-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                        &ensp;Close
                    </button>
                </div>
            </div>
        </div>
    </div> 

    <!-- Full history Details Modal -->
    <div id="history-details-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative rounded-lg shadow bg-blue-800">
                <button class="hidden" data-modal-toggle="history-details-modal"></button>
                <!-- Modal header -->
                <div class="flex justify-center items-center text-center pt-10 space-x-2">
                    <img src="assets/reservations-images/calendar.png" alt="" class="w-8">
                    <h1 class="font-bold md:text-2xl">Full Booking Details</h1>
                </div>

                <!-- Modal body -->
                <div class="px-5 py-10 space-y-6 text-gray-200" id="history-modal-body">
                    
                </div>

                <!-- Modal footer -->
                <div class="flex justify-center items-center p-6 space-x-4 rounded-b">
                    
                    <button id="history-close-button" name="upcoming-close-button" type="button" class="flex items-center rounded-full bg-white text-blue-600 hover:bg-blue-300 py-2 px-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                        &ensp;Close
                    </button>
                </div>
            </div>
        </div>
    </div> 


    <!-- FLOWBITE CDN -->
    <script src="node_modules\flowbite\dist\flowbite.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>

    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <!-- Tippy JS -->
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>

    <!-- Light Gallery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>

    <!-- JavaScript Link -->
    <script src="js\user-reservations.js" defer></script>
</body>
</html>