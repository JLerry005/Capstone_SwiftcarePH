<?php

    include_once 'dbh-inc.php';
    $bookingID = $_GET["bookingID"];

    $imageDir = array();
    $output = '';
    $imageList = '';

    $getImages = $conn->query("SELECT * FROM referralfiles WHERE booking_id = $bookingID;") or die($conn->error);
    while ($row = mysqli_fetch_assoc($getImages)) {
        $imageDir[] = $row["file_dir"];
    }

    foreach ($imageDir as $dir) {
        // print_r($dir);

        $imageList .= '
            <a href="Capstone/'.$dir.'" target="_blank" class="relative fetched-image col-span-4 xl:col-span-3 rounded-lg border-solid hover:scale-105 transition duration-200"><img class="card-img w-full rounded-md" alt="..." src="Capstone/'.$dir.'"/></a>
        ';
    }

    $output .= '
        <button onclick="backToPendingDetails('.$bookingID.')" class="bg-gray-900 py-1 px-2 rounded-full flex items-center mb-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
              </svg>
            &ensp;Back
        </button>
        <div class="image-gallery grid items-center grid-cols-12 gap-4 p-2" id="image-gallery">
            '.$imageList.'
        </div>
    ';

    echo $output;
    