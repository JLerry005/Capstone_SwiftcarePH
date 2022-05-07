<?php

    // $serverName = "localhost";
    // $dbUsername = "root";
    // $dbPassword = "";
    // $dbName = "swiftcare_db";

    // $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

    // if (!$conn) {
    //     die("Connection Failed" . mysqli_connect_error());
    // }


    //Get Heroku ClearDB connection information
    $cleardb_url = parse_url(getenv("us-cdbr-east-05.cleardb.net"));
    $cleardb_server = $cleardb_url["us-cdbr-east-05.cleardb.net"];
    $cleardb_username = $cleardb_url["b0f3f2fd39c0c5"];
    $cleardb_password = $cleardb_url["6b40b611"];
    $cleardb_db = substr($cleardb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;
    // Connect to DB
    $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

    if (!$conn) {
        die("Connection Failed" . mysqli_connect_error());
    }