<?php
    // require_once 'includes/functions-inc.php';
    // require_once 'dbh-inc.php';
    // $count = new pendingCount($conn);
    // $totalCount = $count->getTotalCount();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!--Bootstrap 5 Install-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!--Google Material Icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--Bootstrap Masonry-->
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <!--lightGallery CSS CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    
    <!--CSS Link-->
    <link rel="stylesheet" href="dist\output.css">
    <link  href="styling/admin-dashboard-styling.css" rel="stylesheet" type="text/css">
    <title>Admin Dashboard | SwiftCare PH</title>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="js/admin-dashboard.js"></script>
    <!-- <title>Homepage - SwiftCare PH</title> -->
    <link rel="icon" href="assets/main-logo-line.png" type="image/x-icon">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-dark p-3">
        <div class="container-fluid">
            <ul class="notifications d-flex justify-content-start my-auto">
                <div class="mx-3 text-warning">
                    <li><i class="bi bi-hourglass-top"></i> Pending Requests: <b><?php require_once'includes/get-pending-count-inc.php'; ?></b></li>
                </div>
            </ul>
            <a class="navbar-brand mx-5" href="index"> 
                <img src="assets/main-logo-transparent.png" class="img-fluid" alt="" title="sample" style="pointer-events: none;" width="120px" height="120px"">
            </a>
            <!--Notifications-->
            <ul class="notifications d-flex justify-content-end my-auto">
                <div class="mx-5 text-success">
                    <li><i class="bi bi-check-circle"></i> Approved Request: <b><?php require_once'includes/get-pending-count-approved-inc.php'; ?></b></li>
                </div>
            </ul>  
        </div>
    </nav> 

    <div class="col-span-12 sm:col-span-12">

    </div>
    <div class="p-12">    
         
        <div class="tab d-flex flex-row justify-content-center mb-3 space-x-8">

            <div class="pending">
                <button class="tablinks font-semibold" id="pending-button" onclick="openCity(event, 'pending-cards-container')"><i class="bi bi-hourglass-top"></i> PENDING</button>
            </div>

            <div class="approved">
                <button class="font-semibold" id="approved-button" onclick="openCity(event, 'approved-cards-container')"><i class="bi bi-check-circle"></i> APPROVED</button>
            </div>

            <div class="rejected">
                <button class="font-semibold" id="rejected-button" onclick="openCity(event, 'rejected-cards-container')"><i class="bi bi-x-circle"></i> REJECTED</button>
            </div>

            <!-- <button class="tablinks hover:underline" id="history-button" onclick="openCity(event, 'history-cards-container')"><i class="bi bi-clock-fill"></i> History</button> -->
        </div>
        
        <!-- START Pending Tabcontent  -->
        <div class="tabcontent-container mx-20">
            <div class="tabcontent" id="pending-cards-container">

                <div class="text-white fs-4">
                    <label>Pending For <span class="text-success fw-bold"> Approval</span> or <span class="text-danger fw-bold">Reject</span> </label>
                </div>

                <div class="mt-3 h-1 bg-white">
                    <hr>
                </div>

                <div id="pending">

                </div>

                <!-- Pending Modal -->
                <div class="modal pending-modal" id="pending-modal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header p-3 d-flex flex-row justify-content-between bg-footerColor">
                                <i class="bi bi-building hospital-name-icon font-semibold text-2xl text-white"></i>
                                <h5 class="modal-title font-semibold text-2xl text-Yellow" id="hospital-name"></h5>
                                <button type="button" class="bi bi-x-lg text-white fw-bolder" data-bs-dismiss="modal" aria-label="Close"></button>    
                            </div>

                            <div class="modal-body p-3 bg-whiteBGColor">  

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="bi bi-clipboard-plus font-bold text-xl text-footerColor"> Hospital ID:  &nbsp;</label>
                                    <p id="modal-pending-id" class="font-semibold texl-lg"> &nbsp;</p>
                                </div>

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="font-bold text-xl text-footerColor">Pending Type: &nbsp;</label>
                                    <p id="modal-pending-type" class="text-lg">Private</p>
                                </div>

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="font-bold text-xl text-footerColor">Address: &nbsp;</label>
                                    <p class="texl-lg" id="modal-pending-address" ></p>
                                </div>

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="font-bold text-xl text-footerColor">Representative: &nbsp;</label>
                                    <p id="modal-pending-representative" class="texl-lg"></p>
                                </div>

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="font-bold text-xl text-footerColor">Supervisor: &nbsp;</label>
                                    <p id="modal-pending-supervisor" class="texl-lg"></p>
                                </div>

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="font-bold text-xl text-footerColor">Phone Number: &nbsp;</label>
                                    <p id="modal-pending-phone" class="texl-lg"></p>
                                </div>

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="font-bold text-xl text-footerColor">Designation: &nbsp;</label>
                                    <p id="modal-pending-designation" class="texl-lg"></p>
                                </div>

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="font-bold text-xl text-footerColor">Email: &nbsp;</label>
                                    <p id="modal-pending-email" class="texl-lg"></p>
                                </div>

                                <div class="d-flex flex-row">
                                    <label class="font-bold text-xl text-footerColor"></label>
                                    <p hidden id="modal-pending-password"></p>
                                </div>

                                <div class="d-flex flex-row justify-content-between">
                                    <label class="font-bold text-xl text-footerColor">Timestamp: &nbsp;</label>
                                    <p id="modal-pending-timestamp" class="texl-lg"></p>  
                                </div> 

                                <div class="text-end">
                                    <button  type="button" class="btn btn-link" id="show-image" onclick="showImages()"><i class="bi bi-paperclip"></i>Attachments</button>
                                </div>

                            </div>

                            <div class="d-flex justify-content-center space-x-10 pb-3">
                                <button type="button" class="btn-accept text-white hover p-2 font-weight-300" id="accept-pending" onclick="acceptPending()"><i class="bi bi-check"></i> Accept</button>
                                <button type="button" class="btn-reject border-2 border-rose-600 p-2 text-rose-600 font-semibold" id="reject-pending" onclick="rejectPending()"><i class="bi bi-x font-semibold"></i> Reject</button>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Images View Modal -->
                <div class="modal text-center" id="modal-image" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
    
                            <div class="modal-header bg-footerColor d-flex text-Yellow justify-content-center fs-4">
                                <h5 class="modal-title fw-bold"><i class="bi bi-paperclip"></i> HOSPITAL DOCUMENTS | ATTACHMENTS</h5>
                            </div>
                            
                            <div class="modal-body">

                                 <!-- Imgae Gallery -->
                                <div class="row">
                                    <div class="row attachments-gallery mb-3" id="attachments-gallery">
                                    </div>
                                </div>
                
                            </div>

                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn btn-reject btn-outline-danger" onclick="backToPending()">Back</button>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Accept Warning Modal -->
                <div class="modal text-center" id="modal-accept" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
    
                            <div class="modal-header bg-footerColor text-whiteBGColor">
                                <h5 class="modal-title fw-bold">ACCEPT</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                            <div class="modal-body">
                                <p>Are you sure you want to <span class="fw-bold text-success">ACCEPT</span> this request?</p>
                            </div>

                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn-Yes" id="accept-modal-yes"><i class="bi bi-check"></i> Yes</button>
                                <button type="button" class="btn-Cancel" id="accept-modal-cancel"><i class="bi bi-x"></i> Cancel</button>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Reject Warning Modal -->
                <div class="modal text-center" id="modal-reject" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header bg-footerColor text-whiteBGColor">
                                <h5 class="modal-title fw-bold">REJECT</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <p>Are you sure you want to <span class="text-danger fw-bold">REJECT</span> this request?</p>
                            </div>

                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn-Yes" id="reject-modal-yes"><i class="bi bi-check"></i> Yes</button>
                                <button type="button" class="btn-Cancel" id="reject-modal-cancel"><i class="bi bi-x"></i> Cancel</button>
                            </div>

                        </div>
                    </div>
                </div>

                <!--Pending Cards-->
                <div class="col-12 mb-4" id="pending-cards-container">
                    <div class="spinner-border m-1" id="spinner" role="status" style="display: none;">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>

            <!-- END Pending Tabcontent  -->


            <!-- START Approved TabContent -->
            <div class="tabcontent" id="approved-cards-container" >
                <div class="text-success fs-4 fw-bold">
                    <label>Approved Hospitals</label>
                </div>

                <div class="mt-3 h-1 bg-white">
                    <hr>
                </div>

                <div id="approved">
                </div>

                <!-- Approved Modal -->
                <div class="modal approved-modal" id="approved-modal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">

                            <div class="modal-header p-3 d-flex flex-row justify-content-between bg-footerColor">
                                <i class="bi bi-building hospital-name-icon font-semibold text-2xl text-white"></i>
                                <h5 class="modal-title font-semibold text-2xl text-Yellow" id="approved-hospital-name"></h5>
                                <button type="button" class="bi-x-lg text-white fw-bolder" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                
                            <div class="modal-body p-3 bg-whiteBGColor">  

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="bi bi-clipboard-plus font-bold text-xl text-footerColor"> Hospital ID:  &nbsp;</label>
                                    <p id="modal-approved-id" class="font-semibold texl-lg"> &nbsp;</p>
                                </div>

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="font-bold text-xl text-footerColor">Pending Type: &nbsp;</label>
                                    <p id="modal-approved-type" class="text-lg">Private</p>
                                </div>

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="font-bold text-xl text-footerColor">Address: &nbsp;</label>
                                    <p class="texl-lg" id="modal-approved-address" ></p>
                                </div>

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="font-bold text-xl text-footerColor">Representative: &nbsp;</label>
                                    <p id="modal-approved-representative" class="texl-lg"></p>
                                </div>

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="font-bold text-xl text-footerColor">Supervisor: &nbsp;</label>
                                    <p id="modal-approved-supervisor" class="texl-lg"></p>
                                </div>

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="font-bold text-xl text-footerColor">Phone Number: &nbsp;</label>
                                    <p id="modal-approved-phone" class="texl-lg"></p>
                                </div>

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="font-bold text-xl text-footerColor">Designation: &nbsp;</label>
                                    <p id="modal-approved-designation" class="texl-lg"></p>
                                </div>

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="font-bold text-xl text-footerColor">Email: &nbsp;</label>
                                    <p id="modal-approved-email" class="texl-lg"></p>
                                </div>

                                <div class="d-flex flex-row">
                                    <label class="font-bold text-xl text-footerColor"></label>
                                    <p hidden id="modal-approved-password"></p>
                                </div>

                                <div class="d-flex flex-row justify-content-between">
                                    <label class="font-bold text-xl text-footerColor">Timestamp: &nbsp;</label>
                                    <p id="modal-approved-timestamp" class="texl-lg"></p>  
                                </div> 

                            </div>

                            <div class="d-flex justify-content-center space-x-10 pb-3">
                                <!-- <button type="button" class="btn-undo bg-footerColor text-white p-2" id="" onclick="undoApproved()"><i class="bi bi-arrow-counterclockwise"></i> Undo</button> -->
                                <button type="button" class="btn btn-reject btn-outline-danger" data-bs-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Approved Undo Warning Modal -->
                <!-- <div class="modal text-center" id="modal-undo-approved" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header bg-footerColor text-whiteBGColor font-bold">
                            <h5 class="modal-title">UNDO</h5>
                            <button type="button" class="bi bi-x-lg text-white fw-bolder" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <div class="modal-body">
                            <p>Are you sure you want to continue?</p>
                        </div>

                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn-Yes" id="undo-modal-yes-approved"><i class="bi bi-check"></i> Yes</button>
                            <button type="button" class="btn-Cancel" id="undo-modal-cancel-approve"><i class="bi bi-x"></i> Cancel</button>
                        </div>

                        </div>
                    </div>
                </div> -->

                <!--Pending Cards-->
                <!-- <div class="col-12 mb-4" id="approved-cards-container">
                    <div class="spinner-border m-1" id="spinner" role="status" style="display: none;">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div> -->

            </div>

            <!-- END Approved TabContent -->

            <!-- START Rejected TabContent -->
            
            <div class="tabcontent" id="rejected-cards-container">
                <div class="fs-4 fw-bold">
                    <h1 class="text-rose-600">Rejected Hospitals</h1>
                </div>

                <div class="mt-3 h-1 bg-white">
                    <hr>
                </div>

                <div id="rejected">
                </div>

                <!-- Rejected Modal -->
                <div class="modal rejected-modal" id="rejected-modal" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header p-3 d-flex flex-row justify-content-between bg-footerColor">
                                <i class="bi bi-building hospital-name-icon font-semibold text-2xl text-white"></i>
                                <h5 class="modal-title font-semibold text-2xl text-Yellow" id="rejected-hospital-name"></h5>
                                <button type="button" class="bi-x-lg text-white fw-bolder" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>


                            <div class="modal-body p-3 bg-whiteBGColor">  

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="bi bi-clipboard-plus font-bold text-xl text-footerColor"> Hospital ID:  &nbsp;</label>
                                    <p id="modal-rejected-id" class="font-semibold texl-lg"> &nbsp;</p>
                                </div>

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="font-bold text-xl text-footerColor">Pending Type: &nbsp;</label>
                                    <p id="modal-rejected-type" class="text-lg">Private</p>
                                </div>

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="font-bold text-xl text-footerColor">Address: &nbsp;</label>
                                    <p class="texl-lg" id="modal-rejected-address" ></p>
                                </div>

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="font-bold text-xl text-footerColor">Representative: &nbsp;</label>
                                    <p id="modal-rejected-representative" class="texl-lg"></p>
                                </div>

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="font-bold text-xl text-footerColor">Supervisor: &nbsp;</label>
                                    <p id="modal-rejected-supervisor" class="texl-lg"></p>
                                </div>

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="font-bold text-xl text-footerColor">Phone Number: &nbsp;</label>
                                    <p id="modal-rejected-phone" class="texl-lg"></p>
                                </div>

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="font-bold text-xl text-footerColor">Designation: &nbsp;</label>
                                    <p id="modal-rejected-designation" class="texl-lg"></p>
                                </div>

                                <div class="d-flex flex-row justify-content-between pb-2">
                                    <label class="font-bold text-xl text-footerColor">Email: &nbsp;</label>
                                    <p id="modal-rejected-email" class="texl-lg"></p>
                                </div>

                                <div class="d-flex flex-row">
                                    <label class="font-bold text-xl text-footerColor"></label>
                                    <p hidden id="modal-rejected-password"></p>
                                </div>

                                <div class="d-flex flex-row justify-content-between">
                                    <label class="font-bold text-xl text-footerColor">Timestamp: &nbsp;</label>
                                    <p id="modal-rejected-timestamp" class="texl-lg"></p>  
                                </div> 

                            </div>

                            <div class="d-flex justify-content-center space-x-10 pb-3">
                                <!-- <button type="button" class="btn-undo bg-footerColor text-white p-2" onclick="undoRejected()"><i class="bi bi-arrow-counterclockwise"></i> Undo</button> -->
                                <button type="button" class="btn btn-reject btn-outline-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                                                   
                            </div>
                        </div>
                    </div>

                    <!-- Rejected Undo Warning Modal -->
                    <!-- <div class="modal text-center" id="modal-undo-rejected" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            
                            <div class="modal-content">

                            <div class="modal-header bg-footerColor text-whiteBGColor font-bold">
                                <h5 class="modal-title">UNDO</h5>
                                <button type="button" class="bi bi-x-lg text-white fw-bolder" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                            <div class="modal-body">
                                <p><b>Are you sure you want to continue?</b></p>
                            </div>

                            <div class="modal-footer footer d-flex justify-content-center">
                                <button type="button" class="btn-Yes" id="undo-modal-yes-rejected"><i class="bi bi-check"></i> Yes</button>
                                <button type="button" class="btn-Cancel" id="undo-modal-cancel"><i class="bi bi-x"></i> Cancel</button>
                            </div>

                            </div>

                        </div>
                    </div> -->

                    <!--Rejected Cards-->
                    <!-- <div class="col-12 mb-4" id="rejected-cards-container">
                        <div class="spinner-border m-1" id="spinner" role="status" style="display: none;">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div> -->

                </div>                
            </div>

            <!-- END Rejected TabContent -->

        </div>
    </div>
    <!-- Light Gallery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>
</body>
</html>