<?php
    // echo "hello!";
    if (isset($_POST['btnEditPasswordNext'])) {
        session_start();
        $userPassword = $_POST['userPassword'];
        $finalResult = false;
        
        require_once 'dbh-inc.php';
        $currentUser = $_SESSION["sessionPatientPhoneNumber"];

        $sql = "SELECT * FROM userpatient WHERE patientPhoneNumber = '".$currentUser."';";
        $result  = mysqli_query($conn, $sql);
        $checkResult = mysqli_num_rows($result);

        if ($checkResult > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($userPassword, $row['patientPassword'])) {
                    // header("location: ../user-dashboard.php?correct-password");
                    echo "Correct Password!";
                    $finalResult = true;
                    // $_SESSION["finalResult"] = $finalResult;
                        
                    // exit();
                }
                else{
                    // header("location: ../user-dashboard.php?wrong-password");
                    echo "Wrong Password!";
                    $finalResult = false;
                    // exit();
                }
            }
        }
    }
    else {
        echo "ERROR!";
    }
