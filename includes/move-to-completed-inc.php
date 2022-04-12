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

    // $idContainer = array();
    // $dateContainer = array();
    $resultContainer = array();
    $currentDate = date("Y-m-d"); 


    $sql = $conn->query("SELECT * FROM (SELECT * FROM upcomingreservations WHERE listing_id = ".$listingID.") upcomingreservations WHERE date < $currentDate;") or die($conn->error);
    while ($row = mysqli_fetch_assoc($sql)) {
        // $idContainer[] = $row["ID"];
        // $dateContainer[] = $row["date"];

        $resultContainer[] =  $row;
    }

    foreach ($resultContainer as $results) {
        $ID = $results["ID"];
        $reservation_code = $results["reservation_code"];
        $user_id = $results["user_id"];
        $listing_id = $results["listing_id"];
        $firstname = $results["firstname"];
        $lastname = $results["lastname"];
        $date = $results["date"];
        $time = $results["time"];
        $phonenumber = $results["phonenumber"];
        $email = $results["email"];
        $concern = $results["concern"];
        $specifyconcern = $results["specifyconcern"];
        $hospitalname = $results["hospitalname"];
        $reservationtype = $results["reservationtype"];
        // $timestamp = $results["timestamp"];
        $booking_timestamp = $results["booking_timestamp"];

        $insertToCompleted = $conn->query("INSERT INTO completedreservations (reservation_code, user_id, listing_id, firstname, lastname, date, time, phonenumber, email, concern, specifyconcern, hospitalname, reservationtype, booking_timestamp)
                            VALUES('$reservation_code', '$user_id', '$listing_id', '$firstname', '$lastname', '$date', '$time', '$phonenumber', '$email', '$concern', '$specifyconcern', '$hospitalname', '$reservationtype', '$booking_timestamp');") or die($conn->error);
    }

    $deleteFromUpcoming = $conn->query("DELETE FROM upcomingreservations WHERE listing_id = ".$listingID." AND date < $currentDate;") or die($conn->error);
    // while ($row = mysqli_fetch_assoc($deleteFromUpcoming)) {
    //     // $idContainer[] = $row["ID"];
    //     // $dateContainer[] = $row["date"];

    //     $resultContainer[] =  $row;
    // }
    // echo $ID;
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