<?php

    include_once 'dbh-inc.php';

    $listingID = $_GET["listingID"];

    $sql = "SELECT * FROM hospitallisting WHERE listing_id =  $listingID";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data = $row;
    }

    echo json_encode($data);
