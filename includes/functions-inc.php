<?php

    function verifyPhoneEmail($conn, $userMobileNumber) {
        $sql = "SELECT * FROM userpatient WHERE patientPhoneNumber =  ? OR patientEmail = ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $userMobileNumber, $userMobileNumber);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function userMobileNumberExists($conn, $mobileNumber) {
        $sql = "SELECT * FROM userpatient WHERE patientPhoneNumber =  ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $mobileNumber);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function userEmailExists($conn, $email) {
        $sql = "SELECT * FROM userpatient WHERE patientEmail =  ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    // function createUser($conn, $userMobileNumber, $userPassword, $userFirstname, $userLastname) {

    //     $sql = "INSERT INTO userpatient (patientPhoneNumber, patientPassword, patientFirstname, patientLastname)
    //             VALUES (?, ?, ?, ?);";

    //     $stmt = mysqli_stmt_init($conn);
    //     $userMobileNumberExists = userMobileNumberExists($conn, $userMobileNumber);
    //     $loginUser = loginUserAfterSignup($conn, $userMobileNumber, $userPassword);

    //     if (!mysqli_stmt_prepare($stmt, $sql)) {
    //         header("location: ../user-signup.php?error=stmtfailed");
    //         exit();
    //     }

    //     $hashedPwd = password_hash($userPassword, PASSWORD_DEFAULT);

    //     mysqli_stmt_bind_param($stmt, "ssss", $userMobileNumber, $hashedPwd, $userFirstname, $userLastname);
    //     mysqli_stmt_execute($stmt); 

    //     mysqli_stmt_close($stmt);

    //     if ($loginUser === false) {
    //         header("location: ../user-login.php?error=wronglogin");
    //         exit();
    //     }

    //     elseif ($loginUser === true) {
    //         session_start();
    //         $_SESSION["sessionpatientUserID"] = $verifyPhoneEmail["patientUserID"];
    //         $_SESSION["sessionPatientPhoneNumber"] = $verifyPhoneEmail["patientPhoneNumber"];
    //         $_SESSION["sessionPatientFirstName"] = $verifyPhoneEmail["patientFirstname"];

    //         header("location: ../index?succefully-logged-in");
    //         exit();
    //     }

    //     // session_start();
    //     // $_SESSION["sessionPatientFirstName"] = $userFirstname;
    //     // $_SESSION["sessionpatientUserID"] = $userMobileNumberExists["patientUserID"];
    //     // $_SESSION["sessionPatientPhoneNumber"] = $userMobileNumberExists["patientPhoneNumber"];
       

    //     // // header("location: ../index?succefully-logged-in");
    //     // header("Refresh:0; url=../index?succefully-logged-in");
    //     // exit();

        
    // }

    // USER login after signup
    // function loginUserAfterSignup($conn, $userMobileNumber, $userPassword) {
    //     $verifyPhoneEmail = verifyPhoneEmail($conn, $userMobileNumber);

    //     if ($verifyPhoneEmail === false) {
    //         header("location: ../user-login.php?error=wrong-email-or-phonenumber");
    //         exit();
    //     }

    //     $pwdHashed = $verifyPhoneEmail["patientPassword"];
    //     $checkPwd = password_verify($userPassword, $pwdHashed);

    //     if ($checkPwd === false) {
    //         // header("location: ../user-login.php?error=wronglogin");
    //         // exit();
    //         $result = false;
    //         return $result;
    //     }

    //     else if ($checkPwd === true) {
    //         $result = true;
    //         return $result;
    //         // session_start();

    //         // $_SESSION["sessionpatientUserID"] = $verifyPhoneEmail["patientUserID"];
    //         // $_SESSION["sessionPatientPhoneNumber"] = $verifyPhoneEmail["patientPhoneNumber"];
    //         // $_SESSION["sessionPatientFirstName"] = $verifyPhoneEmail["patientFirstname"];

    //         // header("location: ../index?succefully-logged-in");
    //         // exit();
    //     }
    // }
    
    // USER login function
    function loginUser($conn, $userMobileNumber, $userPassword) {
        // $userMobileNumberExists = userMobileNumberExists($conn, $userMobileNumber);
        $verifyPhoneEmail = verifyPhoneEmail($conn, $userMobileNumber);

        // if ($userMobileNumberExists === false) {
        //     header("location: ../user-login.php?error=wronglogin");
        //     exit();
        // }

        if ($verifyPhoneEmail === false) {
            header("location: ../user-login.php?error=wrong-email-or-phonenumber");
            exit();
        }

        $pwdHashed = $verifyPhoneEmail["patientPassword"];
        $checkPwd = password_verify($userPassword, $pwdHashed);

        if ($checkPwd === false) {
            header("location: ../user-login.php?error=wronglogin");
            exit();
        }

        else if ($checkPwd === true) {
            session_start();

            // $sql = 

            // $_SESSION["userID"] = 
            $_SESSION["sessionpatientUserID"] = $verifyPhoneEmail["patientUserID"];
            $_SESSION["sessionPatientPhoneNumber"] = $verifyPhoneEmail["patientPhoneNumber"];
            $_SESSION["sessionPatientFirstName"] = $verifyPhoneEmail["patientFirstname"];

            header("location: ../index?succefully-logged-in");
            exit();
        }
    }

    // User Verify Old Password 
    function verifyOldPassword($conn, $userPassword) {
        $getOldPassword = userMobileNumberExists($conn, $userMobileNumber);

        $oldPassword = $getOLdPassword["patientPassword"];
        $checkOldPassword = password_verify($userPassword, $oldPassword);

        // return $checkPwd;
        

        if ($checkOldPassword === false) {
            header("location: ../user-dashboard.php?password-wrong");
            echo $oldPassword;

            $_SESSION["oldPassword"] = $oldPassword;
            exit();
        }

        else if ($checkOldPassword === true) {
            header("location: ../user-dashboard?password-correct");
            echo $oldPassword;
            $_SESSION["oldPassword"] = $oldPassword;
            exit();
        }
    }

    // ----------Hospital Signup---------------------------//

    // Check if Phone Number Exists -Pending
    function hospitalPhoneExistsPending($conn, $mobileNumberInput) {
        $sql = "SELECT * FROM pendingadminsignup WHERE pendingPhoneNumber =  ?;"; 
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../hospital-signup?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $mobileNumberInput);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

        // Check if Phone Number Exists - approved
        function hospitalPhoneExistsApproved($conn, $mobileNumberInput) {
            $sql = "SELECT * FROM hospitalinformation WHERE phoneNumber =  ?;"; 
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../hospital-signup?error=stmtfailed");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "s", $mobileNumberInput);
            mysqli_stmt_execute($stmt);

            $resultData = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($resultData)) {
                return $row;
            }
            else {
                $result = false;
                return $result;
            }

            mysqli_stmt_close($stmt);
        }

    // Check if Phone Email Exists - Pending
    function hospitalEmailExistsPending($conn, $EmailInput) {
        $sql = "SELECT * FROM pendingadminsignup WHERE pendingEmail =  ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../hospital-signup?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $EmailInput);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    
        // Check if Phone Email Exists - Pending
        function hospitalEmailExistsApproved($conn, $EmailInput) {
            $sql = "SELECT * FROM hospitalinformation WHERE email =  ?;";
            $stmt = mysqli_stmt_init($conn);
    
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../hospital-signup?error=stmtfailed");
                exit();
            }
    
            mysqli_stmt_bind_param($stmt, "s", $EmailInput);
            mysqli_stmt_execute($stmt);
    
            $resultData = mysqli_stmt_get_result($stmt);
    
            if ($row = mysqli_fetch_assoc($resultData)) {
                return $row;
            }
            else {
                $result = false;
                return $result;
            }
    
            mysqli_stmt_close($stmt);
        }

        
    // ----------Hospital Login---------------------------//

    function loginHospital($conn, $hospitalEmail, $hospitalPassword){
        
        $hospitalEmailExists = hospitalEmailExists($conn, $hospitalEmail);
        
        if ($hospitalEmailExists === false) {
            header("location: ../hospital-login.php?error=wronglogin");
            exit();
        }

        $pwdHashed = $hospitalEmailExists["hospitalPassword"];
        $checkPwd = password_verify($hospitalPassword, $pwdHashed);

        if ($checkPwd === false) {
            header("location: ../hospital-login.php?error=wronglogin");
            exit();
        }

        else if ($checkPwd === true) {
            session_start();
            $_SESSION["hospitalID"] = $hospitalEmailExists["infoID"];
            $_SESSION["hospitalName"] = $hospitalEmailExists["hospitalName"];

            $hospitalID = $_SESSION["hospitalID"];
            
            $getListingID = get_listing_id($conn, $hospitalID);

            $_SESSION["listing-id"] = $getListingID["listing_id"];

            header("location: ../hospital-dashboard?success=succefully-logged-in");
            exit();
        }  
    }

    function hospitalEmailExists($conn, $hospitalEmail) {
        $sql = "SELECT * FROM hospitalaccount WHERE hospitalEmail =  ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../hospital-login?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $hospitalEmail);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        } 
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function get_listing_id($conn, $hospitalID){
        $sql = "SELECT * FROM hospitallisting WHERE hospitalID =  ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../hospital-login?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $hospitalID);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        } 
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }


    // function addToPending($conn, $hospitalType, $hospitalNameInput, $addressInput, $representativeNameInput, $supervisorNameInput, $mobileNumberInput, $positionInput, $EmailInput, $passwordInput) {
        
    //     // session_start();
    //     // $_SESSION["sessionPatientFirstName"] = $userFirstname;
    //     // $_SESSION["sessionpatientUserID"] = $userMobileNumberExists["patientUserID"];
    //     // $_SESSION["sessionPatientPhoneNumber"] = $userMobileNumberExists["patientPhoneNumber"];
       
    //     // // header("location: ../user-login.php?error=none");
    //     // header("location: ../index.php?succefully-logged-in");
    //     // exit();
    // }


    // ('$pendingLastID', '$hospitalPermit_imgName', '$hospitalPermit_final', '$hospitalPermit_imgType', '$hospitalPermit_imgSize'), ('$pendingLastID', '$doctorLicense_imgName', '$doctorLicense_final', '$doctorLicense_imgType', '$doctorLicense_imgSize')

    // function deleteFromTemp($tempUserID){
    //     $sql = "DELETE FROM userpatienttemp WHERE tempUserID = $tempUserID";
    //     $deleteResult = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    // }
    
    

    