<?php

    require_once 'dbh-inc.php';

    if (isset($_POST["booking-login"])) {
               
        $listingID = $_GET["listingID"];

        echo $listingID;
    }
