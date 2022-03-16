<?php
    include_once 'dbh-inc.php';

    if (isset($_POST['current_id'])) {
        $currentID = $_POST['current_id'];

        // $sql = "SELECT * from hospitaldocuments WHERE hospitalID = $currentID";
        // $result = mysqli_query($conn, $sql);
        // $resultCheck = mysqli_num_rows($result);
        // $response = array();

        // while($row=mysqli_fetch_assoc($result)) {
        //     $response = $row;
        // }
        
        $rows = array();
        $result = $conn->query("SELECT * FROM hospitaldocuments WHERE hospitalID = $currentID") or die($conn->error);
        while ($data = mysqli_fetch_assoc($result)) {
            // echo "$data[image_dir]";
            // echo json_encode($data);
            $rows[] = $data;
        }

        echo json_encode($rows);
        
    }

    else {
        $response['status']=200;
        $response['message']="Invalid or data not found!";
    }