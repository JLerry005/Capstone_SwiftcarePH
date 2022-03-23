<?php
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
    <!-- Flowbite minified stylesheet -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.3.4/dist/flowbite.min.css"/>
    <!--CSS Link-->
    <link  href="styling/hospital-overview.css" rel="stylesheet" type="text/css">
    <!-- TAILWIND CSS Link -->
    <link rel="stylesheet" href="dist/output.css">
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <!-- TITLE -->
    <title>Hospital Overview | SwiftCare PH</title>
    <!-- JQUERY LINK -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- <script src="/js/hospital-overview.js" type="text/javascript"></script> -->
    <link rel="icon" href="assets/main-logo-line.png" type="image/x-icon">  
</head>
<body class="bg-blue-50 text-gray-700 text-xs sm:text-sm md:text-md font-poppins">
    
         <!-- Nav Bar -->
        <nav class="text-white py-5 px-5 lg:px-12 w-full bg-gray-900">
            <div class="flex flex-row justify-between items-center   border-slate-600">
                <div class="flex flex-row items-center space-x-4">
                <a href="#" class="flex items-center text-center">
                    <img src="assets/main-logo-transparent.png" class="mr-3 h-8" alt="Swiftcare PH Logo">
                    <span class="self-center text-lg md:text-2xl font-semibold whitespace-nowrap dark:text-white">Swiftcare PH</span>
                    </a>

                    <a href="#" class="hidden md:block">More</a>

                    <a href="#" class="hover:underline hidden md:block">About</a>
                </div>
                
                <?php
                    if (isset($_SESSION["sessionpatientUserID"])) {
                        echo '

                        <div class="hidden md:flex md:flex-row md:items-center space-x-5">
                            <p class="flex flex-row items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                                &nbsp;'.$_SESSION['sessionPatientFirstName'].'
                            </p>
                            <a href="includes/logout-inc" class="bg-red-600 hover:bg-red-500 hover:drop-shadow-md py-2 px-7 rounded-lg hover:rounded-md hover:scale-105 flex flex-row text-sm transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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
                        ';
                    }
                ?>

        
                <!-- Hamburger Button -->
                <div class="md:hidden flex flex-row items-center">
                    <button class="hamburger-button id="hamburger-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                    </button>
                </div>
            </div>

            <!-- Burger Menu -->
            <div class="mobileMenu hidden md:hidden transition ease-out duration-200" id="mobileMenu">
                <a href="" class="block py-2 text-sm hover:bg-gray-500">More</a>
                <a href="" class="block py-2 text-sm hover:bg-gray-500">About</a>
                <button class="block py-2 text-sm hover:bg-gray-500">Login</button>
            </div>
        </nav>

    <div class="container mx-auto flex flex-col lg:p-5 bg-rose-300">
        <div class="w-full" id="mapsContainer">
                <!-- Google Map -->
            <div class="map lg:p-2 mb-5">
                <iframe class="drop-shadow-md w-full h-60 rounded-none lg:h-80 lg:rounded-lg" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.9926021403926!2d120.98714038020043!3d14.656361247977395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b429ca9143f7%3A0x7dc98ed31712fe49!2sMCU%20Hospital%20-%20Filemon%20D.%20Tanchoco%2C%20Sr.%20Medical%20Foundation%20Inc.!5e0!3m2!1sen!2sph!4v1637676790012!5m2!1sen!2sph" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

        <!-- Get Directions -->
        <div class="flex flex-col items-center justify-center lg:flex-row lg:justify-start">
            <div class="flex flex-col justify-center items-center space-y-1 sm:flex-row sm:space-y-0 sm:space-x-2 sm:items-end">
                <div>
                    <label for="fromInput" class="flex items-center mb-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                          </svg>
                        &nbsp;Get Directions
                    </label>
                    <input class="text-sm border-0 rounded-md focus:ring-2 focus:ring-green-500" type="search" placeholder="enter your current location.." id="fromInput">
                </div>
                
                <p class="self-center pt-4">Or</p>

               <button class="bg-green-500 p-2 sm:p-3 text-white rounded-md flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                    </svg>
                    &nbsp;Get My Location
                </button>
            </div>


            <!-- Hidden Input - Hospital Location -->
            <div class="hidden">
                <label for="toInput" class="hidden">Hospital Location</label>
                <input class="text-sm" type="hidden" placeholder="To:" disabled id="toInput">
            </div>
        </div>

        <!-- Details Content-->
        <div class="my-5 mx-4 space-y-2 px-2">
            <!-- Hospital Name -->
            <div class="text-xl md:text-2xl lg:text-3xl font-bold">
                <p>Our Lady of Lourdes Hospital</p>
            </div>

            <!-- Hospital Address -->
            <div class="flex flex-row">
                <i class="bi bi-geo-alt-fill text-red-500"></i>
                <p class="font-semibold">&ensp; Address: <span class="font-medium">&nbsp;46 P. Sanchez St, Santa Mesa, Manila, Metro Manila</span></p>
                
            </div>

            <!-- Hospital Phone Number -->
            <div class="flex flex-row">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                </svg>
                <p class="font-semibold">&ensp;Phone:</p> <span class="text-blue-500 font-medium">&nbsp;(02) 8833 6022</span>
            </div>

            <!-- Hospital Hours -->
            <div class="flex flex-row">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p class="font-semibold">&ensp;Hours:</p><span class="text-green-500 font-medium">&nbsp;Open now •</span>
            </div>

            <!-- Hospital Room Slot -->
            <div class="flex flex-row">
                <i class="bi bi-collection"></i>
                <p class="font-semibold">&ensp; Room Slot:</p> &nbsp;<span>69</span> 
            </div>

            <!-- Hospital Bed Slot -->
            <div class="flex flex-row">
                <i class="bi bi-collection-fill"></i>
                <p class="font-semibold">&ensp; Bed Slot:</p> &nbsp;<span>69</span> 
            </div>

            <!-- Hospital Referal -->
            <div class="flex flex-row">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                <p class="font-semibold">&nbsp; Referral Documents required</p> &nbsp;<span></span> 
            </div>

            <!-- Hospital Description -->
            <div class="pt-3 pb-1">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            </div>
            
            <!-- Image -->
            <div class="">
                <img src="web/hospital-images/anime.jpg" alt="" srcset="">
            </div>

            <!-- Hospital Website Link -->
            <div class="flex flex-row">
                <i class="bi bi-globe"></i>
                <p class="font-semibold">&ensp;Visit Us: <a class="text-blue-500 underline underline-offset-2" href="https://www.netflix.com/ph/">&nbsp;www.phub.com</a></p>
            </div>

            <!-- BOOK NOW Button -->
            <div class="pt-4">
                <button class="bg-blue-500 p-2 rounded-md text-white flex items-center" type="button" data-modal-toggle="defaultModal">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                      </svg>
                    &nbsp;BOOK NOW!
                </button>
            </div>
            
        </div>
        
        <!-- Main modal -->
        <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-900">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-5 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 lg:text-2xl dark:text-white">
                            BOOKING FORM
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                        </p>
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                        </p>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <button data-modal-toggle="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                        <button data-modal-toggle="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- FLOWBITE CDN -->
    <script src="node_modules\flowbite\dist\flowbite.js"></script>

    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>

    <?php include_once 'includes/footer.php'; ?>

</body>
</html>

