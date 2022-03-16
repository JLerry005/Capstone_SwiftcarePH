
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="dist\output.css">
    <!-- CSS Link -->
    <link  href="styling/hospital-signup-styling.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="js/hospital-signup.js" defer></script>
    <!-- Icon -->
    <link rel="icon" href="assets/main-logo-line.png" type="image/x-icon">
    
    <title>Hospital Signup | SwiftCare PH</title>
</head>
<body>

    <!--Header Container-->
    <div class="container-fluid main-container">

        <div class="row signupRow">

            <!--Side Illustration Container-->
            <div class="col-xl-6 vectorContainer text-center pt-5">                   
                <img src="assets/hopital-signups-vector.svg" class="img-fluid vectorLogin" alt="Responsive image">
                <div class="login">
                    <h4 class="text-center"> Already have an account?</h4>
                    <!--Login Button-->
                    <a href="hospital-login" class="btn btnLogin" role="button">Go to Login</a>                
                </div>
             </div>
  
            <!--Signup Form Container-->
            <div class="col-xl-6 formContainer">
                <form action="hospital-signup-inc" id="" method="POST" enctype="multipart/form-data" class="signupForm needs-validation"> 

                    <!--Title-->
                    <div class="mb-3">
                        <h3 class="titleLabel">Signup Access - For Public & Private Hospitals</h3>
                    </div>

                    <!--Name of Hospital-->
                    <div class="mb-3">
                        <label for="hospitalName" class="form-label hospital-name-label">Register As</label>
                        <span class="text-danger">*</span>
                        <select class="form-control form-select" name="hospitalType" id="hospitalType" required>
                            <option selected disabled value="">-Select-</option>
                            <option value="Public Hospital">Public Hospital</option>
                            <option value="Private Hospital">Private Hospital</option>
                        </select>
                    </div>

                    <!--Name of Hospital-->
                    <div class="mb-3">
                        <label for="hospitalName" class="form-label hospital-name-label">Name of Hospital</label>
                        <span class="text-danger  ">*</span>
                        <label for="hospitalName" class="form-label hospital-name-label">(Please include the branch)</label>
                        <input type="text" class="form-control" name="hospitalNameInput" id="hospitalName" autocomplete="off" required>
                    </div>

                    <!--Address-->
                    <div class="mb-3">
                        <label for="address" class="form-label address-label">Address</label>
                        <span class="text-danger ">*</span>
                        <input type="text" class="form-control" name="addressInput" id="address" autocomplete="off" required>
                    </div>
                    
                    <!--Branch & Representative's Name-->
                    <div class="d-flex mb-3">
                        <!--Representative's Name-->
                        <div class="col-6">
                            <label for="representativeName" class="form-label">Representative's Name</label>
                            <span class="text-danger ">*</span>
                            <input type="text" name="representativeNameInput" class="form-control first-input" id="representativeNameInput" placeholder="Ex. Juan Dela Cruz" autocomplete="off" required>
                        </div>

                        <!--Representative's Name-->
                        <div class="col-6">
                            <label for="representativeName" class="form-label">Supervisor of Hospital</label>
                            <span class="text-danger ">*</span>
                            <input type="text" name="supervisorNameInput" class="form-control" id="supervisorNameInput" placeholder="Ex. Juan Dela Cruz" autocomplete="off" required>
                        </div>
                    </div>

                    <!--Enter Valid Mobile Number & Position / Designation-->
                    <div class="d-flex mb-3">
                        <!--Enter Valid Mobile Number-->
                        <div class="col-6">
                            <label for="mobileNumberInput" class="form-label">Enter Valid Mobile Number</label>
                            <span class="text-danger ">*</span>
                            <input type="tel" class="form-control first-input" placeholder="+639 XXXX XXXXX" name="mobileNumberInput" id="mobileNumberInput" autocomplete="off" value="+63" maxlength="13" required>

                            <center class="text-dark">
                                <?php
                                    if (isset($_GET["error"])) {
                                        if($_GET["error"] == "mobile-number-is-already-used") {
                                            echo "<p class='error-mobileNumber-used text-red-600 mb-3'><i class='bi bi-exclamation-circle-fill'></i> The Mobile Number you provided is already taken!</p>";
                                        }
                                    }
                                ?>
                            </center>                            
                        </div>

                        <!--Position / Designation-->
                        <div class="col-6">
                            <label for="positionInput" class="form-label">Position / Designation</label>
                            <span class="text-danger ">*</span>
                            <input type="text" name="positionInput" class="form-control second-input" id="positionInput" autocomplete="off" required>
                        </div>
                    </div>

                    <!--Enter Valid Email & Confirm Emai-->
                    <div class="d-flex mb-3">
                        <!--Enter Valid Email-->
                        <div class="col-6">
                            <label for="email" class="form-label">Enter Valid Email</label>
                            <span class="text-danger ">*</span>
                            <input type="email" name="EmailInput" class="form-control first-input" id="email" autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                            
                            <center class="text-dark">
                                <?php
                                if (isset($_GET["error"])){
                                    if($_GET["error"] == "email-is-already-used") {
                                        echo "<p class='error-mobileNumber-used text-red-600 mb-3'><i class='bi bi-exclamation-circle-fill'></i> The Email you provided is already Taken!</p>";
                                        }
                                    }
                                ?>
                            </center>

                        </div>

                        <!--Confirm Email-->
                        <div class="col-6">
                            <label for="confirmEmail" class="form-label">Confirm Email</label>
                            <span class="text-danger ">*</span>
                            <input type="email"  name="confirmEmailInput" class="form-control second-input" id="confirmEmail" autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                        </div>
                    </div>
                    
                    <!--Password & Confirm Password-->
                    <div class="d-flex mb-3">
                        <!--Password-->
                        <div class="relative col-6 my-auto">
                            <label for="password" class="form-label">Password</label>
                            <span class="text-danger">*</span>
                            <input type="password" id="password" name="passwordInput" class="form-control passwordInput" aria-describedby="passwordHelpBlock" placeholder="Create your password" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                            <i class="bi bi-eye-slash togglePassword text-dark text-gray-700 cursor-pointer absolute 2xl:right-0 2xl:top-16 2xl:pr-14 xl:right-0 xl:top-16 xl:pr-12 lg:right-0 lg:top-16 lg:pr-14 md:right-0 md:top-16 md:pr-14 sm:right-0 sm:top-16 sm:pr-9 right-0 top-16 pr-9" id="togglePassword"></i>
                            <p class="minimumChar" id="minimumChar" style="display: none;">Atleast 8 Characters</p>
                        </div>
                        
                        <!--Confirm Password-->
                        <div class="relative col-6 mx-0">
                            <label for="repeatPassword" class="form-label">Confirm Password</label>
                            <span class="text-danger ">*</span>
                            <input type="password" id="repeatPassword" name="repeatPasswordInput" class="form-control repeatPasswordInput" aria-describedby="passwordHelpBlock" placeholder="Retype your Password" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                            <i class="bi bi-eye-slash toggleRepeatPassword text-dark text-gray-700 cursor-pointer absolute 2xl:right-0 2xl:top-16 2xl:pr-5 xl:right-0 xl:top-16 xl:pr-5 lg:right-0 lg:top-16 lg:pr-5 md:right-0 md:top-16 md:pr-5 sm:right-0 sm:top-16 sm:pr-5 right-0 top-16 pr-3" id="toggleRepeatPassword"></i>
                            <p id="passMatchWarning"></p>
                        </div>
                    </div>
                    <br>
                    
                    <!--Attachment Button-->
                    <div class="mb-3">
                        <label for="attachment" class="form-label">Attach documents(ID, Hospital Permit & Doctor License).</label> 
                        <br>
                        <input type="button" value="Add attachments" data-bs-toggle="modal" data-bs-target="#attachment" class="bg-footerColor text-white p-2 w-38 rounded-lg">
                    </div>

                    <!-- Modal For Attachments -->
                    <div class="modal modal-dialog-scrollable modalContainerAttach" tabindex="-1" id="attachment" data-bs-backdrop="static" data-bs-keyboard="false">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Attach your documents</h4>
                            </div>
                            <div class="modal-body">
                                <!-- <form action=""> -->
                                    <!--ID-->
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload your Hospital ID</label>
                                        <span class="text-danger ">*</span>
                                        <input class="form-control imageInput" name="HospitalDocs[]" value="" multiple="" type="file" id="hospitalID">
                                    </div>

                                    <!--Hospital Permit-->
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload your Hospital Permit</label>
                                        <span class="text-danger">*</span>
                                        <input class="form-control imageInput" name="HospitalDocs[]" value="" multiple="" type="file" id="hospitalPermit">
                                    </div>

                                    <!--Doctor License-->
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload your Doctor License</label>
                                        <span class="text-danger  ">*</span>
                                        <input class="form-control imageInput" name="HospitalDocs[]" value="" multiple="" type="file" id="doctorLicense">
                                    </div>                    
                                <!-- </form> -->
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <!-- <button type="button" class="btn btn-success">Save changes</button> -->
                            </div>
                        </div>
                        </div>
                    </div>

                    <br>

                    <!--Remember Me Checkbox-->
                    <div class="form-group form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                        <label class="form-check-labels rememberMeLabel" for="exampleCheck1">
                            I agree with the </label><a href="..." data-bs-toggle="modal" data-bs-target="#terms-and-conditions"> Terms and Conditions.</a>
                    </div>

                    <!--Signup Button--> 
                    <div class="">
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="btnSignup" class="btn btnSignup" id="btnSignup">SUBMIT</button>
                        </div> 
                    </div>
                </form>
            </div>
        </div>


          <!-- Modal for Terms and Conditions -->
          <div class="modal modal-dialog-scrollable modalContainerTerms" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" id="terms-and-conditions" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="modalLabel">Terms and Conditions</h4>
                </div>
                <div class="modal-body">                           
                    <div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem quos mollitia provident porro similique dolores cupiditate sed impedit iste aut id labore nemo, dolorum fugit voluptatum aspernatur numquam dolore magnam? Lorem ipsum dolor sit amet consectetur adipisicing elit. Et nemo, alias amet excepturi est ipsam maxime cumque recusandae ut, similique voluptas ipsum necessitatibus dignissimos. Sequi amet aperiam provident eum. Quam. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint id neque sit ipsa assumenda explicabo, autem ut. Cumque omnis recusandae vero corrupti doloremque, exercitationem eveniet dignissimos officiis voluptatibus reiciendis earum.
                            <br>
                            1. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora ab quibusdam delectus perferendis assumenda earum cupiditate amet unde quisquam nihil, rem illo? Dolore temporibus fugit doloremque at perspiciatis autem id.
                            <br>
                            2. Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia exercitationem deserunt eos sunt neque fugit suscipit possimus, voluptas, consequuntur unde sequi repudiandae nulla quidem consectetur, totam error reiciendis id recusandae?
                            <br>
                            3. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos perspiciatis quae, autem sint itaque harum fugiat modi aspernatur placeat voluptas quos repellat voluptate? Doloribus, deserunt odio. Facilis sapiente quae fugit.
                            <br>
                            4. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, sequi. Asperiores, neque obcaecati aspernatur rem doloremque quisquam dolorem aliquid fugiat laborum iste culpa explicabo omnis quibusdam, officia, molestias tenetur! Perferendis!
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem quos mollitia provident porro similique dolores cupiditate sed impedit iste aut id labore nemo, dolorum fugit voluptatum aspernatur numquam dolore magnam? Lorem ipsum dolor sit amet consectetur adipisicing elit. Et nemo, alias amet excepturi est ipsam maxime cumque recusandae ut, similique voluptas ipsum necessitatibus dignissimos. Sequi amet aperiam provident eum. Quam. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint id neque sit ipsa assumenda explicabo, autem ut. Cumque omnis recusandae vero corrupti doloremque, exercitationem eveniet dignissimos officiis voluptatibus reiciendis earum.
                            <br>
                            1. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora ab quibusdam delectus perferendis assumenda earum cupiditate amet unde quisquam nihil, rem illo? Dolore temporibus fugit doloremque at perspiciatis autem id.
                            <br>
                            2. Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia exercitationem deserunt eos sunt neque fugit suscipit possimus, voluptas, consequuntur unde sequi repudiandae nulla quidem consectetur, totam error reiciendis id recusandae?
                            <br>
                            3. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos perspiciatis quae, autem sint itaque harum fugiat modi aspernatur placeat voluptas quos repellat voluptate? Doloribus, deserunt odio. Facilis sapiente quae fugit.
                            <br>
                            4. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, sequi. Asperiores, neque obcaecati aspernatur rem doloremque quisquam dolorem aliquid fugiat laborum iste culpa explicabo omnis quibusdam, officia, molestias tenetur! Perferendis!
                        </p>
                    </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btnTerms text-center" data-bs-dismiss="modal">Decline</button>
                  <button type="button" class="btn btn-success btnTerms">Accept</button>
                </div>
              </div>
            </div>
          </div>

    <!-- Footer 
    <div class="row row4">-->
        <!--Column
        <div class="col-xl-2">
            
        </div>

        <div class="col-xl-8 my-auto">
            <div class="row my-auto">
                <div class="col-xl-4 text-center">
                    <h1>ABOUT US</h1> <br>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, possimus magni sed officia neque eveniet ea suscipit dignissimos temporibus labore quidem obcaecati deleniti amet non rem quisquam esse eos animi?</p>  
                </div>
                <div class="col-xl-4">
                    <img src="/assets/Clip_animated_illustrations_by_Icons8/Clip_Web_Design_transparent_by_Icons8.gif" class="img-fluid" alt="Responsive image" >          
                </div>
                <div class="col-xl-4 text-center">
                    <h1>CONTACT US</h1> <br>
                    
                    <p><strong>Contact Number:</strong> 0912142425 
                        <br><strong>Email Address:</strong>  awdaw@gmail.com
                    </p>
                    <a href="https://www.facebook.com/joshpagayunan23">
                        <img src="/assets/ICONS/DrawKit Free 3D Social Media Icons v1.0/PNG/Front View/Facebook.png" alt="" width="50px" height="50px" id="icons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Facebook"></a>
                        <img src="/assets/ICONS/DrawKit Free 3D Social Media Icons v1.0/PNG/Front View/Twitter.png" alt="" width="50px" height="50px" id="icons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Twitter">
                        <img src="/assets/ICONS/DrawKit Free 3D Social Media Icons v1.0/PNG/Front View/Viber.png" alt="" width="50px" height="50px" id="icons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Google Mail">
                        <img src="/assets/ICONS/DrawKit Free 3D Social Media Icons v1.0/PNG/Front View/Youtube.png" alt="" width="50px" height="50px" id="icons" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Instagram">
                </div>
            </div>

        </div>  

        <div class="col-xl-2">
            
        </div>           
    </div>
    <div class="row row6">
        <div class="col-xl-12 my-auto" style="text-align: center; color: rgb(0, 0, 0);">
            © 2021 SwiftCare PH – All rights reserved
        </div>
    </div>
    </div>-->
    <!-- <script src="js/script.js"></script> -->
</body>
</html>