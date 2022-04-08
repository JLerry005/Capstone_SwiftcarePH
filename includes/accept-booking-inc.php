<?php

    include_once 'dbh-inc.php';

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $contactNumber = $_POST["contactNumber"];
    $emailAdd = $_POST["emailAdd"];
    $patientConcern = $_POST["patientConcern"];
    $specifyConcern = $_POST["specifyConcern"];
    $reservationType = $_POST["reservationType"];
    $timeStamp = $_POST["timeStamp"];
    $userID = $_POST["userID"];
    $listingID = $_POST["listingID"];
    $bookingID = $_POST["bookingID"];
    $hospitalName = $_POST["hospitalName"];

    $characters = "SCPHRES";
    $pin = random_int(100000, 999999);

    $reservationCode = $characters . $pin;

    $sql = $conn->query("INSERT INTO upcomingreservations (reservation_code, user_id, listing_id, firstname, lastname, date, time, phonenumber, email, concern, specifyconcern, hospitalname, reservationtype, booking_timestamp) 
                        VALUES('$reservationCode', '$userID', '$listingID', '$firstname', '$lastname', '$date', '$time', '$contactNumber', '$emailAdd', '$patientConcern', '$specifyConcern', '$hospitalName', '$reservationType', '$timeStamp');") or die($conn->error);

    if ($sql) {
        $deleteFromUserBooking = $conn->query("DELETE FROM userbooking WHERE ID = $bookingID;") or die($conn->error);
    }
    