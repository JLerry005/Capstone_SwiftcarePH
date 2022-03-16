<?php

    if (isset($_POST['savePhoneNumber'])) {
        session_start();
        $newPhoneNumber = $_POST['newPhoneNumberInput'];

        require_once 'dbh-inc.php';
        $currentUser = $_SESSION["sessionpatientUserID"];

        $sql = "UPDATE userpatient SET patientPhoneNumber = ? WHERE patientUserID = '".$currentUser."';";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../password-verify.php?error=stmtfailed");
            exit();
            echo "STMT FAILED!";
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $newPhoneNumber);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);
            echo "Successfully Saved!";
        }

    }
    else {
        echo "ERROR!";
    }

    // require_once 'dbh-inc.php';
    // session_start();
    // $newPhoneNumber = $_POST['newPhoneNumberInput'];

    // $query = "SELECT * FROM userpatient WHERE patientPhoneNumber ='".$newPhoneNumber."';";
    // $result = mysqli_query($conn, $query);
    // $resultCheck = mysqli_num_rows($result);

    // $output = '
    //         <table class="table" id="userTable">
    //             <thead>
    //                 <tr>
    //                     <th scope="col">Firstname</th>
    //                     <th scope="col">Lastname</th>
    //                 </tr>
    //             </thead>
    //         </table>';

    // if ($resultCheck > 0 ) {
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         // echo $row['firstname'];
    //         // echo $row['lastname'];
    //         $output .= '
    //         <tr>
    //             <td>'.$row["firstname"].'</td>
    //             <td>'.$row["lastname"].'</td>
    //         </tr>';
    //     }
    // }
    // else {
    //     $output .= '
    //         <tr>
    //             <td colspan="4" align="center">Data not Found!</td>
    //         </tr>';
    // }

    // echo $output;
