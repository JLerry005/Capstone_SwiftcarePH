<?php

    require_once 'dbh-inc.php';

    

    $rows = array();
    $result = $conn->query("SELECT * FROM hospitallisting;") or die($conn->error);
    while ($data = mysqli_fetch_assoc($result)) {
        // echo "$data[image_dir]";
        // echo json_encode($data);
        $rows[] = $data;
    }

    echo json_encode($rows);
