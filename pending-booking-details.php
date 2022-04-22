<?php
    session_start();
    include_once 'includes/dbh-inc.php';

    $bookingID = $_GET["bookingID"];

    $reservationType;
    $timeStamp;
    $firstName;
    $lastName;
    $date;
    $time;
    $contactNumber;
    $patientConcern;
    $specifyConcern;
    $emailAddress;
    $userID;
    $listingID;
    $hospitalName;
    $referral;

    $getFullDetails = $conn->query("SELECT * FROM userbooking WHERE ID = $bookingID;") or die($conn->error);
    while ($row = mysqli_fetch_assoc($getFullDetails)) {
        $reservationType = $row['patientReservationType'];
        $timeStamp = $row['bookingTimestamp'];
        $firstName = $row['patientFirstName'];
        $lastName = $row['patientLastName'];
        $date = $row['patientDate'];
        $time = $row['patientTime'];
        $contactNumber = $row['patientPhoneNumber'];
        $patientConcern = $row['patientConcern'];
        $severity = $row["severity"];
        $specifyConcern = $row["patientSpecifyConcern"];
        $emailAddress = $row["patientEmail"];
        $listingID = $row["listing_id"];
        $userID = $row["user_id"];
        $hospitalName = $row["patientHospitalName"];
    }

    $listingID = $_SESSION["listing-id"];    
    $referral;

    $getDetailsReferral = $conn->query("SELECT * FROM hospitallisting WHERE listing_id = $listingID;") or die($conn->error);
    while ($data = mysqli_fetch_assoc($getDetailsReferral)) {
        $referral = $data["additional_docs"];
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
    <!--lightGallery CSS CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <!-- TAILWIND CSS Link -->
    <link rel="stylesheet" href="dist/output.css">
    <!-- CSS Link -->
    <link rel="stylesheet" href="styling/_pending-booking-details.css">
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <!-- Remix Icon CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- TITLE -->
    <title>Patient Details | SwiftCare PH</title>
    <!-- JQUERY LINK -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- HEADER ICON -->
    <link rel="icon" href="assets/main-logo-line.png" type="image/x-icon">
</head>
<body class="text-gray-700 bg-blue-50 font-poppins">
    <input type="hidden" name="userID" id="userID" value="<?php echo $userID ?>">
    <input type="hidden" name="listingID" id="listingID" value="<?php echo $listingID ?>">
    <input type="hidden" name="bookingID" id="bookingID" value="<?php echo $bookingID ?>">
    <input type="hidden" name="hospitalName" id="hospitalName" value="<?php echo $hospitalName ?>">

    <div class="container p-10 mx-64">
        <!-- Go Back Button -->
        <a href="hospital-dashboard" class="hover:underline flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
              </svg>
            &nbsp;Go back
        </a>
        <!-- Grid Container -->
        <div class="grid grid-cols-8 gap-6 mt-10">

         <!---------- This is the first row of Container ---------->

            <!-- left side  -->
            <div class="col-span-4 h-24">
                <!-- first name & Last name -->
                <div class="flex items-center ml-2">
                    <div class="flex items-center space-x-2">
                        <?php
                            echo ' <img src="https://avatars.dicebear.com/api/big-smile/'.$firstName.''.$lastName.'.svg?b=%231a56bb&r=50"  class="w-14 mr-4">'
                        ?>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-blue-700">Patient Name</p>
                        <div class="flex items-center capitalize font-bold text-gray-900 text-3xl">
                            <p id="firstname" name="firstname"><?php echo $firstName ?></p>&nbsp;
                            <p id="lastname" name="lastname"><?php echo $lastName ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- right side -->
            <div class="col-span-3 h-24">
                <div class="flex justify-end items-center mr-8 font-medium">
                    <!-- <h1 class="font-bold">Date of Request:</h1> -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p id="time-stamp" name="time-stamp"><?php echo $timeStamp ?></p>
                </div>
            </div>

        <!---------- This is the second row of Container ---------->

            <!-- Patient Concern Container -->
            <div class="col-span-7 bg-white h-56 drop-shadow-lg p-6 px-10 rounded-3xl">
                <div class="flex items-center text-md text-blue-700 font-bold border-b border-gray-300 pb-2">
                    <h1>Patient Concern</h1>
                </div>
                <!-- Patient Concern Content -->
                <div class="flex justify-between items-center p-10 space-x-10 space-y-2">
                    <!-- Concern of Patient -->
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-12 w-12"><path fill="none" d="M0 0H24V24H0z"/><path d="M8 3v2H6v4c0 2.21 1.79 4 4 4s4-1.79 4-4V5h-2V3h3c.552 0 1 .448 1 1v5c0 2.973-2.162 5.44-5 5.917V16.5c0 1.933 1.567 3.5 3.5 3.5 1.497 0 2.775-.94 3.275-2.263C16.728 17.27 16 16.22 16 15c0-1.657 1.343-3 3-3s3 1.343 3 3c0 1.371-.92 2.527-2.176 2.885C19.21 20.252 17.059 22 14.5 22 11.462 22 9 19.538 9 16.5v-1.583C6.162 14.441 4 11.973 4 9V4c0-.552.448-1 1-1h3zm11 11c-.552 0-1 .448-1 1s.448 1 1 1 1-.448 1-1-.448-1-1-1z" fill="rgba(50,152,219,1)"/></svg>
                        <div>
                            <h1 class="font-bold">Concern</h1>
                            <p id="patient-concern" name="patient-concern"><?php echo $patientConcern?></p>
                        </div>
                    </div>

                    <!-- Specify Concern of Patient -->
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-12 w-12"><path fill="none" d="M0 0H24V24H0z"/><path d="M17 5v2c1.657 0 3 1.343 3 3v11c0 .552-.448 1-1 1H5c-.552 0-1-.448-1-1V10c0-1.657 1.343-3 3-3V5h10zm-4 6h-2v2H9v2h1.999L11 17h2l-.001-2H15v-2h-2v-2zm6-9v2H5V2h14z" fill="rgba(24,49,77,1)"/></svg>
                        <div>
                            <h1 class="font-bold">Specify Concern</h1>
                            <p id="specify-concern" name="specify-concern" ><?php echo $specifyConcern?></p>

                            <?php
                                if ($patientConcern == "Covid") {
                                    echo '<p id="specify-concern" name="specify-concern" >'.$severity.'</p>';
                                }
                            ?>
                            <!-- <p id="specify-concern" name="specify-concern" ><?php echo $severity?></p> -->
                        </div>
                    </div>

                    <!-- Resevation Type -->                    
                    <div class="flex items-center space-x-2 capitalize">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-12 w-12"><path fill="none" d="M0 0H24V24H0z"/><path d="M2 21v-2h2V4.835c0-.484.346-.898.821-.984l9.472-1.722c.326-.06.638.157.697.483.007.035.01.07.01.107v1.28L19 4c.552 0 1 .448 1 1v14h2v2h-4V6h-3v15H2zm10-10h-2v2h2v-2z" fill="rgba(170,43,29,1)"/></svg>                        <div>
                            <h1 class="font-bold">Reservation Type</h1>
                            <p id="reservation-type" name="reservation-type"><?php echo $reservationType?></p>
                        </div>
                    </div>
                    <p class="hidden" id="remarks" name="remarks" value="">Rejected</p>
                </div>
            </div>
            
        <!---------- This is the third row of Container ---------->

            <!-- Contact Details Container -->
            <div class="col-span-4 bg-white h-56 drop-shadow-lg p-6 px-10 rounded-3xl">
                <!-- Schedule Booking Content -->
                <div class="flex items-center text-md text-blue-700 font-bold border-b border-gray-300 pb-2">
                    <h1>Contact Details</h1>
                </div>
                <!-- Phone Number and Email Address -->
                <div class="flex justify-between items-center p-10 space-x-10">
                    <!-- Phone Number -->
                    <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-12 w-12"><path fill="none" d="M0 0h24v24H0z"/><path d="M21 16.42v3.536a1 1 0 0 1-.93.998c-.437.03-.794.046-1.07.046-8.837 0-16-7.163-16-16 0-.276.015-.633.046-1.07A1 1 0 0 1 4.044 3H7.58a.5.5 0 0 1 .498.45c.023.23.044.413.064.552A13.901 13.901 0 0 0 9.35 8.003c.095.2.033.439-.147.567l-2.158 1.542a13.047 13.047 0 0 0 6.844 6.844l1.54-2.154a.462.462 0 0 1 .573-.149 13.901 13.901 0 0 0 4 1.205c.139.02.322.042.55.064a.5.5 0 0 1 .449.498z" fill="rgba(107,203,119,1)"/></svg>
                        <div class="">
                            <h1 class="font-bold">Phone Number</h1>
                            <p id="contact-number" name="contact-number"><?php echo $contactNumber?></p>
                        </div>
                    </div>
                    <!-- Email Address -->
                    <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-12 w-12"><path fill="none" d="M0 0h24v24H0z"/><path d="M22 13.341A6 6 0 0 0 14.341 21H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v9.341zm-9.94-1.658L5.648 6.238 4.353 7.762l7.72 6.555 7.581-6.56-1.308-1.513-6.285 5.439zM19 22l-3.536-3.536 1.415-1.414L19 19.172l3.536-3.536 1.414 1.414L19 22z" fill="rgba(5,89,91,1)"/></svg>
                        <div>
                            <h1 class="font-bold">Email Address</h1>
                            <p id="email-add" name="email-add"><?php echo $emailAddress?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Schedule Booking Container -->
            <div class="col-span-3 bg-white h-56 drop-shadow-lg p-6 px-10 rounded-3xl">
                <!-- Schedule Booking Content -->
                <div class="flex items-center text-md text-blue-700 font-bold border-b border-gray-300 pb-2">
                    <h1>Schedule of Booking</h1>
                </div>
                <!-- Date -->                
                <div class="flex justify-between items-center p-10 space-x-10">
                    <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-12 w-12"><path fill="none" d="M0 0h24v24H0z"/><path d="M17 3h4a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h4V1h2v2h6V1h2v2zM4 9v10h16V9H4zm2 4h5v4H6v-4z" fill="rgba(190,140,99,1)"/></svg>
                        <div>
                            <h1 class="font-bold">Date</h1>
                            <p id="date" name="date"><?php echo $date?></p>
                        </div>
                    </div>
                    <!-- Time -->                
                    <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-12 w-12"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm1-10V7h-2v7h6v-2h-4z" fill="rgba(169,113,85,1)"/></svg>                        <div>
                            <h1 class="font-bold">Time</h1>
                            <p id="time" name="time"><?php echo $time?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!---------- This is the fourth row of Container ---------->
            <!-- Refferal Image -->
            <div class=" col-span-7 bg-white px-10 py-10 drop-shadow-md rounded-3xl" >
                
                <!-- Referral Content -->
                <div class="items-center text-md text-blue-700 font-bold border-b border-gray-300 pb-2">
                    <h1>Referral Files</h1>
                </div>

                <div class="grid grid-cols-4 gap-x-4 gap-y-4 p-2 mr-2 mt-4" >
                <!-- <div id="image-gallery" class="image-gallery grid grid-cols-4 gap-x-4 gap-y-4 p-2 mr-6 mt-4" > -->
                    <?php

                        $imageDir;
                        $output = '';
                        $getImages = $conn->query("SELECT * FROM referralfiles WHERE booking_id = $bookingID") or die($conn->error);

                        if (mysqli_num_rows($getImages)==0) {
                            $output = '<p class="col-span-4 text-center font-bold text-gray-600 self-center "><i class="bi bi-emoji-frown-fill"></i> The hospital will not required a Referral.</p> ';
                        }
                        else{

                            while ($imageRow = mysqli_fetch_assoc($getImages)) {
                                $imageDir = $imageRow["file_dir"];
        
                                $output .='

                                    <div class="col-span-1"> 
                                        <a href="/Capstone'.$imageDir.'" target="_blank" class="fetched-image col-span-1 bg-gray-900 rounded-lg">
                                            <img id="" class="card-img w-full h-36 border-solid border-2 border-gray-800 rounded-md hover:scale-105 transition duration-200" alt="..." src="/Capstone'.$imageDir.'"/>
                                        </a>
                                    </div>
                               
                                ';
        
                            }
                        }
                        echo $output;
                    ?>  

                </div>
            </div>
        </div>

        <!-- Accept and Reject Button -->
        <div class="flex justify-end space-x-2 mr-52 mt-5">
            <!-- Accept Button -->
            <button type="submit" id="btn-accept" name="btn-accept" class="p-3 px-7 rounded-lg font-bold bg-gray-900 hover:bg-gray-800 text-white">Accept</button>
            <!-- Reject Button -->            
            <button type="submit" id="btn-reject" name="btn-reject" class="p-3 px-7 rounded-lg font-bold bg-red-600 hover:bg-red-500 text-white">Reject</button>
        </div> 
    </div>

    <!-- Confirmation of Accept Modal -->
    <div id="AcceptModal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-gray-900 rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex justify-end p-2">

                </div>
                <!-- Modal body -->
                <div class="p-6 pt-0 text-center">
                    <svg class="mx-auto mb-4 w-14 h-14 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-300">Are you sure you want to <span class="text-blue-500 font-bold">accept</span>  this booking request?</h3>

                    <!-- Cancel Button -->
                    <button type="button" id="btnCancelAccept"  class="text-gray-300 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-600 rounded-lg border border-gray-500 font-medium px-5 py-2.5 hover:text-white focus:z-10 mr-2 mb-2">Cancel</button>
                    <!-- Continue Button       -->
                    <button type="button" id="btnContinueAccept"  class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg px-5 py-2.5 text-center mr-2 mb-2">
                        Continue
                    </button>
                    <button type="hidden" data-modal-toggle="AcceptModal"></button>
                    <!-- Loading Message -->
                    <div class="flex items-end justify-center text-lg mt-5" style="display:none;" id="reservation-loader">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 animate-pulse" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z" />
                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z" />
                        </svg>
                            &ensp;<p>Accepting Reservation..</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation of Reject Modal -->
    <div id="rejectModal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-gray-900 rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex justify-end p-2">
                </div>
                <!-- Modal body -->
                <div class="p-6 pt-0 text-center">
                    <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-300">Are you sure you want to <span class="text-red-600 font-bold">reject</span>  this booking request?</h3>
                    <!-- Cancel Button -->
                        <button type="button" id="btnCancelReject" class="text-gray-300 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-600 rounded-lg border border-gray-500 font-medium px-5 py-2.5 hover:text-white focus:z-10 mr-2 mb-2">Cancel</button>
                    <!-- Continue Button -->
                        <button type="button" id="btnContinueReject" class="focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark: dark: dark:focus:ring-red-900">
                            Continue
                        </button>
                    <button type="hidden" id="btnCancelReject"data-modal-toggle="rejectModal"></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Light Gallery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>

    <!-- JavaScript Link -->
    <script src="js\pending-booking-details.js" defer></script>

    <!-- FLOWBITE CDN -->
    <script src="node_modules\flowbite\dist\flowbite.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>

    <?php include_once 'includes/footer.php'; ?>

    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>

    <!-- Tippy JS -->
    <script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
</body>
</html>