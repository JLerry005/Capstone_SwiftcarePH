<?php

    include_once 'dbh-inc.php';

    $userID = $_GET["userID"];
    $bookingID;

    $output = '';
    $sql = $conn->query("SELECT * FROM userbooking WHERE user_id = $userID;") or die($conn->error);


    if (mysqli_num_rows($sql)==0) {
        $output = '<p class="col-span-12 text-center text-lg text-gray-400 self-center mt-32"><i class="bi bi-emoji-frown-fill"></i> You have zero (0) Pending Reservation.</p> ';
    }
    else {
        while ($row = mysqli_fetch_assoc($sql)) {
            $reservationType = $row['patientReservationType'];
            $timeStamp = $row['bookingTimestamp'];
            $firstName = $row['patientFirstName'];
            $lastName = $row['patientLastName'];
            $date = $row['patientDate'];
            $time = $row['patientTime'];
            $contactNumber = $row['patientPhoneNumber'];
            $bookingID = $row['ID'];
            $patientConcern = $row['patientConcern'];
            $hospitalname = $row['patientHospitalName'];
            $listingID = $row['listing_id'];

            $output .= '
                <div onclick="fullDetails('.$bookingID.')" class="mb-3 text-xs md:text-sm md:col-span-12 lg:col-span-4 bg-blue-600 rounded-lg text-gray-400 hover:scale-105 hover:drop-shadow-md hover:cursor-pointer transition duration-100 ease-out"> 
                    <div class="p-2 pt-3 sm:p-4 flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <a href="#" class="bg-blue-700 hover:bg-blue-800 rounded-full w-fit py-0.5 px-2 text-white flex items-center capitalize">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4 mr-1"><path fill="none" d="M0 0H24V24H0z"/><path d="M2 21v-2h2V4.835c0-.484.346-.898.821-.984l9.472-1.722c.326-.06.638.157.697.483.007.035.01.07.01.107v1.28L19 4c.552 0 1 .448 1 1v14h2v2h-4V6h-3v15H2zM13 4.396L6 5.67V19h7V4.396zM12 11v2h-2v-2h2z" fill="rgba(255,255,255,1)"/></svg>'.$reservationType.'
                            </a>
                            <a href="#" class="flex items-center bg-white hover:bg-gray-300 cursor-pointer rounded-full py-0.5 px-2 w-fit text-blue-700 font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4 mr-1 ="><path fill="none" d="M0 0H24V24H0z"/><path d="M8 3v2H6v4c0 2.21 1.79 4 4 4s4-1.79 4-4V5h-2V3h3c.552 0 1 .448 1 1v5c0 2.973-2.162 5.44-5 5.917V16.5c0 1.933 1.567 3.5 3.5 3.5 1.497 0 2.775-.94 3.275-2.263C16.728 17.27 16 16.22 16 15c0-1.657 1.343-3 3-3s3 1.343 3 3c0 1.371-.92 2.527-2.176 2.885C19.21 20.252 17.059 22 14.5 22 11.462 22 9 19.538 9 16.5v-1.583C6.162 14.441 4 11.973 4 9V4c0-.552.448-1 1-1h3zm11 11c-.552 0-1 .448-1 1s.448 1 1 1 1-.448 1-1-.448-1-1-1z" fill="rgba(26,86,219,1)"/></svg>'.$patientConcern.'
                            </a>
                        </div>
                        
                        <a href="#" class="flex items-center text-blue-300">
                            <i class="bi bi-clock-history hover:text-blue-500"></i> &nbsp;'.$timeStamp.'
                        </a>
                    </div>

                    <a href="#" class="mb-2 px-4 flex items-center space-x-3">
                        <img src="https://avatars.dicebear.com/api/big-smile/'.$firstName.''.$lastName.'.svg?b=%231a56bb&r=50" alt="" srcset="" class="w-10">
                        <h1 class="text-lg font-bold text-white capitalize">'.$firstName.' '.$lastName.'</h1>
                    </a>
                    <div class="flex items-start justify-between px-4">
                        <div class="text-sm font-light pb-4 text-blue-200">
                            <a href="hospital-overview?listingID='.$listingID.'" target="_blank" class="flex items-center truncate hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />
                                </svg>
                                '.$hospitalname.'
                            </a>  
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

                    <div class="bg-blue-700 p-4 rounded-b-lg flex justify-between">
                        <div class="px-2 bg-blue-600 rounded-lg">
                            <p class="text-blue-200">Status: <b>Pending <i class="bi bi-hourglass-top"></i></b></p>
                        </div>
                        
                        <a href="#" class="text-white hover:text-blue-200 hover:underline flex items-center">
                            View Full Details&ensp;
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            ';
        }
    }

    echo $output;
    