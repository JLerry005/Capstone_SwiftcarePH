<?php
    session_start();

    // echo "hello!";
    if (isset($_POST['btnEditPasswordNext'])) {


        $hospitalPassword = $_POST['hospitalPassword'];
        $finalResult = false;
        
        require_once 'dbh-inc.php';

        $hospitalID = $_SESSION["hospitalID"];

        $sql = "SELECT * FROM hospitalinformation WHERE ID = '".$hospitalID."';";
        $result  = mysqli_query($conn, $sql);
        $checkResult = mysqli_num_rows($result);

        if ($checkResult > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($hospitalPassword, $row['hospitalPassword'])) {
                    // header("location: ../user-dashboard.php?correct-password");
                    echo "<p style='color:#17B978;'> Correct Password!</p>";
                    $finalResult = true;
                    // $_SESSION["finalResult"] = $finalResult;
                        
                    // exit();
                }
                else{
                    // header("location: ../user-dashboard.php?wrong-password");
                    echo "<p class='bi bi-x-circle-fill' style='color:#E84545;'> Wrong Password!</p>";
                    $finalResult = false;
                    // exit();
                }
            }
        }
    }
    else {
        echo "ERROR!";
    }
