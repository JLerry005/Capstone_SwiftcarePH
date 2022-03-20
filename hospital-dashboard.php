<?php
    session_start();

    if (!isset($_SESSION["hospitalID"])) {
        header("location: hospital-login");
    }
?>

<!DOCTYPE html>
<html lang="en">
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
</head>

<body class="bg-blue-200 font-poppins">

    <!-- Main Cointainer -->
    <div class="relative lg:flex min-h-screen bg-white">

        <!-- Mobile Menu -->
        <div class="p-4 bg-gray-800 text-white flex justify-between items-center lg:hidden">
            <a href="#">Swiftcare PH</a>
            <div class="flex items-center space-x-6">
                <button class="hover:text-Yellow"><i class="bi bi-bell-fill"></i> Notifications</button>
                <button class="mobile-menu-button text-2xl rounded hover:text-gray-300 focus:text-gray-300"><i class="bi bi-menu-button-wide"></i></button>
            </div>
            
        </div>

        <!-- Sidebar -->
        <div class="z-10 sidebar-container fixed inset-y-0 left-0 transfrom -translate-x-full lg:sticky lg:translate-x-0 transition duration-200 ease-in-out flex flex-col justify-between bg-footerColor py-8 h-screen w-52 xl:w-64">
            <div class="sideBar relative text-white space-y-5 text-center">
                <a class="font-bold text-2xl mx-6"><i class="bi bi-activity"></i> Swiftcare PH</a>
                <div class="py-1 mx-6">
                    <hr class="border-slate-600">
                </div>
                
    
                <nav class="flex flex-col items-start text-md">
                    <button class="btn w-full text-left p-3 transition duration-150 hover:bg-blue-50 text-white hover:text-white nav-btn btn-dashboard pl-10 drop-shadow-xl" id="btn-dashboard" onclick="show_dashboard()"><i class="bi bi-speedometer text-DarkerYellow"></i>&emsp;Dashboard</button>
                    <button class="btn w-full text-left p-3 transition duration-150 hover:bg-blue-50 text-white hover:text-white nav-btn pl-10 drop-shadow-xl" id="btn-account" onclick="show_details()"><i class="bi bi-gear-fill text-DarkerYellow"></i>&emsp;Edit Details</button>
                    <button class="btn w-full text-left p-3 transition duration-150 hover:bg-blue-50 text-white hover:text-white nav-btn pl-10 drop-shadow-xl" id="btn-account" onclick="show_account()"><i class="bi bi-person-circle text-DarkerYellow"></i>&emsp;Account</button>
                </nav>

            </div>

            <div>  
                <div class="p-2 mx-6 bg-slate-600 rounded-md">
                    <h1 class="text-white font-bold uppercase text-center"><i class="bi bi-building"></i> <?php echo $_SESSION["hospitalName"]; ?></h1>
                </div>
                <hr class="my-5 mx-6 border-slate-600">

                <div class="bg-red-500 p-2 rounded-md mx-6 text-center">
                    <a href="includes/hospital-logout" class="w-full rounded-lg transition duration-150 text-white hover:underline" id="btn-account"><i class="bi bi-arrow-left-circle-fill"></i> Logout</a>
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
                    <h1 class="text-2xl font-bold" id="user-name">Reservations</h1>

                    <div class="flex items-center space-x-3">
                        <div class="bg-gray-500 hover:bg-gray-700 drop-shadow-md rounded-3xl h-3 w-3 p-5 flex items-center justify-center text-gray-300 hover:rounded-xl transition-all">
                            <button onclick="refreshDashboard()" class="text-sm"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg></button>
                        </div>
                        <button class="hover:text-Yellow"><i class="bi bi-bell-fill"></i> Notifications</button>
                    </div>
                    
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

            <!-- Edit Details Contents -->
            <div class=" editDetailsContent tab-contents" id="editDetailsContent" style="display: none;">
                <!-- Refresh Button -->
                <div class="flex flex-1 justify-end space-x-1 text-xs fixed z-10 right-0 mr-16">
                    <div class="bg-gray-500 hover:bg-gray-700 drop-shadow-md rounded-3xl h-5 w-5 p-5 flex items-center justify-center text-gray-300 hover:rounded-xl transition-all">
                        <button class="" onclick="toggle_edit_details()"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg></button>
                    </div>
                    
                    <div class="bg-gray-500 hover:bg-gray-700 drop-shadow-md rounded-3xl h-5 w-5 p-5 flex items-center justify-center text-gray-300 hover:rounded-xl transition-all">
                        <button onclick="refreshEditDetails()"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg></button>
                    </div>
                </div>
                
                <!--Listing Details Form -->
                <form method="POST" id="details-form" enctype="multipart/form-data">
                    <!-- Main Container -->
                    <div class="mainContainer grid grid-cols-12 sm:px-3 md:px-6 2xl:px-12 space-y-6 xl:space-y-0 gap-5 text-sm mb-6 text-gray-700" id="main-container">
                        <!-- Main Details Content -->
                        <div class="col-span-12 xl:col-span-12 p-6 mainDetailsContainer bg-white drop-shadow-md">
                            <h1 class="font-bold">Main Details</h1>
                            <div class="py-6">
                                <hr class="border-gray-300">     
                            </div>
            
                            <!-- Google Map -->
                            <div class="map p-2 mb-5">
                                <iframe class="googleMap w-full rounded-lg" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.9926021403926!2d120.98714038020043!3d14.656361247977395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b429ca9143f7%3A0x7dc98ed31712fe49!2sMCU%20Hospital%20-%20Filemon%20D.%20Tanchoco%2C%20Sr.%20Medical%20Foundation%20Inc.!5e0!3m2!1sen!2sph!4v1637676790012!5m2!1sen!2sph" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                            
                            <!-- Location -->
                            <input type="text" class="focus:outline-none p-3 border border-blue-400" id="hospital-location" name="hospital-location" required>
                            <button class="bg-green-500 p-2 drop-shadow-md rounded-md text-white">Get my Location</button>
                        </div>
            
                        <!-- Listing Details Content -->
                        <div class="col-span-12 xl:col-span-12 p-6 listingDetailsContainer bg-white drop-shadow-md">
                            <h1 class="font-bold">Listing Details</h1>
                            <div class="py-6">
                                <hr class="border-gray-300">     
                            </div>
            
                            <!-- Hospita Name & Type of Hospital -->
                            <div class="flex justify-between">
                                <!-- Hospita Name -->
                                <input type="text" class="focus:outline-none p-3 border border-blue-400" id="hospital-name" name="hospitalName" disabled>
                                <!-- Type of Hospital -->
                                <input class="bg-red-500 drop-shadow-md text-white p-2 focus:outline-none rounded-lg text-center" type="text" id="hospitalType" name="hospital-type" disabled>
                            </div>
            
                            <!-- Hospital Description -->
                            <div>
                                <input type="text" class="focus:outline-none p-3 border border-blue-400" id="hospital-description" name="hospitalDescription" value="Description" required>
                            </div>
                            
                            <!-- Rooms / Beds -->
                            <div>
                                <!-- Rooms -->
                                <input type="checkbox" class="focus:outline-none p-3 border border-blue-400" id="hospital-room" name="room" value="Room">
                                <label for="hospital-room"> room</label>
                                <input type="number" class="focus:outline-none p-3 border border-blue-400" id="room-slot" name="room-slot" min="1" max="99" placeholder="1 ~ 99">
                                
                                <!-- Beds -->
                                <input type="checkbox" class="focus:outline-none p-3 border border-blue-400" id="hospital-bed" name="bed" value="Bed">
                                <label for="hospital-bed"> Bed</label>
                                <input type="number" class="focus:outline-none p-3 border border-blue-400" id="bed-slot" name="bed-slot" min="1" max="99" placeholder="1 ~ 99">
                            </div>
                            
                            <!-- Refferal or other documents -->
                            <div>
                                <input type="checkbox" class="focus:outline-none p-3 border border-blue-400" id="require-documents" name="require-documents" value="Yes">
                                <label for="require-documents">Require Referal or other documents related into hopsital.</label>
                            </div>
                            
                            <!-- Website Link -->
                            <input type="text" class="focus:outline-none p-3 border border-blue-400" name="website-link" id="website-link" placeholder="www.sample.com" required>
                            
                            <!-- Submit Button -->
                            <div class="text-sm flex justify-end p-6">
                                <button type="submit" name="submit" id="submit-details" onclick="submitDetails(event)" class="bg-blue-600 text-white p-3 drop-shadow-md hover:bg-blue-700 rounded-xl hover:scale-105 hover:rounded-md focus:outline-none focus:ring focus:ring-blue-400 transition-all">Save Changes<i class="bi bi-check-lg"></i></button>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Images Form -->
                <div class="grid grid-cols-12 gap-2 2xl:px-12">
                    <!-- Form -->
                    <div class="xl:col-span-4 p-6 othersDetailsContent bg-white drop-shadow-md text-gray-700 text-sm">
                        <h1 class="font-bold"><i class="bi bi-cloud-arrow-up-fill"></i> Upload an Image</h1>
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

                    <!-- <div><button onclick="deleteImage('+(obj.image_id)+')" class="delete-button bg-red-600 rounded-lg p-2 text-white" style="display:none;"><i class="bi bi-trash-fill"></i> Delete</button><a href="Capstone/'+(obj.image_dir)+'" class="xl:col-span-2 w-40 h-40 hover:scale-105 transition duration-200"><img id="'+(obj.image_id)+'" class="card-img" alt="..." src="Capstone/'+(obj.image_dir)+'"/></a></div> -->
                    <!-- <button onclick="deleteImage(id)" class="delete-button bg-red-600 rounded-lg p-2 text-white" style="display:none;"><i class="bi bi-trash-fill"></i> Delete</button>   -->
                    <!-- Image Gallery -->
                    <div class="xl:col-span-8 p-6 bg-white drop-shadow-md text-gray-700 text-sm">
                        <div class="flex items-center justify-between">
                            <h1 class="font-bold"><i class="bi bi-images"></i> Uploaded Images</h1>
                            <button id="edit-images" class="p-2 bg-green-500 drop-shadow-lg text-white hover:bg-green-700 rounded-xl hover:scale-105 hover:rounded-md focus:outline-none focus:ring focus:ring-blue-400 transition-all"><i class="bi bi-trash-fill"></i> Edit Images</button>
                        </div>
                        
                        <div class="py-3">
                            <hr class="border-gray-300">     
                        </div>
                        <div id="delete-button-container"></div>
                        <div class="image-gallery xl:grid xl:grid-cols-6 gap-4" id="image-gallery">
                        
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

                <!------------------ -------------------------------- -->

                <!-- Toasts -->
                <div id="upload-success-toast"><i class="bi bi-cloud-check-fill"></i> Your File was uploaded successfully!</div>
                <div id="success-toast"> <i class="bi bi-check2-circle"></i> Successfully Updated!</div>    
            </div>

            <!-- Account Content -->
            <div id="accountContent" style="display: none;" class="tab-contents accountContent grid grid-cols-12 sm:px-3 md:px-6 2xl:px-12 space-y-6 xl:space-y-0 gap-5 text-sm mb-6 mt-10">

                <!-- Hospital Information Container -->
                <div class="col-span-12 xl:col-span-12 p-6 bg-white drop-shadow-md mb-5">

                    <h1 class="font-bold">Hospital Information</h1>

                    <div class="py-3 mb-3">
                        <hr class="border-gray-500">     
                    </div>

                    <!-- Hospital Name -->
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium dark:text-gray-900"> <i class="bi bi-building text-navColor"></i> Hospital Name</label>
                        <input id="account-hospital-name" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:text-navColor dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" disabled>
                    </div>

                    <!-- Email & Phone Number-->
                    <div class="grid xl:grid-cols-2 xl:gap-6">
                        <!-- Email -->
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-700"> <i class="bi bi-envelope text-navColor"></i> Email</label>
                            <input type="text" id="hospital-email" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:text-navColor dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" disabled>
                        </div>
                        <!-- Phone Number -->
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-900"> <i class="bi bi-telephone text-green-700"></i> Phone Number</label>
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

                    <h1 class="font-bold">Other Information</h1>

                    <div class="py-3 mb-3">
                        <hr class="border-gray-500"> 
                    </div>

                    <!-- Location -->
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium dark:text-gray-900"> <i class="bi bi-geo-alt-fill text-red-700"></i> Location</label>
                        <input id="account-hospital-location" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:text-navColor dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" disabled>
                    </div>
                    <!-- Representative Name & Designation / Position -->
                    <div class="grid xl:grid-cols-2 xl:gap-6">
                        <!-- Representative Name -->
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium dark:text-gray-900"> <i class="bi bi-person text-navColor"></i> Representative Name</label>
                            <input id="hospital-representative" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:text-navColor dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" disabled>
                        </div>
                        <!-- Designation / Position -->
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium dark:text-gray-900"> <i class="bi bi-briefcase text-green-400"></i> Designation / Position</label>
                            <input id="hospital-designation" class="shadow-sm border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:text-navColor dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" disabled>
                        </div>
                    </div>

                    <!-- Supervisor Name -->
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium dark:text-gray-900"> <i class="bi bi-person-fill"></i> Supervisor Name</label>
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
                                        <input type="password" id="hospitalPassword" name="hospitalPassword" aria-describedby="passwordHelpBlock" placeholder="Current password" enterkeyhint="Continue" class="hospitalPassword shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
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
                                        <input type="password" id="newPassword" name="newPassword" aria-describedby="passwordHelpBlock" placeholder="Type your new password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" class="newPassword shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                                        <i class="bi bi-eye-slash text-gray-300 absolute cursor-pointer 2xl:right-0 2xl:top-9 2xl:pr-5 xl:right-0 xl:top-16 xl:pr-5 lg:right-0 lg:top-9 lg:pr-5 md:right-0 md:top-16 md:pr-5 sm:right-0 sm:top-16 sm:pr-5 right-0" id="newTogglePass"></i>
                                        <div id="passwordHelpBlock" class="form-text">
                                        </div>
                                    </div>
                                    <!-- Validate the new Password -->
                                    <div class="relative mb-6" id="repeat-password-div" style="display: none;">
                                        <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Repeat your new password</label>
                                        <input type="password" id="newPasswordRepeat" name="newPasswordRepeat" aria-describedby="passwordHelpBlock" placeholder="Repeat your new password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" class="newPasswordRepeat shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
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

    <!-- Footer -->
    <div>   
        <footer class="p-4 bg-white sm:p-6 dark:bg-gray-800">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="https://flowbite.com" class="flex items-center"></a>
                    <img src="/docs/images/logo.svg" class="mr-3 h-8" alt="FlowBite Logo">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
                    </a>
                    </div>
                    <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                        <div>
                            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Resources</h2>
                            <ul class="text-gray-600 dark:text-gray-400">
                                <li class="mb-4">
                                    <a href="https://flowbite.com" class="hover:underline">Flowbite</a>
                                </li>
                                <li>
                                    <a href="https://tailwindcss.com/" class="hover:underline">Tailwind CSS</a>
                                </li>
                            </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow us</h2>
                        <ul class="text-gray-600 dark:text-gray-400">
                            <li class="mb-4">
                                <a href="https://github.com/themesberg/flowbite" class="hover:underline ">Github</a>
                            </li>
                            <li>
                                <a href="https://discord.gg/4eeurUVvTy" class="hover:underline">Discord</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                    <ul class="text-gray-600 dark:text-gray-400">
                    <li class="mb-4">
                    <a href="#" class="hover:underline">Privacy Policy</a>
                    </li>
                    <li>
                    <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                    </li>
                    </ul>
                    </div>
                    </div>
                    </div>
                    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8">
                    <div class="sm:flex sm:items-center sm:justify-between">
                    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="" class="hover:underline">Flowbite™</a>. All Rights Reserved.
                    </span>
                    <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path></svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path></svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path></svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path></svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </div>
        </footer>    
    </div>

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