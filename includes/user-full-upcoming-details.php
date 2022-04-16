<?php

    include_once 'dbh-inc.php';

    $bookingID = $_GET["bookingID"];

    $reservationType;
    $reservationCode;
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

    $output = '';

    $sql = $conn->query("SELECT * FROM upcomingreservations WHERE ID = $bookingID;") or die($conn->error);
    while ($row = mysqli_fetch_assoc($sql)) {
        $reservationType = $row['reservationtype'];
        $reservationCode = $row['reservation_code'];
        $timeStamp = $row['booking_timestamp'];
        $firstName = $row['firstname'];
        $lastName = $row['lastname'];
        $date = $row['date'];
        $time = $row['time'];
        $contactNumber = $row['phonenumber'];
        $email = $row["email"];
        $bookingID = $row['ID'];
        $patientConcern = $row['concern'];
        $specifyConcern = $row['specifyconcern'];
        $hospitalName = $row['hospitalname'];
    }

    // Check IF specify concern is null
    if ($specifyConcern == '') {
        $specifyConcern = 'N/A';
    }

    $output .='
        <!-- For Mobile -->
        <div class="md:hidden space-y-7">
            <!-- Timestamp -->
            <div class="flex items-center justify-end mb-10">
                <p class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                    &ensp;'.$timeStamp.'
                </p>
            </div>

            <!-- Reservation code -->
            <div>
                <h1 class="text-slate-400 ml-3 mb-2">Reservation Code</h1>

                <div class="py-1 px-2 rounded-full w-fit bg-white text-gray-900">
                    <h1 class="font-bold text-lg flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm2 2V5h1v1H5zM3 13a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1v-3zm2 2v-1h1v1H5zM13 3a1 1 0 00-1 1v3a1 1 0 001 1h3a1 1 0 001-1V4a1 1 0 00-1-1h-3zm1 2v1h1V5h-1z" clip-rule="evenodd" />
                            <path d="M11 4a1 1 0 10-2 0v1a1 1 0 002 0V4zM10 7a1 1 0 011 1v1h2a1 1 0 110 2h-3a1 1 0 01-1-1V8a1 1 0 011-1zM16 9a1 1 0 100 2 1 1 0 000-2zM9 13a1 1 0 011-1h1a1 1 0 110 2v2a1 1 0 11-2 0v-3zM7 11a1 1 0 100-2H4a1 1 0 100 2h3zM17 13a1 1 0 01-1 1h-2a1 1 0 110-2h2a1 1 0 011 1zM16 17a1 1 0 100-2h-3a1 1 0 100 2h3z" />
                          </svg>
                        &ensp;'.$reservationCode.'
                    </h1>
                </div> 
            </div>
             
            <!-- Status -->
            <div class="flex items-start space-x-5">
                <div>
                    <img src="assets/reservations-images/check.png" alt="" class="w-10">
                </div>

                <div class="">
                    <div class="mb-4">
                        <h1 class="text-slate-400">Status</h1>
                        <h1 class="font-bold text-lg">Approved</h1>
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
                        <h1 class="font-medium text-sm">'.$hospitalName.'</h1>
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
        </div>
        
        <!-- for MD up new -->
        <div class="hidden md:block text-sm px-8">
            
            <!-- Header -->
            <div class="flex justify-between items-center mb-10">
                <!-- Reservation code -->
                <div>
                    <h1 class="text-slate-400 ml-3 mb-2">Reservation Code</h1>
                    <div class="py-1 px-2 rounded-full w-fit bg-white text-gray-900">
                        <h1 class="font-bold text-lg flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm2 2V5h1v1H5zM3 13a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H4a1 1 0 01-1-1v-3zm2 2v-1h1v1H5zM13 3a1 1 0 00-1 1v3a1 1 0 001 1h3a1 1 0 001-1V4a1 1 0 00-1-1h-3zm1 2v1h1V5h-1z" clip-rule="evenodd" />
                                <path d="M11 4a1 1 0 10-2 0v1a1 1 0 002 0V4zM10 7a1 1 0 011 1v1h2a1 1 0 110 2h-3a1 1 0 01-1-1V8a1 1 0 011-1zM16 9a1 1 0 100 2 1 1 0 000-2zM9 13a1 1 0 011-1h1a1 1 0 110 2v2a1 1 0 11-2 0v-3zM7 11a1 1 0 100-2H4a1 1 0 100 2h3zM17 13a1 1 0 01-1 1h-2a1 1 0 110-2h2a1 1 0 011 1zM16 17a1 1 0 100-2h-3a1 1 0 100 2h3z" />
                            </svg>
                            '.$reservationCode.'
                        </h1>
                    </div> 
                </div>

                <!-- Timestamp -->
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
                            <h1 class="font-bold text-sm">'.$hospitalName.'</h1>
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