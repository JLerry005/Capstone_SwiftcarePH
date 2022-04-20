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
        $hospitalName = $_POST['hospitalName'];
        $remarks = $_POST['remarks'];

        $moveToRejected = "INSERT INTO rejectedreservations (user_id, listing_id, firstname, lastname, date, time, phonenumber, email, concern, specifyconcern, hospitalName, reservationtype, booking_timestamp, remarks)
                        VALUES ('$userID', '$listingID', '$firstname','$lastname','$date','$time', '$contactNumber', ' $emailAdd', '$patientConcern', '$specifyConcern', '$hospitalName', '$reservationType', '$timeStamp', '$remarks')";

        $result = mysqli_query($conn, $moveToRejected) or die(mysqli_error($conn));
        
        $lastID = mysqli_insert_id($conn);

        $imageDirectory = array();

        if ($moveToRejected) {
            require_once '../PHPMailer/user-booking-rejected.php';
            sendEmailConfirmation($conn, $userID, $listingID, $firstname, $lastname, $date, $time, $contactNumber, $emailAdd, $patientConcern, $specifyConcern, $hospitalName, $reservationType, $timeStamp);

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

        