<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="dist\output.css">
    <script src="js/verify-otp.js" defer></script>
    <title>User Signup | SwiftCare PH</title>
    <link rel="icon" href="assets/main-logo-line.png" type="image/x-icon">  
</head>

<body class="font-poppins bg-gray-900 text-gray-200">
    <!-- Container of content -->
    <div class="containter text-center grid items-center xl:grid-row-2 xl:grid-flow-col">
        <!-- SVG Image -->
        <div class="my-20 sm:my-40 flex justify-center xl:row-span-1 2xl:mb-32 xl:my-0">
            <img class="xl:h-screen xl:ml-24 2xl:h-screen 2xl:m-30 " src="assets\user-signup\Thinking.svg" alt="Thinking">
        </div>
        <!-- Context and Buttons -->
        <div class="mx-10 md:mx-28 xl:row-span-1 xl:space-y-2 2xl:mb-24 text-center">
            <p class="md:text-lg lg:text-2xl xl:text-2xl xl:p-5 2xl:text-3xl ">The sign-up process of your account is not already done, would you like to <span class="text-green-400">CONTINUE</span> or <span class="text-blue-500">SIGN-UP AGAIN</span>?</p>
            <div class="mt-8 xl:mt-0">
                <a href="verify-otp" role="button" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Continue</a>
                <a href="includes/new-signup-inc.php" role="button" id="new-signup" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Sign up again?</a>
            </div>
        </div>
    </div>

</body>
</html>