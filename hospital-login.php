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
    <title>Hospital Login | Swiftcare PH</title>
</head>
<body class="font-poppins bg-gray-900 text-gray-200">

    <!-- This the container of Hospital Login -->
    <div class="grid grid-cols-7">
        <!-- Left side of the container -->
        <div class="col-span-7 xl:col-span-3 xl:h-screen flex flex-col mx-10 lg:mx-20 pt-10">
            <div class="xl:flex xl:items-start xl:flex-col">
                <!-- Logo of SwiftCare PH -->
                <a href="index" tooltip="Back to homepage" class="flex justify-center mb-10">
                    <img src="assets/user-login/swiftcare-ph-logo-bg.png" alt="" srcset="" class="h-32 w-32 mt-2 xl:mt-10 xl:mb-6">
                </a>
                <!-- Title -->
                <p class="text-center text-xl md:text-2xl mb-6 font-bold tracking-wider">Hospital Login</p>
            </div>
            <!-- Input of Email and Password with Login button -->
            <div class="space-y-4 xl:mr-16 xl:mt-10">
                <!-- This is the form to submit a data -->
                <form action="includes/hospital-login-inc.php" method="POST">
                    <!-- Hospital Admin Email -->
                    <div class="mb-3 md:mb-6">
                        <label for="emailInput" class="block mb-2 text-sm md:text-md font-medium text-blue-500">Email Address</label>
                        <input type="email" id="emailInput" name="emailInput" autocomplete="nope" class="bg-gray-900 border border-blue-50 text-blue-50 text-lg rounded-md focus:bg-slate-800 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    </div>
                    <!-- Hospital Admin Password -->
                    <div class="mb-3 md:mb-6">
                        <label for="passwordInput" class="block mb-2 text-sm md:text-md font-medium text-blue-500">Password</label>
                        <input type="password" id="passwordInput" name="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="••••••••" class="passwordInput bg-gray-900 focus:bg-slate-800 border border-blue-50 text-blue-50 text-lg rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <i id="passwordToggle" class="bi bi-eye-slash text-gray-300 absolute cursor-pointer 2xl:right-0 2xl:top-[515px] 2xl:mr-[79rem] xl:right-0 xl:top-[513px] xl:mr-[55.5rem] lg:right-0 lg:top-[417px] lg:mr-[100px] md:right-0 md:top-[415px] md:mr-[70px] sm:right-0 sm:top-[400px] sm:mr-[65px] right-0 top-[400px] mr-14"></i>
                        <div id="passwordHelpBlock" class="form-text">
                        </div>
                        <!-- <a class="text-xs flex justify-end mt-1 mr-2 hover:underline" href="...">Forgot Password?</a> -->
                    </div>
            </div>
        
                <!-- login button -->
                <div class="mb-6 xl:mr-16 xl:mb-20">
                    <button id="submit" name="submit" type="submit" class="text-white w-full bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg px-5 py-2.5 text-center mr-2 mb-2" id="btnEditPasswordNext" name="btnEditPasswordNext">Login</button>
                </div>

                </form>

                <!-- sigup content -->
                <div class="xl:mr-16">
                    <p class="font-medium mb-3">Don't have an account yet?</p>
                    <a href="hospital-signup" type="button" class="text-white w-full border-2 border-blue-500 from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg px-5 py-2.5 text-center mr-2 mb-2" id="btnEditPasswordNext" name="btnEditPasswordNext">Sign up</a>
                </div>
            </div>

        <!-- Right side of the container -->
        <div class="col-span-7 xl:col-span-4 p-6 sm:p-12 xl:h-screen flex xl:items-center xl:mx-auto">
            <img src="assets/hospital-login/hospital-login-img.svg" alt="" class="xl:w-screen xl:h-screen">
        </div>
    </div>

    <!-- JavaScript Link -->
    <script src="js/hospital-login.js" defer></script>
</body>
</html>