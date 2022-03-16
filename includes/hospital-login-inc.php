<?php

    if (isset($_POST["submit"])) {
            
        $hospitalEmail = $_POST["emailInput"];
        $hospitalPassword = $_POST["passwordInput"];

        require_once 'dbh-inc.php';
        require_once 'functions-inc.php';

        loginHospital($conn, $hospitalEmail, $hospitalPassword);
    }

    else {
        header("location: ../hospital-login");
        exit(); 
    }