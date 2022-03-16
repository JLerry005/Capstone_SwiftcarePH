<?php

    require_once 'dbh-inc.php';
    session_start();

    $currentUser = $_SESSION["sessionPatientFirstName"];
    $userPhoneNumber = $_SESSION["sessionPatientPhoneNumber"];

    $sql = "SELECT * FROM userpatient WHERE patientPhoneNumber = '$userPhoneNumber';";
    $resultFetched = mysqli_query($conn, $sql);

    if ($resultFetched) {
        if (mysqli_num_rows ($resultFetched) > 0) {
            while ($row = mysqli_fetch_array($resultFetched)) {
                echo $row['patientPhoneNumber'];
                session_reset();
            }
        }
    }