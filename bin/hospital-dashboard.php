<?php
    // session_start();
    // if (!isset($_SESSION["hospitalID"])) {
    //   header ("location: hospital-login.php");
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <!--CSS Link-->
  <link  href="styling/hospital-dashboard-styling.css" rel="stylesheet" type="text/css">
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
  
  <title>Hospital Dashboard - SwiftCare PH</title>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel = "icon" href ="assets/undraw_secure_login_pdn4.svg" type = "image/x-icon">

</head>
<body>
  <!--Navbar-->
  <nav class="navbar navbar-light navbar-expand-lg navbarContainer">
    <div class="container-fluid navItems mx-5 my-3">
      <a class="navbar-brand navLogo" href="index"> SwiftCare PH</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon burger"></span>
      </button>
      <a class="nav-link active mx-3" aria-current="page" href="index">About</a>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <!--Right Side Links and Button-->
        <ul class="navbar-nav ms-auto">
          <!--Notifications Dropdown-->
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
          <!--Username Display Link-->
          <li class="nav-item mr-4 username">
            <a href="#" class="btn btn-nav-login" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Login as User"><i class="bi bi-building"></i> MCU Hospital</a>   
          </li>
          <!--Logout Link-->
          <li class="nav-item">
            <a href="#" class="btn btn-outline-primary btn-nav-signup" role="button" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Sign up as User">Logout <i class="bi bi-box-arrow-right"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
    <div class="container p-4 mt-3">
    <!-- Tabs content -->

        <!--Tabs Menu Links-->
        <nav>
            <div class="nav nav-tabs nav-justified border-0 tabsMenuContainer" id="nav-tab" role="tablist">
              <button class="nav-link border border-5 border-bottom-1 border-top-0 border-start-0 border-end-0 active navDashboard" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Dashboard</button>
              <button class="nav-link border border-5 border-bottom-1 border-top-0 border-start-0 border-end-0 navOverview" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Hospital Overview</button>
              <button class="nav-link border border-5 border-bottom-1 border-top-0 border-start-0 border-end-0 navAccount" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Account</button>
            </div>
          </nav>

          <!--Nav Contents-->
          <div class="tab-content" id="nav-tabContent">
            <!--Dashboard Content-->
            <div class="tab-pane fade show active py-5 dashboardContainer" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <!--Dashboard Side Bar-->
              <div class="row">
                <div class="col-xl-2">
                  <div class="nav flex-column nav-pills me-1" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-pending-reservations-tab" data-bs-toggle="pill" data-bs-target="#v-pills-pending-reservations" type="button" role="tab" aria-controls="v-pills-pending-reservations" aria-selected="true">Pending Reservations</button>
                    <button class="nav-link" id="v-pills-approved-reservations-tab" data-bs-toggle="pill" data-bs-target="#v-pills-approved-reservations" type="button" role="tab" aria-controls="v-pills-approved-reservations" aria-selected="false">Approved Reservations</button>
                    <button class="nav-link" id="v-pills-reservations-history-tab" data-bs-toggle="pill" data-bs-target="#v-pills-reservations-history" type="button" role="tab" aria-controls="v-pills-reservations-history" aria-selected="false">Reservations History</button>
                  </div>
                </div>

                <div class="col-xl-10">
                  <div class="tab-content" id="v-pills-tabContent">

                    <!--Pending Reservations-->
                    <div class="tab-pane fade show active border-start border-2 px-4" id="v-pills-pending-reservations" role="tabpanel" aria-labelledby="v-pills-home-tab">
                      <div class="row pending-reservations mb-5">
                        <!--Filter Pane-->
                        <div class="col-xl-12 col-lg-12 px-5 mb-4">
                          <h4><b><i class="bi bi-hourglass-top"></i> Pending Reservations</b></h4><br>
                          <div class="d-flex justify-content-between">
                            <div class="sort-buttons d-flex flex-column">
                              <p class="fs-5"><i class="bi bi-filter"></i> Sort By:</p>
                              <div class="d-flex flex-row">
                                <!--Date Submitted-->
                                <div class="btn-group pr-sort-date-submitted mx-1" aria-label="Basic outlined example">
                                  <button class="btn btn-outline-light" data-sort-direction="asc" data-sort-value="dateSubmitted" type="button">Date Submitted <span aria-hidden="true" class="bootstrapIcon bi bi-chevron-up"></span></button>
                                </div>
                                <!--Reservation Date-->
                                <div class="btn-group pr-sort-reservation-date mx-1" aria-label="Basic outlined example">
                                  <button class="btn btn-outline-light" data-sort-direction="asc" data-sort-value="reservationDate" type="button">Reservation Date <span aria-hidden="true" class="bootstrapIcon bi bi-chevron-up"></span></button>
                                </div>
                                <!--Reservation Date-->
                                <div class="btn-group pr-sort-patient-name mx-1" aria-label="Basic outlined example">
                                  <button class="btn btn-outline-light" data-sort-direction="asc" data-sort-value="patientName" type="button">Patient Name <span aria-hidden="true" class="bootstrapIcon bi bi-chevron-up"></span></button>
                                </div>
                              </div>
                            </div>

                            <div class="filter-buttons">
                              <p class="fs-5"><i class="bi bi-funnel"></i> Filter By:</p>
                              <div class="btn-group" role="group" aria-label="Basic outlined example">
                                <button type="button" class="btn btn-outline-primary">Covid</button>
                                <button type="button" class="btn btn-outline-primary">Non-Covid</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!--Cards List Pane - Pending Reservations-->
                        <div class="col-xl-12 col-lg-12">
                          <div class="row grid-pending-reservations">
                            <div class="col-xl-12 grid-item mb-3 card-john" pr-data-ticks-date-submitted="637706097600000000" pr-data-ticks-reservation-date="637713873600000000">
                              <div class="card pending-reservations-card">
                                <div class="card-header d-flex justify-content-between align-items-center px-3">
                                  <h6 class="card-title"><i class="bi bi-person-circle"></i> Booked by: <b>John De Jesus</b></h6>
                                  <p><i class="bi bi-clock-history"></i> 10/23/2021</p>
                                </div>
                                <div class="card-body p-4">
                                  <div class="row">
                                    <div class="col-xl-6">
                                      <h6 class="card-title reservation-code"><i class="bi bi-card-heading"></i> Reservation Code: <div class="badge bg-danger text-wrap">SCPH20201001</div></h6>
                                      <h6 class="card-title patient-name"><i class="bi bi-person-fill"></i> Patient Name: <div class="badge bg-light text-dark text-wrap">John De Jesus</div></h6>
                                      <h6 class="card-title date"><i class="bi bi-calendar-check"></i> Scheduled Date: <div class="badge bg-light text-dark text-wrap">11/01/2021</div></h6>
                                      <h6 class="card-title"><i class="bi bi-clock-fill"></i> Time: <div class="badge bg-light text-dark text-wrap">10:00 AM</div></h6>
                                      <h6 class="card-title"><i class="bi bi-person-workspace"></i> Room / Bed No.: <div class="badge bg-light text-dark text-wrap">Room 13</div></h6>
                                      <h6 class="card-title"><i class="bi bi-telephone-fill"></i> Contact #: <div class="badge bg-light text-dark text-wrap">0966 123 4567</div></h6>
                                      <h6 class="card-text">Concern: <div class="badge bg-light text-dark text-wrap p-2"><i><b>Non-Covid:</b> "For Transfer. Sample specified concern."</i></div></h6> 
                                    </div>

                                    <div class="col-xl-6">
                                      <h5>Attachments:</h5>
                                      <ul>
                                        <li><a href="#">photo1.jpg</a></li>
                                        <li><a href="#">photo2.jpg</a></li>
                                        <li><a href="#">photo3.jpg</a></li>
                                      </ul>
                                    </div>
                                  </div>
                                  
                                  <!--Buttons-->
                                  <div class="row mt-3">
                                    <div class="col-md-6 px-1 mb-1 btnJohn">
                                      <button type="button" class="btn btn-primary btnConfirm btn-confirm-john"><i class="bi bi-check-circle-fill"></i> Confirm</button>
                                    </div>
                                    <div class="col-md-6 px-1">
                                      <button type="button" class="btn btn-danger btnReject"><i class="bi bi-x-circle-fill"></i> Reject</button>
                                    </div>
                                  </div>

                                </div>
                              </div>
                            </div>

                            <div class="col-xl-12 grid-item mb-3 card-john" pr-data-ticks-date-submitted="637707825600000000" pr-data-ticks-reservation-date="637715601600000000">
                              <div class="card pending-reservations-card">
                                <div class="card-header d-flex justify-content-between align-items-center px-3">
                                  <h6 class="card-title"><i class="bi bi-person-circle"></i> Booked By: <b>Larry Mabuti Jr.</b></h6>
                                  <p><i class="bi bi-clock-history"></i> 10/25/2021</p>
                                </div>
                                <div class="card-body p-4">
                                  <div class="row">
                                    <div class="col-xl-6">
                                      <h6 class="card-title reservation-code"><i class="bi bi-card-heading"></i> Reservation Code: <div class="badge bg-danger text-wrap">SCPH20201001</div></h6>
                                      <h6 class="card-title patient-name"><i class="bi bi-person-fill"></i> Patient Name: <div class="badge bg-light text-dark text-wrap">Larry Mabuti Jr.</div></h6>
                                      <h6 class="card-title date"><i class="bi bi-calendar-check"></i> Scheduled Date: <div class="badge bg-light text-dark text-wrap">11/03/2021</div></h6>
                                      <h6 class="card-title"><i class="bi bi-clock-fill"></i> Time: <div class="badge bg-light text-dark text-wrap">10:00 AM</div></h6>
                                      <h6 class="card-title"><i class="bi bi-person-workspace"></i> Room / Bed No.: <div class="badge bg-light text-dark text-wrap">Room 13</div></h6>
                                      <h6 class="card-title"><i class="bi bi-telephone-fill"></i> Contact #: <div class="badge bg-light text-dark text-wrap">0966 123 4567</div></h6>
                                      <h6 class="card-text">Concern: <div class="badge bg-light text-dark text-wrap p-2"><i><b>Non-Covid:</b> "For Transfer. Sample specified concern."</i></div></h6> 
                                    </div>

                                    <div class="col-xl-6">
                                      <h5>Attachments:</h5>
                                      <ul>
                                        <li><a href="#">photo1.jpg</a></li>
                                        <li><a href="#">photo2.jpg</a></li>
                                        <li><a href="#">photo3.jpg</a></li>
                                      </ul>
                                    </div>
                                  </div>
                                  <!--Buttons-->
                                  <div class="row mt-3">
                                    <div class="col-md-6 px-1 mb-1 btnJohn">
                                      <button type="button" class="btn btn-primary btnConfirm btn-confirm-john"><i class="bi bi-check-circle-fill"></i> Confirm</button>
                                    </div>
                                    <div class="col-md-6 px-1">
                                      <button type="button" class="btn btn-danger btnReject"><i class="bi bi-x-circle-fill"></i> Reject</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-xl-12 grid-item mb-3" pr-data-ticks-date-submitted="637706961600000000" pr-data-ticks-reservation-date="637714737600000000">
                              <div class="card pending-reservations-card">
                                <div class="card-header d-flex justify-content-between align-items-center px-3">
                                  <h6 class="card-title"><i class="bi bi-person-circle"></i> Booked By: <b>Roniel Bravo</b></h6>
                                  <p><i class="bi bi-clock-history"></i> 10/24/2021</p>
                                </div>
                                <div class="card-body p-4">
                                  <div class="row">
                                    <div class="col-xl-6">
                                      <h6 class="card-title reservation-code"><i class="bi bi-card-heading"></i> Reservation Code: <div class="badge bg-danger text-wrap">SCPH20201001</div></h6>
                                      <h6 class="card-title patient-name"><i class="bi bi-person-fill"></i> Patient Name: <div class="badge bg-light text-dark text-wrap">Roniel Bravo</div></h6>
                                      <h6 class="card-title date"><i class="bi bi-calendar-check"></i> Scheduled Date: <div class="badge bg-light text-dark text-wrap">11/02/20211</div></h6>
                                      <h6 class="card-title"><i class="bi bi-clock-fill"></i> Time: <div class="badge bg-light text-dark text-wrap">10:00 AM</div></h6>
                                      <h6 class="card-title"><i class="bi bi-person-workspace"></i> Room / Bed No.: <div class="badge bg-light text-dark text-wrap">Room 13</div></h6>
                                      <h6 class="card-title"><i class="bi bi-telephone-fill"></i> Contact #: <div class="badge bg-light text-dark text-wrap">0966 123 4567</div></h6>
                                      <h6 class="card-text">Concern: <div class="badge bg-light text-dark text-wrap p-2"><i><b>Non-Covid:</b> "For Transfer. Sample specified concern."</i></div></h6> 
                                    </div>

                                    <div class="col-xl-6">
                                      <h5>Attachments:</h5>
                                      <ul>
                                        <li><a href="#">photo1.jpg</a></li>
                                        <li><a href="#">photo2.jpg</a></li>
                                        <li><a href="#">photo3.jpg</a></li>
                                      </ul>
                                    </div>
                                  </div>
                                  <!--Buttons-->
                                  <div class="row mt-3">
                                    <div class="col-md-6 px-1 mb-1">
                                      <button type="button" class="btn btn-primary btnConfirm"><i class="bi bi-check-circle-fill"></i> Confirm</button>
                                    </div>
                                    <div class="col-md-6 px-1">
                                      <button type="button" class="btn btn-danger btnReject"><i class="bi bi-x-circle-fill"></i> Reject</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--Approved Reservations-->
                    <div class="tab-pane fade border-start border-2 px-4" id="v-pills-approved-reservations" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                      <div class="row approved-reservations mb-5">
                        <div class="col-xl-12">
                          <h4><b><i class="bi bi-check-circle"></i> Approved Reservations</b></h4><br>
                        </div>
                        <!--Filter Pane-->
                        <div class="col-xl-3 col-lg-12 px-5 mb-3">
                          <p class="fs-5"><i class="bi bi-filter"></i> Sort By:</p>
                          <!--Date Approved-->
                          <p class="fw-bold">Date Submitted:</p>
                          <div class="btn-group ar-sort-date-submitted mb-3" aria-label="Basic outlined example">
                            <button class="btn btn-outline-light" data-sort-direction="asc" data-sort-value="dateSubmitted" type="button">Date Submitted <span aria-hidden="true" class="bootstrapIcon bi bi-chevron-up"></span></button>
                          </div>
                          <!--Reservation Date-->
                          <p class="fw-bold">Reservation Date:</p>
                          <div class="btn-group ar-sort-date-submitted mb-3" aria-label="Basic outlined example">
                            <button class="btn btn-outline-light" data-sort-direction="asc" data-sort-value="dateSubmitted" type="button">Reservation Date <span aria-hidden="true" class="bootstrapIcon bi bi-chevron-up"></span></button>
                          </div>
                          <!--Patient Name-->
                          <p class="fw-bold">Patient Name Date:</p>
                          <div class="btn-group ar-sort-date-submitted mb-3" aria-label="Basic outlined example">
                            <button class="btn btn-outline-light" data-sort-direction="asc" data-sort-value="dateSubmitted" type="button">Patient Name <span aria-hidden="true" class="bootstrapIcon bi bi-chevron-up"></span></button>
                          </div>
                        </div>

                        <!--Cards List Pane - Approved Reservations-->
                        <div class="col-xl-9 col-lg-12">
                          <div class="row approved-cards-row cardRow grid-approved-reservations">
                            <div class="col-xl-4 grid-item mb-3 card-john" ar-data-ticks-date-submitted="637706097600000000" ar-data-ticks-reservation-date="637713873600000000">
                              <div class="card pending-reservations-card p-2">
                                <div class="card-header"><i class="bi bi-clock"></i> 10/23/2021</div>
                                <div class="card-body">
                                  <h5 class="card-title fw-bold ar-patient-name"><i class="bi bi-person-fill"></i> John De Jesus</h5>
                                  <h6 class="card-title date"><i class="bi bi-calendar-check"></i> 11/01/2021</h6>
                                  <h6 class="card-title"><i class="bi bi-clock-fill"></i> 10:00 AM</h6>
                                  <h6 class="card-title"><i class="bi bi-person-workspace"></i> Room 13</h6>
                                  <h6 class="card-title"><i class="bi bi-telephone-fill"></i> 0966 123 4567</h6>
                                  <h6 class="card-text">Concern: <b>Covid</b></h6>
                                </div>
                              </div>
                            </div>

                            <div class="col-xl-4 grid-item mb-3 card-john" ar-data-ticks-date-submitted="637706970820000000" ar-data-ticks-reservation-date="637714746820000000">
                              <div class="card pending-reservations-card p-2">
                                <div class="card-header"><i class="bi bi-clock"></i> 10/24/2021</div>
                                <div class="card-body">
                                  <h5 class="card-title fw-bold ar-patient-name"><i class="bi bi-person-fill"></i> Lerry Hapatinga</h5>
                                  <h6 class="card-title date"><i class="bi bi-calendar-check"></i> 11/02/2021</h6>
                                  <h6 class="card-title"><i class="bi bi-clock-fill"></i> 10:00 AM</h6>
                                  <h6 class="card-title"><i class="bi bi-person-workspace"></i> Room 13</h6>
                                  <h6 class="card-title"><i class="bi bi-telephone-fill"></i> 0966 123 4567</h6>
                                  <h6 class="card-text">Concern: <b>Covid</b></h6>
                                </div>
                              </div>
                            </div>

                            <div class="col-xl-4 grid-item mb-3 card-john" ar-data-ticks-date-submitted="637709562820000000" ar-data-ticks-reservation-date="637743258820000000">
                              <div class="card pending-reservations-card p-2">
                                <div class="card-header"><i class="bi bi-clock"></i> 10/27/2021</div>
                                <div class="card-body">
                                  <h5 class="card-title fw-bold ar-patient-name"><i class="bi bi-person-fill"></i> Roniel Bravo</h5>
                                  <h6 class="card-title date"><i class="bi bi-calendar-check"></i> 11/05/2021</h6>
                                  <h6 class="card-title"><i class="bi bi-clock-fill"></i> 10:00 AM</h6>
                                  <h6 class="card-title"><i class="bi bi-person-workspace"></i> Room 13</h6>
                                  <h6 class="card-title"><i class="bi bi-telephone-fill"></i> 0966 123 4567</h6>
                                  <h6 class="card-text">Concern: <b>Covid</b></h6>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--Reservations History-->
                    <div class="tab-pane fade border-start border-2 px-4" id="v-pills-reservations-history" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                      <div class="row reservations-history">
                        <div class="col-xl-12">
                          <h4><b><i class="bi bi-clock-history"></i> Reservations History</b></h4><br>
                        </div>
                        <!--Filter Pane-->
                        <div class="col-xl-3 col-lg-12 px-5">
                          <p class="fs-5"><i class="bi bi-funnel"></i> Filter:</p>
                          <div class="btn-group filters-button-group mb-4" role="group" aria-label="Basic outlined example">
                            <button type="button" class="btn btn-outline-primary is-checked" data-filter="*">All</button>
                            <button type="button" class="btn btn-outline-primary" data-filter=".approved">Approved</button>
                            <button type="button" class="btn btn-outline-primary" data-filter=".rejected">Rejected</button>
                          </div>
                          <p class="fs-5"><i class="bi bi-filter"></i> Sort By:</p>
                          <!--Date Approved-->
                          <p class="fw-bold">Date Submitted:</p>
                          <div class="btn-group rh-sort-date-submitted mb-3" aria-label="Basic outlined example">
                            <button class="btn btn-outline-light" data-sort-direction="asc" data-sort-value="dateSubmitted" type="button">Date Submitted <span aria-hidden="true" class="bootstrapIcon bi bi-chevron-up"></span></button>
                          </div>
                          <!--Reservation Date-->
                          <p class="fw-bold">Reservation Date:</p>
                          <div class="btn-group rh-sort-reservation-date mb-3" aria-label="Basic outlined example">
                            <button class="btn btn-outline-light" data-sort-direction="asc" data-sort-value="dateSubmitted" type="button">Reservation Date <span aria-hidden="true" class="bootstrapIcon bi bi-chevron-up"></span></button>
                          </div>
                          <p class="fw-bold">Patient Name Date:</p>
                          <div class="btn-group rh-sort-patient-name mb-3" aria-label="Basic outlined example">
                            <button class="btn btn-outline-light" data-sort-direction="asc" data-sort-value="dateSubmitted" type="button">Patient Name <span aria-hidden="true" class="bootstrapIcon bi bi-chevron-up"></span></button>
                          </div>
                        </div>

                        <!--Cards List Pane - Reservations History-->
                        <div class="col-xl-9 col-lg-12">
                          <div class="row grid-reservations-history cardRow">
                            <div class="col-xl-4 grid-item mb-3 card-john approved" rh-data-ticks-date-submitted="637695738820000000" rh-data-ticks-reservation-date="637697466820000000">
                              <div class="card pending-reservations-card p-2">
                                <div class="card-header"><i class="bi bi-clock"></i> 10/11/2021</div>
                                <div class="card-body">
                                  <h5 class="card-title fw-bold rh-patient-name"><i class="bi bi-person-fill"></i> Dimas Fraire</h5>
                                  <h6 class="card-title date"><i class="bi bi-calendar-check"></i> 10/13/2021</h6>
                                  <h6 class="card-title"><i class="bi bi-clock-fill"></i> 10:00 AM</h6>
                                  <h6 class="card-title"><i class="bi bi-person-workspace"></i> Room 13</h6>
                                  <h6 class="card-title"><i class="bi bi-telephone-fill"></i> 0966 123 4567</h6>
                                  <h6 class="card-text">Concern: <b>Covid</b></h6>
                                  <center><p class="text-warning"><b>Approved </b><i class="bi bi-check2-circle"></i></p></center>
                                </div>
                              </div>
                            </div>

                            <div class="col-xl-4 grid-item mb-3 card-john approved" rh-data-ticks-date-submitted="637690554820000000" rh-data-ticks-reservation-date="637694874820000000">
                              <div class="card pending-reservations-card p-2">
                                <div class="card-header"><i class="bi bi-clock"></i> 10/05/2021</div>
                                <div class="card-body">
                                  <h5 class="card-title fw-bold rh-patient-name"><i class="bi bi-person-fill"></i> Hernán De Leon</h5>
                                  <h6 class="card-title date"><i class="bi bi-calendar-check"></i> 10/10/2021</h6>
                                  <h6 class="card-title"><i class="bi bi-clock-fill"></i> 10:00 AM</h6>
                                  <h6 class="card-title"><i class="bi bi-person-workspace"></i> Room 13</h6>
                                  <h6 class="card-title"><i class="bi bi-telephone-fill"></i> 0966 123 4567</h6>
                                  <h6 class="card-text">Concern: <b>Covid</b></h6>
                                  <center><p class="text-warning"><b>Approved </b><i class="bi bi-check2-circle"></i></p></center>
                                </div>
                              </div>
                            </div>

                            <div class="col-xl-4 grid-item mb-3 card-john rejected" rh-data-ticks-date-submitted="637701786820000000" rh-data-ticks-reservation-date="637703514820000000">
                              <div class="card pending-reservations-card p-2">
                                <div class="card-header"><i class="bi bi-clock"></i> 10/18/2021</div>
                                <div class="card-body">
                                  <h5 class="card-title fw-bold rh-patient-name"><i class="bi bi-person-fill"></i> Amando Perea</h5>
                                  <h6 class="card-title date"><i class="bi bi-calendar-check"></i> 10/20/2021</h6>
                                  <h6 class="card-title"><i class="bi bi-clock-fill"></i> 10:00 AM</h6>
                                  <h6 class="card-title"><i class="bi bi-person-workspace"></i> Room 13</h6>
                                  <h6 class="card-title"><i class="bi bi-telephone-fill"></i> 0966 123 4567</h6>
                                  <h6 class="card-text">Concern: <b>Covid</b></h6>
                                  <center><p class="text-danger"><b>Rejected </b><i class="bi bi-x-circle"></i></p></center>
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

            <!--Hospital Overview Content-->
            <div class="tab-pane fade hospital-overview-container" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              <!--Available Slots-->
              <div class="row">
                <div class="row">
                  <h4 class="mt-5 mb-5"><b>Available Slots</b></h4><br>
                  <!--Slot Cards-->
                  <div class="col-xl-4">
                    <div class="card p-3 mb-5 slot-card">
                      <div class="card-body">
                        <!--Type Radio Selection-->
                        <h5 class="card-title fw-bolder">Type:</h5>
                        <div class="form-check form-check-inline mb-4">
                          <input class="form-check-input slot-type-radio" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked disabled>
                          <label class="form-check-label fw-bold" for="inlineRadio1">Bed</label>
                        </div>
                        <div class="form-check form-check-inline mx-2 mb-4">
                          <input class="form-check-input slot-type-radio" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" disabled>
                          <label class="form-check-label fw-bold" for="inlineRadio1">Room</label>
                        </div>
                        <!--Available Slots List-->
                        <h5 class="card-title fw-bolder mt-2">Available Slots:</h5>
                        <div class="row overflow-auto" style="height: 200px;">
                          <ul class="list-group list-group-primary">
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <input type="text" class="form-control border-0 fw-bold" placeholder="Room / Bed No." value="Bed 001" aria-label="Username" aria-describedby="basic-addon1">
                              </div>
                              <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-x-lg"></i></button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <input type="text" class="form-control border-0 fw-bold" placeholder="Room / Bed No." value="Bed 002" aria-label="Username" aria-describedby="basic-addon1">
                              </div>
                              <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-x-lg"></i></button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <input type="text" class="form-control border-0 fw-bold" placeholder="Room / Bed No." value="Bed 003" aria-label="Username" aria-describedby="basic-addon1">
                              </div>
                              <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-x-lg"></i></button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                              <div class="ms-2 me-auto">
                                <input type="text" class="form-control border-0 fw-bold" placeholder="Room / Bed No." value="Bed 004" aria-label="Username" aria-describedby="basic-addon1">
                              </div>
                              <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-x-lg"></i></button>
                            </li>
                          </ul>
                        </div>
                        <button type="button" class="btn btn-outline-primary add-slot-button mb-4 mt-2 fw-bold">Add A Slot <i class="bi bi-plus-lg"></i></button>
                        <!--Description Text Box-->
                        <h5 class="card-title fw-bolder mt-2">Description:</h5>
                        <div class="input-group mt-2 mb-4">
                          <textarea class="form-control" aria-label="With textarea" disabled></textarea>
                        </div>
                        <!--Buttons-->
                        <div class="row mt-3">
                          <div class="col-md-6 px-1 mb-1">
                            <button type="button" class="btn btn-secondary btn-edit-slot"><i class="bi bi-pencil-square"></i> Edit</button>
                          </div>
                          <div class="col-md-6 px-1">
                            <button type="button" class="btn btn-primary btn-save-slot disabled"><i class="bi bi-check2-square"></i> Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-4">
                    <div class="card p-3 mb-5 slot-card">
                      <div class="card-body">
                        <!--Type Radio Selection-->
                        <h5 class="card-title fw-bolder">Type:</h5>
                        <div class="form-check form-check-inline mb-4">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" disabled>
                          <label class="form-check-label fw-bold" for="inlineRadio1">Bed</label>
                        </div>
                        <div class="form-check form-check-inline mx-2 mb-4">
                          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked disabled>
                          <label class="form-check-label fw-bold" for="inlineRadio1">Room</label>
                        </div>
                        <!--Available Slots List-->
                        <h5 class="card-title fw-bolder mt-2">Available Slots:</h5>
                        <div class="row overflow-auto" style="height: 200px;">
                          <ul class="list-group list-group-primary">
                            <li class="list-group-item d-flex justify-content-between align-items-start disabled">
                              <div class="ms-2 me-auto">
                                <input type="text" class="form-control border-0 fw-bold" placeholder="Room / Bed No." value="Room 001" aria-label="Username" aria-describedby="basic-addon1">
                              </div>
                              <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-x-lg"></i></button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start disabled">
                              <div class="ms-2 me-auto">
                                <input type="text" class="form-control border-0 fw-bold" placeholder="Room / Bed No." value="Room 002" aria-label="Username" aria-describedby="basic-addon1">
                              </div>
                              <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-x-lg"></i></button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start disabled">
                              <div class="ms-2 me-auto">
                                <input type="text" class="form-control border-0 fw-bold" placeholder="Room / Bed No." value="Room 003" aria-label="Username" aria-describedby="basic-addon1">
                              </div>
                              <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-x-lg"></i></button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-start disabled">
                              <div class="ms-2 me-auto">
                                <input type="text" class="form-control border-0 fw-bold" placeholder="Room / Bed No." value="Room 004" aria-label="Username" aria-describedby="basic-addon1">
                              </div>
                              <button type="button" class="btn btn-danger btn-sm"><i class="bi bi-x-lg"></i></button>
                            </li>
                          </ul>
                        </div>
                        <button type="button" class="btn btn-outline-primary add-slot-button mb-4 mt-2 fw-bold disabled">Add A Slot <i class="bi bi-plus-lg"></i></button>
                        <!--Description Text Box-->
                        <h5 class="card-title fw-bolder mt-2">Description:</h5>
                        <div class="input-group mt-2 mb-4">
                          <textarea class="form-control" aria-label="With textarea" disabled></textarea>
                        </div>
                        <!--Buttons-->
                        <div class="row mt-3">
                          <div class="col-md-6 px-1 mb-1">
                            <button type="button" class="btn btn-secondary btn-edit-slot"><i class="bi bi-pencil-square"></i> Edit</button>
                          </div>
                          <div class="col-md-6 px-1">
                            <button type="button" class="btn btn-primary btn-save-slot disabled"><i class="bi bi-check2-square"></i> Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-4" data-bs-toggle="tooltip" data-bs-placement="top" title="Add an additional Space.">
                    <div class="card availability-add-card">
                      <div class="card-body">
                        <div class="text-center"><i class="bi bi-plus-circle-dotted" style="font-size: 6rem; color: rgba(0, 0, 0, 0.466);"></i></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>

              <!--Hospital Details-->
              <div class="row">
                <div class="col-12">
                  <h4 class="mt-2"><b>Hospital Details</b></h4><br>
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Hospital Name <i class="bi bi-info-circle-fill"></i></label>
                  </div>
                  <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Input a short description here.." id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingInput">Description <i class="bi bi-info-circle-fill"></i></label>
                  </div>
                  <div class="form-floating mb-5">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Contact no <i class="bi bi-info-circle-fill"></i></label>
                  </div>

                  <!--Hospital Location-->
                  <h4 class="mt-2"><b>Hospital Location</b></h4><br>
                  <img src="/assets/googleMaps.png" class="img-fluid" alt="..." width="500px" style="border-radius: 50px;"><br>
                   <span class="badge bg-warning text-dark mb-5">***Google Maps***</span>

                   <!--Images-->
                  <h4 class="mt-2"><b>Images</b></h4><br>
                  <div class="row">
                    <div class="row gallery mb-3">
                      <a class="col-xl-3 mx-2 uploaded-hospital-images" href="../assets/googleMaps.png">
                        <img class="card-img" alt="..." src="../assets/googleMaps.png" />
                      </a>
                      <a class="col-xl-3 mx-2 uploaded-hospital-images" href="../assets/Kingdom_animated_illustrations_by_Icons8/Kingdom_animated_illustrations_by_Icons8/Kingdom_business_chart_overlook_by_Icons8.gif">
                        <img class="card-img" alt="..." src="../assets/Kingdom_animated_illustrations_by_Icons8/Kingdom_animated_illustrations_by_Icons8/Kingdom_business_chart_overlook_by_Icons8.gif" />
                      </a>
                      <a class="col-xl-3 mx-2 uploaded-hospital-images" href="../assets/googleMaps.png">
                        <img class="card-img" alt="..." src="../assets/googleMaps.png" />
                      </a>
                    </div>

                    <div class="col-xl-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Upload an image..">
                      <div class="card add-hospital-image">
                        <div class="card-body">
                          <div class="text-center"><i class="bi bi-plus-circle-dotted" style="font-size: 4rem; color: rgba(0, 0, 0, 0.466);"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!--Account Content-->
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            
            <div class="container-fluid account-container">

            
            <!--Title Content-->
              <div class="row account-title py-5">
                <div class="col-xl-12">
                  <div>
                    <h2>Admin - Account Settings</h2> 
                  </div>
                </div>
              </div>
              <hr>

            <!--Name Content-->
              <div class="row account-content hover-column">
                <div class="col-xl-4 first-column">
                  <h5>Hospital Name</h5>
                </div>

                <div class="col-xl-7">
                  <input type="text" class="form-control border-0 fw-bold" placeholder="Room / Bed No." value="Hospital Example Name" aria-label="Name" aria-describedby="basic-addon1" disabled>
                </div>

                <!-- <div class="col-xl-1 edit-column">
                  <h5 class="hover-color"><i class="bi bi-pencil-square"></i>Edit</h5>
                </div>  -->
              </div>  

              <hr>

            <!--Name Content-->
            <div class="row account-content hover-column">
              <div class="col-xl-4 first-column">
                <h5>Representative Name</h5>
              </div>

              <div class="col-xl-7">
                <input type="text" class="form-control border-0 fw-bold" placeholder="Room / Bed No." value="Ex. Juan Dela Cruz" aria-label="Name" aria-describedby="basic-addon1" disabled>
              </div>

              <!-- <div class="col-xl-1 edit-column">
                <h5 class="hover-color"><i class="bi bi-pencil-square"></i>Edit</h5>
              </div>  -->
            </div>  

            <hr>       

            <!--Address Content-->
            <div class="row account-content hover-column">
              <div class="col-xl-4 first-column">
                <h5>Address</h5>
              </div>

              <div class="col-xl-7">
                <input type="text" class="form-control border-0 fw-bold" placeholder="Room / Bed No." value="Example Address" aria-label="Name" aria-describedby="basic-addon1" disabled>
              </div>
<!-- 
              <div class="col-xl-1 edit-column">
                <h5 class="hover-color"><i class="bi bi-pencil-square"></i>Edit</h5>
              </div>  -->
            </div>  

            <hr> 

            <!--Branch Content-->
            <!-- <div class="row account-content hover-column">
              <div class="col-xl-4 first-column">
                <h5>Branch</h5>
              </div>

              <div class="col-xl-7">
                <input type="text" class="form-control border-0 fw-bold" placeholder="Room / Bed No." value="Ex. Caloocan City" aria-label="Name" aria-describedby="basic-addon1" disabled>
              </div>

              <div class="col-xl-1 edit-column">
                <h5 class="hover-color"><i class="bi bi-pencil-square"></i>Edit</h5>
              </div> 
            </div>   -->

            <hr> 
                        
              <!--Email Content-->
              <div class="row account-content hover-column">
                <div class="col-xl-4 first-column">
                  <h5>Email</h5>
                </div>

                <div class="col-xl-7">
                  <input type="email" class="form-control border-0 fw-bold" placeholder="example@gmail.com" value="example@gmail.com" aria-label="Email" aria-describedby="basic-addon1" disabled>
                </div>

                <div class="col-xl-1 edit-column">
                  <h5 class="hover-color"><i class="bi bi-pencil-square"></i>Edit</h5>
                </div> 
              </div>  

              <hr>

              <!--Password Content-->
              <div class="row account-content hover-column">
                <div class="col-xl-4 first-column">
                  <h5>Password</h5>
                </div>
                <div class="col-xl-7">
                  <input type="password" class="form-control border-0 fw-bold" placeholder="Password" value="example" aria-label="Password" aria-describedby="basic-addon1" disabled>
                </div>

                <div class="col-xl-1 edit-column">
                  <h5 class="hover-color"><i class="bi bi-pencil-square"></i>Edit</h5>
                </div> 
              </div>  

              <hr>

              <!--Mobile number. Content-->              
              <div class="row account-content hover-column">
                <div class="col-xl-4 first-column">
                  <h5>Mobile Number</h5>
                </div>

                <div class="col-xl-7">
                  <input class="form-control border-0 fw-bold" placeholder="+639 XXXX XXXXX" type="tel" id="mobile_number" autocomplete="off" value="+63" aria-label="Contact" aria-describedby="basic-addon1" disabled>
                </div>

                <div class="col-xl-1 edit-column">
                  <h5 class="hover-color"><i class="bi bi-pencil-square"></i>Edit</h5>
                </div> 
              </div>  

              <hr>

              <!--Designation Content-->              
              <div class="row account-content hover-column">
                <div class="col-xl-4 first-column">
                  <h5>Designation</h5>
                </div>

                <div class="col-xl-7">
                  <input type="text" class="form-control border-0 fw-bold" placeholder="Position" value="Ex. Admin" aria-label="Designation" aria-describedby="basic-addon1" disabled>
                </div>
              </div>   
              
              <hr>

            </div>
           </div>
          </div>
    </div>
    
    <!--Back To Top Button-->
    <a id="button"></a>

    <!--Jquery | Isotope | JS File Links / CDN-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <script src="js/isotope.pkgd.min.js"></script> 
    <script src="../js/script.js" defer></script>
    <!--lightGallery JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>
    
</body>
</html> 