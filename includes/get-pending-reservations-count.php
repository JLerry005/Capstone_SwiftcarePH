<?php

    session_start();
    require_once 'dbh-inc.php';

    $listingID = $_SESSION["listing-id"];
    
    // Get Pending Reservations Count
    $getPendingCount = "SELECT * FROM userbooking WHERE listing_id = $listingID";
    $getPendingResult = mysqli_query($conn, $getPendingCount);
    $getPendingResultCheck = mysqli_num_rows($getPendingResult);
    $pendingCount = $getPendingResultCheck;

    echo $pendingCount;