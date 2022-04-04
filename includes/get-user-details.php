<?php
    session_start();
    include_once 'dbh-inc.php';

    $userId = $_SESSION['sessionpatientUserID'];

    $sql = "SELECT * FROM userpatient WHERE patientUserID =  $userId";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data = $row;
    }

    echo json_encode($data);