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

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO hospitalinformation (hospitalType, hospitalName, hospitalAddress, representativeName, supervisorName, phoneNumber, designation, email, hospitalPassword)
                VALUES ('$type', '$name', '$address', '$representative', '$supervisor', '$phone', '$designation', '$email', '$hashedPwd')";

        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $lastID = mysqli_insert_id($conn);

        if ($query) {
            $insertHospitalAcc = "INSERT INTO hospitalaccount (infoID, hospitalName, hospitalEmail, hospitalPassword)
                                VALUES ('$lastID', '$name', '$email', '$hashedPwd' )";
            $insHospitalResult = mysqli_query($conn, $insertHospitalAcc) or die(mysqli_error($conn));
            
            if ($insertHospitalAcc) {
                $sql = "INSERT INTO approvedhospital (hospitalID, hospitalName) VALUES('$lastID', '$name')";  
                $sqlResult = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                
                if ($sql) {
                    $insertToListing = "INSERT INTO hospitallisting (hospitalID, hospital_name, hospital_type, hospital_phone) VALUES ('$lastID', '$name', '$type', '$phone')";  
                    $insListingResult = mysqli_query($conn, $insertToListing) or die(mysqli_error($conn));
                }

                    if ($insertToListing) {
                        $deleteFromDocuments = "DELETE FROM hospitaldocuments WHERE hospitalID = $pendingID";
                        $deleteDocsResult = mysqli_query($conn, $deleteFromDocuments) or die(mysqli_error($conn));
        
                        if ($deleteFromDocuments) {
                            $deleteFromPending = "DELETE FROM pendingadminsignup WHERE pendingID = $pendingID";
                            $deleteResult = mysqli_query($conn, $deleteFromPending) or die(mysqli_error($conn));
                        }
                    }
            }
        }      
        
        


        // Send email conformation
        require_once '../PHPMailer/hospital-request-accepted.php';
        sendConfirmationEmail($conn, $representative, $email);
        // header("location: hospital-request-sent.php?error=none");
    }
    
    else {
        $response['status']=200;
        $response['message']="Invalid or data not found!";
    }