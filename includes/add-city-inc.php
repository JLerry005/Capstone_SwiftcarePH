<?php

    include_once 'dbh-inc.php';

    $city = $_POST["cityValue"];
    $region = $_POST["regionValue"];
    $island = $_POST["islandValue"];


    $insertCity = $conn->query("INSERT INTO citydata(city, region, island) VALUES('$city', '$region', '$island');") or die($conn->error);