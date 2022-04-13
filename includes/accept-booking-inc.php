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

    $fullname = $firstname." ".$lastname;

    $characters = "SCPHRES";
    $pin = random_int(100000, 999999);

    $reservationCode = $characters . $pin;

    $sql = $conn->query("INSERT INTO upcomingreservations (reservation_code, user_id, listing_id, firstname, lastname, fullname, date, time, phonenumber, email, concern, specifyconcern, hospitalname, reservationtype, booking_timestamp) 
                        VALUES('$reservationCode', '$userID', '$listingID', '$firstname', '$lastname', '$fullname', '$date', '$time', '$contactNumber', '$emailAdd', '$patientConcern', '$specifyConcern', '$hospitalName', '$reservationType', '$timeStamp');") or die($conn->error);

    

    // $imageToDelete = $_POST["imageId"];

    $imageDirectory = array();

    // $listing_id = $_SESSION["listing-id"];

    if ($sql) {
        require_once '../PHPMailer/user-booking-accepted.php';
        sendEmailConfirmation($conn, $reservationCode, $userID, $listingID, $firstname, $lastname, $date, $time, $contactNumber, $emailAdd, $patientConcern, $specifyConcern, $hospitalName, $reservationType, $timeStamp);

        $getImageDir = $conn->query("SELECT * FROM referralfiles WHERE booking_id = $bookingID;") or die($conn->error);
        while ($row = mysqli_fetch_assoc($getImageDir)) {
            $imageDirectory[] = $row["file_dir"];
        }

        foreach ($imageDirectory as $toDelete) {
            unlink($toDelete);
        }

        $deleteReferral = "DELETE FROM referralfiles WHERE booking_id = $bookingID;";
        $result = mysqli_query($conn, $deleteReferral) or die(mysqli_error($conn));

        if ($deleteReferral) {
            $deleteUserBooking = "DELETE FROM userbooking WHERE ID = $bookingID";
            $deleteResult = mysqli_query($conn, $deleteUserBooking) or die(mysqli_error($conn));
        }
    }
    