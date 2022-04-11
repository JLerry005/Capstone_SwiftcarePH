<?php

    include_once 'dbh-inc.php';

    $listingID = $_POST["listingID"];

    $ID;
    $reservation_code;
    $user_id;
    $listing_id;
    $firstname;
    $lastname;
    $date;
    $time;
    $phonenumber;
    $email;
    $concern;
    $specifyconcern;
    $hospitalname;
    $reservationtype;
    $timestamp;
    $booking_timestamp;

    $idContainer = array();
    $dateContainer = array();

    $sql = $conn->query("SELECT * FROM upcomingreservations WHERE listing_id = $listingID;") or die($conn->error);
    while ($row = mysqli_fetch_assoc($sql)) {
        $idContainer[] = $row["ID"];
        $dateContainer[] = $row["date"];
    }

    print_r($idContainer);

    $currentDate = date("Y-m-d"); 

    if ($currentDate >) {
        # code...
    }

    // $scheduledDate = ;

    // if ($currentDate > $scheduledDate) {
    //     echo 'greater than';
    // }
    // else{
    //     echo 'Less than';
    // }