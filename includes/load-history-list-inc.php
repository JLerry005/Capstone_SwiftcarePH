<?php

    require_once 'dbh-inc.php';

    $query = "SELECT * FROM hospitalinformation;";
    $query = "SELECT * FROM rejectedhospital;";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);

    $output = '';
    
    while($row = mysqli_fetch_assoc($result)) {
        // Approved Database
        $HospitalID = $row['ID'];
        $hospitalType = $row['hospitalType'];
        $hospitalName = $row['hospitalName'];
        $hospitalAddress  = $row['hospitalAddress'];
        $representativeName = $row['representativeName'];
        $supervisorName = $row['supervisorName'];
        $phoneNumber = $row['phoneNumber'];
        $designation = $row['designation'];
        $email = $row['email'];
        $timestamp = $row['timestamp'];

        // Rejected Database
        $RejectedID = $row['ID'];
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

            <div class="card pending-cards mb-3 pt-3 p-3 bg-gradient" onclick="approvedFullDetails('.$HospitalID.')">
                <div class="card-body d-flex justify-content-between">
                    <div>
                        <h4><b><i class="bi bi-building" id="card-firstname"></i> '.$hospitalName.'</h4>
                        <sub><i class="bi bi-person-circle" id="card-lastname"></i> Rep: '.$representativeName.'</sub>
                    </div>
                    <div>
                    <div class="mb-2">
                        <h6><i class="bi bi-clock" id="card-id"></i> '.$timestamp.'</h6>
                    </div>
                        <i class="bi bi-card-heading"></i> Reg.Code:
                        <div class="badge bg-dark text-wrap mb-3"> '.$HospitalID.'</div>
                    </div>
                </div>
            </div>

            <div class="card pending-cards mb-3 pt-3 p-3 bg-gradient" onclick="rejectedFullDetails('.$RejectedID.')">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <h4><b><i class="bi bi-building" id="card-firstname"></i> '.$rejectedName.'</h4>
                    <sub><i class="bi bi-person-circle" id="card-lastname"></i> Rep: '.$representativeName.'</sub>
                </div>
                <div>
                    <div class="mb-2">
                        <h6><i class="bi bi-clock" id="card-id"></i> '.$timestamp.'</h6>
                    </div>
                    <i class="bi bi-card-heading"></i> Reg.Code:
                    <div class="badge bg-dark text-wrap mb-3"> '.$RejectedID.'</div>
                </div>
            </div>
            </div>
        ';
    }

    echo $output;