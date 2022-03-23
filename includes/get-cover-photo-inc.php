<?php
    include_once 'dbh-inc.php';

    $listingID = $_POST["listingID"];
    $rows = array();
    $result = $conn->query("SELECT * FROM listingimages WHERE listing_idFK = $listingID") or die($conn->error);
    while ($data = mysqli_fetch_assoc($result)) {
        // echo "$data[image_dir]";
        // echo json_encode($data);
        $rows[] = $data;
    }

    echo json_encode($rows);