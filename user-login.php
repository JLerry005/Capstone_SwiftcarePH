<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Icon CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" href="dist/output.css">
    <!-- Header Icon -->
    <link rel="icon" href="assets/main-logo-line.png" type="image/x-icon">  
    <!-- Header Title  -->
    <title>User Login | SwiftCare PH</title>
    <!-- JavaScipt Link -->
    <script src="js\user-login.js"></script>

</head>
<body class="font-poppins text-gray-200">

    <div class="grid grid-cols-7">
        <!-- left side content -->
        <div class="xl:col-span-4 lg:col-span-1 bg-gray-900 col-span-7">
            <img src="assets/user-login/Banner-user-login.svg" class="h-0 w-0 xl:h-screen xl:w-fit ">
        </div>
        <!-- right side content -->
        <div class="col-span-7 xl:col-span-3 bg-gray-900 h-screen xl:pl-10 p-8 sm:p-14 md:p-20 2xl:pt-28">
            <div class="xl:text-4xl xl:font-bold xl:tracking-wider flex justify-center 2xl:justify-start">
                <!-- <p class="text-7xl text-blue-50"><span class="font-normal text-blue-500">|</span>&nbsp;SwiftCare PH</p> -->
                <img src="assets/user-login/swiftcare-ph-logo-bg.png" alt="" srcset="" class="h-32 w-32 mt-2 xl:mt-0">
            </div>
            <p class="tracking-wider mt-10 sm:mt-14 mb-6 sm:mb-10 text-center 2xl:text-left font-bold text-2xl xl:mt-16">User Login</p>
            <!-- User Email and Password -->
            <div class="2xl:space-y-4 2xl:mr-10 xl:mt-10 2xl:pr-16">
                <!-- This is the form to submit a data -->
                <form action="includes/user-login-inc" method="POST" id="login-form">
                    <!-- User Email -->
                    <div class="mb-3 md:mb-6">
                        <label for="userMobileNumber" class="block mb-2 text-sm md:text-md font-medium text-blue-500">Email or Phone Number  </label>
                        <input type="tel" id="userMobileNumber" name="userMobileNumber" autocomplete="nope" class="bg-gray-900 border border-blue-50 text-blue-50 text-lg rounded-md focus:bg-slate-800 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>
                    <!-- User Password -->
                    <div class="mb-3 md:mb-6">
                        <label for="userPassword" class="block mb-2 text-sm md:text-md font-medium text-blue-500">Password</label>
                        <input type="password" id="userPassword" name="userPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="••••••••" class="userPassword bg-gray-900 border border-blue-50 text-blue-50 text-lg rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <a class="text-xs flex justify-end mt-1 mr-2 hover:underline" href="...">Forgot Password?</a>
                    </div>
            </div>
            
            <!-- login button -->
            <div class="2xl:mr-10 mt-5 2xl:pr-16">
                <button id="submit" name="submit" type="submit" class="text-white w-full bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg px-5 py-2.5 text-center mr-2 mb-2" id="btnEditPasswordNext" name="btnEditPasswordNext">Login</button>
            </div>

            <!-- Error Message -->
            <?php
                if (isset($_GET["error"])) {
                    if($_GET["error"] == "wrong-email-or-phonenumber") {
                        echo "<p class='error-mobileNumber-used text-red-600 mb-3 text-center'><i class='bi bi-exclamation-circle-fill'></i> Email or Phone Number is incorrect!</p>";
                    }
                }
            ?>
                </form>
            <!-- sigup content -->
            <div class="mt-6 sm:mt-16 md:mt-20 xl:mt-14 2xl:mr-10 2xl:mt-32 2xl:pr-16">
                <p class="font-medium mb-3">Don't have an account yet?</p>
                <a href="user-signup" type="button" class="text-white w-full border-2 border-blue-500 from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg px-5 py-2.5 text-center mr-2 mb-2" id="btnEditPasswordNext" name="btnEditPasswordNext">Sign up</a>
            </div>
        </div>
    </div>
</body>
</html>