<?php

    include_once 'dbh-inc.php';

    $listingID = $_GET["listingID"];

    $output = '';
    $result = $conn->query("SELECT * FROM completedreservations WHERE concern = 'Non-Covid';") or die($conn->error);

    if (mysqli_num_rows($result)==0) {
        $output = '<p class="col-span-12 text-center font-bold text-blue-300 self-center "><i class="bi bi-emoji-frown-fill"></i> There are NO Completed Reservations so far..</p> ';
    }
    else{
        while ($row = mysqli_fetch_assoc($result)) {
            $reservationType = $row['reservationtype'];
            $reservationCode = $row['reservation_code'];
            $timeStamp = $row['booking_timestamp'];
            $firstName = $row['firstname'];
            $lastName = $row['lastname'];
            $date = $row['date'];
            $time = $row['time'];
            $contactNumber = $row['phonenumber'];
            $bookingID = $row['ID'];
            $patientConcern = $row['concern'];
            $remarks = $row['remarks'];

            if($remarks == "Successful"){
                
                $output .='
                <a href="completed-booking-details?bookingID='.$bookingID.'" class="col-span-4 bg-green-600  rounded-lg text-gray-400 hover:scale-105 hover:shadow-md hover:shadow-gray-900 hover:cursor-pointer transition duration-700 ease-out"> 
                    <div class="bg-green-700 p-2 rounded-t-lg flex items-center justify-between">
                        <div>
                            <p class="flex items-center cursor-default py-0.5 px-2 w-fit text-blue-50 font-medium tracking-wider">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 mr-2"><path fill="none" d="M0 0H24V24H0z"/><path d="M17 2v2h3c.552 0 1 .448 1 1v16c0 .552-.448 1-1 1H4c-.552 0-1-.448-1-1V5c0-.552.448-1 1-1h3V2h10zM7 6H5v14h14V6h-2v2H7V6zm6 5v2h2v2h-2.001L13 17h-2l-.001-2H9v-2h2v-2h2zm2-7H9v2h6V4z" fill="rgba(0,0,0,1)"/></svg> '.$reservationCode.'
                        </div>
                        
                        <div class="mr-1 rounded-md w-fit py-0.5 px-2 bg-green-900 text-gray-100 font-medium tracking-wider drop-shadow-lg">
                            '.$remarks.'
                        </div>
                    </div>
                    <div class="p-4 flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <h1 class="bg-blue-700 hover:bg-blue-800 rounded-full w-fit py-0.5 px-2 text-white flex items-center capitalize">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4 mr-1"><path fill="none" d="M0 0H24V24H0z"/><path d="M2 21v-2h2V4.835c0-.484.346-.898.821-.984l9.472-1.722c.326-.06.638.157.697.483.007.035.01.07.01.107v1.28L19 4c.552 0 1 .448 1 1v14h2v2h-4V6h-3v15H2zM13 4.396L6 5.67V19h7V4.396zM12 11v2h-2v-2h2z" fill="rgba(255,255,255,1)"/></svg>'.$reservationType.'
                            </h1>
                            <p class="flex items-center bg-white hover:bg-gray-300 cursor-pointer rounded-full py-0.5 px-2 w-fit text-blue-700 font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4 mr-1 ="><path fill="none" d="M0 0H24V24H0z"/><path d="M8 3v2H6v4c0 2.21 1.79 4 4 4s4-1.79 4-4V5h-2V3h3c.552 0 1 .448 1 1v5c0 2.973-2.162 5.44-5 5.917V16.5c0 1.933 1.567 3.5 3.5 3.5 1.497 0 2.775-.94 3.275-2.263C16.728 17.27 16 16.22 16 15c0-1.657 1.343-3 3-3s3 1.343 3 3c0 1.371-.92 2.527-2.176 2.885C19.21 20.252 17.059 22 14.5 22 11.462 22 9 19.538 9 16.5v-1.583C6.162 14.441 4 11.973 4 9V4c0-.552.448-1 1-1h3zm11 11c-.552 0-1 .448-1 1s.448 1 1 1 1-.448 1-1-.448-1-1-1z" fill="rgba(26,86,219,1)"/></svg>'.$patientConcern.'
                            </p>
                        </div>
                        
                        <p class="flex items-center text-white">
                            <i class="bi bi-clock-history hover:text-blue-500"></i> &nbsp;'.$timeStamp.'
                        </p>
                    </div>

                    <div class="mb-2 px-4 flex items-center space-x-3">
                        <img src="https://avatars.dicebear.com/api/big-smile/'.$firstName.'.svg?b=%231a56bb&r=50" alt="" srcset="" class="w-10">
                        <h1 class="text-lg font-bold text-white capitalize">'.$firstName.' '.$lastName.'</h1>
                    </div>
                    <div class="flex items-start justify-between px-4">
                        <div class="text-sm font-light pb-4 text-white">
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

                    <div class="bg-green-700  p-4 rounded-b-lg flex justify-center">
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
            else if($remarks == "Unsuccessful"){
                    $output .='
                    <a href="completed-booking-details?bookingID='.$bookingID.'" class="col-span-4 bg-red-600 rounded-lg text-gray-400 hover:scale-105 hover:shadow-md hover:shadow-gray-900 hover:cursor-pointer transition duration-700 ease-out"> 
                        <div class="bg-red-700 p-2 rounded-t-lg flex items-center justify-between">
                            <div>
                                <p class="flex items-center cursor-default py-0.5 px-2 w-fit text-blue-50 font-medium tracking-wider">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 mr-2"><path fill="none" d="M0 0H24V24H0z"/><path d="M17 2v2h3c.552 0 1 .448 1 1v16c0 .552-.448 1-1 1H4c-.552 0-1-.448-1-1V5c0-.552.448-1 1-1h3V2h10zM7 6H5v14h14V6h-2v2H7V6zm6 5v2h2v2h-2.001L13 17h-2l-.001-2H9v-2h2v-2h2zm2-7H9v2h6V4z" fill="rgba(0,0,0,1)"/></svg> '.$reservationCode.'
                            </div>
                            
                            <div class="mr-1 rounded-md w-fit py-0.5 px-2 bg-red-900 text-gray-100 font-medium tracking-wider drop-shadow-lg">
                                '.$remarks.'
                            </div>
                        </div>
                        <div class="p-4 flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <h1 class="bg-blue-700 hover:bg-blue-800 rounded-full w-fit py-0.5 px-2 text-white flex items-center capitalize">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4 mr-1"><path fill="none" d="M0 0H24V24H0z"/><path d="M2 21v-2h2V4.835c0-.484.346-.898.821-.984l9.472-1.722c.326-.06.638.157.697.483.007.035.01.07.01.107v1.28L19 4c.552 0 1 .448 1 1v14h2v2h-4V6h-3v15H2zM13 4.396L6 5.67V19h7V4.396zM12 11v2h-2v-2h2z" fill="rgba(255,255,255,1)"/></svg>'.$reservationType.'
                                </h1>
                                <p class="flex items-center bg-white hover:bg-gray-300 cursor-pointer rounded-full py-0.5 px-2 w-fit text-blue-700 font-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4 mr-1 ="><path fill="none" d="M0 0H24V24H0z"/><path d="M8 3v2H6v4c0 2.21 1.79 4 4 4s4-1.79 4-4V5h-2V3h3c.552 0 1 .448 1 1v5c0 2.973-2.162 5.44-5 5.917V16.5c0 1.933 1.567 3.5 3.5 3.5 1.497 0 2.775-.94 3.275-2.263C16.728 17.27 16 16.22 16 15c0-1.657 1.343-3 3-3s3 1.343 3 3c0 1.371-.92 2.527-2.176 2.885C19.21 20.252 17.059 22 14.5 22 11.462 22 9 19.538 9 16.5v-1.583C6.162 14.441 4 11.973 4 9V4c0-.552.448-1 1-1h3zm11 11c-.552 0-1 .448-1 1s.448 1 1 1 1-.448 1-1-.448-1-1-1z" fill="rgba(26,86,219,1)"/></svg>'.$patientConcern.'
                                </p>
                            </div>
                            
                            <p class="flex items-center text-white">
                                <i class="bi bi-clock-history"></i> &nbsp;'.$timeStamp.'
                            </p>
                        </div>

                        <div class="mb-2 px-4 flex items-center space-x-3">
                            <img src="https://avatars.dicebear.com/api/big-smile/'.$firstName.'.svg?b=%231a56bb&r=50" alt="" srcset="" class="w-10">
                            <h1 class="text-lg font-bold text-white capitalize">'.$firstName.' '.$lastName.'</h1>
                        </div>
                        <div class="flex items-start justify-between px-4 text-white">
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

                        <div class="bg-red-700 p-4 rounded-b-lg flex justify-center">
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

            elseif ($remarks == "") {
                $output .='
                <a href="completed-booking-details?bookingID='.$bookingID.'" class="col-span-4 bg-blue-400 rounded-lg text-gray-700 hover:scale-105 hover:shadow-md hover:shadow-gray-900 hover:cursor-pointer transition duration-700 ease-out"> 
                    <div class="bg-blue-500 p-2 rounded-t-lg flex items-center justify-between">
                        <div>
                            <p class="flex items-center cursor-default py-0.5 px-2 w-fit text-white font-medium tracking-wider">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 mr-2"><path fill="none" d="M0 0H24V24H0z"/><path d="M17 2v2h3c.552 0 1 .448 1 1v16c0 .552-.448 1-1 1H4c-.552 0-1-.448-1-1V5c0-.552.448-1 1-1h3V2h10zM7 6H5v14h14V6h-2v2H7V6zm6 5v2h2v2h-2.001L13 17h-2l-.001-2H9v-2h2v-2h2zm2-7H9v2h6V4z" fill="rgba(0,0,0,1)"/></svg> '.$reservationCode.'</p>
                        </div>
                        
                        <div class="mr-1 rounded-md w-fit py-0.5 px-2 bg-green-900 text-gray-100 font-medium tracking-wider drop-shadow-lg">
                            Add Remarks +
                        </div>
                    </div>
                    <div class="p-4 flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <h1 class="bg-blue-700 hover:bg-blue-800 rounded-full w-fit py-0.5 px-2 text-white flex items-center capitalize">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4 mr-1"><path fill="none" d="M0 0H24V24H0z"/><path d="M2 21v-2h2V4.835c0-.484.346-.898.821-.984l9.472-1.722c.326-.06.638.157.697.483.007.035.01.07.01.107v1.28L19 4c.552 0 1 .448 1 1v14h2v2h-4V6h-3v15H2zM13 4.396L6 5.67V19h7V4.396zM12 11v2h-2v-2h2z" fill="rgba(255,255,255,1)"/></svg>'.$reservationType.'
                            </h1>
                            <p class="flex items-center bg-white hover:bg-gray-300 cursor-pointer rounded-full py-0.5 px-2 w-fit text-blue-700 font-bold">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4 mr-1 ="><path fill="none" d="M0 0H24V24H0z"/><path d="M8 3v2H6v4c0 2.21 1.79 4 4 4s4-1.79 4-4V5h-2V3h3c.552 0 1 .448 1 1v5c0 2.973-2.162 5.44-5 5.917V16.5c0 1.933 1.567 3.5 3.5 3.5 1.497 0 2.775-.94 3.275-2.263C16.728 17.27 16 16.22 16 15c0-1.657 1.343-3 3-3s3 1.343 3 3c0 1.371-.92 2.527-2.176 2.885C19.21 20.252 17.059 22 14.5 22 11.462 22 9 19.538 9 16.5v-1.583C6.162 14.441 4 11.973 4 9V4c0-.552.448-1 1-1h3zm11 11c-.552 0-1 .448-1 1s.448 1 1 1 1-.448 1-1-.448-1-1-1z" fill="rgba(26,86,219,1)"/></svg>'.$patientConcern.'
                            </p>
                        </div>
                        
                        <p class="flex items-center">
                            <i class="bi bi-clock-history hover:text-blue-500"></i> &nbsp;'.$timeStamp.'
                        </p>
                    </div>

                    <div class="mb-2 px-4 flex items-center space-x-3">
                        <img src="https://avatars.dicebear.com/api/big-smile/'.$firstName.'.svg?b=%231a56bb&r=50" alt="" srcset="" class="w-10">
                        <h1 class="text-lg font-bold text-gray-700 capitalize">'.$firstName.' '.$lastName.'</h1>
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

                    <div class="bg-blue-500 p-4 rounded-b-lg flex justify-center">
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
    }


    echo $output;