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
    <title>View Full Details | SwiftCare PH</title>
    <!-- JQUERY LINK -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- HEADER ICON -->
    <link rel="icon" href="assets/main-logo-line.png" type="image/x-icon">
</head>
<body class="text-gray-700">
    <input type="hidden" name="userID" id="userID" value="<?php echo $userID ?>">
    <input type="hidden" name="listingID" id="listingID" value="<?php echo $listingID ?>">
    <input type="hidden" name="bookingID" id="bookingID" value="<?php echo $bookingID ?>">
    <input type="hidden" name="hospitalName" id="hospitalName" value="<?php echo $hospitalName ?>">
    <div class="container p-10 mx-64">

        <div class="">
            <h1 class="font-bold">Date of Booking</h1>
            <p id="time-stamp" name="time-stamp"><?php echo $timeStamp ?></p>
        </div>

        <div class="">
            <h1 class="font-bold">Firstname</h1>
            <p id="firstname" name="firstname"><?php echo $firstName ?></p>
        </div>

        <div class="">
            <h1 class="font-bold">Lastname</h1>
            <p id="lastname" name="lastname"><?php echo $lastName ?></p>
        </div>

        <div class="">
            <h1 class="font-bold">Date</h1>
            <p id="date" name="date"><?php echo $date?></p>
        </div>

        <div class="">
            <h1 class="font-bold">Time</h1>
            <p id="time" name="time"><?php echo $time?></p>
        </div>

        <div class="">
            <h1 class="font-bold">Phone Number</h1>
            <p id="contact-number" name="contact-number"><?php echo $contactNumber?></p>
        </div>

        <div class="">
            <h1 class="font-bold">Email Address</h1>
            <p id="email-add" name="email-add"><?php echo $emailAddress?></p>
        </div>

        <div class="">
            <h1 class="font-bold">Concern</h1>
            <p id="patient-concern" name="patient-concern"><?php echo $patientConcern?></p>
        </div>

        <div class="">
            <h1 class="font-bold">Specify Concern</h1>
            <p id="specify-concern" name="specify-concern"><?php echo $specifyConcern?></p>
        </div>

        <div class="">
            <h1 class="font-bold">Reservation Type</h1>
            <p id="reservation-type" name="reservation-type"><?php echo $reservationType?></p>
        </div>

        <div>
            <button type="submit" id="btn-accept" name="btn-accept" class="p-3 rounded-lg font-bold bg-blue-600 text-white">Accept</button>
            <button type="submit" id="btn-reject" name="btn-reject" class="p-3 rounded-lg font-bold bg-red-600 text-white">Reject</button>
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