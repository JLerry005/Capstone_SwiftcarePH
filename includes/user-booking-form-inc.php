<?php

    require_once 'dbh-inc.php';

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $date = $_POST["date_picker"];
    $time = $_POST["time"];
    $phoneNumber = $_POST["phoneNumber"];
    $email = $_POST["email"];
    $concern = $_POST["concern"];
    $specifyConcern = $_POST["specifyConcern"];
    $hospitalName = $_POST["hospitalName"];
    $reservationType = $_POST["reservationType"];
    $listingID = $_POST["listingID"];
    $userID = $_POST["userID"];

    $finalPhoneNumber = sprintf("%011s", $phoneNumber);

    $sql = "INSERT INTO userbooking (user_id, listing_id, patientFirstName, patientLastName, patientDate, patientTime, patientEmail, patientPhoneNumber, patientConcern, patientSpecifyConcern, patientHospitalName, patientReservationType)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);

    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssssss", $userID, $listingID, $firstName, $lastName, $date, $time, $email, $finalPhoneNumber, $concern, $specifyConcern, $hospitalName, $reservationType);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $bookingID = mysqli_insert_id($conn);

    session_start();
    $_SESSION["bookingID"] = $bookingID;

    if ($sql) {
        if ($reservationType == "bed") {
                $updateBedSlot = "UPDATE hospitallisting SET bed_slot = bed_slot - 1 WHERE listing_id = $listingID";
                $updateBedResult = mysqli_query($conn, $updateBedSlot) or die(mysqli_error($conn));
        }
        else if ($reservationType == "room") {
                $updateRoomSlot = "UPDATE hospitallisting SET room_slot = room_slot - 1 WHERE listing_id = $listingID";
                $updateRoomResult = mysqli_query($conn, $updateRoomSlot) or die(mysqli_error($conn));
        }
    }

    require_once '../PHPMailer/user-booking-confirmation.php';
    sendEmailConfirmation($conn, $firstName, $lastName, $hospitalName, $reservationType, $email);