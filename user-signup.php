<?php
    session_start();
    if (isset($_SESSION['signupID'])) {
        header ("location: existing-user-signup.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="js\user-signup.js" type="text/javascript" defer></script>
    <link rel="stylesheet" href="dist\output.css">
    <link rel="stylesheet" href="styling\user-signup-styling.css">
    <link rel="icon" href="assets/main-logo-line.png" type="image/x-icon">  
    <title>User Signup | SwiftCare PH</title>

</head>
<body class="bg-gray-900 relative font-poppins text-sm sm:text-base md:text-base text-white">
    <!-- Back button Container -->
    <div class="absolute top-5 left-5">
        <a href="index" class="underline "><i class="bi bi-arrow-left-circle"></i> Back to home page</a>
    </div>
    <!-- Main Content -->
    <!-- style="background-image: -webkit-linear-gradient(45deg, #112D4E 50%, #FDBE34 50%);" -->
    <div class="outline-1 lg:h-screen border-gray-400 flex flex-col
     px-8 sm:px-10 py-16 space-y-4 lg:grid lg:grid-cols-12 2xl:items-center 2xl:gap-x-10 2xl:pl-32">
        <div class="lg:col-start-3 lg:col-span-8 2xl:col-start-1 2xl:col-span-5">
            <!-- Header Title -->
            <div class="space-y-4 flex flex-col items-center mb-3 lg:mb-8">
                <img src="assets/HeaderLogo.svg" alt="logo" srcset="" class="w-32 2xl:hidden">
                <h1 class="font-bold text-center text-lg md:text-2xl">USER SIGNUP</h1>
                <p class="text-center"><i class="bi bi-info-circle-fill"></i> Please fill in the fields below with appropriate information:</p>
            </div>

            <!-- Form Container -->
            <div>
                <form action="includes/userSignup-inc.php" method="POST" class="flex flex-col font-bold signupForm" onsubmit="setFormSubmitting()">
                    <div class="lg:flex lg:flex-row lg:space-x-4 flex flex-col">
                        <div class="flex flex-col lg:grow">
                            <label for="userFirstname">Firstname</label>
                            <input type="text" name="userFirstname" id="userFirstname" enterkeyhint="next" class="capitalize mb-1 border text-gray-700 lg:border-2 border-blue-500 focus:outline outline-2 outline-blue-500 p-3 rounded font-bold" placeholder="ex: Juan" required>
                        </div>
                        
                        <div class="flex flex-col lg:grow">
                            <label for="userLastname">Lastname</label>
                            <input type="text" name="userLastname" id="userLastname" enterkeyhint="done" class="capitalize mb-7 border lg:border-2 text-gray-700 border-blue-500 focus:outline outline-2 outline-blue-500 p-3 rounded font-bold" placeholder="ex: Dela Cruz" required>
                        </div>
                    </div>
                    
                    <div class="mb-7 lg:flex lg:flex-row grow lg:space-x-4 flex flex-col">

                        <div class="relative flex flex-col lg:grow">
                            <label for="userLastname">Password</label>
                            <input type="password" name="userPassword" id="userPassword" enterkeyhint="next" autocomplete="off" aria-describedby="passwordHelpBlock" class="userPassword relative mb-2 border lg:border-2 text-gray-700 border-blue-500 focus:outline outline-2 outline-blue-500 p-3 rounded font-bold" placeholder="Enter your password" required>
                            <i class="bi bi-eye-slash togglePassword text-dark text-gray-700 cursor-pointer absolute right-0 2xl:pt-10 2xl:pr-3 xl:pt-10 xl:pr-3 lg:pt-10 lg:pr-3 md:pt-10 md:pr-3 sm:pt-10 sm:pr-3 pt-10 pr-3" id="togglePassword"></i>
                            <div id="passwordHelpBlock" class="form-text">
                                <ul id="passwordHelper">
                                    <li id="minimumChar" class="invalidInput text-center pt-2">Atleast 8 Characters.</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="relative flex flex-col lg:grow">
                            <label for="userLastname">Repeat Password</label>
                            <input type="password" name="userPasswordRepeat" id="userPasswordRepeat" enterkeyhint="next" autocomplete="off" aria-describedby="passwordHelpBlock" class="userPasswordRepeat mb-2 border lg:border-2 text-gray-700 border-blue-500 focus:outline outline-2 outline-blue-500 p-3 rounded font-bold" placeholder="Re-enter your password" required>
                            <i class="bi bi-eye-slash toggleRepeatPassword text-dark text-gray-700 cursor-pointer absolute right-0 2xl:pt-10 2xl:pr-3 xl:pt-10 xl:pr-3 lg:pt-10 lg:pr-3 md:pt-10 md:pr-3 sm:pt-10 sm:pr-3 pt-10 pr-3" id="toggleRepeatPassword"></i>  
                            <div id="passwordHelpBlock" class="form-text repeatPasswordHelper">
                                <ul id="passwordHelper">
                                    <li class="passwordWarning text-center pt-2" id="passwordWarning">Repeat your Password.</li>
                                </ul>                                     
                            </div>   
                        </div>
                        
                    </div>
                                      
                    <label for="userEmail">Email</label>
                    <input type="email" name="user-email" id="user-email" class="mb-1 border lg:border-2 text-gray-700 border-blue-500 focus:outline outline-2 outline-blue-500 p-3 rounded font-bold" placeholder="ex: email@email.com" required>
                    <label for="userMobile">Mobile Number</label>
                    <input type="tel" inputmode="numeric" enterkeyhint="next" pattern="[0-9]{10,11}" maxlength="11" name="userMobileNumber" id="userMobileNumber" class="mb-7 border text-gray-700 lg:border-2 border-blue-500 focus:outline outline-2 outline-blue-500 p-3 rounded font-bold" placeholder="ex:09123456789" required>
                    
                    <center class="text-dark">
                        <?php
                            if (isset($_GET["error"])) {
                                if($_GET["error"] == "mobile-number-is-already-used") {
                                    echo "<p class='error-mobileNumber-used text-red-600 mb-3'><i class='bi bi-exclamation-circle-fill'></i> The Mobile Number you provided is already taken!</p>";
                                }

                                if($_GET["error"] == "email-is-already-used") {
                                    echo "<p class='error-mobileNumber-used text-red-600 mb-3'><i class='bi bi-exclamation-circle-fill'></i> The Email you provided is already Taken!</p>";
                                }
                            }
                        ?>
                    </center>

                    <button type="submit" name="submit" id="btnSubmit" class="mb-3 rounded bg-blue-600 hover:bg-blue-500 p-4 text-white">CONTINUE <i class="bi bi-arrow-right-circle"></i></button>
                </form>
            </div>

            <!-- Login container -->
            <div class="relative border-t-2 border-gray-300 mt-5 py-5 text-center">
                <p class="text-center">Already have an account?</p>
                <a href="user-login" class="mb-3 rounded underline text-lg p-2 hover:text-blue-500 tracking-wide">LOGIN</a>
                
                <div class="absolute -bottom-5 lg:-bottom-20 left-0 right-0 2xl:hidden">
                    <p class="text-center text-slate-400 text-xs">© <a href="#" class="hover:underline">Swiftcare PH</a>  2022 | All Rights Reserved. 😎🩺🔥</p>
                </div>
            </div>
        </div>

        <!-- Rocket Container -->
        <div class="hidden 2xl:block 2xl:col-span-7 2xl:p-10">
            <img src="assets/signup_bg.svg" alt="" class="">
        </div>
    </div>

    <div class="absolute 2xl:bottom-5 left-0 right-0 hidden 2xl:block">
        <p class="text-center text-slate-400 text-xs">© <a href="#" class="hover:underline">Swiftcare PH</a>  2022 | All Rights Reserved.</p>
    </div>
</body>
</html>