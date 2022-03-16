<?php

    require_once 'dbh-inc.php';

    $query = "SELECT * FROM rejectedhospital;";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);

    $output = '';
    
    while($row = mysqli_fetch_assoc($result)) {
        $ID = $row['ID'];
        $rejectedType = $row['rejectedType'];
        $rejectedName = $row['rejectedName'];
        $rejectedAddress  = $row['rejectedAddress'];
        $representativeName = $row['representativeName'];
        $rejectedSupervisor = $row['rejectedSupervisor'];
        $rejectedphoneNumber = $row['rejectedphoneNumber'];
        $rejectedDesignation = $row['rejectedDesignation'];
        $rejectedEmail = $row['rejectedEmail'];
        $timestamp = $row['rejectTimestamp'];

        $output .='

            <div class="card pending-cards m-3 mt-4 mb-3 pt-3 p-3 bg-gradient bg-danger" onclick="rejectedFullDetails('.$ID.')">
                <div class="card-body d-flex justify-content-between">
                    <div class="fs-1 text-whiteBGColor my-auto fw-bolder"> '.$ID.'</div>
                    <div class="text-center">
                        <h4 class="text-4xl font-bold text-whiteBGColor"><b><i class="" id="card-firstname"></i> '.$rejectedName.'</h4>
                        <sub class="fs-6 text-black"><i class="bi bi-person-circle" id="card-lastname"></i> Representative: '.$representativeName.'</sub>
                    </div>
                    <div>
                        <div class="mb-2 text-black">
                            <h6><i class="bi bi-clock" id="card-id"></i> '.$timestamp.'</h6>
                        </div>

                    </div>
                </div>
            </div>
        ';
    }

    echo $output;