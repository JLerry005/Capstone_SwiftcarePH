<?php

    require_once 'dbh-inc.php';
    $userID = $_GET["userID"];

    $query = "SELECT * FROM upcomingreservations WHERE user_id = $userID;";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);
    $totalCount = $resultCheck;

    echo $totalCount;