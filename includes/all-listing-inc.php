<?php

    require_once 'dbh-inc.php';

    

    $rows = array();
    $result = $conn->query("SELECT * FROM hospitallisting WHERE bed_slot > 0 OR room_slot > 0;") or die($conn->error);
    while ($data = mysqli_fetch_assoc($result)) {
        // echo "$data[image_dir]";
        // echo json_encode($data);
        $rows[] = $data;
    }

    echo json_encode($rows);
