<?php

    session_start();
    require_once 'dbh-inc.php';

    $listingID = $_SESSION["listing-id"];
    
    // Get Pending Reservations Count
    $getCompletedCount = "SELECT * FROM completedreservations WHERE listing_id = $listingID";
    $getCompletedResult = mysqli_query($conn, $getCompletedCount);
    $getCompletedResultCheck = mysqli_num_rows($getCompletedResult);
    $CompletedCount = $getCompletedResultCheck;

    echo $CompletedCount;