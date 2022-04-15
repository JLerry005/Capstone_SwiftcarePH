<?php
    session_start();
    if (!isset($_SESSION['sessionpatientUserID'])) {
        header("location: user-login");
        die();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Flowbite minified stylesheet -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.3.4/dist/flowbite.min.css"/>
    <!--Bootstrap 5 Install-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    <!--Google Material Icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <!-- Remix Icon CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel = "icon" href ="/assets/undraw_secure_login_pdn4.svg" type = "image/x-icon">
    <script src="/clipboard.js-master/dist/clipboard.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0-rc.3/jquery-ui.min.js" integrity="sha256-R6eRO29lbCyPGfninb/kjIXeRjMOqY3VWPVk6gMhREk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="dist/output.css">
    <!-- <script src="js\user-dashboard.js" defer></script> -->
    <link rel="stylesheet" href="styling/user-dashboard.css">
    <title>User Dashboard | SwiftCare PH</title>
    <link rel="icon" href="assets/main-logo-line.png" type="image/x-icon">  
</head>
<body class="font-poppins bg-gray-900">

    <!--Main Container-->
    <div class="mx-8">

        <!-- Reservations and Account Settings Cards -->
        <div id="main-cards">

            <!-- Images vector and back button -->
            <div class="grid grid-cols-2 xl:mt-36">

                <!-- Back Button -->
                <div class="col-span-2 flex mt-8 xl:hidden">
                    <a href="index" class="flex items-center text-gray-200 hover:bg-gray-700 bg-gray-800 p-2 rounded-lg cursor-pointer transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
                        </svg>&nbsp; Back
                    </a>  
                </div>

                <!-- Image -->
                <div class="flex flex-col xl:flex-row col-span-2">
                    <div class="col-span-2 xl:col-span-1">
                        <div class="hidden sm:flex justify-center">
                            <img src="assets/user-dashboard/welcome.svg" alt="" srcset="" class="h-96 w-96 xl:w-fit xl:h-fit xl:mx-4">
                        </div>
                        <!-- Home Button -->
                        <a href="index">
                            <div class="hidden mx-20 items-center xl:block">
                                <button class="relative inline-flex text-xs items-center justify-center p-0.5 w-full mt-10 mr-2 overflow-hidden font-medium text-blue-50 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-cyan-800">
                                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 w-full bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                    <i class="bi bi-house-door"></i> Home
                                    </span>
                                </button>  
                            </div>
                        </a>
                    </div>

                    <!-- Reservations and Account Settings Cards -->
                    <div class="col-span-2 xl:col-span-1 mt-10 xl:pt-16 space-y-10 sm:mx-8 md:mx-14 lg:mx-20 2xl:my-auto 2xl:mx-auto">
                        <!-- Reservation Card -->
                        <div id="reservation-card" class="card card-reservation 2xl:p-5">
                            <a href="user-reservations">
                                <!-- Card Body -->
                                <div class="flex justify-between items-center p-4 sm:p-4 sm:px-10 sm:py-8 2xl:px-12">

                                    <!-- Left Side Content -->
                                    <div class="flex items-center">
                                        <div class="hidden sm:block">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-16 w-16"><path fill="none" d="M0 0h24v24H0z"/><path d="M9 1v2h6V1h2v2h4a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h4V1h2zm11 7H4v11h16V8zm-4.964 2.136l1.414 1.414-4.95 4.95-3.536-3.536L9.38 11.55l2.121 2.122 3.536-3.536z" fill="rgba(235,245,255,1)"/></svg>
                                        </div>
                                        <div class="space-y-2 sm:space-y-1 px-3 py-4">
                                            <p class="text-2xl font-bold text-gray-900 uppercase sm:tracking-wide flex items-center">
                                                Reservations
                                            </p>
                                            <div class="flex justfiy-between items-center space-x-auto">
                                                <p class="text-xs text-white md:text-sm">View and manage all of your <b class="text-gray-900">reservations.</b></p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Side Content -->
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 sm:h-14 sm:w-14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                        </svg>                                
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Account Card -->
                        <div id="account-card" class="card card-account 2xl:p-5">
                            <a href="user-account">
                                <!-- Card Body -->
                                <div class="flex justify-between items-center p-2 sm:p-4 sm:px-10 sm:py-8">

                                    <!-- Left Side Content -->
                                    <div class="flex items-center">
                                        <div class="hidden sm:block">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                            </svg>                                    
                                        </div>
                                        <div class="space-y-2 sm:space-y-1 px-3 py-4">
                                            <p class="account-title text-2xl font-bold text-gray-900 uppercase sm:tracking-wide flex items-center">
                                                ACCOUNT SETTING
                                            </p>
                                            <div class="flex justfiy-between items-center space-x-auto">
                                                <p class="text-xs mr-auto md:text-sm">Manage your <b class="text-gray-900">account.</b></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Right Side Content -->
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 sm:h-14 sm:w-14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                        </svg>                                
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
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

    <!-- FLOWBITE CDN -->
    <script src="node_modules\flowbite\dist\flowbite.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
</body>
</html>