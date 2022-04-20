<?php
    session_start();
    require_once 'includes/dbh-inc.php';

    if (!isset($_SESSION["hospitalID"])) {
        header("location: hospital-login");
    }

    $listingID = $_SESSION["listing-id"];
    
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>        

    <!-- Flowbite minified stylesheet -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.3.4/dist/flowbite.min.css"/>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="dist/output.css">
    <link rel="stylesheet" href="styling\__hospital-dashboard.css">
    <link rel="icon" href="assets/main-logo-line.png" type="image/x-icon">  
    <title>Hospital Dashboard | SwiftCare PH </title>
    <!--lightGallery CSS CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <!-- Remix Icon CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body class="bg-blue-200 font-poppins">

    <!-- Main Cointainer -->
    <div class="relative lg:flex min-h-screen bg-gray-700">

        <!-- Mobile Menu -->
        <div class="p-4 bg-gray-800 text-white flex justify-between items-center lg:hidden">
            <a href="index">Swiftcare PH</a>
            <div class="flex items-center space-x-6">
                <!-- <button class="hover:text-Yellow"><i class="bi bi-bell-fill"></i> Notifications</button> -->
                <button class="mobile-menu-button text-2xl rounded hover:text-gray-300 focus:text-gray-300"><i class="bi bi-menu-button-wide"></i></button>
            </div>
            
        </div>

        <!-- Sidebar -->
        <div class="z-10 sidebar-container fixed inset-y-0 left-0 transfrom -translate-x-full lg:sticky lg:translate-x-0 transition duration-200 ease-in-out flex flex-col justify-between bg-gray-900 py-8 h-screen w-52 xl:w-64">
            <div class="sideBar relative text-white space-y-5 text-center">
                <a href="index" class="font-bold text-2xl mx-6 hover:text-gray-300"><i class="bi bi-activity text-blue-500"></i>&ensp;Swiftcare PH</a>
                <div class="py-1 mx-6">
                    <hr class="border-slate-600">
                </div>
                
    
                <nav class="flex flex-col items-start text-md">
                    <button class="flex flex-row btn w-full text-left p-3 transition duration-150 hover:bg-blue-50 text-white hover:text-white nav-btn btn-dashboard pl-10 drop-shadow-md" id="btn-dashboard" onclick="show_dashboard()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"/><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                        </svg>
                        &emsp;Dashboard
                    </button>
                    <button class="btn w-full text-left p-3 transition duration-150 hover:bg-blue-50 text-white hover:text-white nav-btn pl-10 drop-shadow-xl" id="btn-account" onclick="show_details()"><i class="bi bi-gear-fill text-blue-500"></i>&emsp;Edit Details</button>
                    <button class="btn w-full text-left p-3 transition duration-150 hover:bg-blue-50 text-white hover:text-white nav-btn pl-10 drop-shadow-xl" id="btn-account" onclick="show_account()"><i class="bi bi-person-circle text-blue-500"></i>&emsp;Account</button>
                </nav>

            </div>

            <div>  
                <div class="p-2 mx-6 rounded-md">
                    <h1 class="text-white font-bold uppercase text-center"><?php echo $_SESSION["hospitalName"]; ?></h1>
                </div>
                <hr class="my-5 mx-6 border-slate-600">

                <div class="bg-red-600 hover:bg-red-800 p-2 rounded-md mx-6 text-center">
                    <a href="includes/hospital-logout" class="w-full rounded-lg transition duration-150 text-white hover:underline" id="btn-account"><i class="bi bi-arrow-bar-left"></i>&ensp;Logout</a>
                </div>
                
            </div> 
        </div>

        <!-- Contents Container -->
        <div class="p-5 bg-blue-50 min-h-screen flex-1 content-container" id="content-container">
            <!-- Skeleton Loader -->
            <div class="h-screen" id="skeleton-loader">
                <div class="grid grid-cols-12 grow p-8 gap-x-10 gap-y-5">
                    <div class="animate-pulse col-span-4 h-80 bg-gray-300"></div>
                    <div class="animate-pulse col-span-4 h-80 bg-gray-300"></div>
                    <div class="mb-10 animate-pulse col-span-4 h-80 bg-gray-300"></div>

                    <div class="animate-pulse col-span-6 h-16 bg-gray-300"></div>
                    <div class="animate-pulse col-span-6 h-16 bg-gray-300"></div>
                    <div class="animate-pulse col-span-12 h-16 bg-gray-300"></div>
                    <div class="animate-pulse col-span-3 h-16 bg-gray-300"></div>
                    <div class="animate-pulse col-span-3 h-16 bg-gray-300"></div>
                    <div class="animate-pulse col-span-6 h-16 bg-gray-300"></div>
                    <div class="animate-pulse col-span-12 h-16 bg-gray-300"></div>
                    <div class="animate-pulse col-span-12 h-16 bg-gray-300"></div>
                    <div class="animate-pulse col-span-12 h-16 bg-gray-300"></div>
                </div>
            </div>

            <!-- DASHBOARD CONTENT -->
            <div class="tab-contents mainContainer block text-gray-700 space-y-12" id="dashboardContent" style="display: none;">
                <div class="hidden lg:flex justify-between items-center lg:px-8 xl:px-8 2xl:px-16">
                    <!-- Hospital Name -->
                    <h1 class="text-2xl font-bold text-blue-500" id="user-name"></h1>

                    <div class="flex items-center space-x-3 fixed z-10 right-0 mr-20 mt-5">
                        <div class="bg-gray-500 hover:bg-gray-700 drop-shadow-md rounded-3xl h-3 w-3 p-5 flex items-center justify-center text-gray-300 hover:rounded-xl transition-all">
                            <button onclick="refreshDashboard()" class="text-sm"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg></button>
                        </div>
                        <!-- <button class="hover:text-Yellow"><i class="bi bi-bell-fill"></i> Notifications</button> -->
                    </div>
                    
                </div>
                
                <div class="grid grid-cols-12 gap-3 md:p-6 2xl:px-16 xl:gap-6">
                    

                    <!-- Pending Reservations Banner -->
                    <div id="pending-reservations" onclick="anchor_to_pending()" class="bg-white p-5 md:p-8 col-span-12  lg:col-span-4 2xl:col-start-1 2xl:col-span-4 rounded drop-shadow-md hover:scale-105 hover:drop-shadow-md hover:cursor-pointer transition duration-100 ease-out flex items-center justify-between relative">
                        
                        <!-- Notification Ping -->
                        <!-- <div class="">
                            <div class="animate-ping absolute right-0 top-0 mt-3 mr-3 rounded-full bg-red-500 p-2"></div>
                            <span class="absolute right-0 top-0 mt-3 mr-3 rounded-full bg-red-500 p-2"></span>
                        </div> -->
                        
                        <div class="hover:text-blue-500 transition duration-200 ease-in-out">
                            <h1 class="text-5xl font-bold" id="pendingCountContainer"></h1>
                            <h1>Pending Reservations</h1>
                        </div>
                        <div class="">
                            <i class="bi bi-hourglass-top text-5xl hover:text-blue-500 transition duration-200 ease-in-out"></i>
                        </div>
                    </div>

                    <!-- Upcoming Reservations Banner -->
                    <div id="upcoming-reservations" onclick="anchor_to_upcoming()" class="bg-white p-5 md:p-8 col-span-12 lg:col-span-4 2xl:col-span-4 rounded drop-shadow-md hover:scale-105 hover:drop-shadow-md hover:cursor-pointer transition duration-100 ease-out flex items-center justify-between">
                        <div class="hover:text-blue-500 transition duration-200 ease-in-out">
                            <h1 class="text-5xl font-bold" id="upcomingCountContainer"></h1>
                            <h1>Upcoming Reservations</h1>
                        </div>
                        <div>
                            <i class="bi bi-calendar2-check-fill text-5xl hover:text-blue-500 transition duration-200 ease-in-out"></i>
                        </div>
                    </div>

                    <!-- Completed Banner -->
                    <div id="history-reservations" onclick="anchor_to_history()" class="bg-white p-5 md:p-8 col-span-12 lg:col-span-4 2xl:col-span-4 rounded drop-shadow-md hover:scale-105 hover:drop-shadow-md hover:cursor-pointer transition duration-100 ease-out flex items-center justify-between">
                        <div class="hover:text-blue-500 transition duration-200 ease-in-out">
                            <h1 class="text-5xl font-bold" id="completedCountContainer"></h1>
                            <h1>Completed</h1>
                        </div>
                        <div>
                            <i class="bi bi-check-circle text-5xl hover:text-blue-500 transition duration-200 ease-in-out"></i>
                        </div>
                    </div>
                </div>

                <!-- Contents -->
                <!-- Pending Reservations Contents -->
                <div id="pending-contents" class="bg-white p-5 2xl:mx-16 md:mx-6 lg:mx-6 rounded drop-shadow-md text-sm scroll-my-7">
                    <!-- Header -->
                    <div class="flex flex-col sm:flex-row justify-between items-center">
                        <h1 class="text-lg font-bold text-blue-600"><i class="bi bi-hourglass-top text-gray-800"></i> Pending Reservations</h1>
                        <div class="flex space-x-5 items-center">
                            <!-- Filter - covid / non-covid -->
                            <div class="-space-x-1">
                                <button id="btn-pendingCovid" class="border-2 border-gray-500 rounded rounded-r-none border-r-0 p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Covid</button>
                                <button id="btn-pendingNonCovid" class="border-2 border-gray-500 rounded rounded-l-none border-l-0 p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Non-Covid</button>
                            </div>

                            <div>
                                <button id="btn-show-all-pending" class="border-2 border-gray-500 rounded p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Show All</button>
                            </div>
                            <!-- Toggle Button -->  
                            <div class="flex items-center">
                                <button class=" w-8 h-8 bg-blue-500 hover:bg-blue-800 rounded-md border-2 border-gray-500 tra" id="btn-toggle-pending" onclick="togglePending()"><i class="ri-arrow-up-s-line text-gray-100 font-bold pending-icon"></i></button>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="border-slate-200 my-3">
                    <!-- <p class="mb-5">Wala akong maisip</p> -->


                    <!-- Hospital Listing ID -->
                    <input type="hidden" name="listingID" id="listingID" value="<?php echo $_SESSION["listing-id"] ?>">
                    <!-- Cards go here -->
                    <div class="px-5 py-5 lg:grid grid-cols-12 gap-4 min-h-[200px]" id="pending-cards-container">

                        <!-- Cards -->
                        <!-- <div class="col-span-3 bg-gray-900 rounded-lg text-gray-400 hover:scale-105 hover:drop-shadow-md hover:cursor-pointer transition duration-100 ease-out"> 
                            <div class="p-4 flex items-center justify-between">
                                <h1 class="bg-blue-700 hover:bg-blue-800 rounded-full w-fit py-0.5 px-2 text-white flex items-center">
                                    <i class="ri-door-open-fill"></i> &nbsp; <span class="cursor-pointer">Bed</span>
                                </h1>

                                <p class="flex items-center">
                                    <i class="bi bi-clock-history hover:text-blue-500"></i> &nbsp;Today: 10:30 AM
                                </p>
                            </div>

                            <div class="mb-2 px-4 flex items-center justify-between">
                                <h1 class="text-lg font-bold text-white">Juan Dela Cruz</h1>
                                <p class="flex items-center bg-white hover:bg-gray-300 cursor-default rounded-full py-0.5 px-2 w-fit text-blue-700 font-bold">
                                    <i class="ri-stethoscope-fill h-5 w-5"></i>Covid
                                </p>
                            </div>
                            <div class="flex items-start justify-between px-4">
                                <div class="text-sm font-light pb-4">
                                    <p class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 hover:text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                        10/20/2022
                                    </p>
                                    <p class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 hover:text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                          </svg>
                                        10:30 AM
                                    </p>
                                    <p class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 hover:text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                        </svg>
                                        09295874653
                                    </p>

                                </div>
                            </div>

                            <div class="bg-blue-700 p-4 rounded-b-lg flex justify-center">
                                <button class="text-white hover:text-blue-200 hover:underline flex items-center">
                                    View Full Details&ensp;
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                      </svg>
                                </button>
                            </div>
                        </div> -->
                    </div>
                </div>

                <!-- Upcoming Reservations Contents -->
                <div id="upcoming-contents" class="bg-white p-5 2xl:mx-16 md:mx-6 rounded drop-shadow-md text-sm scroll-my-7">
                    <!-- Header -->
                    <div class="flex flex-col sm:flex-row justify-between items-center">
                        <div class="flex items-center space-x-5">
                            <h1 class="text-lg font-bold text-blue-700"><i class="bi bi-calendar-check-fill text-gray-800"></i> Upcoming Reservations</h1>

                            <!-- search input -->
                            <div class="flex items-center py-2 px-2 text-sm rounded-lg bg-gray-300 text-gray-700">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                      </svg>
                                </button>
                                <input type="search" name="" id="inp-search-upcoming" class="focus:outline-none focus:ring-0 focus:border-0 border-0 bg-gray-300 text-gray-700 text-sm py-0" placeholder="First / Lastname or Registration Code..">
                            </div>
                        </div>
                        
                        <div class="flex space-x-5">
                            <div class="-space-x-1">
                                <button id="btn-upcomingCovid" class="border-2 border-gray-500 rounded rounded-r-none border-r-0 p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Covid</button>
                                <button id="btn-upcomingNonCovid" class="border-2 border-gray-500 rounded rounded-l-none border-l-0 p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Non-Covid</button>
                            </div>

                            <div>
                                <button id="btn-show-all-upcoming" class="border-2 border-gray-500 rounded p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Show All</button>
                            </div>

                            <!-- Toggle Button -->
                            <div class="flex items-center">
                                <button class=" w-8 h-8 bg-blue-500 hover:bg-blue-800 rounded-md border-2 border-gray-500" id="btn-toggle-pending" onclick="toggleUpcoming()"><i class="ri-arrow-up-s-line text-gray-100 font-bold upcoming-icon"></i></button>
                            </div>
                        </div>
                    </div>

                    <hr class="border-slate-200 my-3">
                    <!-- <p class="mb-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse beatae.</p> -->

                    <!-- Cards go here -->
                    <div class="px-5 py-5 lg:grid grid-cols-12 gap-4 min-h-[200px]" id="upcoming-cards-container">

                        <!-- Cards -->
                        <!-- <div class="col-span-3 bg-gray-900 rounded-lg text-gray-400 hover:scale-105 hover:drop-shadow-md hover:cursor-pointer transition duration-100 ease-out"> 
                            <div class="p-4 flex items-center justify-between">
                                <h1 class="bg-blue-700 hover:bg-blue-800 rounded-full w-fit py-0.5 px-2 text-white flex items-center">
                                    <i class="ri-door-open-fill"></i> &nbsp; <span class="cursor-pointer">Bed</span>
                                </h1>

                                <p class="flex items-center">
                                    <i class="bi bi-clock-history hover:text-blue-500"></i> &nbsp;Today: 10:30 AM
                                </p>
                            </div>

                            <div class="mb-2 px-4 flex items-center justify-between">
                                <h1 class="text-lg font-bold text-white">Juan Dela Cruz</h1>
                                <p class="flex items-center bg-white hover:bg-gray-200 cursor-default rounded-full py-0.5 px-2 w-fit text-blue-700 font-bold">
                                    <i class="ri-stethoscope-fill h-5 w-5"></i>Covid
                                </p>
                            </div>
                            <div class="flex items-start justify-between px-4">
                                <div class="text-sm font-light pb-4">
                                    <p class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 hover:text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                        10/20/2022
                                    </p>
                                    <p class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 hover:text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                        </svg>
                                        10:30 AM
                                    </p>
                                    <p class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 hover:text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                        </svg>
                                        09295874653
                                    </p>

                                </div>
                            </div>

                            <div class="bg-blue-700 p-4 rounded-b-lg flex justify-center">
                                <button class="text-white hover:text-blue-200 hover:underline flex items-center">
                                    View Full Details&ensp;
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div>  -->
                    </div>
                </div>

                <!-- Completed Reservations Contents -->
                <div id="history-contents" class="bg-white p-5 2xl:mx-16 md:mx-6 rounded drop-shadow-md text-sm scroll-my-7">
                    <!-- Header -->
                    <div class="flex flex-col sm:flex-row justify-between items-center">
                        <h1 class="text-lg font-bold text-blue-600"><i class="bi bi-check-circle-fill text-gray-800"></i> Completed</h1>
                        <!-- Filter Buttons -->
                        <div class="flex space-x-5">  
                            <!-- Covid & Non - Covid Button -->
                            <div class="-space-x-1">
                                <button id="btn-completedSuccessful" class="border-2 border-gray-500 rounded rounded-r-none border-r-0 p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Successful</button>
                                <button id="btn-completedUnsuccessful" class="border-2 border-gray-500 rounded rounded-l-none border-l-0 p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Unsuccessful</button>
                            </div>   

                            <!-- Succesful & Unsucessful Button -->
                            <div class="-space-x-1">
                                <button id="btn-completedCovid" class="border-2 border-gray-500 rounded rounded-r-none border-r-0 p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Covid</button>
                                <button id="btn-completedNonCovid" class="border-2 border-gray-500 rounded rounded-l-none border-l-0 p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Non-Covid</button>
                            </div>

                            <!-- Show All Button -->
                            <div>
                                <button id="btn-show-all-completed" class="border-2 border-gray-500 rounded p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Show All</button>
                            </div>

                            <!-- Toggle Button -->
                            <div class="flex items-center">
                                <button class=" w-8 h-8 bg-blue-500 hover:bg-blue-800 rounded-md border-2 border-gray-500 tra" id="btn-toggle-pending" onclick="toggleHistory()"><i class="ri-arrow-up-s-line text-gray-100 font-bold upcoming-icon"></i></button>
                            </div>
                        </div>
                    </div>
                    <hr class="border-slate-200 my-3">

                    <!-- Cards go here -->
                    <div class="px-5 lg:grid grid-cols-12 gap-4 min-h-[200px]" id="completed-cards-container">

                        <!-- Cards -->
                        <div class="col-span-3 bg-gray-900 rounded-lg text-gray-400 hover:scale-105 hover:drop-shadow-md hover:cursor-pointer transition duration-100 ease-out"> 
                            <div class="p-4 flex items-center justify-between">
                                <h1 class="bg-blue-700 hover:bg-blue-800 rounded-full w-fit py-0.5 px-2 text-white flex items-center">
                                    <i class="ri-door-open-fill"></i> &nbsp; <span class="cursor-pointer">Bed</span>
                                </h1>

                                <p class="flex items-center">
                                    <i class="bi bi-clock-history hover:text-blue-500"></i> &nbsp;Today: 10:30 AM
                                </p>
                            </div>

                            <div class="mb-2 px-4 flex items-center justify-between">
                                <h1 class="text-lg font-bold text-white">Juan Dela Cruz</h1>
                                <p class="flex items-center bg-white hover:bg-gray-200 cursor-default rounded-full py-0.5 px-2 w-fit text-blue-700 font-bold">
                                    <i class="ri-stethoscope-fill h-5 w-5"></i>Covid
                                </p>
                            </div>
                            <div class="flex items-start justify-between px-4">
                                <div class="text-sm font-light pb-4">
                                    <p class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 hover:text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                        10/20/2022
                                    </p>
                                    <p class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 hover:text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                        </svg>
                                        10:30 AM
                                    </p>
                                    <p class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 hover:text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                        </svg>
                                        09295874653
                                    </p>

                                </div>
                            </div>

                            <div class="bg-blue-700 p-4 rounded-b-lg flex justify-center">
                                <button class="text-white hover:text-blue-200 hover:underline flex items-center">
                                    View Full Details&ensp;
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </div> 
                    </div>
                </div>

                <!-- Rejected / Expired Reservations Contents -->
                <div id="rejected-contents" class="bg-white p-5 2xl:mx-16 md:mx-6 rounded drop-shadow-md text-sm scroll-my-7">
                    <!-- Header -->
                    <div class="flex flex-col sm:flex-row justify-between items-center">
                        <h1 class="text-lg font-bold text-blue-700"><i class="bi bi-x-circle-fill text-gray-800"></i> Rejected / Expired Reservations</h1>

                        <div class="flex space-x-5">
                            <div class="-space-x-1">
                                <button id="btnExpiredReservation" class="border-2 border-gray-500 rounded rounded-r-none border-r-0 p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Expired Reservations</button>
                                <button id="btnRejectedReservation" class="border-2 border-gray-500 rounded rounded-l-none border-l-0 p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Rejected</button>
                            </div>

                            <div>
                                <button id="btn-show-all-rejected-expired" class="border-2 border-gray-500 rounded p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Show All</button>
                            </div>

                            <!-- Toggle Button -->
                            <div class="flex items-center">
                                <button class=" w-8 h-8 bg-blue-500 hover:bg-blue-800 rounded-md border-2 border-gray-500" id="btn-toggle-rejected" onclick="toggleRejected()"><i class="ri-arrow-up-s-line text-gray-100 font-bold rejected-icon"></i></button>
                            </div>
                        </div>
                    </div>

                    <hr class="border-slate-200 my-3">

                    <!-- Cards go here -->
                    <div class="px-5 py-5 lg:grid grid-cols-12 gap-4 min-h-[200px]" id="rejected-cards-container">

                    </div>
                </div>

            </div>

            <!-- Edit Details Contents -->
            <div class=" editDetailsContent tab-contents" id="editDetailsContent" style="display: none;">
                <!-- Refresh Button -->
                <div class="flex flex-1 justify-end space-x-1 text-xs fixed z-10 right-0 top-0 pt-6 mr-16">
                    <div class="bg-gray-500 hover:bg-gray-700 drop-shadow-md rounded-3xl h-5 w-5 p-5 flex items-center justify-center text-gray-300 hover:rounded-xl transition-all">
                        <button onclick="refreshEditDetails()"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg></button>
                    </div>
                </div>
                

                <!--Google Maps -->
                <div class="col-span-12 xl:col-span-12 mt-16 pb-6 sm:mx-3 md:mx-6 2xl:mx-12 mainDetailsContainer bg-white drop-shadow-md">
                    <!-- Google Map -->
                    <div class="map p-2 mb-5 w-full h-80 maps-container" id="maps-container">
                       <p>[Error Loading Google maps!]</p>
                    </div>
                    
                    <h1 class="mx-6 mb-3">Drag the marker on the map or use the textbox below to search your exact location.</h1>
                    
                    <div class="flex flex:col md:flex-row space-x-3 items-center mx-6 mb-6">
                        <!-- Location -->
                        <div class="bg-gray-700 rounded-lg py-2 px-3 w-full">
                            <input type="text" class=" text-gray-200 py-2 text-sm rounded-lg focus:ring-0 focus:border-0 border-0 block bg-gray-700 p-0 w-full" id="hospital-location" name="hospital-location" required>
                        </div>

                        <div class="shrink-0">
                            <button type="button" id="btn-save-location" class="py-4 px-3 flex items-center space-x-3 bg-blue-600 rounded-lg text-white w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                                  </svg>
                                Save My Location
                            </button>
                        </div>
                    </div>

                    <input type="hidden" name="" id="lat">
                    <input type="hidden" name="" id="lng">

                    <div class="w-full text-center" id="changes-message">
                        <p class="text-green-600 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                              </svg>
                            Location Saved Successfully!
                        </p>
                    </div>
                </div>

                <!--Listing Details Form -->
                <form id="details-form">
                    <!-- Main Container -->
                    <div class="mainContainer grid grid-cols-12 pt-16 sm:px-3 md:px-6 2xl:px-12 space-y-6 xl:space-y-0 gap-5 text-sm mb-6 text-gray-700" id="main-container">
                        <!-- Listing Details Content -->
                        <div class="col-span-12 xl:col-span-12 p-6 listingDetailsContainer bg-white drop-shadow-md space-y-6">
                            <h1 class="font-bold text-blue-700">Listing Details</h1>
                            <div class="py-6">
                                <hr class="border-gray-300">     
                            </div>

                            <!-- Hospital Name and City Place -->
                            <div class="flex flex-col xl:flex-row xl:items-center xl:space-x-3">
                                <!-- Hospital Name -->
                                <div class="grow">
                                    <label class="flex items-center mb-2 text-sm font-medium text-orange-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                        &ensp;Hospital Name
                                    </label>
                                    <input type="text" class="w-full border-1 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5" id="hospital-name" name="hospitalName" disabled>
                                </div>

                                <!-- Hospital City-->
                                <div class="">
                                    <label for="hospital-city" class="flex items-center mb-2 text-sm font-medium text-orange-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                        </svg>
                                        &ensp;City&ensp;
                                        <div id="city-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </label>
                                    <select name="hospitalCity" id="hospital-city" class="text-sm rounded-md border-[1px] border-gray-300">
                                        <!-- BARMM -->
                                        <optgroup label="BARMM">
                                            <?php
                                                $sql = $conn->query("SELECT * FROM citydata WHERE region = 'Bangsamoro Autonomous Region in Muslim Mindanao';") or die($conn->error);
                                                while ($row = mysqli_fetch_assoc($sql)) {
                                                    echo '
                                                        <option value="'.$row["city"].'">'.$row["city"].'</option>
                                                    ';
                                                }
                                            ?>
                                        </optgroup>
                                        
                                        <!-- Bicol Region -->
                                        <optgroup label="Bicol Region">
                                            <?php
                                                $sql = $conn->query("SELECT * FROM citydata WHERE region = 'Bicol Region';") or die($conn->error);
                                                while ($row = mysqli_fetch_assoc($sql)) {
                                                    echo '
                                                        <option value="'.$row["city"].'">'.$row["city"].'</option>
                                                    ';
                                                }
                                            ?>
                                        </optgroup>
                                        
                                        <!-- Cagayan Valley -->
                                        <optgroup label="Cagayan Valley">
                                            <?php
                                                $sql = $conn->query("SELECT * FROM citydata WHERE region = 'Cagayan Valley';") or die($conn->error);
                                                while ($row = mysqli_fetch_assoc($sql)) {
                                                    echo '
                                                        <option value="'.$row["city"].'">'.$row["city"].'</option>
                                                    ';
                                                }
                                            ?>
                                        </optgroup>

                                        <!-- CALABARZON -->
                                        <optgroup label="CALABARZON">
                                            <?php
                                                $sql = $conn->query("SELECT * FROM citydata WHERE region = 'CALABARZON ';") or die($conn->error);
                                                while ($row = mysqli_fetch_assoc($sql)) {
                                                    echo '
                                                        <option value="'.$row["city"].'">'.$row["city"].'</option>
                                                    ';
                                                }
                                            ?>
                                        </optgroup>

                                        <!-- Caraga -->
                                        <optgroup label="Caraga">
                                                <?php
                                                    $sql = $conn->query("SELECT * FROM citydata WHERE region = 'Caraga';") or die($conn->error);
                                                    while ($row = mysqli_fetch_assoc($sql)) {
                                                        echo '
                                                            <option value="'.$row["city"].'">'.$row["city"].'</option>
                                                        ';
                                                    }
                                                ?>
                                        </optgroup>
                                        
                                        <!-- Central Luzon -->
                                        <optgroup label="Central Luzon">
                                                <?php
                                                    $sql = $conn->query("SELECT * FROM citydata WHERE region = 'Central Luzon';") or die($conn->error);
                                                    while ($row = mysqli_fetch_assoc($sql)) {
                                                        echo '
                                                            <option value="'.$row["city"].'">'.$row["city"].'</option>
                                                        ';
                                                    }
                                                ?>
                                        </optgroup>

                                        <!-- Central Visayas -->
                                        <optgroup label="Central Visayas">
                                                <?php
                                                    $sql = $conn->query("SELECT * FROM citydata WHERE region = 'Central Visayas';") or die($conn->error);
                                                    while ($row = mysqli_fetch_assoc($sql)) {
                                                        echo '
                                                            <option value="'.$row["city"].'">'.$row["city"].'</option>
                                                        ';
                                                    }
                                                ?>
                                        </optgroup>

                                        <!-- CAR -->
                                        <optgroup label="CAR">
                                                <?php
                                                    $sql = $conn->query("SELECT * FROM citydata WHERE region = 'Cordillera Administrative Region';") or die($conn->error);
                                                    while ($row = mysqli_fetch_assoc($sql)) {
                                                        echo '
                                                            <option value="'.$row["city"].'">'.$row["city"].'</option>
                                                        ';
                                                    }
                                                ?>
                                        </optgroup>   
                                                                             
                                        <!-- Davao Region -->
                                        <optgroup label="Davao Region">
                                                <?php
                                                    $sql = $conn->query("SELECT * FROM citydata WHERE region = 'Davao Region';") or die($conn->error);
                                                    while ($row = mysqli_fetch_assoc($sql)) {
                                                        echo '
                                                            <option value="'.$row["city"].'">'.$row["city"].'</option>
                                                        ';
                                                    }
                                                ?>
                                        </optgroup>

                                        <!-- Eastern Visayas -->
                                        <optgroup label="Eastern Visayas">
                                                <?php
                                                    $sql = $conn->query("SELECT * FROM citydata WHERE region = 'Eastern Visayas';") or die($conn->error);
                                                    while ($row = mysqli_fetch_assoc($sql)) {
                                                        echo '
                                                            <option value="'.$row["city"].'">'.$row["city"].'</option>
                                                        ';
                                                    }
                                                ?>
                                        </optgroup>

                                        <!-- Ilocos Region -->
                                        <optgroup label="Ilocos Region">
                                                <?php
                                                    $sql = $conn->query("SELECT * FROM citydata WHERE region = 'Ilocos Region';") or die($conn->error);
                                                    while ($row = mysqli_fetch_assoc($sql)) {
                                                        echo '
                                                            <option value="'.$row["city"].'">'.$row["city"].'</option>
                                                        ';
                                                    }
                                                ?>
                                        </optgroup>
                                        
                                        <!-- MIMAROPA -->
                                        <optgroup label="MIMAROPA">
                                                <?php
                                                    $sql = $conn->query("SELECT * FROM citydata WHERE region = 'MIMAROPA Region';") or die($conn->error);
                                                    while ($row = mysqli_fetch_assoc($sql)) {
                                                        echo '
                                                            <option value="'.$row["city"].'">'.$row["city"].'</option>
                                                        ';
                                                    }
                                                ?>
                                        </optgroup>

                                        <!-- NCR -->
                                        <optgroup label="NCR">
                                                <?php
                                                    $sql = $conn->query("SELECT * FROM citydata WHERE region = 'Nation Capital Region';") or die($conn->error);
                                                    while ($row = mysqli_fetch_assoc($sql)) {
                                                        echo '
                                                            <option value="'.$row["city"].'">'.$row["city"].'</option>
                                                        ';
                                                    }
                                                ?>
                                        </optgroup>

                                        <!-- Northern Mindanao -->
                                        <optgroup label="Northern Mindanao">
                                                <?php
                                                    $sql = $conn->query("SELECT * FROM citydata WHERE region = 'Northern Mindanao';") or die($conn->error);
                                                    while ($row = mysqli_fetch_assoc($sql)) {
                                                        echo '
                                                            <option value="'.$row["city"].'">'.$row["city"].'</option>
                                                        ';
                                                    }
                                                ?>
                                        </optgroup>

                                        <!-- SOCCSKSARGEN -->
                                        <optgroup label="SOCCSKSARGEN">
                                                <?php
                                                    $sql = $conn->query("SELECT * FROM citydata WHERE region = 'SOCCSKSARGEN';") or die($conn->error);
                                                    while ($row = mysqli_fetch_assoc($sql)) {
                                                        echo '
                                                            <option value="'.$row["city"].'">'.$row["city"].'</option>
                                                        ';
                                                    }
                                                ?>
                                        </optgroup>

                                        <!-- Western Visayas -->
                                        <optgroup label="Western Visayas">
                                                <?php
                                                    $sql = $conn->query("SELECT * FROM citydata WHERE region = 'Western Visayas';") or die($conn->error);
                                                    while ($row = mysqli_fetch_assoc($sql)) {
                                                        echo '
                                                            <option value="'.$row["city"].'">'.$row["city"].'</option>
                                                        ';
                                                    }
                                                ?>
                                        </optgroup>

                                        <!-- Zamboanga Peninsula -->
                                        <optgroup label="Zamboanga Peninsula">
                                                <?php
                                                    $sql = $conn->query("SELECT * FROM citydata WHERE region = 'Zamboanga Peninsula';") or die($conn->error);
                                                    while ($row = mysqli_fetch_assoc($sql)) {
                                                        echo '
                                                            <option value="'.$row["city"].'">'.$row["city"].'</option>
                                                        ';
                                                    }
                                                ?>
                                        </optgroup>
                                    </select>

                                    <!-- <label for="hospital-city" class="flex items-center mb-2 text-sm font-medium text-orange-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                        </svg>
                                        &ensp;City
                                    </label>
                                    <input type="text" class="w-full border-1 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5" id="hospital-city" name="hospitalCity" value="City" required> -->
                                </div>

                                <!-- Type of Hospital -->
                                <div class="">
                                    <label for="hospitalType" class="flex items-center mb-2 text-sm font-medium text-orange-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                        &ensp;Hospital Type
                                    </label>
                                    <input class="focus:outline-none text-sm rounded-lg border-1 border-gray-300 p-2.5" type="text" id="hospitalType" name="hospital-type" disabled>
                                </div>
                            </div>
            
                            <!-- Hospital Description -->
                            <div class="mb-6">
                                <label for="hospital-description" class="flex items-center mb-2 text-sm font-medium text-orange-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                    </svg>
                                    &ensp;Description
                                </label>
                                <textarea id="hospital-description" name="hospitalDescription" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Type a description here..." required></textarea>
                            </div>
                            <!-- Room slot title  -->
                            <!-- <div class="mb-3 flex flex-row">
                                <p class="text-orange-500 font-medium">Room Slot</p>&nbsp;<span class="text-gray-600">Leave to 0 if there are none.</span>
                            </div> -->

                            <!-- Room / Bed Slot and website Container -->
                            <div class="flex items-center space-x-3">
                                <!-- Rooms -->
                                <div class="checkbox-card">
                                    <!-- <input type="checkbox" class="checkbox mr-3 w-5 h-5 text-green-600 bg-green-100 rounded border-green-700 focus:ring-green-500 focus:ring-2 " id="hospital-room" name="room" value="Room" onclick="checked()"> -->
                                    <label for="hospital-room" class="flex items-center text-md mb-2 text-green-600 font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                        &ensp;Room Slot
                                        &ensp;
                                        <div id="room-slot-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </label> 
                                    <input type="number" class="w-32 border-1 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block p-2.5" id="room-slot" name="room-slot" min="0" max="99" placeholder="1 ~ 99">
                                </div>

                                <!-- Bed slot title  -->
                                <!-- <div class="mb-3 flex flex-rows">
                                    <p class="text-orange-500 font-medium">Bed Slot</p>&nbsp;<span class="text-gray-600">(If you want to add slot in bed, please check the checkbox below).</span>
                                </div> -->
                                
                                <!-- Beds -->
                                <div class="">
                                    <!-- <input type="checkbox" class="mr-3 w-5 h-5 text-green-600 bg-green-100 rounded border-green-700 focus:ring-green-500 focus:ring-2" id="hospital-bed" name="bed" value="Bed"> -->
                                    <label for="hospital-bed" class="flex items-center mb-2 text-md text-green-600 font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                        &ensp;Bed Slot
                                        &ensp;
                                        <div id="bed-slot-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </label>
                                    <input type="number" class="w-32 border-1 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block p-2.5" id="bed-slot" name="bed-slot" min="0" max="99" placeholder="1 ~ 99">
                                </div>
                                
                                <!-- Website Link -->
                                <div class=""> 
                                    <label for="website-link" class="block mb-2 text-sm font-medium text-orange-500"> Type your website link here: </label>
                                    <div class="relative">
                                        <div class="flex absolute inset-y-0 left-0 pl-3 items-center pointer-events-none ">
                                            <!-- <img src="assets\health-login-icon.svg" alt="" srcset="" class="w-10 h-10"> -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" /></svg>
                                        </div>
                                        <input type="text" name="website-link" id="website-link" class="w-80 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block pl-10 p-2.5" placeholder="Type your website...">
                                    </div>
                                </div>
                            </div>

                            <!-- Refferal or other documents -->
                            <div class="mb-6 flex items-center self-end">
                                <input type="checkbox" class="mr-2 w-5 h-5 text-green-600 bg-green-100 rounded border-green-700 focus:ring-green-500 focus:ring-2" id="require-documents" name="require-documents" value="Yes">
                                <label for="require-documents" class="flex items-center text-md">
                                    Require Referral or other documents before booking a reservation.&ensp;
                                    <div id="referral-slot-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </label>
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="text-sm flex justify-end p-6">
                                <button type="submit" name="submit" id="submit-details" onclick="submitDetails(event)" class="bg-blue-600 text-white p-3 drop-shadow-md hover:bg-blue-700 rounded-xl hover:scale-105 hover:rounded-md focus:outline-none focus:ring focus:ring-blue-400 transition-all">Save Changes<i class="bi bi-check-lg"></i></button>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Images Form -->
                <div class="grid grid-cols-12 gap-2 2xl:px-12 mb-16">
                    <!-- Form -->
                    <div class="xl:col-span-4 p-6 othersDetailsContent bg-white drop-shadow-md text-gray-700 text-sm">
                        <h1 class="font-bold text-blue-700"><i class="bi bi-cloud-arrow-up-fill"></i> Upload an Image</h1>
                        <div class="py-6">
                            <hr class="border-gray-300">     
                        </div>
                        <div class="xl:col-span-4">
                            <input type="file" id="fileInput" value="" class="border-2 border-green-300 rounded-md p-2 w-full mb-3" multiple>
                            <button id="upload" class="p-2 mb-3 bg-blue-600 rounded-md w-full text-center text-white"><i class="bi bi-cloud-upload-fill"></i> Upload Images</button>

                            <div class="p-3 bg-red-600 text-white text-center rounded-md drop-shadow-lg" id="upload-messasge" style="display: none;">
                            </div>
                            <div class="flex flex-col justify-center items-center w-full" style="display: none;" id="upload-loader">   
                                <p class="text-slate-400">Your Files are being uploaded..</p> 
                                <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
                            </div>
                            
                            <p class="p-3 bg-green-600 text-white text-center rounded-md drop-shadow-lg transition duration-200 ease-in-out" style="display: none;" id="upload-success"><i class="bi bi-cloud-check-fill"></i> Your File was uploaded successfully!</p>
                            
                        </div>
                    </div>

                    <!-- Image Gallery -->
                    <div class="xl:col-span-8 p-6 bg-white drop-shadow-md text-gray-700 text-sm">
                        <div class="flex items-center justify-between">
                            <h1 class="font-bold text-blue-700"><i class="bi bi-images"></i> Uploaded Images</h1>
                            <button id="edit-images" class="p-2 bg-green-500 drop-shadow-lg text-white hover:bg-green-700 rounded-xl hover:scale-105 hover:rounded-md focus:outline-none focus:ring focus:ring-blue-400 transition-all"><i class="bi bi-trash-fill"></i> Edit Images</button>
                        </div>
                        
                        <div class="py-3">
                            <hr class="border-gray-300">     
                        </div>
                        <div id="no-images-message"></div>
                        <div class="image-gallery grid items-center grid-cols-5 gap-4 p-2" id="image-gallery">
                        
                        </div>
                    </div>
                </div>


                <!------------------ Edit Images Modal------------- -->

                <!-- Large Modal -->
                <div id="editImagesModal" class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full">
                    <div class="relative px-4 w-full max-w-4xl h-full md:h-auto">
                        <!-- Modal content -->
                        <div class="relative bg-gray-900 rounded-lg shadow">
                            <!-- Modal header -->
                            <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                    Delete Images | Why not?
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="buttonClose()">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 grid grid-cols-6 gap-4" id="image-modal-body">
                                <!-- <div class="p-5 rounded-md bg-Yellow col-span-1">
                                    Sample Images..
                                </div> -->
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="flex justify-end p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                <button type="button" class="text-white bg-red-600 hover:bg-red-900 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete All</button>
                                <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600" onclick="buttonClose()">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ------------Delete Image confirmation Modal------------ -->

                <!-- Delete Images Modal -->
                <div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full" id="confirm-delete">
                    <div class="relative px-4 w-full max-w-md h-full md:h-auto">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex justify-end p-2">
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 pt-0 text-center">
                                <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this image?</h3>
                                <button type="button" id="btn-confirm-delete" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                    Yes, I'm sure
                                </button>
                                <button type="button" onclick="cancelDelete()" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">No, cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!------------------ -------------------------------- -->

                <!-- Toasts -->
                <div id="upload-success-toast"><i class="bi bi-cloud-check-fill"></i> Your File was uploaded successfully!</div>
                <div id="success-toast"> <i class="bi bi-check2-circle"></i> Successfully Updated!</div>    
            </div>

            <!-- Account Content -->
            <div id="accountContent" style="display: none;" class="tab-contents accountContent grid grid-cols-12 sm:px-3 md:px-6 2xl:px-12 space-y-6 xl:space-y-0 gap-5 text-sm mb-6 mt-10">

                <!-- Hospital Information Container -->
                <div class="col-span-12 xl:col-span-12 p-6 bg-white drop-shadow-md mb-5">

                    <h1 class="font-bold text-blue-700">Hospital Information</h1>

                    <div class="py-3 mb-3">
                        <hr class="border-gray-500">     
                    </div>

                    <!-- Hospital Name -->
                    <div class="mb-6">
                        <label class="flex flex-row items-center mb-2 font-medium text-gray-900"> 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-900" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />
                            </svg>&nbsp;Hospital Name</label>
                        <input id="account-hospital-name" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:text-navColor dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" disabled>
                    </div>

                    <!-- Email & Phone Number-->
                    <div class="grid xl:grid-cols-2 xl:gap-6">
                        <!-- Email -->
                        <div class="mb-6">
                            <label class="flex flex-row items-center mb-2 font-medium text-gray-900 dark:text-gray-700"> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>&nbsp;Email</label>
                            <input type="text" id="hospital-email" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:text-navColor dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" disabled>
                        </div>
                        <!-- Phone Number -->
                        <div class="mb-6">
                            <label class="flex flex-row items-center mb-2 font-medium text-gray-900 dark:text-gray-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>&nbsp;Phone Number
                                </label>
                            <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" id="hospital-phoneNumber" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:text-navColor dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" disabled>
                        </div>
                    </div>

                    <!-- Modal toggle Edit Password -->
                    <div class="mb-6">
                        <button id="btn-edit-password" type="button" class="shadow-sm border-gray-300 text-sm rounded-lg border-solid border-2 hover:border-black font-bold focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:text-navColor dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" onclick="ShowModal()"> Edit Password</button>
                    </div>       

                    <!-- Save Changes Button -->
                    <!-- <div class="grid justify-items-end">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save changes</button>
                    </div> -->
                
                </div>

                <!-- Other Details -->
                <div class="col-span-12 xl:col-span-12 p-6 bg-white drop-shadow-md">

                    <h1 class="font-bold text-blue-700">Other Information</h1>

                    <div class="py-3 mb-3">
                        <hr class="border-gray-500"> 
                    </div>

                    <!-- Location -->
                    <div class="mb-6">
                        <label class="block mb-2 font-medium text-gray-900"> <i class="bi bi-geo-alt-fill text-red-700"></i> Location</label>
                        <input id="account-hospital-location" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:text-navColor dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" disabled>
                    </div>
                    <!-- Representative Name & Designation / Position -->
                    <div class="grid xl:grid-cols-2 xl:gap-6">
                        <!-- Representative Name -->
                        <div class="mb-6">
                            <label class="flex flex-row items-center mb-2 font-medium text-gray-900"> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                                </svg>&nbsp;Representative Name
                            </label>
                            <input id="hospital-representative" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:text-navColor dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" disabled>
                        </div>
                        <!-- Designation / Position -->
                        <div class="mb-6">
                            <label class="flex flex-row items-center mb-2 font-medium text-gray-900"> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-900" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                                </svg>&nbsp;Designation / Position
                            </label>
                            <input id="hospital-designation" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:text-navColor dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" disabled>
                        </div>
                    </div>

                    <!-- Supervisor Name -->
                    <div class="mb-6">
                        <label class="block mb-2 font-medium text-gray-900"> <i class="bi bi-person-fill"></i> Supervisor Name</label>
                        <input id="hospital-supervisor" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:text-navColor dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" disabled>
                    </div>
                </div>
            </div>

            <!-- Edit Passwrod Main modal -->
            <div id="editPassModal" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal md:h-full md:inset-0">
                <div class="relative px-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-gray-900 rounded-lg shadow dark:bg-gray-900">
                        <!-- Modal header -->
                        <div class="flex justify-between items-start p-5 rounded-t border-b dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-200 lg:text-2xl">
                                Edit Password
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="closeButton()">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                            </button>
                        </div>

                        <!-- Modal body & Verify Password Form -->
                        <form method="POST">
                            <div class="space-y-6">
                                <!-- VerifyPassword Container -->
                                <div id="verifyPassword-div" name="verifyPassword" class="p-6 ">
                                    <!-- Verify Password-->
                                    <div class="relative mb-6">
                                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Verify your password</label>
                                        <input type="password" id="hospitalPassword" name="hospitalPassword" aria-describedby="passwordHelpBlock" placeholder="••••••••" enterkeyhint="Continue" class="hospitalPassword shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                                        <i class="bi bi-eye-slash text-gray-300 absolute cursor-pointer 2xl:right-0 2xl:top-9 2xl:pr-5 xl:right-0 xl:top-16 xl:pr-5 lg:right-0 lg:top-9 lg:pr-5 md:right-0 md:top-16 md:pr-5 sm:right-0 sm:top-16 sm:pr-5 right-0" id="verifyTogglePass"></i>
                                        <div id="passwordHelpBlock" class="form-text">
                                        </div>
                                    </div>
                                    <!-- Result Message if working or not -->
                                    <p id="resultMessage" class="text-center"></p> 
                                    <!-- Button of Continue and Close  -->
                                    <div class="flex justify-end space-x-3">
                                        <button id="btnEditPasswordNext" name="btnEditPasswordNext" type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:ring-cyan-800 dark:focus:ring-cyan-800">
                                            <span class="relative px-5 py-2.5 transition-all ease-in-out duration-75 bg-gray-900 dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">  
                                                Continue
                                            </span>
                                        </button>
                                        <!-- <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600" onclick="closeButton()">Cancel</button> -->
                                    </div>  
                                </div>
                            </div>
                        </form>

                        <!-- Create new Password Form -->
                        <div class="space-y-6">
                            <div class="editPassword mb-3 p-6" id="editPassword-div" name="editPassword" style="display: none;">
                                <h2 class="text-gray-300 mb-3">Create a new Password</h2>
                                
                                <p class="text-gray-500 mb-4"><i class="bi bi-info-circle-fill"></i> Type in your new password. (Minimum of 8 Characters)</p>

                                <form method="post" id="edit-new-password-form">
                                    <!-- New password -->
                                    <div class="relative mb-6">
                                        <label for="newPassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">New password</label>
                                        <input type="password" id="newPassword" name="newPassword" aria-describedby="passwordHelpBlock" placeholder="••••••••" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" class="newPassword shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                                        <i class="bi bi-eye-slash text-gray-300 absolute cursor-pointer 2xl:right-0 2xl:top-9 2xl:pr-5 xl:right-0 xl:top-16 xl:pr-5 lg:right-0 lg:top-9 lg:pr-5 md:right-0 md:top-16 md:pr-5 sm:right-0 sm:top-16 sm:pr-5 right-0" id="newTogglePass"></i>
                                        <div id="passwordHelpBlock" class="form-text">
                                        </div>
                                    </div>
                                    <!-- Validate the new Password -->
                                    <div class="relative mb-6" id="repeat-password-div" style="display: none;">
                                        <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Repeat your new password</label>
                                        <input type="password" id="newPasswordRepeat" name="newPasswordRepeat" aria-describedby="passwordHelpBlock" placeholder="••••••••" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" class="newPasswordRepeat shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                                        <i class="bi bi-eye-slash text-gray-300 absolute cursor-pointer 2xl:right-0 2xl:top-9 2xl:pr-5 xl:right-0 xl:top-16 xl:pr-5 lg:right-0 lg:top-9 lg:pr-5 md:right-0 md:top-16 md:pr-5 sm:right-0 sm:top-16 sm:pr-5 right-0" id="repeatTogglePass"></i>
                                        <div id="passwordHelpBlock" class="form-text">
                                        </div>
                                    </div>
                                    <p id="passMatchWarning"></p>
                                    <p id="result-modal" style="display: none;"></p> 
                                    <!-- Button of Save Changes and Close  -->
                                    <div class="flex justify-end space-x-3">
                                        <button id="btnSaveChanges" name="btnSaveChanges" type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800" disabled>
                                            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-gray-900 dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">   
                                                Save Changes
                                            </span>
                                        </button>
                                        <!-- <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600" onclick="closeButton()">Cancel</button> -->
                                    </div> 
                                </form>                   
                            </div> 
                        </div>
                        <!-- Modal footer -->
                    </div>
                </div>
            </div>  
            
            <!-- Successfull -->
            <div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full" id="popup-modal">
                <div class="relative px-4 w-full max-w-md h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-gray-900 rounded-lg shadow">
                        <!-- Modal body -->
                        <div class="p-6 mt-5 text-center">
                            <!-- <i class="bi bi-check2-circle mx-auto mb-4 w-14 h-14 text-green-500"></i> -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 w-14 h-14 text-green-500" stroke="currentColor" viewBox="0 0 24 24" fill="none"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-200">Password has been updated <span class="text-green-500 font-medium">successfully</span>, Click the button below to reload the page.</h3>
                            <button type="button" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2" onclick="closeButtons()">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include_once 'includes/footer.php'; ?>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApEvr9yiQv-yXwXp2HRpzyW5HXwB18BxE&libraries=places"></script>
    <script src="js\hospital-dashboard.js" defer></script>
    <!-- Flowbite -->
    <!-- <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script> -->
    <script src="node_modules\flowbite\dist\flowbite.js"></script>

    <!-- Light Gallery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>

    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
</body>
</html>