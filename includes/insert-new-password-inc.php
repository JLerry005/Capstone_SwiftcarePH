<?php
    if (isset($_POST['saveChanges'])) {
        session_start();

        $newPasswordValue = $_POST['newPasswordValue'];

        require_once 'dbh-inc.php';

        $currentUser = $_SESSION["sessionPatientPhoneNumber"];

        $sql = "UPDATE userpatient SET patientPassword = ? WHERE patientPhoneNumber = '".$currentUser."';";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../password-verify.php?error=stmtfailed");
            exit();
            echo "STMT FAILED!";
        }
        else{
            $newHashedPassword = password_hash($newPasswordValue, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "s", $newHashedPassword);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);
            echo "";
        }
        
        
    }
    else{
        echo "Error!";
    }