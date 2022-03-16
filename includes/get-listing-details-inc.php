<?php
    session_start();
    include_once 'dbh-inc.php';

    $hospitalID = $_SESSION["hospitalID"];

    $sql = "SELECT * FROM hospitallisting WHERE hospitalID =  $hospitalID";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data = $row;
    }

    echo json_encode($data);