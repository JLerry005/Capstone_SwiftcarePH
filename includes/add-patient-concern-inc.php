<?php

    include_once 'dbh-inc.php';

    $patientConcern = $_POST["patientConcernValue"];
    $covidVariant = $_POST["covidVariantValue"];
    $covidStatus = $_POST["covidTypeValue"];

    $insertPatientConcern = $conn->query("INSERT INTO patientdata(concernType, covidVariant, patientConcern) VALUES('$covidStatus',  '$covidVariant',  '$patientConcern');") or die($conn->error);