<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="js\user-login.js"></script>
    <!-- CSS Link -->
    <link  href="styling/user-login-styling.css" rel="stylesheet" type="text/css">
    <!-- Title -->
    <title>User Login | SwiftCare PH</title>
    <link rel="icon" href="assets/main-logo-line.png" type="image/x-icon">  
</head>
<body>  
    <!--Header Container-->
    <div class="container-fluid main-container">
        <!-- Header-->
        <div class="row row1">
            <!-- 1st Column-->
            <div class="col-xl-3">
            </div>

            <!-- 2nd Column - -->
            <div class="col-xl-6 middle-column my-auto">
                <div class="row loginFormRow">
                    
                    <!--Login Form Container-->
                    <div class="col-xl-7 formContainer">   
                        <div class="d-flex justify-content-center">
                            <img src="assets/main-logo-transparent.png" class="img-fluid vectorLogin" alt="Responsive image" width="100px" height="100px">  
                        </div>
                        <div class="text-center titleLabel">  
                            <h3>User Access</h3>                                  
                        </div> 
                        <br>

                        <div class="d-flex align-items-center justify-content-center">
                            <!--Login Form-->
                            <form action="includes/user-login-inc" method="post" id="login-form">
                                    
                                <!--Email Input-->
                                <div class="form-floating mb-3">
                                    <input type="tel" name="userMobileNumber" id="userMobileNumber" inputmode="numeric" enterkeyhint="next" pattern="[0-9]{10,11}" title="Invalid Number" class="form-control" id="floatingInput" placeholder="ex: 09123456789" required>
                                    <label for="floatingInput" class="form-label">Mobile No.</label>
                                </div>

                                <!--Password Input-->
                                <div class="form-floating">
                                    <input type="password" name="userPassword" id="userPassword" class="form-control" placeholder="Password" required>
                                    <label for="floatingPassword" class="form-label">Password</label>
                                </div>
                                
                                <!--Forgot Password-->
                                <div class="text-end pt-1">
                                    <a class="text-right" href="...">Forgot Password?</a>
                                </div>                                
                                <!--Remember Me Checkbox-->
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input rememberMeCheckBox" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                                </div>
                                <!--Login Button-->
                                <!-- <a href="/html/admin-dashboard.html"> -->
                                <button type="submit" name="submit" id="submit" class="btn btnLogin">LOGIN
                                    <div class="spinner-grow text-primary login-spinners" role="status" style="display: none;">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div class="spinner-grow text-secondary login-spinners" role="status" style="display: none;">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div class="spinner-grow text-success login-spinners" role="status" style="display: none;">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </button></a>
                                <div class="text-center pt-4 pb-3 orLabel">
                                   <h5>━━━━━━━━━━━━━ OR ━━━━━━━━━━━━━━</h5>                        
                                </div>                                
                                <!--Signup Button-->
                                <div class="signupContainer">
                                   <a href="index" class="btn btn-outline-light btnBack" role="button">Back To Home</a>
                                </div>
                            </form>
                        </div>
                           
                                

                    </div>
                    <!--Side Illustration Container-->
                    <div class="col-xl-5 vectorContainer">
                        <h1 class="text-center">Login and Book Now!</h1>                 
                        <img src="assets/user-logo.svg" class="img-fluid vectorLogin" alt="Responsive image">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Quos earum corrupti maxime delectus eos reprehenderit.
                            Tempore voluptatum nisi perferendis fugit unde aspernatur,
                            recusandae cupiditate consectetur ratione dicta mollitia,
                            totam eligendi!
                        </p>
                        <br>
                            <h5 class="signupLabel text-center">Don't have an account yet?</h5>
                            <!--<button type="submit" class="btn btn-primary btnSignup" id="btnSignup">Signup</button>-->
                            <a href="user-signup" class="btn btnSignup" role="button">Signup</a>            
                    </div>
                </div>
            </div>
            
            <!-- 3rd Column-->
            <div class="col-xl-3 my-auto">

            </div>
        </div>
    </div>
</div>        
</body>
</html>