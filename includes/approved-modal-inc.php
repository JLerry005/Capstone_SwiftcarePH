<?php

    require_once 'dbh-inc.php';

    // $query = "SELECT * FROM pendingadminsignup;";
    

    if (isset($_POST['ID'])) {
        $ID = $_POST['ID'];

        $query = "SELECT * FROM hospitalinformation WHERE ID = $ID;";
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