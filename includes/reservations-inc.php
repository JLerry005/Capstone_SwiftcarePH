<?php
    session_start();
    include_once 'dbh-inc.php';
    $hospitalID = $_SESSION["hospitalID"];
    $listing_id = $_SESSION["listing-id"];

    $query = "SELECT * FROM hospitalaccount WHERE infoID = $hospitalID";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data = $row;
    }

    echo json_encode($data);