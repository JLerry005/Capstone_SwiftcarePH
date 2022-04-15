<?php

    require_once 'dbh-inc.php';

    // $query = "SELECT * FROM pendingadminsignup;";
        $bookingID = $_POST['bookingID'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $contactNumber = $_POST['contactNumber'];
        $emailAdd = $_POST['emailAdd'];
        $patientConcern = $_POST['patientConcern'];
        $specifyConcern = $_POST['specifyConcern'];
        $patientConcern = $_POST['patientConcern'];
        $reservationType = $_POST['reservationType'];
        $timeStamp = $_POST['timeStamp'];
        $userID = $_POST['userID'];
        $listingID = $_POST['listingID'];


        $moveToRejected = "INSERT INTO rejectedreservations (user_id, listing_id, firstname, lastname, date, time, phonenumber, email, concern, specifyconcern, hospitalname, reservationtype, booking_timestamp)
                        VALUES ('$userID', '$listingID', '$firstname','$lastname','$date','$time', '$contactNumber', ' $emailAdd', '$patientConcern', '$specifyConcern', '$patientConcern', '$reservationType', '$timeStamp')";

        $result = mysqli_query($conn, $moveToRejected) or die(mysqli_error($conn));
        
        $lastID = mysqli_insert_id($conn);

        if ($moveToRejected) {
            $deleteUserBooking = "DELETE FROM userbooking WHERE ID = $bookingID";
            $deleteResult = mysqli_query($conn, $deleteUserBooking) or die(mysqli_error($conn));

            if ($deleteUserBooking) {
                $query = "DELETE FROM referralfiles WHERE referral_id = $bookingID;";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            }
        }