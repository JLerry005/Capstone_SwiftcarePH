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
    <script src="https://kit.fontawesome.com/98b00faa31.js" crossorigin="anonymous"></script>
    <!-- CSS Link -->
    <link  href="styling/hospital-login.css" rel="stylesheet" type="text/css">  

    <link rel="icon" href="assets/main-logo-line.png" type="image/x-icon">  
    
    <title>Hospital Login | SwiftCare PH </title>
</head>
<body>  
    <!--Header Container-->
    <div class="container-fluid main-container">
        <!-- Header-->
        <div class="row row1">
            <!-- 1st Column-->
            <div class="col-xl-3 my-auto">
            </div>

            <!-- 2nd Column - -->
            <div class="col-xl-6 middle-column my-auto">
                <div class="row loginFormRow">
                    
                    <!--Login Form Container-->
                    <div class="col-xl-7 formContainer">   
                        <div class="d-flex justify-content-center">
                            <img src="assets/main-logo-blue.png" class="img-fluid vectorLogin" alt="Responsive image" width="100px" height="100px">  
                        </div>
                        <div class="text-center titleLabel">  
                            <h3>Admin Access</h3>                                  
                        </div> 
                        <br>
                        <div class="d-flex align-items-center justify-content-center">
                            <!--Login Form-->
                            <form action="includes/hospital-login-inc.php" method="POST">
                                
                                <!--Email Input-->
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" name="emailInput" id="floatingInput" placeholder="name@example.com" required>
                                    <label for="floatingInput" class="form-label">Email Address</label>
                                </div>   
                                            
                                <!--Password Input-->
                                <div class="form-floating">
                                    <input type="password" name="passwordInput" class="form-control" id="floatingPassword" placeholder="Password" required>
                                    <label for="floatingPassword" class="form-label">Password</label>
                                </div>
                                
                                <!--Forget Password-->
                                <div class="text-end">
                                    <a class="text-right" href="...">Forgot Password?</a>
                                </div>

                                <!--Remember Me Checkbox-->
                                <div class="form-group form-check">
                                    <input class="form-check-input rememberMeCheckBox" type="checkbox"  id="exampleCheck1">
                                    <label class="form-check-labels rememberMeLabel" for="exampleCheck1">Remember Me</label>
                                </div>

                                <center class="text-dark">
                                    <?php
                                        if (isset($_GET["error"])) {
                                            if($_GET["error"] == "wronglogin") {
                                                echo "<p class='error-mobileNumber-used text-red-600 mb-3'><i class='bi bi-exclamation-circle-fill'></i> Email or Password is not correct!</p>";
                                            }
                                        }
                                    ?>
                                </center>

                                <!--Login Button-->
                                <!-- <a href="/html/admin-dashboard.html"> -->
                                <button type="submit" name="submit" class="btn btnLogin">LOGIN</button></a>
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
                        <h1 class="texts text-center">Hospital Login</h1>
                        <img src="assets/health-login-icon.svg" class="img-fluid" alt="Responsive image">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Quos earum corrupti maxime delectus eos reprehenderit.
                            Tempore voluptatum nisi perferendis fugit unde aspernatur,
                            recusandae cupiditate consectetur ratione dicta mollitia,
                            totam eligendi!
                        </p>
                        <br>
                            <h5 class="text-center">Don't have an account yet?</h5>
                            <!--<button type="submit" class="btn btn-primary btnSignup" id="btnSignup">Signup</button>-->
                            <a href="hospital-signup" class="btn btn-warning btnSignup" role="button">Signup</a>            
                    </div>
                </div>
            </div>
            <!-- 3rd Column-->
            <div class="col-xl-3 my-auto">
            </div>
        </div>
    </div>

</body>
</html>