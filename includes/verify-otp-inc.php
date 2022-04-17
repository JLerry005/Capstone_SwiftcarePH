<?php
    session_start();
    require_once 'dbh-inc.php';
    require_once 'functions-inc.php';

    $signupID = $_SESSION['signupID'];
    $code = $_POST['otp-code'];

    // $_SESSION["signupID"] = $signupID;
    $tempUserID = $_SESSION["tempUserID"];
    $firstname = $_SESSION["userFirstname"];
    $lastname = $_SESSION["userLastname"];
    $password = $_SESSION["userPassword"];
    $mobileNumber = $_SESSION["userMobile"];
    $email = $_SESSION["sessionEmail"];

    $sql = "SELECT * FROM otpstorage WHERE emailID = '$signupID'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                
                $codeFromDB = $row['otp'];
                // $timestamp = $row['timestamp'];

                if ($codeFromDB === $code) {
                    $sql = "INSERT INTO userpatient (patientFirstname, patientLastname, patientEmail, patientPassword, patientPhoneNumber)
                            VALUES (?, ?, ?, ?, ?)";

                    $stmt = mysqli_stmt_init($conn);
                    
                    // $userMobileNumberExists = userMobileNumberExists($conn, $userMobileNumber);
                    // $loginUser = loginUser($conn, $userMobileNumber, $userPassword);
                    


                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("location: ../user-signup.php?error=stmtfailed");
                        exit();
                    }

                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $email, $hashedPwd, $mobileNumber);
                    mysqli_stmt_execute($stmt);

                    // if ($stmt) {
                    //     $deleteTemp = "DELETE FROM userpatienttemp WHERE tempUserID = $tempUserID";
                    //     $deleteResult = mysqli_query($conn, $deleteTemp) or die(mysqli_error($conn));
                    // }

                    mysqli_stmt_close($stmt);

                    $userID = mysqli_insert_id($conn);

                    session_unset();
                    session_destroy();
                    session_start();
                    $_SESSION["sessionPatientFirstName"] = $firstname;
                    $_SESSION["sessionpatientUserID"] = $userID;
                    $_SESSION["sessionPatientPhoneNumber"] = $mobileNumber;
                
                    // header("location: ../user-login.php?error=none");
                    // header("location: ../index.php?succefully-logged-in");
                    echo "Code Matched! Congrats!";
                    exit();

                    
                }
                else {
                    // header ("location: ../verify-code.php");
                    echo "Code Did not match! Sorry!!";
                }
            }
        }
    }else {
        echo "Error: Data doesn't exist!";
    }