
<?php

    require_once 'dbh-inc.php';

    $query = "SELECT * FROM userbooking WHERE listing_id = 10";

    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);
    $totalCount = $resultCheck;

    echo $totalCount;
