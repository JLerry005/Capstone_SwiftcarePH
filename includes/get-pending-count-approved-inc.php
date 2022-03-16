
<?php

require_once 'dbh-inc.php';
    
$query = "SELECT * FROM hospitalinformation;";
$result = mysqli_query($conn, $query);
$resultCheck = mysqli_num_rows($result);
$totalCount = $resultCheck;

echo $totalCount;
