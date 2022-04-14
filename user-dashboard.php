<?php
    session_start();
    if (!isset($_SESSION['sessionpatientUserID'])) {
        header("location: user-login");
        die();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Flowbite minified stylesheet -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.3.4/dist/flowbite.min.css"/>
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
    <link rel="stylesheet" href="dist/output.css">
    <script src="js\user-dashboard.js" defer></script>
    <link rel="stylesheet" href="styling/user-dashboard.css">
    <title>User Dashboard | SwiftCare PH</title>
    <link rel="icon" href="assets/main-logo-line.png" type="image/x-icon">  
</head>
<body class="font-poppins bg-gray-900">

    <!--Main Container-->
    <div class="mx-auto">

        <!-- Reservations and Account Settings Cards -->
        <div id="main-cards">
            <!-- Images vector and homepage button -->
            <div class="grid grid-cols-2 mt-36">
                <div class="col-span-1">
                    <img src="assets/user-dashboard/welcome.svg" alt="" srcset="" class="w-fit h-fit mx-4">
                    <a href="index">
                        <div class="mx-20 flex items-center">
                            <button class="relative inline-flex items-center justify-center p-0.5 w-full mt-10 mr-2 overflow-hidden font-medium text-blue-50 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-cyan-800">
                                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 w-full bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                <i class="bi bi-house-door"></i> Back to homepage
                                </span>
                            </button>  
                        </div>
                    </a>
                </div>

                <!-- Reservations and Account Settings Cards -->
                <div class="col-span-1 py-20 space-y-10">
                    <!-- Reservation -->
                    <div class="card mt-5 mb-4 text-light p-5 card-reservation" id="">
                        <a href="user-reservations">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <!-- Left Side Content -->
                                <div class="d-flex align-items-center">
                                    <div class="card-icon">
                                        <i class="bi bi-calendar-check-fill fs-1 text-blue-50"></i>
                                    </div>
                                    <div>
                                        <h3 class="card-title fs-4 font-bold text-gray-900 uppercase tracking-wide">Reservations</h3>
                                        <p class="card-text text-white">View and manage all of your <b class="text-gray-900">reservations.</b></p>
                                    </div>
                                </div>
                                <!-- Right Side Content -->
                                <div class="btn fs-1">                      
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>                                                        
                                </div>
                            </div>
                        </a>
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
                                    <h3 class="card-title account-title fs-4 font-bold uppercase tracking-wide">Account Settings</h3>
                                    <p class="card-text">Manage your <b>account.</b></p>
                                </div>
                            </div>

                            <!-- Right Side Content -->                
                            <div>
                                <a href="#" class="btn fs-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>                          
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contents -->

        <!-- Start -->

        <div class="my-14 mx-20" style="display: none;" id="account-content">
            <!-- Back button -->
            <div class="text-xl">
                <button type="button" class="text-gray-100" id="account-back-to-dashboard" data-bs-toggle="tooltip" title="Back to dashboard">
                    <i class="bi bi-arrow-left-circle"></i> Back
                </button>
            </div>

            <!-- Cotainer of Account Setting -->
            <div class="grid grid-cols-2 py-16">
                <!-- Account Setting -->
                <div class="account-setting cols-span-1">
                    <!-- Title -->
                    <div class="text-2xl text-blue-50 my-4 uppercase tracking-wider">
                        <p>Personal Information</p>
                    </div>

                    <!-- Account Content -->
                    <div class="row">
                    <div>
                        
                    </div>
                        <!-- First Name -->
                        <div class="col-xl-6 col-md-6">
                            <div class="">
                                <label for="firstName" class="block mb-2 text-md font-medium text-blue-500 ">First name</label>
                                <input type="input" id="firstName" value="<?php echo $row['patientFirstname']; ?>" class="bg-gray-900 border border-blue-50 text-blue-50 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 capitalize" disabled>
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="col-xl-6 col-md-6 mb-6">
                            <div class="">
                                <label for="lastName" class="block mb-2 text-md font-medium text-blue-500">Last name</label>
                                <input type="input" id="lastName" value="<?php echo $row['patientLastname']; ?>" class="bg-gray-900 border border-blue-50 text-blue-50 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3 capitalize" disabled>
                            </div>
                        </div>
                        
                        <!-- Mobile Number -->
                        <div class="col-xl-12 col-md-12" id="mobileNumber-container">
                            <div class="spinner-border m-1" id="spinner" role="status" style="display: none;">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                                <form action="includes/change-phone-inc.php" method="post" id="change-phone-form">
                                    <div class="mb-6">
                                        <label for="mobileNumber" class="block mb-2 text-md font-medium text-blue-500">Mobile number</label>
                                        <input type="tel" id="mobileNumber" inputmode="numeric" enterkeyhint="next" pattern="[0-9]{10,11}" maxlength="11" class="bg-gray-900 border border-blue-50 text-blue-50 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3" disabled>
                                    </div>

                                    <button type="button" class="btn btn-link edit-phone-number" id="edit-phone-number">Edit</button>
                                    <button type="submit" class="btn btn-link save-phone-number" id="save-phone-number" name="save-phone-number">Save</button>
                                    <p class="fw-bold text-success phone-success-message" id="phone-success-message"><i class="bi bi-check-lg"></i> Successfully Saved!</p>
                                </form>
                        </div>

                        <!-- Edit Password -->
                        <div class="col-xl-12 col-md-12 mb-5">
                            <button data-modal-toggle="editPasswordModal" id="btn-edit-password" class="relative inline-flex items-center justify-center p-0.5 w-full mr-2 overflow-hidden font-medium text-blue-50 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-cyan-800">
                                <span class="relative px-5 uppercase py-2.5 transition-all ease-in duration-75 w-full bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                <i class="bi bi-key"></i> &ensp;Edit Password
                                </span>
                            </button>
                        </div> 

                        <!-- START -->

                        <!-- Edit Password Modal -->
                        <div id="editPasswordModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-gray-900 rounded-lg shadow">
                                    <!-- Modal header -->
                                    <div class="flex justify-between items-start p-3 rounded-t border-b border-gray-600">
                                        <h3 class="text-xl font-semibold text-white lg:text-2xl">
                                            Edit password
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-600 hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="editPasswordModal">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                        </button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6">

                                        <!-- Verify Password Form -->
                                        <div class="verifyPassword mb-3" id="verifyPassword-div" name="verifyPassword">
                                            <div class="mb-4">
                                                <p class="text-xl text-blue-500 font-medium mb-2">Verify your password</p>
                                                <p class="text-gray-300"><i class="bi bi-info-circle-fill"></i> Type in your old password to make it's you.</p>                                        
                                            </div>
                                            <form action="includes/userVerifyPassword-inc.php" method="POST" id="editPasswordForm">
                                                <div class="relative mb-3">
                                                    <label for="userPassword" class="block mb-2 text-md font-medium text-blue-500">Current Password</label>
                                                    <input type="password" id="userPassword" name="userPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="••••••••" class="userPassword bg-gray-900 border border-blue-50 text-blue-50 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                                    <i class="bi bi-eye-slash text-gray-300 absolute cursor-pointer 2xl:right-0 2xl:top-12 2xl:pr-5 xl:right-0 xl:top-14 xl:pr-5 lg:right-0 lg:top-9 lg:pr-5 md:right-0 md:top-16 md:pr-5 sm:right-0 sm:top-16 sm:pr-5 right-0" id="verifyTogglePass"></i>
                                                    <div id="passwordHelpBlock" class="form-text">
                                                    </div>
                                                </div>
                                                <p id="resultMessage" class="resultMessage text-danger text-center"></p>     
                                                <div class="flex justify-end space-x-1 mr-2">
                                                    <!-- <button type="button" class="text-blue-50 border-2 border-gray-500 bg-gray-900 hover:bg-gray-500 px-3 py-2.5 text-center mr-2 mb-2 w-24 rounded-md" id="btnClose">Close</button> -->
                                                    <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg px-5 py-2.5 text-center mr-2 mb-2" id="btnEditPasswordNext" name="btnEditPasswordNext">Continue</button>
                                                </div>
                                                
                                            </form>      
                                        </div>
                                                                
                                        <!-- Create new Password Form -->
                                        <div class="editPassword mb-3" id="editPassword-div" name="editPassword" style="display: none;">
                                            <div class="mb-4">
                                                <p class="text-xl text-blue-500 font-medium mb-2">Create a new Password</p>
                                                <p class="text-gray-300"><i class="bi bi-info-circle-fill"></i> Type in your new password. (Minimum of 8 Characters)</p>                                        
                                            </div>
                                            <!-- New password and Repeat Password -->
                                            <form action="includes/insert-new-password-inc.php" method="POST" id="edit-new-password-form">
                                                <!-- New Password -->
                                                <div class="relative mb-3">
                                                    <label for="new-password" class="block mb-2 text-md font-medium text-blue-500">New password</label>
                                                    <input type="password" id="new-password" name="new-password" placeholder="••••••••" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="newPassword bg-gray-900 border border-blue-50 text-blue-50 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                                    <i class="bi bi-eye-slash text-gray-300 absolute cursor-pointer 2xl:right-0 2xl:top-12 2xl:pr-5 xl:right-0 xl:top-16 xl:pr-5 lg:right-0 lg:top-9 lg:pr-5 md:right-0 md:top-16 md:pr-5 sm:right-0 sm:top-16 sm:pr-5 right-0" id="newTogglePass"></i>
                                                    <div id="passwordHelpBlock" class="form-text">
                                                    </div>
                                                </div>
                                                <!-- Repeat Password -->
                                                <div class="relative mb-3 repeat-password-div" id="repeat-password-div" style="display: none;">
                                                    <label for="new-password-repeat" class="block mb-2 text-md font-medium text-blue-500">Repeat your new password</label>
                                                    <input type="password" id="new-password-repeat" placeholder="••••••••" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="new-password-repeat" class="newPasswordRepeat bg-gray-900 border border-blue-50 text-blue-50 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                                    <i class="bi bi-eye-slash text-gray-300 absolute cursor-pointer 2xl:right-0 2xl:top-12 2xl:pr-5 xl:right-0 xl:top-16 xl:pr-5 lg:right-0 lg:top-9 lg:pr-5 md:right-0 md:top-16 md:pr-5 sm:right-0 sm:top-16 sm:pr-5 right-0" id="repeatTogglePass"></i>
                                                    <div id="passwordHelpBlock" class="form-text">
                                                    </div>
                                                </div>
                                                <p id="passMatchWarning" class="text-rose-600 text-center space-y-2"></p>   
                                                <div class="flex justify-end mt-3">
                                                    <!-- <button type="button" class="text-blue-50 border-2 border-gray-500 bg-gray-900 hover:bg-gray-500 px-3 py-2.5 text-center mr-2 mb-2 w-24 rounded-md" id="btnCloseCreate"><i class="bi bi-x-circle"></i>Back</button> -->
                                                    <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-800 font-medium rounded-lg px-5 py-2.5 text-center mr-2 mb-2" id="btnSaveChanges" name="btnSaveChanges" disabled><i class="bi bi-box-arrow-in-right"></i> Save Changes </button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Success Modal Popup -->
                        <div id="successModal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-gray-900 rounded-lg shadow">
                                    <!-- Modal header -->
                                    <div class="flex justify-end p-2">
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-800  hover:text-white rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="successModal">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-6 mt-5 text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 w-14 h-14 text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-200">Password has been updated <span class="text-green-500 font-medium">successfully</span>, Click the button below to reload the page.</h3>
                                        <button type="button" class="text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2" onclick="closeButtons()">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>            
                </div> 

                 <!-- Images -->
                <div class="cols-span-1">
                    <img src="assets/user-dashboard/information.svg" alt="" class="w-fit h-fit mx-6 my-20" >
                </div>

            </div>

        </div>   
        <!-- END -->     

        <p id="result-modal"></p>
    </div>                    
                            
    </div>
        <!-- End -->
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <!-- FLOWBITE CDN -->
        <script src="node_modules\flowbite\dist\flowbite.js"></script>
        <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
</body>
</html>