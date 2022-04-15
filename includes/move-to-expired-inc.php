<?php

    include_once 'dbh-inc.php';

    $listingID = $_POST["listingID"];

    $ID;
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
    $remarks = 'expired';
    // $currentDate = date("Y-m-d", strtotime("+ 1 day")); 

    // echo $currentDate;

    // SELECT * FROM (SELECT * FROM upcomingreservations WHERE listing_id = ".$listingID.") upcomingreservations WHERE date < '.$currentDate.';
    // $sql = $conn->query("SELECT * FROM upcomingreservations WHERE listing_id = ".$listingID." AND date < '.$currentDate.';") or die($conn->error);
    // while ($row = mysqli_fetch_assoc($sql)) {
    //     // $idContainer[] = $row["ID"];
    //     // $dateContainer[] = $row["date"];

    //     echo $row;
    //     print_r($row);
    //     $resultContainer[] =  $row;
    // }

    $sql = $conn->query("SELECT * FROM userbooking WHERE listing_id = ".$listingID.";") or die($conn->error);
    while ($row = mysqli_fetch_assoc($sql)) {
        // $idContainer[] = $row["ID"];
        // $dateContainer[] = $row["date"];

        // echo $row;
        print_r($row);
        $resultContainer[] =  $row;
    }

    foreach ($resultContainer as $results) {
        // print_r($results);
        $ID = $results["ID"];
        $user_id = $results["user_id"];
        $listing_id = $results["listing_id"];
        $firstname = $results["patientFirstName"];
        $lastname = $results["patientLastName"];
        $date = $results["patientDate"];
        $time = $results["patientTime"];
        $phonenumber = $results["patientPhoneNumber"];
        $email = $results["patientEmail"];
        $concern = $results["patientConcern"];
        $specifyconcern = $results["patientSpecifyConcern"];
        $hospitalname = $results["patientHospitalName"];
        $reservationtype = $results["patientReservationType"];
        // $timestamp = $results["timestamp"];
        $booking_timestamp = $results["bookingTimestamp"];

        if ($date < $currentDate) {
            $insertToExpired = $conn->query("INSERT INTO expiredreservations (user_id, listing_id, firstname, lastname, date, time, phonenumber, email, concern, specifyconcern, hospitalname, reservationtype, booking_timestamp, remarks)
                            VALUES('$user_id', '$listing_id', '$firstname', '$lastname', '$date', '$time', '$phonenumber', '$email', '$concern', '$specifyconcern', '$hospitalname', '$reservationtype', '$booking_timestamp', '$remarks');") or die($conn->error);

            // Delete Images
            if ($insertToExpired) {
                $getImageDir = $conn->query("SELECT * FROM referralfiles WHERE booking_id = $ID;") or die($conn->error);
                while ($row = mysqli_fetch_assoc($getImageDir)) {
                    $imageDirectory[] = $row["file_dir"];
                }

                foreach ($imageDirectory as $toDelete) {
                    unlink($toDelete);
                }

                $deleteReferral = "DELETE FROM referralfiles WHERE booking_id = $ID;";
                $result = mysqli_query($conn, $deleteReferral) or die(mysqli_error($conn));

                if ($deleteReferral) {
                    $deleteFromPending = $conn->query("DELETE FROM userbooking WHERE ID = ".$ID.";") or die($conn->error);
                }
            }
            
    }

        
    }

    // $deleteFromUpcoming = $conn->query("DELETE FROM upcomingreservations WHERE listing_id = ".$listingID." AND date < $currentDate;") or die($conn->error);