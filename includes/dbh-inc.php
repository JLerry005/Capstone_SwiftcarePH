<?php

    // $serverName = "localhost";
    // $dbUsername = "root";
    // $dbPassword = "";
    // $dbName = "swiftcare_db";

    // $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

    // if (!$conn) {
    //     die("Connection Failed" . mysqli_connect_error());
    // }
    
    $serverName = "us-cdbr-east-05.cleardb.net";
    $dbUsername = "b0f3f2fd39c0c5";
    $dbPassword = "6b40b611";
    $dbName = "heroku_c4e7443f297f12c";

    $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

    if (!$conn) {
        die("Connection Failed" . mysqli_connect_error());
    }

    // //Get Heroku ClearDB connection information
    // $cleardb_url = parse_url(getenv("us-cdbr-east-05.cleardb.net"));
    // $cleardb_server = $cleardb_url["host"];
    // $cleardb_username = $cleardb_url["user"];
    // $cleardb_password = $cleardb_url["pass"];
    // $cleardb_db = substr($cleardb_url["path"],1);
    // $active_group = 'default';
    // $query_builder = TRUE;
    // // Connect to DB
    // $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

    // if (!$conn) {
    //     die("Connection Failed" . mysqli_connect_error());
    // }