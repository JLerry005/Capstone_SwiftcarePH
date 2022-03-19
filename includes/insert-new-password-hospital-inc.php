<?php        

    session_start();

    if (isset($_POST['saveChanges'])) {

        $newPasswordValue = $_POST['newPasswordValue'];

        require_once 'dbh-inc.php';

        $hospitalID = $_SESSION["hospitalID"];

        $sql = "UPDATE hospitalinformation SET hospitalPassword = ? WHERE ID = '".$hospitalID."';";
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
            // echo "Changes Saved!";
        } 

        if ($sql){
            $query = "UPDATE hospitalaccount SET hospitalPassword = ? WHERE infoID = '".$hospitalID."';";
            $stmt = mysqli_stmt_init($conn);
    
            if (!mysqli_stmt_prepare($stmt, $query)) {
                header("location: ../password-verify.php?error=stmtfailed");
                exit();
                echo "STMT FAILED!";
            }
            else{
                // $newHashedPassword = password_hash($newPasswordValue, PASSWORD_DEFAULT);
    
                mysqli_stmt_bind_param($stmt, "s", $newHashedPassword);
                mysqli_stmt_execute($stmt);
    
                mysqli_stmt_close($stmt);
                echo "<p style='color:#17B978;'>Successfully Changed!</p>";
            }
        }

    }
    else{
        echo "Error!";
    }