<?php
    session_start();

    if (!isset($_SESSION["hospitalID"])) {
        header("location: hospital-login");
    }
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
    <link rel="stylesheet" href="styling\__edit-details-styling.css">
    <script src="js/\edit-details.js" defer></script>
    <!-- Light Gallery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>
    <title>Edit Details</title> 
</head>
<body class="bg-blue-50">
    <div class="flex flex-1 justify-end space-x-1 pr-6 text-xs">
        <div class="bg-gray-500 hover:bg-gray-700 drop-shadow-md rounded-3xl h-5 w-5 p-5 flex items-center justify-center text-gray-300 hover:rounded-xl transition-all">
            <button class=""><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
              </svg></button>
        </div>
        
        <div class="bg-gray-500 hover:bg-gray-700 drop-shadow-md rounded-3xl h-5 w-5 p-5 flex items-center justify-center text-gray-300 hover:rounded-xl transition-all">
            <button onclick="refreshDetails()"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
              </svg></button>
        </div>
        
    </div>
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

    <form method="POST" id="details-form" enctype="multipart/form-data">

        <!-- Main Container -->
        <div class="mainContainer grid grid-cols-12 p-6 space-y-6 xl:space-y-0 gap-5 text-sm" id="main-container">
           
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
                
                <input type="text" class="focus:outline-none p-3 border border-blue-400" id="hospital-location" name="hospital-location" required>
                <button class="bg-green-500 p-2 drop-shadow-md rounded-md text-white">Get my Location</button>
            </div>

            <!-- Listing Details Content -->
            <div class="col-span-12 xl:col-span-8 p-6 listingDetailsContainer bg-white drop-shadow-md">
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
                <div>
                    <!-- Hospital Description -->
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
                    <label for="require-documents">Require Refferal or other documents related into hopsital.</label>
                </div>
                
            </div>

            <!-- Additional / Others Details Content -->
            <div class="col-span-12 xl:col-span-4 p-6 othersDetailsContent bg-white drop-shadow-md">
                
                <h1 class="font-bold">Additional / Others Details</h1>

                <div class="py-6">
                    <hr class="border-gray-300">     
                </div>
                       
                <!-- Images -->
                <label for="#images">Insert here your hospital images.</label>
                <span class="text-red-500">*</span>
                <input type="file" class="focus:outline-none p-3 border border-blue-400" name="images[]" id="images" value="" multiple="" required>
                


                <!-- Website Link -->
                <input type="text" class="focus:outline-none p-3 border border-blue-400" name="website-link" id="website-link" placeholder="www.sample.com" required>

            </div>


            
        </div>

        <div class="text-sm flex justify-end p-6">
            <!-- Submit Button -->
            <button type="submit" name="submit" class="bg-blue-600 text-white p-3 drop-shadow-md hover:bg-blue-700 rounded-xl hover:scale-105 hover:rounded-md transition-all">Save Changes<i class="bi bi-check-lg"></i></button>
        </div>
    </form>

    <div id="success-toast"> <i class="bi bi-check2-circle"></i> Successfully Updated!</div>    
    
    <div class="col-span-12" >
    <!-- Imgae Gallery -->
        <div class="image-gallery" id="image-gallery">
        </div>
    </div>
</body>
</html>