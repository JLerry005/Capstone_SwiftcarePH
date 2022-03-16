<?php

    if (isset($_POST["submit"])) {
        $userMobileNumber = $_POST["userMobileNumber"];
        $userPassword = $_POST["userPassword"];
        $userPasswordRepeat = $_POST["userPasswordRepeat"];
        $userFirstname = $_POST["userFirstname"];
        $userLastname = $_POST["userLastname"];
        $userEmail = $_POST["user-email"];

        require_once 'dbh-inc.php';
        require_once 'functions-inc.php';
        require_once '../PHPMailer/send-otp.php';

        // if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
        //     header("location: ../signup.php?error=emptyinput");
        //     exit();

        // }

        if (userMobileNumberExists($conn, $userMobileNumber) !== false) {
            header("location: ../user-signup?error=mobile-number-is-already-used");
            exit();
        }

        if (userEmailExists($conn, $email) !== false) {
            header("location: ../user-signup?error=email-is-already-used");
            exit();
        }

        // if (userEmailExists($conn, $email) !== false && userMobileNumberExists($conn, $userMobileNumber) !== false) {
        //     header("location: ../user-signup.php?error=mobile-number-and-email-is-already-used");
        //     exit();
        // }

        sendOTP($conn, $userMobileNumber, $userPassword, $userFirstname, $userLastname, $userEmail);
    }

    else {
        header("location: ../user-signup.php");
        exit();
    }