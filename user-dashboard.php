<?php
  include_once 'nav.php';
//   if (!isset($_SESSION['sessionpatientUserID'])) {
//             header("location: user-login.php");
//             die();
//     } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap 5 Install-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--Google Material Icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel = "icon" href ="/assets/undraw_secure_login_pdn4.svg" type = "image/x-icon">
    <script src="/clipboard.js-master/dist/clipboard.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0-rc.3/jquery-ui.min.js" integrity="sha256-R6eRO29lbCyPGfninb/kjIXeRjMOqY3VWPVk6gMhREk=" crossorigin="anonymous"></script>
    
    <script src="js\user-dashboard.js" defer></script>
    <link rel="stylesheet" href="styling/user-dashboard.css">
    <title>User Dashboard | SwiftCare PH</title>
    <link rel="icon" href="assets/main-logo-line.png" type="image/x-icon">  
</head>
<body>
    
    <!-- <button class="btn btn-secondary sampleButton" id="sampleButton" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip primary examples">Tooltip primary</button> -->

    <!--Main Container-->
    <div class="container py-4 mt-3">
        
        <h3 class="text-start"><i class="bi bi-speedometer2"></i> Dashboard</h3>
        
        <!-- <button type="button" id="sampleButton" class="btn btn-secondary sampleButton" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">
            Tooltip on top
        </button> -->
        

        <!-- Reservations and Account Settings Cards -->
        <div id="main-cards">
            <!-- Reservation -->
            <div class="card mt-5 mb-4 text-light p-5 card-reservation" id="reservations-card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <!-- Left Side Content -->
                    <div class="d-flex align-items-center">
                        <div class="card-icon">
                            <i class="bi bi-calendar-check-fill fs-1"></i>
                        </div>
                        <div>
                            <h3 class="card-title text-warning">Reservations</h3>
                            <p class="card-text">View and manage all of your <b class="text-warning">reservations.</b></p>
                        </div>
                    </div>
                    <!-- Right Side Content -->
                    <div>
                        <a href="#" class="btn fs-1"><i class="bi bi-chevron-compact-right text-warning"></i></a>
                    </div>
                </div> 
            </div>

            <!-- Account Settings -->
            <div class="card mb-4 p-5 card-account" id="account-card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <!-- Left Side Content -->
                    <div class="d-flex align-items-center">
                        <div class="card-icon">
                            <i class="bi bi-gear-fill fs-1"></i>
                        </div>
                        <div>
                            <h3 class="card-title account-title">Account Settings</h3>
                            <p class="card-text">Manage your <b>account.</b></p>
                        </div>
                    </div>
                    <!-- Right Side Content -->                
                    <div>
                        <a href="#" class="btn fs-1"><i class="bi bi-chevron-compact-right text-dark"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contents -->
        
        <!-- Start -->

        <!-- Reservation Content -->
        <div class="reservations-content p-5" style="display: none;" id="reservations-content">
            <!-- Back button -->
            <div class="mb-2 text-dark">
                <button type="button" class="btn back fs-4 back-to-dashboard" id="reservations-back-to-dashboard" data-bs-toggle="tooltip" title="Back to dashboard"><i class="bi bi-arrow-bar-left fs-4"></i> Back</button>
            </div>'          
            <!-- Pending -->
            <div class="card mb-4 p-4 card-pending">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <!-- Left Side Content -->
                    <div class="d-flex align-items-center text-light">
                        <div class="card-icon">
                            <i class="bi bi-hourglass-split fs-1"></i>
                        </div>
                        <div>
                            <h3 class="card-title">Pending</h3>
                            <p class="card-text">View and manage all of your reservations here.</p>
                        </div>
                    </div>
                    <!-- Right Side Content -->
                    <div>
                        <a href="#" class="btn fs-1"><i class="bi bi-chevron-compact-right text-light"></i></a>
                    </div>
                </div>
            </div>

            <!-- Confirmed -->
            <div class="card mb-4 p-4 card-confirmed">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <!-- Left Side Content -->
                    <div class="d-flex align-items-center text-light">
                        <div class="card-icon">
                            <i class="bi bi-check2-circle fs-1"></i>
                        </div>
                        <div>
                            <h3 class="card-title">Confirmed</h3>
                            <p class="card-text">View and manage all of your reservations here.</p>
                        </div>
                    </div>
                    <!-- Right Side Content -->
                    <div>
                        <a href="#" class="btn fs-1"><i class="bi bi-chevron-compact-right text-light"></i></a>
                    </div>
                </div>
            </div>

            <!-- Rejected -->
            <div class="card mb-4 p-4 card-rejected">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <!-- Left Side Content -->
                    <div class="d-flex align-items-center text-light">
                        <div class="card-icon">
                            <i class="bi bi-x-circle-fill fs-1"></i>
                        </div>
                        <div>
                            <h3 class="card-title">Rejected</h3>
                            <p class="card-text">View and manage all of your reservations here.</p>
                        </div>
                    </div>
                    <!-- Right Side Content -->
                    <div>
                        <a href="#" class="btn fs-1"><i class="bi bi-chevron-compact-right text-light"></i></a>
                    </div>
                </div>
            </div>

            <!-- History -->
            <div class="card mb-4 p-4 card-history">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <!-- Left Side Content -->
                    <div class="d-flex align-items-center text-light">
                        <div class="card-icon">
                            <i class="bi bi-clock-history fs-1"></i>
                        </div>
                        <div>
                            <h3 class="card-title">History</h3>
                            <p class="card-text">View and manage all of your reservations here.</p>
                        </div>
                    </div>
                    <!-- Right Side Content -->
                    <div>
                        <a href="#" class="btn fs-1"><i class="bi bi-chevron-compact-right text-light"></i></a>
                    </div>
                </div>
            </div>
        </div>        
        <!-- End -->

        <!-- Start -->

        <div class="p-5" style="display: none;" id="account-content">

            <div class="text-dark">
                <button class="btn back fs-4 back-to-dashboard" id="account-back-to-dashboard" data-bs-toggle="tooltip" title="Back to dashboard"><i class="bi bi-arrow-bar-left fs-4"></i> Back</button>
            </div>

            <div class="account-setting">

                <!-- Title -->
                <div>
                    <h3>Personal Information</h3>
                </div>
                 <!-- Account Content -->
                <div class="row">

                    <!-- First Name -->
                    <div class="col-xl-6 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="input" class="form-control" id="firstName" placeholder="name@example.com" value="<?php echo $row['patientFirstname']; ?>" disabled>
                            <label for="firstName">First Name</label>
                        </div>
                    </div>

                    <!-- Last Name -->
                    <div class="col-xl-6 col-md-6">
                        <div class="form-floating mb-3">
                            <input type="input" class="form-control" id="lastName" placeholder="name@example.com" value="<?php echo $row['patientLastname']; ?>" disabled>
                            <label for="lastName">Last Name</label>
                        </div>
                    </div>
                    
                    <!-- Mobile Number -->
                    <div class="col-xl-12 col-md-12" id="mobileNumber-container">
                        <div class="spinner-border m-1" id="spinner" role="status" style="display: none;">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                            <form action="includes/change-phone-inc.php" method="post" id="change-phone-form">
                                <div class="form-floating mb-3">
                                    <input type="tel" inputmode="numeric" enterkeyhint="next" pattern="[0-9]{10,11}" class="form-control" id="mobileNumber" value="" placeholder="Ex. 09123456789" disabled required>
                                    <label for="mobileNumber">Mobile Number</label>
                                </div>

                                <button type="button" class="btn btn-link edit-phone-number" id="edit-phone-number">Edit</button>
                                <button type="submit" class="btn btn-link save-phone-number" id="save-phone-number" name="save-phone-number">Save</button>
                                <p class="fw-bold text-success phone-success-message" id="phone-success-message"><i class="bi bi-check-lg"></i> Successfully Saved!</p>
                            </form>
                    </div>

                    <!-- Edit Password -->
                    <div class="col-xl-12 col-md-12 mb-5">
                        <button class="btn-pwd" id="btn-edit-password"><i class="bi bi-key-fill"></i> Edit Password</button>
                    </div> 

                    <!-- START -->

                    <!-- Verify Password Form -->
                    <div class="verifyPassword mb-3" id="verifyPassword-div" name="verifyPassword" style="display: none;">
                        <div>
                            <h4>Verify your password</h4>
                            <p class="text-muted"><i class="bi bi-info-circle-fill"></i> Type in your old password to make it's you.</p>                                        
                        </div>
                        <form action="includes/userVerifyPassword-inc.php" method="POST" id="editPasswordForm">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control userPassword" id="userPassword" name="userPassword" required>
                                <label for="mobileNumber">Current Password</label>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-danger btn-closes mx-2"><i class="bi bi-x-circle"></i> Close</button>
                                <button type="submit" class="btn btn-primary btnEditPasswordNext" id="btnEditPasswordNext" name="btnEditPasswordNext">Continue <i class="bi bi-box-arrow-in-right"></i></button>
                            </div>
                            <p id="resultMessage" class="resultMessage text-danger text-center"></p>                                        
                        </form>      
                    </div>
                                            
                    <!-- Create new Password Form -->
                    <div class="editPassword mb-3" id="editPassword-div" name="editPassword" style="display: none;">
                        <div>
                            <h4>Create a new Password</h4>
                            <p class="text-muted"><i class="bi bi-info-circle-fill"></i> Type in your new password. (Minimum of 8 Characters)</p>                                        
                        </div>
                        <form action="includes/insert-new-password-inc.php" method="POST" id="edit-new-password-form">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control new-password mb-3" id="new-password" name="new-password" placeholder="new password" required>
                                <label for="new-password">Your new Password</label>
                            </div> 
                            <div class="form-floating mb-3 repeat-password-div" id="repeat-password-div" style="display: none;">
                                <input type="password" class="form-control new-password-repeat mb-3" id="new-password-repeat" name="new-password-repeat" placeholder="repeat new password" required>
                                <label for="new-password-repeat">Repeat your new Password</label>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-danger mx-2" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                                <button type="submit" class="btn btn-success btnSaveChanges" id="btnSaveChanges" name="btnSaveChanges" disabled>Save Changes <i class="bi bi-box-arrow-in-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>            
            </div>               
        </div>   
        <!-- END -->    
            
       

        <p id="result-modal"></p>
        <!-- Change Password Dialog Result -->
        <!-- <div class="modal fade" id="result-modal" tabindex="-1" aria-labelledby="result-modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="result-modal-header">hehhe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="result-modal-body">
                    asdasd
                </div>
                <div class="result-modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Okay</button>
                </div>
            </div>
            </div>
        </div> -->
        <!-- MODAL END -->  

        </div>                    
     

      <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" id="result-toast">
        <div class="toast-header bg-success text-white">
          <strong class="me-auto"><i class="bi bi-check-circle-fill"></i> Success</strong>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
          <div class="toast-body">
            <b>New password has been saved successfully!</b>
          </div>
        </div>     
      </div>
                                
         </div>
        <!-- End -->
        <script src="https://unpkg.com/@popperjs/core@2"></script>
</body>
</html>