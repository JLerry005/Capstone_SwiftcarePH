<?php
    // include_once 'header.php';
    // include_once 'nav.php';
    include_once 'user-signup-header.php';
?>

<link rel="stylesheet" href="dist\output.css"> 
<link  href="styling/user-signup-styling.css" rel="stylesheet" type="text/css">
<!-- <script src="js\user-signup.js" type="text/javascript" defer></script> -->
<!--Bootstrap Icons-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css"> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS --
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--Bootstrap Icons--
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">  
    <!-- Font Awesome CSS --
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link  href="styling/user-signup-styling.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js\user-signup.js" type="text/javascript" defer></script>
    <title>User Signup - SwiftCare PH</title>
</head>
<body> 

    <!--Header Container-->
    <div class="container-fluid main-container">
       <div class="row signupRow">

            <!--Signup Form Container-->
            <div class="col-xl-7 formContainer my-auto">

                <form action="includes/userSignup-inc.php" method="POST" class="signupForm" onsubmit="setFormSubmitting()">
                    <!--Title-->
                    <div class="mb-5 text-white">
                        <h1>Signup Access - For Users</h1>
                    </div>

                    <!--First Name and Last Name-->
                    <div class="d-flex nameRow mb-5">
                        <div class="col-6">
                            <label for="userFirstname" class="form-label">First Name</label>
                            <span class="text-danger ml-1">*</span>
                            <input type="text" name="userFirstname" id="userFirstname" enterkeyhint="next" class="form-control first-input" placeholder="Ex: Juan" required>
                        </div>
                        <div class="col-6">
                            <label for="userLastname" class="form-label">Last Name</label>
                            <span class="text-danger ml-1">*</span>
                            <input type="text"  name="userLastname" enterkeyhint="done" class="form-control second-input" id="userLastname" placeholder="Ex: Dela Cruz" required>
                        </div>
                    </div>

                    <!--Password-->
                    <div class="d-flex passwordRow mb-5">
                        <div class="col-6">
                            <label for="userPassword" class="form-label">Password</label>
                            <span class="text-danger ml-1">*</span>
                            <input type="password" id="userPassword" name="userPassword" id="userPassword" enterkeyhint="next" class="form-control first-input userPassword" aria-describedby="passwordHelpBlock" required>
                            <i class="bi bi-eye-slash togglePassword text-dark" id="togglePassword"></i>
                            <div id="passwordHelpBlock" class="form-text">
                                <ul id="passwordHelper">
                                    <li id="minimumChar" class="invalidInput text-center pt-2">Atleast 8 Characters.</li>
                                </ul>
                            </div>
                            
                        </div>
                        <div class="col-6 mx-0">
                            <label for="userPasswordRepeat" class="form-label">Repeat Password</label>
                            <span class="text-danger ml-1">*</span>
                            <input type="password" id="userPasswordRepeat" name="userPasswordRepeat" enterkeyhint="next" class="form-control second-input userPasswordRepeat" aria-describedby="passwordHelpBlock" disabled required>
                            <i class="bi bi-eye-slash toggleRepeatPassword text-dark" id="toggleRepeatPassword"></i>
                            <div id="passwordHelpBlock" class="form-text repeatPasswordHelper">
                                <!-- <p id="repeatPasswordHelper">Repeat your Password.</p> -->
                                <ul>
                                    <li class="passwordWarning" id="passwordWarning">Repeat your Password.</li>
                                </ul>                                     
                            </div>
                        </div>
                    </div>

                    <!--Phone Number-->
                    <div class="mb-3 emailContainer">
                    <label for="userMobileNumber" class="form-label">Mobile Number</label>
                    <span class="text-danger ml-1">*</span>
                    <input type="tel" inputmode="numeric" enterkeyhint="next" pattern="[0-9]{10,11}" title="Invalid Number" class="form-control emailInput" id="userMobileNumber" placeholder="Ex: 09123456788" name="userMobileNumber" required>
                    <label for="user-email" class="form-label mt-3">Email Address</label>
                    <input type="email" name="user-email" id="user-email" class="outline-4 outline-blue-700 p-2 rounded-md w-full" placeholder="example@email.com" required>
                    </div>                            

                    <!--Remember Me Checkbox-->
                    <div class="form-group form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-labels termLabel" for="exampleCheck1">
                            I agree with the <a href="/html/hospital-signup" data-bs-toggle="modal" data-bs-target="#terms-and-conditions" class="conditionLabel"> Terms and Conditions.</a></label>
                    </div>                            

                    <center class="text-dark mt-3">
                        <?php
                            if (isset($_GET["error"])) {
                                if ($_GET["error"] == "mobile-number-is-already-used") {
                                    echo "<p class='error-mobileNumber-used'><i class='bi bi-exclamation-circle-fill'></i> The mobile number is already used!</p>";
                                }
                            }
                        ?>
                    </center>

                    <!--Submit Button-->
                    <div class="d-flex flex-column nextButtonContainer">
                        <div class="d-flex justify-content-start">
                            <button type="submit" name="submit" class="btn btnSubmit" id="btnSubmit">SUBMIT</button>
                        </div>
                        <div class="text-center pt-4 pb-3 orLabel">
                            <h5>━━━━━━━━━━━━━━━━━ OR ━━━━━━━━━━━━━━━━━━</h5>                        
                        </div>
                        <div class="text-center text-warning pb-1">
                           <h6> Already have an account?</h6>
                        </div>
                        <div class="d-flex justify-content-start">
                            <a href="user-login" class="btn btnLogin" role="button">LOGIN</a>
                        </div> 
                    </div>
                </form>
                    
                    <!--Signup Page 2 - Phone Number Verification-->
                    <div class="row phoneRow" style="display: none;">
                    <!--Enter Valid Mobile Number-->
                    <div class="col-6">
                        <label for="firstname" class="form-label">Enter Valid Mobile Number</label>
                        <span class="text-danger ml-1">*</span>
                        <input class="form-control first-input" placeholder="+639 XXXX XXXXX" type="tel" id="mobile_number" autocomplete="off" value="+63">
                    </div>

                        <div class="col-6">
                            <div class="p-2 bd-highlight">
                                <button type="button" class="btn btn-primary btnSendCode" id="sendCode">Send Code</button>
                            </div>
                        </div>
                        <div class="d-flex flex-row-reverse align-items-end">
                            <button type="submit" class="btn btn-primary btnFinish">Finish</button>
                        </div>
                    </div>
                    <!--<div class="mb-3">
                        <label for="inputPassword5" class="form-label">Password</label>
                        <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
                    </div>-->                                             
                </div>
                  
                <!--Side Illustration Container-->
                <div class="col-xl-5 vectorContainer my-auto">
                    <img src="assets/signup_bg.svg" class="img-fluid vectorLogin" alt="Responsive image">
                </div>
              </div>
            </div>           
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
                    1. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora ab quibusdam delectus perferendis assumenda earum cupiditateamet unde quisquam nihil, rem illo? Dolore temporibus fugit doloremque at perspiciatis autem id.
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
                <button type="button" class="btn btn-success btnTerms" data-bs-submit="modal">Accept</button>
            </div>
        </div>
        </div>
    </div>    

<?php
        include_once 'footer.php';
?>