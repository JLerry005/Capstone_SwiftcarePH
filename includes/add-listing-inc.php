<?php
    session_start();
    include_once 'dbh-inc.php';


    // $hospitalName = $_POST['hospitalName'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $hospitalCity = $_POST['hospitalCity'];
    // $type = $_POST['hospitalType'];
    $bed = $_POST['bed'];
    $bedSlot = $_POST['bedSlot'];
    $room = $_POST['room'];
    $roomSlot = $_POST['roomSlot'];
    $refferal = $_POST['refferal'];
    $websiteLink = $_POST['websiteLink'];
    // $images = $_POST['images'];
    
    $hospitalID = $_SESSION["hospitalID"];
    $listing_id = $_SESSION["listing-id"];
    // $listing_id = $_SESSION["listing_id"];
    $response ='';

    // $hospitalID = 177;
    
    $sql = "UPDATE hospitallisting SET hospital_location = ?, hospital_description = ?,  hospital_city = ?, bed = ?, bed_slot = ?, room = ?, room_slot = ?, additional_docs = ?, website_link = ? WHERE hospitalID = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../hospital-dashboard?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssisissi", $location, $description, $hospitalCity, $bed, $bedSlot, $room, $roomSlot, $refferal, $websiteLink, $hospitalID);
    mysqli_stmt_execute($stmt); 
    mysqli_stmt_close($stmt);

    // $lastId = mysqli_insert_id($conn);

    