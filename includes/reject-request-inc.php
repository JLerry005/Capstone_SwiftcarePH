<?php

    require_once 'dbh-inc.php';

    // $query = "SELECT * FROM pendingadminsignup;";


    if (isset($_POST['requestID'])) {
        $pendingID = $_POST['requestID'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $address = $_POST['address'];
        $representative = $_POST['representative'];
        $supervisor = $_POST['supervisor'];
        $phone = $_POST['phone'];
        $designation = $_POST['designation'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $timestamp = $_POST['timestamp'];

        $moveToRejected = "INSERT INTO rejectedhospital (rejectedType, rejectedName, rejectedAddress, representativeName, rejectedSupervisor, rejectedphoneNumber, rejectedDesignation, rejectedEmail, rejectedPassword)
                        VALUES ('$type','$name','$address','$representative', '$supervisor', ' $phone', '$designation', '$email', '$password')";

        $result = mysqli_query($conn, $moveToRejected) or die(mysqli_error($conn));
        
        $lastID = mysqli_insert_id($conn);

        if ($moveToRejected) {
            $deleteFromDocuments = "DELETE FROM hospitaldocuments WHERE hospitalID = $pendingID";
            $deleteDocsResult = mysqli_query($conn, $deleteFromDocuments) or die(mysqli_error($conn));

            if ($deleteFromDocuments) {
                $query = "DELETE FROM pendingadminsignup WHERE pendingID = $pendingID;";
                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            }
        }
        
    }

    else {
        $response['status']=200;
        $response['message']="Invalid or data not found!";
    }