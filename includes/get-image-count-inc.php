<?php

    include_once 'dbh-inc.php';

    session_start();
    $listing_id = $_SESSION["listing-id"];

    $result = $conn->query("SELECT * FROM listingimages WHERE listing_idFK = $listing_id") or die($conn->error);

    $row = mysqli_num_rows($result);
    echo json_encode($row);

    