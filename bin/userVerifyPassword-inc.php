<?php
    if (isset($_POST['btnEditPasswordNext'])) {
        session_start();
        $userPassword = $_POST['userPassword'];
        
        require_once 'dbh-inc.php';
        $currentUser = $_SESSION["sessionPatientPhoneNumber"];

        $sql = "SELECT * FROM userpatient WHERE patientPhoneNumber = '".$currentUser."';";
        $result  = mysqli_query($conn, $sql);
        $checkResult = mysqli_num_rows($result);

        if ($checkResult > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($userPassword, $row['patientPassword'])) {
                    echo "<span>Correct Password!</span>";
                }
                else{
                    echo "<span>Wrong Password!</span>";
                }
            }
        }
    }
    else {
        echo "ERROR!";
    }

