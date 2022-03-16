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

        $query = "INSERT INTO pendingadminsignup (pendingType, pendingName, pendingAddress, pendingRepresentativeName, pendingSupervisorName, pendingPhoneNumber, pendingDesignation, pendingEmail, pendingPassword)
                VALUES ('$type', '$name', '$address', '$representative', '$supervisor', '$phone', '$designation', '$email', '$password')";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $lastID = mysqli_insert_id($conn);

        if ($query) {
            $sql = "DELETE FROM rejectedhospital WHERE ID = $pendingID";
            $sqlResult = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        }
        
    }
    
    else {
        $response['status']=200;
        $response['message']="Invalid or data not found!";
    }