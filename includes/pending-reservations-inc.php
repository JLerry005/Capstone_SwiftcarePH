<?php

    include_once 'dbh-inc.php';

    $listingID = $_POST["listingID"];

    $output = '';
    $result = $conn->query("SELECT * FROM userbooking WHERE listing_id = $listingID;") or die($conn->error);

    if (mysqli_num_rows($result)==0) {
        $output = '<p class="col-span-12 text-center font-bold text-blue-300 self-center "><i class="bi bi-emoji-frown-fill"></i> There are NO Pending Reservations..</p> ';
    }
    else{
        while ($row = mysqli_fetch_assoc($result)) {
            $reservationType = $row['patientReservationType'];
            $timeStamp = $row['bookingTimestamp'];
            $firstName = $row['patientFirstName'];
            $lastName = $row['patientLastName'];
            $date = $row['patientDate'];
            $time = $row['patientTime'];
            $contactNumber = $row['patientPhoneNumber'];
            $bookingID = $row['ID'];
            $patientConcern = $row['patientConcern'];
            
    
            $output .='
                <a href="pending-booking-details?bookingID='.$bookingID.'" target="_blank" class="col-span-4 bg-gray-900 rounded-lg text-gray-400 hover:scale-105 hover:drop-shadow-md hover:cursor-pointer transition duration-100 ease-out"> 
                    <div class="p-4 flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <h1 class="bg-blue-700 hover:bg-blue-800 rounded-full w-fit py-0.5 px-2 text-white flex items-center capitalize">
                                <i class="ri-door-open-fill"></i> &nbsp; <span class="cursor-pointer">'.$reservationType.'</span>
                            </h1>

                            <p class="flex items-center bg-white hover:bg-gray-300 cursor-default rounded-full py-0.5 px-2 w-fit text-blue-700 font-bold">
                                <i class="ri-stethoscope-fill h-5 w-5"></i>'.$patientConcern.'
                            </p>
                        </div>
                        
                        <p class="flex items-center">
                            <i class="bi bi-clock-history hover:text-blue-500"></i> &nbsp;'.$timeStamp.'
                        </p>
                    </div>
    
                    <div class="mb-2 px-4 flex items-center space-x-3">
                        <img src="https://avatars.dicebear.com/api/big-smile/'.$firstName.'.svg?b=%231a56bb&r=50" alt="" srcset="" class="w-10">
                        <h1 class="text-lg font-bold text-white capitalize">'.$firstName.' '.$lastName.'</h1>
                    </div>
                    <div class="flex items-start justify-between px-4">
                        <div class="text-sm font-light pb-4">
                            <p class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 hover:text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                                '.$date.'
                            </p>
                            <p class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 hover:text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                </svg>
                                '.$time.'
                            </p>
                            <p class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 hover:text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                </svg>
                                '.$contactNumber.'
                            </p>
    
                        </div>
                    </div>
    
                    <div class="bg-blue-700 p-4 rounded-b-lg flex justify-center">
                        <button class="text-white hover:text-blue-200 hover:underline flex items-center">
                            View Full Details&ensp;
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </a>
            ';
        }
    }
    

    echo $output;
    