<?php

    include_once 'dbh-inc.php';

    session_start();
    $userID = $_POST["userID"];

    $result = $conn->query("SELECT * FROM userbooking WHERE user_id = $userID") or die($conn->error);

    $row = mysqli_num_rows($result);
    echo json_encode($row);