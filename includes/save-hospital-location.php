<?php
    session_start();
    include_once 'dbh-inc.php';

    $hospitalID = $_SESSION["hospitalID"];

    $locationToSave = $_POST["locationToSave"];
    $latToSave = $_POST["latToSave"];
    $lngTosave = $_POST["lngTosave"];


    $sql = "UPDATE hospitallisting SET hospital_location=?, lat=?, lng=? WHERE hospitalID =?";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // header("location: ../user-signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $locationToSave, $latToSave, $lngTosave, $hospitalID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    // $SQL = $conn->prepare("UPDATE hospitallisting SET hospital_location=?, lat=?, lng=? WHERE ID=?");

    // $SQL->bind_param('ssss', $locationToSave, $latToSave, $lngTosave, $hospitalID);
    // $SQL->execute();

    if ($sql) {
        echo "Success!";
    }else {
        echo "Failed!";
    }