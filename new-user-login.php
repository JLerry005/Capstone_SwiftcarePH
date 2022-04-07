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

</head>
<body class="font-poppins text-gray-200">

    <div class="grid grid-cols-7">
        <div class="col-span-4 bg-gray-900">
            <img src="assets/user-login/Banner-img-1.png" class="h-screen w-screen" >
        </div>
        <div class="col-span-3 bg-gray-900 h-screen p-6 pt-44">
            <div class="text-4xl font-bold tracking-wider">
                <p class="text-7xl text-blue-50"><span class="font-normal text-blue-500">|</span>&nbsp;SwiftCare PH</p>
                <p class="tracking-wide mt-20">User Login</p>
            </div>
            <div class="space-y-4 mr-72 mt-5 pr-32">
                <div>
                    <label for="email" class="block mb-2 text-md font-medium text-blue-500">Email</label>
                    <input type="email" id="email" name="email" autocomplete="nope" class="bg-gray-900 border border-blue-50 text-blue-50 text-lg rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                </div>
                <div>
                    <label for="userPassword" class="block mb-2 text-md font-medium text-blue-500">Password</label>
                    <input type="password" id="userPassword" name="userPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="••••••••" class="userPassword bg-gray-900 border border-blue-50 text-blue-50 text-lg rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                    <a class="text-sm flex justify-end mt-1 mr-2 hover:underline" href="...">Forgot Password?</a>
                </div>
            </div>
            <div class="mr-72 mt-5 pr-32">
                <button type="submit" class="text-white w-full bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg px-5 py-2.5 text-center mr-2 mb-2" id="btnEditPasswordNext" name="btnEditPasswordNext">Login</button>
            </div>
            <div class="mr-72 mt-16 pr-32">
                <p class="font-medium mb-3">Don't have an account yet?</p>
                <button type="submit" class="text-white w-full border-2 border-blue-500 from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg px-5 py-2.5 text-center mr-2 mb-2" id="btnEditPasswordNext" name="btnEditPasswordNext">Sign up</button>
            </div>
        </div>
    </div>

    <script src="js\user-login.js" defer></script>
</body>
</html>