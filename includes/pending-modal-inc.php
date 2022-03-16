<?php

    require_once 'dbh-inc.php';

    // $query = "SELECT * FROM pendingadminsignup;";
    

    if (isset($_POST['pending_id'])) {
        $pendingID = $_POST['pending_id'];

        // SELECT p.*, h.* FROM pendingadminsignup AS p, hospitaldocuments AS h
        // WHERE p.pendingID = $pendingID AND h.hospitalID = $pendingID;

        // $query = "SELECT * FROM pendingadminsignup WHERE pendingID = $pendingID;";
        $query = "SELECT p.*, h.* FROM pendingadminsignup AS p, hospitaldocuments AS h
                    WHERE p.pendingID = $pendingID AND h.hospitalID = $pendingID";
        $result = mysqli_query($conn, $query);
        $resultCheck = mysqli_num_rows($result);
        $response = array();

        while($row=mysqli_fetch_assoc($result)) {
            $response = $row;
        }

        echo json_encode($response);
    }
    else {
        $response['status']=200;
        $response['message']="Invalid or data not found!";
    }