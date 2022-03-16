<?php
  
  include_once 'nav.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap 5 Install-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--Google Material Icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel = "icon" href ="/assets/undraw_secure_login_pdn4.svg" type = "image/x-icon">
    <script src="/clipboard.js-master/dist/clipboard.min.js"></script>
    

    <link rel="stylesheet" href="styling/user-dashboard.css">
    <title>User Dashboard - SwiftCare PH</title>
</head>
<body>
    <!-- Navbar
    <nav class="navbar navbar-light navbar-expand-lg navbarContainer">
        <div class="container-fluid navItems mx-5 my-3">
        <a class="navbar-brand navLogo" href="index.html"> SwiftCare PH</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon burger"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <!--Right Side Links and Button--
            <ul class="navbar-nav ms-auto">
            <!--Notifications Dropdown--
            <li class="nav-item dropdown">
                <a class="nav-link bi bi-bell-fill" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end dropdown-menu-lg-start" aria-labelledby="navbarDropdown">
                <li><h6 class="dropdown-header fw-bold">Notifications</h6></li>
                <li><a class="dropdown-item" href="#">1 New Reservation(s)</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li>
            <!--Username Display Link--
            <li class="nav-item mr-4 username">
                <a href="#" class="btn btn-nav-login" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Login as User"><i class="bi bi-person-fill"></i> John</a>   
            </li>
            <!--Logout Link--
            <li class="nav-item">
                <a href="#" class="btn btn-outline-primary btn-nav-signup" role="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Sign up as User">Logout <i class="bi bi-box-arrow-right"></i></a>
            </li>
            </ul>
        </div>
        </div>
    </nav> -->

    <!--Main Container-->
    <div class="container py-4 mt-3">
    

      <!--Back to home LInk-->
      <a href="index.php" class="text-dark fs-5 text-decoration-none link-home"><i class="bi bi-arrow-left-circle-fill"></i> Back to Home</a>
      
      <!--Side Menu-->
      <div class="row mt-5">
        <div class="col-xl-2">
          <!--Side Menu Buttons-->
          <div class="nav sidebar-buttons flex-column nav-pills nav-menu" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active btn-reservations" id="v-pills-reservations-tab" data-bs-toggle="pill" data-bs-target="#v-pills-reservations" type="button" role="tab" aria-controls="v-pills-reservations" aria-selected="true">Reservations <i class="bi bi-calendar2-check-fill"></i></button>
            <button class="nav-link btn-account-settings" id="v-pills-account-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-account-settings" type="button" role="tab" aria-controls="v-pills-account-settings" aria-selected="false">Account Settings <i class="bi bi-person-circle"></i></button>
          </div>
        </div>
        
        <!--Tabs Content-->
        <div class="col-xl-10">
          <div class="tab-content fw-bold flex-fill" id="v-pills-tabContent">

            <!--Account Settings Tab Container-->
            <div class="tab-pane account-settings fade border-start border-2 ps-4" id="v-pills-account-settings" role="tabpanel" aria-labelledby="v-pills-account-settings-tab">
              <!--Account Settings-->
              <div class="account-settings">
                <h1 class="">Account Settings</h1>

                <?php
                include_once 'includes/dbh-inc.php';

                $currentUser = $_SESSION["sessionPatientFirstName"];
                $userPhoneNumber = $_SESSION["sessionPatientPhoneNumber"];
                $sql = "SELECT * FROM userpatient WHERE patientPhoneNumber = '$userPhoneNumber';";
                $resultFetched = mysqli_query($conn, $sql);

                if ($resultFetched) {
                    if (mysqli_num_rows($resultFetched) > 0) {
                        while ($row = mysqli_fetch_array($resultFetched)) {
                            ?>
                                <div class="form-floating mb-3 mt-4">
                                  <input type="tel" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $row['patientPhoneNumber']; ?>">
                                  </label><label for="floatingInput">Phone Number <i class="bi bi-telephone"></i></label>
                                </div>

                                <h4 class="mt-4">Personal Information</h4>
                                <!--User Info-->
                                <div class="row">
                                  <div class="col-xl-6 col-md-6 col-sm-12">
                                    <div class="form-floating mb-3">
                                      <input type="input" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $row['patientFirstname']; ?>">
                                      <label for="floatingInput">Firstname</label>
                                    </div>
                                  </div>
                                  <div class="col-xl-6 col-md-6 col-sm-12">
                                    <div class="form-floating mb-3">
                                      <input type="input" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $row['patientLastname']; ?>">
                                      <label for="floatingInput">Lastname</label>
                                    </div>
                                  </div>
                                  <div class="col-xl-12 mb-3">
                                    <button type="button" class="btn btn-outline-primary" style="width: 100%;" data-bs-toggle="modal" data-bs-target="#edit-password"><i class="bi bi-key-fill"></i> Edit Password</button>
                                    
                                    <!-- Modal -->
                                    
                                      <div class="modal fade" id="edit-password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Edit your Password</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body userPassword" id="userPassword">
                                              <div class="form-floating mb-3 mt-4">
                                                <input type="password" id="userPassword" name="userPassword" enterkeyhint="next" class="form-control userPassword" required>
                                                </label><label for="userPassword"><i class="bi bi-key-fill"></i> Old Password</label>
                                                <i class="bi bi-eye-slash togglePassword"></i>
                                                <div id="passwordHelpBlock" class="form-text">
                                                  <ul id="passwordHelper">
                                                      <p><i class="bi bi-exclamation-circle-fill"></i> Enter you old password first</p>
                                                  </ul>
                                                </div>
                                              </div>
                                              <!-- <p id="resultMessage" class="resultMessage text-danger"></p> -->
                                              <!-- <div class="form-floating mb-3 mt-4 userNewPassword" id="userNewPassword">
                                                <input type="password" id="userNewPassword" name="userNewPassword" enterkeyhint="next" class="form-control" required>
                                                </label><label for="floatingInput"><i class="bi bi-key-fill"></i> New Password</label>
                                                <i class="bi bi-eye-slash toggleRepeatPassword"></i>
                                                <div id="passwordHelpBlock" class="form-text">
                                                    <ul id="passwordHelper">
                                                        <li id="minimumChar" class="invalidInput">Atleast 8 Characters.</li>
                                                    </ul>
                                                </div>
                                              </div> -->
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              <!-- <button type="submit" class="btn btn-primary btnEditPasswordNext" id="btnEditPasswordNext" name="btnEditPasswordNext">Next</button> -->
                                              <button type="button" class="btn btn-primary btnEditPasswordSave" id="btnEditPasswordSave" name="btnEditPasswordSave">Save changes</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  
                                  </div>
                                </div>
                            <?php
                        }
                    }
                }
                ?>
                <form action="includes/userVerifyPassword-inc.php" method="POST" id="editPasswordForm">
                  <input type="password" class="form-control userPassword mb-3" id="userPassword" name="userPassword">
                  <button type="submit" class="btn btn-primary btnEditPasswordNext" id="btnEditPasswordNext" name="btnEditPasswordNext">Verify</button>
                  <p id="resultMessage" class="resultMessage text-danger"></p>
                </form>
                <!--Edit and Save Button-->
                <div class="d-flex justify-content-end">
                  <div class="px-2">
                    <button type="button" class="btn btn-secondary"><i class="bi bi-pencil-square"></i> Edit</button>
                  </div>
                  <div class="px-2">
                    <button type="button" class="btn btn-primary" id="save" name="save"><i class="bi bi-check2-circle"></i> Save</button>
                  </div>
                </div>
              </div>
            </div>

            <!--Reservations Tab Container-->
            <div class="tab-pane reservations fade active show border-start border-2 ps-4" id="v-pills-reservations" role="tabpanel" aria-labelledby="v-pills-reservations-tab">
              <!--Reservations-->
              <div class="reservations-content">
                <h1>Reservations</h1>
                <nav>
                  <div class="nav nav-tabs mt-4" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-pending-tab" data-bs-toggle="tab" data-bs-target="#nav-pending" type="button" role="tab" aria-controls="nav-pending" aria-selected="true"><i class="bi bi-hourglass-top"></i> Pending</button>
                    <button class="nav-link" id="nav-confirmed-tab" data-bs-toggle="tab" data-bs-target="#nav-confirmed" type="button" role="tab" aria-controls="nav-confirmed" aria-selected="false"><i class="bi bi-check2-circle"></i> Confirmed</button>
                    <button class="nav-link" id="nav-rejected-tab" data-bs-toggle="tab" data-bs-target="#nav-rejected" type="button" role="tab" aria-controls="nav-rejected" aria-selected="false"><i class="bi bi-x-circle"></i> Rejected</button>
                    <button class="nav-link" id="nav-history-tab" data-bs-toggle="tab" data-bs-target="#nav-history" type="button" role="tab" aria-controls="nav-history" aria-selected="false"><i class="bi bi-clock-history"></i> History</button>
                  </div>
                </nav>
                
                <!--Pending Resercations Tab-->
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active pt-4" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">

                    <div class="row">
                      <div class="col-12 mb-3">
                        <div class="card pending-card">
                          <div class="card-header p-3">
                            <div class="d-flex justify-content-between">
                              <h5 class="card-title"><a href="hospital-overview.html" class="text-decoration-none"><i class="bi bi-building"></i> Hospital: MCU Hospital</a></h5>
                              <h5><i class="bi bi-clock-history"></i> 10/10/2021</h5>
                            </div>
                          </div>
                          <div class="card-body p-3">
                            <h6 class="card-subtitle mb-2 text-light">
                              <i class="bi bi-card-heading"></i> Reservation Code: <b id="reservation-code-SCPH2021001">SCPH2021001</b>
                              <button class="copy-code" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy Reservation Code" data-clipboard-action="copy" data-clipboard-target="#reservation-code-SCPH2021001"><span aria-hidden="true" class="copy-icon bi bi-clipboard-plus"></span></button>
                            </h6>
                            <a href="hospital-overview.html" class="text-decoration-none"><h6 class="mb-3"><i class="bi bi-geo-alt-fill"></i> Address: MCU Hospital, EDSA, Caloocan City, Metro Manila</h6></a>
                            <h6 class="card-text mb-2"><i class="bi bi-person-fill"></i> Name: Sibley Thompson</h6>
                            <h6 class="card-text mb-2"><i class="bi bi-calendar2-check-fill"></i> Date: 10/15/2021</h6>
                            <h6 class="card-text mb-2"><i class="bi bi-clock-fill"></i> Time: 10:00 AM</h6>
                            <h6 class="card-text mb-2"><i class="bi bi-list-check"></i> Concern: Covid</h6>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 mb-3">
                        <div class="card pending-card">
                          <div class="card-header p-3">
                            <div class="d-flex justify-content-between">
                              <h5 class="card-title"><a href="hospital-overview.html" class="text-decoration-none"><i class="bi bi-building"></i> Hospital: MCU Hospital</a></h5>
                              <h5><i class="bi bi-clock-history"></i> 10/10/2021</h5>
                            </div>
                          </div>
                          <div class="card-body p-3">
                            <h6 class="card-subtitle mb-2 text-light">
                              <i class="bi bi-card-heading"></i> Reservation Code: <b id="reservation-code-SCPH2021001">SCPH2021001</b>
                              <button class="copy-code" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy Reservation Code" data-clipboard-action="copy" data-clipboard-target="#reservation-code-SCPH2021001"><span aria-hidden="true" class="copy-icon bi bi-clipboard-plus"></span></button>
                            </h6>
                            <a href="hospital-overview.html" class="text-decoration-none"><h6 class="mb-3"><i class="bi bi-geo-alt-fill"></i> Address: MCU Hospital, EDSA, Caloocan City, Metro Manila</h6></a>
                            <h6 class="card-text mb-2"><i class="bi bi-person-fill"></i> Name: Sadie Hodgson</h6>
                            <h6 class="card-text mb-2"><i class="bi bi-calendar2-check-fill"></i> Date: 10/15/2021</h6>
                            <h6 class="card-text mb-2"><i class="bi bi-clock-fill"></i> Time: 10:00 AM</h6>
                            <h6 class="card-text mb-2"><i class="bi bi-list-check"></i> Concern: Covid</h6>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 mb-3">
                        <div class="card pending-card">
                          <div class="card-header p-3">
                            <div class="d-flex justify-content-between">
                              <h5 class="card-title"><a href="hospital-overview.html" class="text-decoration-none"><i class="bi bi-building"></i> Hospital: MCU Hospital</a></h5>
                              <h5><i class="bi bi-clock-history"></i> 10/10/2021</h5>
                            </div>
                          </div>
                          <div class="card-body p-3">
                            <h6 class="card-subtitle mb-2 text-light">
                              <i class="bi bi-card-heading"></i> Reservation Code: <b id="reservation-code-SCPH2021001">SCPH2021001</b>
                              <button class="copy-code" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy Reservation Code" data-clipboard-action="copy" data-clipboard-target="#reservation-code-SCPH2021001"><span aria-hidden="true" class="copy-icon bi bi-clipboard-plus"></span></button>
                            </h6>
                            <a href="hospital-overview.html" class="text-decoration-none"><h6 class="mb-3"><i class="bi bi-geo-alt-fill"></i> Address: MCU Hospital, EDSA, Caloocan City, Metro Manila</h6></a>
                            <h6 class="card-text mb-2"><i class="bi bi-person-fill"></i> Name: Melinda Black</h6>
                            <h6 class="card-text mb-2"><i class="bi bi-calendar2-check-fill"></i> Date: 10/15/2021</h6>
                            <h6 class="card-text mb-2"><i class="bi bi-clock-fill"></i> Time: 10:00 AM</h6>
                            <h6 class="card-text mb-2"><i class="bi bi-list-check"></i> Concern: Covid</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!--Confirmed Resercations Tab-->
                  <div class="tab-pane fade pt-4" id="nav-confirmed" role="tabpanel" aria-labelledby="nav-confirmed-tab">
                    <div class="row">
                      <div class="col-12 mb-3">
                        <div class="card confirmed-card">
                          <div class="card-header p-3">
                            <div class="d-flex justify-content-between">
                              <h5 class="card-title"><a href="hospital-overview.html" class="text-decoration-none"><i class="bi bi-building"></i> Hospital: MCU Hospital</a></h5>
                              <h5><i class="bi bi-clock-history"></i> 10/10/2021</h5>
                            </div>
                          </div>
                          <div class="card-body p-3">
                            <h6 class="card-subtitle mb-2 text-light">
                              <i class="bi bi-card-heading"></i> Reservation Code: <b id="reservation-code-SCPH2021001">SCPH2021001</b>
                              <button class="copy-code" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy Reservation Code" data-clipboard-action="copy" data-clipboard-target="#reservation-code-SCPH2021001"><span aria-hidden="true" class="copy-icon bi bi-clipboard-plus"></span></button>
                            </h6>
                            <a href="hospital-overview.html" class="text-decoration-none"><h6 class="mb-3"><i class="bi bi-geo-alt-fill"></i> Address: MCU Hospital, EDSA, Caloocan City, Metro Manila</h6></a>
                            <h6 class="card-text mb-2"><i class="bi bi-person-fill"></i> Name: Sibley Thompson</h6>
                            <h6 class="card-text mb-2"><i class="bi bi-calendar2-check-fill"></i> Date: 10/15/2021</h6>
                            <h6 class="card-text mb-2"><i class="bi bi-clock-fill"></i> Time: 10:00 AM</h6>
                            <h6 class="card-text mb-2"><i class="bi bi-list-check"></i> Concern: Covid</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!--Rejected Reservations Tab-->
                  <div class="tab-pane fade pt-4" id="nav-rejected" role="tabpanel" aria-labelledby="nav-rejected-tab">
                    <div class="row">
                      <div class="col-12 mb-3">
                        <div class="card rejected-card">
                          <div class="card-header p-3">
                            <div class="d-flex justify-content-between">
                              <h5 class="card-title"><a href="hospital-overview.html" class="text-decoration-none"><i class="bi bi-building"></i> Hospital: MCU Hospital</a></h5>
                              <h5><i class="bi bi-clock-history"></i> 10/10/2021</h5>
                            </div>
                          </div>
                          <div class="card-body p-3">
                            <h6 class="card-subtitle mb-2 text-light">
                              <i class="bi bi-card-heading"></i> Reservation Code: <b id="reservation-code-SCPH2021001">SCPH2021001</b>
                              <button class="copy-code" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy Reservation Code" data-clipboard-action="copy" data-clipboard-target="#reservation-code-SCPH2021001"><span aria-hidden="true" class="copy-icon bi bi-clipboard-plus"></span></button>
                            </h6>
                            <a href="hospital-overview.html" class="text-decoration-none"><h6 class="mb-3"><i class="bi bi-geo-alt-fill"></i> Address: MCU Hospital, EDSA, Caloocan City, Metro Manila</h6></a>
                            <h6 class="card-text mb-2"><i class="bi bi-person-fill"></i> Name: Sibley Thompson</h6>
                            <h6 class="card-text mb-2"><i class="bi bi-calendar2-check-fill"></i> Date: 10/15/2021</h6>
                            <h6 class="card-text mb-2"><i class="bi bi-clock-fill"></i> Time: 10:00 AM</h6>
                            <h6 class="card-text mb-2"><i class="bi bi-list-check"></i> Concern: Covid</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!--History Resercations Tab-->
                  <div class="tab-pane fade pt-4" id="nav-history" role="tabpanel" aria-labelledby="nav-history-tab">
                    <div class="row">
                      <div class="col-12 mb-3">
                        <div class="card history-card">
                          <div class="card-header p-3">
                            <div class="d-flex justify-content-between">
                              <h5 class="card-title"><a href="hospital-overview.html" class="text-decoration-none"><i class="bi bi-building"></i> Hospital: MCU Hospital</a></h5>
                              <h5><i class="bi bi-clock-history"></i> 10/10/2021</h5>
                            </div>
                          </div>
                          <div class="card-body p-3">
                            <h6 class="card-subtitle mb-2 text-light">
                              <i class="bi bi-card-heading"></i> Reservation Code: <b id="reservation-code-SCPH2021001">SCPH2021001</b>
                              <button class="copy-code" data-bs-toggle="tooltip" data-bs-placement="top" title="Copy Reservation Code" data-clipboard-action="copy" data-clipboard-target="#reservation-code-SCPH2021001"><span aria-hidden="true" class="copy-icon bi bi-clipboard-plus"></span></button>
                            </h6>
                            <a href="hospital-overview.html" class="text-decoration-none"><h6 class="mb-3"><i class="bi bi-geo-alt-fill"></i> Address: MCU Hospital, EDSA, Caloocan City, Metro Manila</h6></a>
                            <h6 class="card-text mb-2"><i class="bi bi-person-fill"></i> Name: Sibley Thompson</h6>
                            <h6 class="card-text mb-2"><i class="bi bi-calendar2-check-fill"></i> Date: 10/15/2021</h6>
                            <h6 class="card-text mb-2"><i class="bi bi-clock-fill"></i> Time: 10:00 AM</h6>
                            <h6 class="card-text mb-2"><i class="bi bi-list-check"></i> Concern: Covid</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        
      </div>  
      
      
    </div>
    <script src="/js/user-dashboard.js" defer></script>           
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <!-- <script>
      // $(document).ready(function () {
      //   // Verify Old Password - Ajax
      //   $('#editPasswordForm').submit(function (e) {
      //       e.preventDefault();
      //       let userPassword = $('#userPassword').val();
      //       let btnEditPasswordNext = $('#btnEditPasswordNext').val();

      //       $('.resultMessage').load("includes/userVerifyPassword-inc.php", {
      //           userPassword: userPassword,
      //           btnEditPasswordNext: btnEditPasswordNext
      //       });
      //   });
      // });
      
    </script> -->
</body>
</html>