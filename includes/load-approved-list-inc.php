<?php

    require_once 'dbh-inc.php';

    $query = "SELECT * FROM hospitalinformation;";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);

    $output = '';
    
    while($row = mysqli_fetch_assoc($result)) {
        $ID = $row['ID'];
        $hospitalType = $row['hospitalType'];
        $hospitalName = $row['hospitalName'];
        $hospitalAddress  = $row['hospitalAddress'];
        $representativeName = $row['representativeName'];
        $supervisorName = $row['supervisorName'];
        $phoneNumber = $row['phoneNumber'];
        $designation = $row['designation'];
        $email = $row['email'];
        $timestamp = $row['timestamp'];

        $output .='

            <div class="card approved-cards pending-cards m-3 mt-4 mb-3 pt-3 p-3 bg-gradient" onclick="approvedFullDetails('.$ID.')">
                <div class="card-body d-flex flex-row justify-content-between">

                    <div class="fs-1 text-footerColor my-auto fw-bolder"> '.$ID.'</div>

                    <div class="my-auto text-center fw-bold">
                        <h4 class="text-4xl text-whiteBGColor"><b><i id="card-firstname"></i></b> '.$hospitalName.'</h4>
                        <sub class="text-lg text-footerColor"><i class="bi bi-person-circle" id="card-lastname"></i> Representative: '.$representativeName.'</sub>
                    </div>

                    <div class="my-auto">
                        <div class="mb-2 my-auto">
                            <h6><i class="bi bi-clock " id="card-id"></i> '.$timestamp.'</h6>
                        </div>
                    </div>

                </div>
            </div>
        ';
    }

    echo $output;