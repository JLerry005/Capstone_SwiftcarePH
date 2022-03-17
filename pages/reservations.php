<?php
    // session_start();

    // if (!isset($_SESSION["hospitalID"])) {
    //     header("location: hospital-login.php");
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../dist\output.css">
    <!-- <link rel="stylesheet" href=""> -->
    <script src="js\reservations.js" defer></script>
    <title>Reservations</title>
</head>
<body class="bg-blue-50 scroll-smooth">
    
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

    <div class="mainContainer block text-gray-700 space-y-12">
        <div class="hidden lg:flex justify-between items-center lg:px-8 xl:px-8 2xl:px-16">
            <h1 class="text-2xl font-bold" id="user-name">Reservations</h1>
            <button class="hover:text-Yellow"><i class="bi bi-bell-fill"></i> Notifications</button>
        </div>
        
        <div class="grid grid-cols-12 gap-3 md:p-6 2xl:px-16 xl:gap-6">
            <!-- Pending Reservations Banner -->
            <div id="pending-reservations" onclick="anchor_to_pending()" class="bg-white p-5 md:p-8 col-span-12  lg:col-span-4 2xl:col-start-1 2xl:col-span-4 rounded drop-shadow-md hover:scale-105 hover:drop-shadow-md hover:cursor-pointer transition duration-100 ease-out flex items-center justify-between relative">
                
                <!-- Notification Ping -->
                <div class="">
                    <div class="animate-ping absolute right-0 top-0 mt-3 mr-3 rounded-full bg-red-500 p-2"></div>
                    <span class="absolute right-0 top-0 mt-3 mr-3 rounded-full bg-red-500 p-2"></span>
                </div>
                
                <div class="hover:text-blue-500 transition duration-200 ease-in-out">
                    <h1 class="text-5xl font-bold">14</h1>
                    <h1>Pending Reservations</h1>
                </div>
                <div class="">
                    <i class="bi bi-hourglass-top text-5xl hover:text-blue-500 transition duration-200 ease-in-out"></i>
                </div>
            </div>

            <!-- Upcoming Reservations Banner -->
            <div id="upcoming-reservations" onclick="anchor_to_upcoming()" class="bg-white p-5 md:p-8 col-span-12 lg:col-span-4 2xl:col-span-4 rounded drop-shadow-md hover:scale-105 hover:drop-shadow-md hover:cursor-pointer transition duration-100 ease-out flex items-center justify-between">
                <div class="hover:text-blue-500 transition duration-200 ease-in-out">
                    <h1 class="text-5xl font-bold">20</h1>
                    <h1>Upcoming Reservations</h1>
                </div>
                <div>
                    <i class="bi bi-calendar2-check-fill text-5xl hover:text-blue-500 transition duration-200 ease-in-out"></i>
                </div>
            </div>

            <!-- History Banner -->
            <div id="history-reservations" onclick="anchor_to_history()" class="bg-white p-5 md:p-8 col-span-12 lg:col-span-4 2xl:col-span-4 rounded drop-shadow-md hover:scale-105 hover:drop-shadow-md hover:cursor-pointer transition duration-100 ease-out flex items-center justify-between">
                <div class="hover:text-blue-500 transition duration-200 ease-in-out">
                    <h1 class="text-5xl font-bold">54</h1>
                    <h1>History</h1>
                </div>
                <div>
                    <i class="bi bi-clock-history text-5xl hover:text-blue-500 transition duration-200 ease-in-out"></i>
                </div>
            </div>
        </div>

        <!-- Contents -->
        <!-- Pending Reservations Contents -->
        <div id="pending-contents" class="bg-white p-5 2xl:mx-16 md:mx-6 lg:mx-6 rounded drop-shadow-md text-sm min-h-[450px] scroll-my-7">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row justify-between items-center">
                <h1 class="text-lg font-bold"><i class="bi bi-hourglass-top"></i> Pending Reservations</h1>
                <div class="flex space-x-5">
                    <div class="-space-x-1">
                        <button class="border-2 border-gray-500 rounded rounded-r-none border-r-0 p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Newest</button>
                        <button class="border-2 border-gray-500 rounded rounded-l-none border-l-0 p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Oldest</button>
                    </div>
                    
                    <div class="-space-x-1">
                        <button class="border-2 border-gray-500 rounded rounded-r-none border-r-0 p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Covid</button>
                        <button class="border-2 border-gray-500 rounded rounded-l-none border-l-0 p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Non-Covid</button>
                    </div>
                </div>
            </div>
            
            <hr class="border-slate-200 my-3">
            <p class="mb-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse beatae.</p>

            <!-- Cards go here -->
            <div class="px-5 lg:grid grid-cols-12 gap-3">
                <div class="col-span-6 p-4 bg-gray-700 rounded drop-shadow-lg text-white">
                    <div class="flex justify-between"> 
                        <div><i class="bi bi-person-fill"></i> Patient Name: <b>Nior Goods</b></div>
                        <div><i class="bi bi-clock-history"></i> March 10, 2022 - 10:30PM</div>
                    </div>
        
                    <div>
                        <p><i class="bi bi-calendar2-check-fill"></i> Admission Date: March 20, 2022</p>
                        <p><i class="bi bi-clock"></i> Time of the Day: March 20, 2022</p>
                    </div>
                </div>

                <div class="col-span-6 p-4 bg-gray-700 rounded drop-shadow-lg text-white">
                    <div class="flex justify-between"> 
                        <div><i class="bi bi-person-fill"></i> Patient Name: <b>Nior Goods</b></div>
                        <div><i class="bi bi-clock-history"></i> March 10, 2022 - 10:30PM</div>
                    </div>
        
                    <div>
                        <p><i class="bi bi-calendar2-check-fill"></i> Admission Date: March 20, 2022</p>
                        <p><i class="bi bi-clock"></i> Time of the Day: March 20, 2022</p>
                    </div>
                </div>

                

                
            </div>
        </div>

        <!-- Upcoming Reservations Contents -->
        <div id="upcoming-contents" class="bg-white p-5 2xl:mx-16 md:mx-6 rounded drop-shadow-md text-sm min-h-[450px] scroll-my-7">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row justify-between items-center">
                <h1 class="text-lg font-bold"><i class="bi bi-hourglass-top"></i> Upcoming Reservations</h1>
                <div class="flex space-x-5">
                    <div class="-space-x-1">
                        <button class="border-2 border-gray-500 rounded rounded-r-none border-r-0 p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Newest</button>
                        <button class="border-2 border-gray-500 rounded rounded-l-none border-l-0 p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Oldest</button>
                    </div>
                    
                    <div class="-space-x-1">
                        <button class="border-2 border-gray-500 rounded rounded-r-none border-r-0 p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Covid</button>
                        <button class="border-2 border-gray-500 rounded rounded-l-none border-l-0 p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Non-Covid</button>
                    </div>
                </div>
            </div>

            <hr class="border-slate-200 my-3">
            <p class="mb-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse beatae.</p>
        </div>

        <!-- History Reservations Contents -->
        <div id="history-contents" class="bg-white p-5 2xl:mx-16 md:mx-6 rounded drop-shadow-md text-sm min-h-[450px] scroll-my-7">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row justify-between items-center">
                <h1 class="text-lg font-bold"><i class="bi bi-hourglass-top"></i> History</h1>
                <div class="flex space-x-5">
                    <div class="-space-x-1">
                        <button class="border-2 border-gray-500 rounded rounded-r-none border-r-0 p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Newest</button>
                        <button class="border-2 border-gray-500 rounded rounded-l-none border-l-0 p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Oldest</button>
                    </div>
                    
                    <div class="-space-x-1">
                        <button class="border-2 border-gray-500 rounded rounded-r-none border-r-0 p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Covid</button>
                        <button class="border-2 border-gray-500 rounded rounded-l-none border-l-0 p-1 drop-shadow-md hover:bg-gray-500 focus:bg-gray-500 focus:text-white hover:text-white transition-all px-3">Non-Covid</button>
                    </div>
                </div>
            </div>
            <hr class="border-slate-200 my-3">

            <p class="mb-5">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse beatae.</p>
        </div>
    </div>
    
</body>
</html>