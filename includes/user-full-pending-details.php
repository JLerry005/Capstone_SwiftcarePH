<?php

    include_once 'dbh-inc.php';

    $bookingID = $_GET["bookingID"];

    $reservationType;
    $timeStamp;
    $firstName;
    $lastName;
    $date;
    $time;
    $contactNumber;
    $email;
    $bookingID;
    $patientConcern;
    $specifyConcern;
    $hospitalName;
    $listingID;

    $referralFiles;

    $output = '';

    $sql = $conn->query("SELECT * FROM userbooking WHERE ID = $bookingID;") or die($conn->error);
    while ($row = mysqli_fetch_assoc($sql)) {
        $reservationType = $row['patientReservationType'];
        $timeStamp = $row['bookingTimestamp'];
        $firstName = $row['patientFirstName'];
        $lastName = $row['patientLastName'];
        $date = $row['patientDate'];
        $time = $row['patientTime'];
        $contactNumber = $row['patientPhoneNumber'];
        $email = $row["patientEmail"];
        $bookingID = $row['ID'];
        $patientConcern = $row['patientConcern'];
        $specifyConcern = $row['patientSpecifyConcern'];
        $hospitalName = $row['patientHospitalName'];
        $listingID = $row['listing_id'];
    }

    // Check IF specify concern is null
    if ($specifyConcern == '') {
        $specifyConcern = 'N/A';
    }

    // Get Images if available
    $getImages = $conn->query("SELECT * FROM referralfiles WHERE booking_id  = $bookingID;") or die($conn->error);
    // while ($row = mysqli_fetch_assoc($getImages)) {
    //     $referralFiles = $row['referral_id'];
    // }
    if (mysqli_num_rows($getImages)==0) {
        $referralFiles = '<p class="font-medium text-md">N/A</p>';
    }else {
        $referralFiles = '<button onclick="showImages('.$bookingID.')" class="font-medium text-md hover:underline cursor-pointer">See Images</button>';
    }

    $output .='
        <!-- For Mobile -->
        <div class="md:hidden space-y-7">
            <!-- Timestamp -->
            <div class="flex justify-end mb-10">
                <p class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                    &ensp;'.$timeStamp.'
                </p>
            </div>
            <!-- Status -->
            <div class="flex items-start space-x-5">
                <div>
                    <img src="assets/reservations-images/status.png" alt="" class="w-10">
                </div>

                <div class="">
                    <div class="mb-4">
                        <h1 class="text-slate-400">Status</h1>
                        <h1 class="font-bold text-lg">Pending For Review</h1>
                    </div>
                </div>
            </div>

            <!-- First and Last Name -->
            <div class="flex items-start space-x-5"> 
                <div>
                    <img src="https://avatars.dicebear.com/api/big-smile/'.$firstName.''.$lastName.'.svg?b=%231a56bb&r=50" alt="" class="w-10">
                </div> 

                <div class="flex items-start space-x-5">
                    <!-- Firstname -->
                    <div class="mb-4">
                        <h1 class="text-slate-400">Firstname</h1>
                        <h1 class="font-bold text-lg">'.$firstName.'</h1>
                    </div>

                    <!-- Lastname -->
                    <div class="mb-4">
                        <h1 class="text-slate-400">Lastname</h1>
                        <h1 class="font-bold text-lg">'.$lastName.'</h1>
                    </div>
                </div>
            </div>

            <!-- Date and Time -->
            <div class="flex items-start space-x-5">
                <div>
                    <img src="assets/reservations-images/schedule.png" alt="" class="w-10">
                </div>

                <div class="flex items-start space-x-5">
                    <!-- date -->
                    <div class="mb-4">
                        <h1 class="text-slate-400">Date</h1>
                        <h1 class="font-bold text-lg">'.$date.'</h1>
                    </div>

                    <!-- time -->
                    <div class="mb-4">
                        <h1 class="text-slate-400">Time</h1>
                        <h1 class="font-bold text-lg">'.$time.'</h1>
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="flex items-start space-x-5">
                <div>
                    <img src="assets/reservations-images/email.png" alt="" class="w-10">
                </div>

                <div class="">
                    <div class="mb-4">
                        <h1 class="text-slate-400">Email</h1>
                        <h1 class="font-bold text-lg">'.$email.'</h1>
                    </div>
                </div>
            </div>

            <!-- Phone -->
            <div class="flex items-start space-x-5">
                <div>
                    <img src="assets/reservations-images/mobile.png" alt="" class="w-10">
                </div>

                <div class="">
                    <div class="mb-4">
                        <h1 class="text-slate-400">Mobile number</h1>
                        <h1 class="font-bold text-lg">'.$contactNumber.'</h1>
                    </div>
                </div>
            </div>

            <!-- Concern -->
            <div class="flex items-start space-x-5">
                <div>
                    <img src="assets/reservations-images/stethoscope.png" alt="" class="w-10">
                </div>

                <div class="">
                    <div class="mb-4">
                        <h1 class="text-slate-400">Concern</h1>
                        <h1 class="font-bold text-lg">'.$patientConcern.'</h1>
                    </div>
                </div>
            </div>

            <!-- Specify Concern -->
            <div class="flex items-start space-x-5">
                <div>
                    <img src="assets/reservations-images/text.png" alt="" class="w-10">
                </div>

                <div class="">
                    <div class="mb-4">
                        <h1 class="text-slate-400">Concern Details</h1>
                        <h1 class="font-medium text-sm">'.$specifyConcern.'</h1>
                    </div>
                </div>
            </div>

            <!-- hospital Name -->
            <div class="flex items-start space-x-5">
                <div>
                    <img src="assets/reservations-images/hospitalbuilding.png" alt="" class="w-10">
                </div>

                <div class="">
                    <div class="mb-4">
                        <h1 class="text-slate-400">Hospital</h1>
                        <a href="hospital-overview?listingID='.$listingID.'" target="_blank" class="font-medium text-sm hover:underline">'.$hospitalName.'</a>
                    </div>
                </div>
            </div>

            <!-- Reservation Type -->
            <div class="flex items-start space-x-5">
                <div>
                    <img src="assets/reservations-images/bed.png" alt="" class="w-10">
                </div>

                <div class="">
                    <div class="mb-4">
                        <h1 class="text-slate-400">Reservation Type</h1>
                        <h1 class="font-medium text-lg">'.$reservationType.'</h1>
                    </div>
                </div>
            </div>

            <!-- Attatchments -->
            <div class="flex items-start space-x-5">
                <div>
                    <img src="assets/reservations-images/text.png" alt="" class="w-10">
                </div>

                <div class="">
                    <div class="mb-4">
                        <h1 class="text-slate-400">Referral Images Attachment</h1>
                        '.$referralFiles.'
                    </div>
                </div>
            </div>
        </div>
        
        <!-- for MD up new -->
        <div class="hidden md:block text-sm px-8">
            <!-- Timestamp -->
            <div class="flex justify-end mb-10">
                <p class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                    &ensp;'.$timeStamp.'
                </p>
            </div>

            <!-- First and Last Name -->
            <div class="flex justify-between items-start border-dotted border-b-2 mb-14">
                <div class="flex items-start space-x-5 mb-3"> 
                    <div>
                        <img src="https://avatars.dicebear.com/api/big-smile/'.$firstName.''.$lastName.'.svg?b=%231a56bb&r=50" alt="" class="w-10">
                    </div> 

                    <div class="flex items-start space-x-3">
                        <!-- Firstname -->
                        <div class="mb-4">
                            <h1 class="text-slate-400">Full Name</h1>
                            <h1 class="font-bold text-md md:text-xl">'.$firstName.' '.$lastName.'</h1>
                        </div>
                    </div>
                </div>

                <!-- Status -->
                <div class="flex items-start space-x-5 mb-3">
                    <div>
                        <img src="assets/reservations-images/status.png" alt="" class="w-10">
                    </div>

                    <div class="">
                        <div class="mb-4">
                            <h1 class="text-slate-400">Status</h1>
                            <h1 class="font-bold text-md md:text-xl">Pending For Review</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- First Row -->
            <div class="flex items-start justify-between space-x-10 mb-5">
                <!-- hospital name -->
                <div class="flex items-start space-x-2 mb-3 border-dotted border-b-2 shrink">
                    <div>
                        <img src="assets/reservations-images/hospitalbuilding.png" alt="" class="w-8">
                    </div>
                    <div class="">
                        <div class="mb-4">
                            <h1 class="text-slate-400">Hospital</h1>
                            <a href="hospital-overview?listingID='.$listingID.'" target="_blank" class="font-bold text-sm hover:underline">'.$hospitalName.'</a>
                        </div>
                    </div>
                </div>

                <!-- Reservation Type -->
                <div class="flex items-start space-x-2 mb-3 border-dotted border-b-2 shrink-0">
                    <div>
                        <img src="assets/reservations-images/bed.png" alt="" class="w-8">
                    </div>
                    <div class="">
                        <div class="mb-4">
                            <h1 class="text-slate-400">Reservation Type</h1>
                            <h1 class="font-bold text-sm">'.$reservationType.'</h1>
                        </div>
                    </div>
                </div>

                <!-- Concern -->
                <div class="flex items-start space-x-2 mb-10 border-dotted border-b-2 shrink-0">
                    <div>
                        <img src="assets/reservations-images/stethoscope.png" alt="" class="w-8">
                    </div>
                    <div class="">
                        <div class="mb-4">
                            <h1 class="text-slate-400">Concern</h1>
                            <h1 class="font-bold text-sm">'.$patientConcern.'</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Row -->
            <div class="flex items-start justify-between space-x-10 mb-5">
                <!-- Date -->
                <div class="flex items-start space-x-2 mb-3 border-dotted border-b-2 shrink-0">
                    <div>
                        <img src="assets/reservations-images/calendar.png" alt="" class="w-8">
                    </div>
                    <div class="">
                        <div class="mb-4">
                            <h1 class="text-slate-400">Date</h1>
                            <h1 class="font-bold text-sm">'.$date.'</h1>
                        </div>
                    </div>
                </div>

                <!-- Time -->
                <div class="flex items-start space-x-2 mb-3 border-dotted border-b-2 shrink-0">
                    <div>
                        <img src="assets/reservations-images/hourglass.png" alt="" class="w-8">
                    </div>
                    <div class="">
                        <div class="mb-4">
                            <h1 class="text-slate-400">Time</h1>
                            <h1 class="font-bold text-sm">'.$time.'</h1>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="flex items-start space-x-2 mb-10 border-dotted border-b-2 shrink-0">
                    <div>
                        <img src="assets/reservations-images/email.png" alt="" class="w-8">
                    </div>
                    <div class="">
                        <div class="mb-4">
                            <h1 class="text-slate-400">Email</h1>
                            <h1 class="font-bold text-sm">'.$email.'</h1>
                        </div>
                    </div>
                </div>

                <!-- Phone -->
                <div class="flex items-start space-x-2 mb-10 border-dotted border-b-2 shrink-0">
                    <div>
                        <img src="assets/reservations-images/mobile.png" alt="" class="w-8">
                    </div>
                    <div class="">
                        <div class="mb-4">
                            <h1 class="text-slate-400">Mobile number</h1>
                            <h1 class="font-bold text-sm">'.$contactNumber.'</h1>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Third Row -->
            <div class="flex items-start justify-between space-x-5">
                <!-- Attatchments -->
                <div class="flex items-start space-x-5 mb-10 border-dotted border-b-2">
                    <div>
                        <img src="assets/reservations-images/attachments.png" alt="" class="w-10">
                    </div>

                    <div class="">
                        <div class="mb-4">
                            <h1 class="text-slate-400">Referral Attachment</h1>
                            '.$referralFiles.'
                        </div>
                    </div>
                </div>

                <!-- Concern Details -->
                <div class="flex items-start space-x-2 mb-10 border-dotted border-b-2">
                    <div>
                        <img src="assets/reservations-images/text.png" alt="" class="w-8">
                    </div>
                    <div class="grow">
                        <div class="mb-4">
                            <h1 class="text-slate-400">Concern Details</h1>
                            <h1 class="font-bold text-sm">'.$specifyConcern.'</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';
    

    echo $output;