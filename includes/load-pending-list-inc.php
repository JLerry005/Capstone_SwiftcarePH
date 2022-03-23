<?php

    require_once 'dbh-inc.php';

    $query = "SELECT * FROM pendingadminsignup;";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);

    $output = '';
    
    while($row = mysqli_fetch_assoc($result)) {
        $pendingID = $row['pendingID'];
        $pendingType = $row['pendingType'];
        $pendingName = $row['pendingName'];
        $pendingAddress = $row['pendingAddress'];
        $pendingRepresentativeName = $row['pendingRepresentativeName'];
        $pendingSupervisorName = $row['pendingSupervisorName'];
        $pendingPhoneNumber = $row['pendingPhoneNumber'];
        $pendingDesignation = $row['pendingDesignation'];
        $pendingEmail = $row['pendingEmail'];
        $pendingTimestamp = $row['pendingTimestamp'];

        $output .='
            <div class="card pending-cards m-3 mt-4 mb-3 pt-3 p-3 bg-gradient bg-whiteBGColor" onclick="showFullDetails('.$pendingID.')">
                <div class="card-body d-flex justify-content-between my-auto"></div>
                    <div class="fs-1 text-footerColor my-auto fw-bolder"> '.$pendingID.'</div>
                    <div class="text-center my-auto">
                        <h4 class="text-4xl font-bold">'.$pendingName.'</h4>
                        <sub class="text-lg text-footerColor"><b><i class="bi bi-person-circle" id="card-lastname"></i> Representative: '.$pendingRepresentativeName.' </b></sub>
                    </div>
                    <div>
                        <div class="mb-2">
                            <i class="bi bi-clock fw-bold" id="card-id"></i> <label class="text-success"> '.$pendingTimestamp.' </label>
                        </div>

                    </div>
                </div>
            </div>
        ';
    }

    echo $output;