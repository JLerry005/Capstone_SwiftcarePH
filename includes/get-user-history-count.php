<?php

    include_once 'dbh-inc.php';
    $userID = $_GET["userID"];

    $completed = 0;
    $expired = 0;
    $rejected = 0;

    $totalCount = '';

    // Get Rejected
    $getRejected = $conn->query("SELECT * FROM rejectedreservations WHERE user_id = $userID;") or die($conn->error);
    $rejected = mysqli_num_rows($getRejected);

     // Get Expired
    $getExpired = $conn->query("SELECT * FROM expiredreservations WHERE user_id = $userID;") or die($conn->error);
    $expired = mysqli_num_rows($getExpired);

     // Get Completed
    $getCompleted = $conn->query("SELECT * FROM completedreservations WHERE user_id = $userID;") or die($conn->error);
    $completed = mysqli_num_rows($getCompleted);

    $totalCount = $rejected + $completed + $expired;

    // $totalCount = $rejected. ' ' .$expired;
    echo $totalCount;