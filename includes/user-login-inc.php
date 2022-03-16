<?php

    if (isset($_POST["submit"])) {
            
        $userMobileNumber = $_POST["userMobileNumber"];
        $userPassword = $_POST["userPassword"];

        require_once 'dbh-inc.php';
        require_once 'functions-inc.php';

        loginUser($conn, $userMobileNumber, $userPassword);
    }

    else {
        header("location: ../user-login.php");
        exit(); 
    }