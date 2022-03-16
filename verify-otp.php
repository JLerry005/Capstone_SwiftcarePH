<?php
    session_start();
    if (!isset($_SESSION['signupID'])) {
        header ("location: user-signup.php");
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
    <link rel="stylesheet" href="dist\output.css">
    <script src="js/verify-otp.js" defer></script>
    <title>Verify OTP | SwiftCare PH</title>
    <link rel="icon" href="assets/main-logo-line.png" type="image/x-icon">  
</head>
<body class="font-poppins text-gray-500">
    <div class="mainContainer h-screen p-5 flex flex-col justify-center lg:items-center sm:p-16 lg:grid lg:grid-cols-12 relative">
        <div class="lg:col-start-4 lg:col-span-6 space-y-5 2xl:col-start-5 2xl:col-span-4 lg:space-y-11">
            <div class="">
                <h1 class="text-center text-lg sm:text-xl 2xl:text-2xl font-medium">Please enter the <b>6-Digit Code</b> that we sent to your Email below:</h1>
            </div>
    
            <div class="">
                <form method="post" id="otp-form" class="flex flex-col space-y-4">
                    <input type="text" name="otp-code" id="otp-code" class="outline-none border-4 rounded border-blue-500 text-center py-2 text-lg lg:text-3xl font-bold">
                    <button type="submit" id="submit" name="submit" class="bg-blue-500 hover:bg-blue-400 text-white rounded p-3">Continue</button>
                    <p class="text-red-600" id="code-expired"></p>
                    <p class="text-red-600" id="wrong-code"></p>

                    <center class="text-dark">
                        <?php
                            if (isset($_GET["success"])) {
                                if($_GET["success"] == "email-is-already-used") {
                                    echo "<p class='error-mobileNumber-used text-green-600 mb-3'><i class='bi bi-check-circle-fill'></i> We sent you a new OTP Code.</p>";
                                }
                            }
                        ?>
                    </center>

                </form>
            </div>
    
            <div class="text-center text-sm">
                <p>Didn're receive a code? <br></p>
                <form action="PHPMailer/send-new-otp.php" method="post">
                    <button type="submit" id="send-new-code" name="send-new-code" class="underline text-gray-700">Send me a new Code.</button>
                </form>
            </div>
        </div>
        

        <div class="absolute bottom-5 left-0 right-0">
            <p class="text-slate-400 text-xs text-center">© Swiftcare PH | All Rights Reserved. 🔥</p>
        </div>
    </div>
</body>
</html>