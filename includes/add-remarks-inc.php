<?php  
    include_once 'dbh-inc.php';

    $bookingID = $_POST["bookingID"];
    $remarksData = $_POST["remarksData"];

    $sql = $conn->query("UPDATE completedreservations SET remarks = '$remarksData' WHERE ID = $bookingID") or die($conn->error);