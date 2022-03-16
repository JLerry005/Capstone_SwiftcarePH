<?php

    include_once 'dbh-inc.php';
    $sampleID = 3;

    $query = "SELECT * FROM hospitalaccount WHERE hospitalID = $sampleID";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data = $row;
    }

    echo json_encode($data);