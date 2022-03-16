<?php

    require_once 'dbh-inc.php';
    session_start();
    $userId = $_SESSION['sessionpatientUserID'];

    $query = "SELECT * FROM userpatient WHERE patientUserID ='".$userId."';";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);

    $output = '';

    if ($resultCheck > 0 ) {
        while ($row = mysqli_fetch_assoc($result)) {
             echo $row['patientLastname'];
        }
    }
    else {
        $output .= '<p>Error loading data!</p>';
    }

    echo $output;