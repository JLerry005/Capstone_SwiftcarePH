<?php

    require_once 'dbh-inc.php';

    if (isset($_POST["btnBookingNow"])){
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $date = $_POST["date"];
        $time = $_POST["time"];
        $phoneNumber = $_POST["phoneNumber"];
        $concern = $_POST["concern"];
        $specifyConcern = $_POST["specifyConcern"];
        $hospitalName = $_POST["hospitalName"];
        $reservationType = $_POST["reservationType"];

        $sql = "INSERT INTO userbooking (patientFirstName, patientLastName, patientDate, patientTime, patientPhoneNumber, patientConcern, patientSpecifyConcern, patientHospitalName, patientReservationType)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";

        $stmt = mysqli_stmt_init($conn);

        mysqli_stmt_bind_param($stmt, "sssssssss", $firstName, $lastName, $date, $time, $phoneNumber, $concern, $specifyConcern, $hospitalName, $reservationType);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }