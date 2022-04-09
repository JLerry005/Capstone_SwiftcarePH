<?php
    session_start();
    include_once 'includes/dbh-inc.php';

    $bookingID = $_GET["bookingID"];
    // $bookingID = $_GET["bookingID"];

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
        $specifyConcern = $row["patientSpecifyConcern"];
        $emailAddress = $row["patientEmail"];
        $listingID = $row["listing_id"];
        $userID = $row["user_id"];
        $hospitalName = $row["patientHospitalName"];
    }

    // echo $firstName;
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
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
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
        <!-- Grid Container -->
        <div class="grid grid-cols-8 gap-6">

            <!-- This is the first row Container -->

            <!-- left side  -->
            <div class="col-span-4 h-24">
                <!-- first name & Last name -->
                <div class="flex items-center ml-2">
                    <div class="flex items-center space-x-2">
                        <img src="https://avatars.dicebear.com/api/big-smile/'.$firstName.'.svg?b=%231a56bb&r=50"  class="w-14 mr-4" value="<?php echo $firstName ?>">
                    </div>
                    <div>
                        <p class="text-xs font-medium text-blue-700">Patient Name</p>
                        <div class="flex items-center capitalize font-bold text-gray-900 text-3xl">
                            <p id="firstname" name="firstname"><?php echo $firstName ?></p>&nbsp;
                            <p id="lastname" name="lastname"><?php echo $lastName ?></p>
                        </div>
                    </div>

                </div>

            </div>
            <!-- right side -->
            <div class="col-span-3 h-24">
                <div class="flex justify-end items-center mr-8">
                    <!-- <h1 class="font-bold">Date of Request:</h1> -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p id="time-stamp" name="time-stamp"><?php echo $timeStamp ?></p>
                </div>
            </div>

            <div class="col-span-7 bg-white h-56 drop-shadow-lg p-6 px-10 rounded-3xl">
                <div class="flex items-center text-md text-blue-700 font-bold border-b border-gray-400 pb-2">
                    <h1>Patient Concern</h1>
                </div>
                <div class="flex justify-between items-center p-10 space-x-10 space-y-2">
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-800 hover:text-blue-700" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <h1 class="font-bold">Concern</h1>
                            <p id="patient-concern" name="patient-concern"><?php echo $patientConcern?></p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-800 hover:text-blue-700" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <h1 class="font-bold">Specify Concern</h1>
                            <p id="specify-concern" name="specify-concern"><?php echo $specifyConcern?></p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-800 hover:text-blue-700" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <h1 class="font-bold">Reservation Type</h1>
                            <p id="reservation-type" name="reservation-type"><?php echo $reservationType?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- This is the Second row Container -->

            <!-- Main Details -->
            <div class="col-span-4 bg-white h-56 drop-shadow-lg p-6 px-10 rounded-3xl">
                <div class="flex items-center text-md text-blue-700 font-bold border-b border-gray-400 pb-2">
                    <h1>Contact Details</h1>
                </div>
                <div class="flex justify-between items-center p-10 space-x-10">
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-800 hover:text-blue-700" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                        </svg>
                        <div class="">
                            <h1 class="font-bold">Phone Number</h1>
                            <p id="contact-number" name="contact-number"><?php echo $contactNumber?></p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-800 hover:text-blue-700" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                        <div>
                            <h1 class="font-bold">Email Address</h1>
                            <p id="email-add" name="email-add"><?php echo $emailAddress?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-3 bg-white h-56 drop-shadow-lg p-6 px-10 rounded-3xl">
                <div class="flex items-center text-md text-blue-700 font-bold border-b border-gray-400 pb-2">
                    <h1>Schedule of Booking</h1>
                </div>
                <div class="flex justify-between items-center p-10 space-x-10">
                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-800 hover:text-blue-700" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <h1 class="font-bold">Date</h1>
                            <p id="date" name="date"><?php echo $date?></p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-800 hover:text-blue-700" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <h1 class="font-bold">Time</h1>
                            <p id="time" name="time"><?php echo $time?></p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="flex justify-end space-x-2 mr-52 mt-5">
            <button type="submit" id="btn-accept" name="btn-accept" class="p-3 px-7 rounded-lg font-bold bg-gray-900 text-white">Accept</button>
            <button type="submit" id="btn-reject" name="btn-reject" class="p-3 px-7 rounded-lg font-bold bg-red-600 text-white">Reject</button>
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
                    <button type="button" id="btnContinueAccept"  class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg px-5 py-2.5 text-center mr-2 mb-2">
                        Continue
                    </button>
                    <button type="button" id="btnCancelAccept"  class="text-gray-300 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-600 rounded-lg border border-gray-500 font-medium px-5 py-2.5 hover:text-white focus:z-10 mr-2 mb-2">Cancel</button>
                    <button type="hidden" data-modal-toggle="AcceptModal"></button>
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
                    <button type="button" id="btnContinueReject" class="focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark: dark: dark:focus:ring-red-900">
                        Continue
                    </button>
                    <button type="button" id="btnCancelReject" class="text-gray-300 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-600 rounded-lg border border-gray-500 font-medium px-5 py-2.5 hover:text-white focus:z-10 mr-2 mb-2">Cancel</button>
                    <button type="hidden" id="btnCancelReject"data-modal-toggle="rejectModal"></button>
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

    <script src="js\pending-booking-details.js" defer></script>
</body>
</html>