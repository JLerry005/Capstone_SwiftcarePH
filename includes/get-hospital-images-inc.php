<?php
    include_once 'dbh-inc.php';

    session_start();
    $listing_id = $_SESSION["listing-id"];
   
    $rows = array();
    $result = $conn->query("SELECT * FROM listingimages WHERE listing_idFK = $listing_id") or die($conn->error);
    while ($data = mysqli_fetch_assoc($result)) {
        // echo "$data[image_dir]";
        // echo json_encode($data);
        $rows[] = $data;
    }

    echo json_encode($rows);