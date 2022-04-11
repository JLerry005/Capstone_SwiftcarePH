<?php

    include_once 'dbh-inc.php';

    $listingID = $_POST["listingID"];

    // $ID;
    // $reservation_code;
    // $user_id;
    // $listing_id;
    // $firstname;
    // $lastname;
    // $date;
    // $time;
    // $phonenumber;
    // $email;
    // $concern;
    // $specifyconcern;
    // $hospitalname;
    // $reservationtype;
    // $timestamp;
    // $booking_timestamp;

    // $idContainer = array();
    // $dateContainer = array();
    $currentDate = date("Y-m-d"); 


    $sql = $conn->query("SELECT * FROM (SELECT * FROM upcomingreservations WHERE listing_id = ".$listingID.") upcomingreservations WHERE date < $currentDate;") or die($conn->error);
    while ($row = mysqli_fetch_assoc($sql)) {
        // $idContainer[] = $row["ID"];
        // $dateContainer[] = $row["date"];

        echo $row["listing_id"];
    }

    // print_r($idContainer);

    

    // if ($currentDate >) {
    //     # code...
    // }

    // $scheduledDate = ;

    // if ($currentDate > $scheduledDate) {
    //     echo 'greater than';
    // }
    // else{
    //     echo 'Less than';
    // }