<?php

    require_once 'includes/dbh-inc.php';

    $query = "SELECT * FROM pendingadminsignup;";
    $result = mysqli_query($conn, $query);
    $resultCheck = mysqli_num_rows($result);
    $populate ="";

    if ($resultCheck > 0 ) {
        while ($row = mysqli_fetch_assoc($result)) {
            $populate .= '
                      <button type="button" class="btn btn-primary" data-role="show">Save changes</button>
                      
                        <div class="card mb-4">
                            <div class="card-header p-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-primary">Status: Pending <i class="bi bi-hourglass-top"></i></p>
                                    <p class="fw-bold text-primary"><i class="bi bi-clock-history"></i> '.$row['pendingTimestamp'].'</p>
                                </div>
                                <i class="bi bi-card-heading"></i> Registration Code:
                                <div class="badge bg-dark text-wrap mb-3">
                                        SCPHREG2021001 '.$row['pendingID'].'
                                </div><button class="copy-code" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy Reservation Code" data-clipboard-action="copy" data-clipboard-target="#reservation-code-SCPH2021001"><span aria-hidden="false" class="copy-icon bi bi-clipboard-plus"></span></button>
                                
                                <h4><b><i class="bi bi-building"></i>'.$row['pendingName'].'</b></h4>
                                <h5>Type: '.$row['pendingType'].'</h5>
                                <h5>Representative Name: '.$row['pendingRepresentativeName'].'</h5>
                                <h5><i class="bi bi-geo-alt-fill"></i> Address: '.$row['pendingAddress'].'</h5>
                            </div>

                            <div class="collapse p-4" id="'.$row['pendingID'].'" value="'.$row['pendingID'].'">
                                <div class="row">
                                    <div class="card-body col-xl-6">
                                        <p class="card-title"><i class="bi bi-person-circle"></i> Supervisor Name: '.$row['pendingSupervisorName'].'</p>
                                        <p class="card-text"><i class="bi bi-person-fill"></i> Representative Name: '.$row['pendingRepresentativeName'].'</p>
                                        <p class="card-text"><i class="bi bi-pin-fill"></i> Registrant Designation: '.$row['pendingDesignation'].'</p>
                                        <p class="card-text"><i class="bi bi-envelope-fill"></i> Email: '.$row['pendingEmail'].'</p>
                                        <p class="card-text"><i class="bi bi-telephone-fill"></i> Mobile no: '.$row['pendingPhoneNumber'].'</p>
                                    </div>
                        
                                    <div class="attachments col-xl-6">
                                        <ul>
                                            <li>**all attachments list**</li>
                                            <li>**all attachments list**</li>
                                            <li>**all attachments list**</li>
                                            <li>**all attachments list**</li>
                                        </ul>
                                    </div>
                        
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-danger mx-2"><i class="bi bi-x-lg"></i> Reject</button>
                                        <button type="button" class="btn btn-warning"><i class="bi bi-check-lg"></i> Approve</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-center">
                                <a class="text-decoration-none" id="list-card" role="button" data-bs-toggle="modal" data-bs-target="#list-modal" >
                                    <i class="bi bi-eye"></i> Toggle Full Details
                                </a>                              
                            </div>

                            <div class="">
                                <button type="button" class="btn btn-primary btnConfirm"><i class="bi bi-check-circle-fill"></i> Approve</button>
                            </div>
                            
                            <div class="">
                                <button type="button" class="btn btn-danger btnReject"><i class="bi bi-x-circle-fill"></i> Reject </button>
                            </div>   

                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="list-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>
            ';           
        }
    }

    else {
        $populate .= '<p>Error Fetching Data!</p>';
    }

    echo $populate;
    $totalCount = $resultCheck;
?>

<script>
    $(document).ready(function () {

        function showDetails(pendingID) {
            alert(pendingID);
        }
    });
</script>















