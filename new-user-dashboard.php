<?php
    session_start();

    // if (!isset($_SESSION['sessionpatientUserID'])) {
    //             header("location: user-login.php");
    //             die();
    //     } 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Flowbite minified stylesheet -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.3.4/dist/flowbite.min.css"/>
    <title>User Dashboard | SwiftCare PH</title>
    <link rel="icon" href="assets/main-logo-line.png" type="image/x-icon"> 
    <link rel="stylesheet" href="dist/output.css">
    <link rel="stylesheet" href="styling/user-dashboard.css">
</head>
<body class="font-poppins bg-blue-50">

    <!-- Nav Bar -->
    <nav class="text-white py-5 px-5 lg:px-12 w-full bg-gray-900">
        <div class="flex flex-row justify-between items-center   border-slate-600">
            <div class="flex flex-row items-center space-x-4">
            <a href="index" class="flex items-center text-center">
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


    <div class="">
        <div>

        </div>
    </div>
<!-- 
    <script src="js\user-dashboard.js" defer></script> -->
</body>
</html>