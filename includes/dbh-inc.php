<?php

    $serverName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "swiftcare_db";

    $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

    if (!$conn) {
        die("Connection Failed" . mysqli_connect_error());
    }
    
    // $serverName = "us-cdbr-east-05.cleardb.net";
    // $dbUsername = "b0f3f2fd39c0c5";
    // $dbPassword = "6b40b611";
    // $dbName = "heroku_c4e7443f297f12c";

    // $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

    // if (!$conn) {
    //     die("Connection Failed" . mysqli_connect_error());
    // }