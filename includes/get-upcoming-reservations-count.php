<?php

    session_start();
    require_once 'dbh-inc.php';

    $listingID = $_SESSION["listing-id"];
    
    // Get Pending Reservations Count
    $getUpcomingCount = "SELECT * FROM upcomingreservations WHERE listing_id = $listingID";
    $getUpcomingResult = mysqli_query($conn, $getUpcomingCount);
    $getUpcomingResultCheck = mysqli_num_rows($getUpcomingResult);
    $UpcomingCount = $getUpcomingResultCheck;

    echo $UpcomingCount;