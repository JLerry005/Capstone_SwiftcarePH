<?php

    session_start();
    include_once 'dbh-inc.php';

    $imageToDelete = $_POST["imageId"];
    $imageDirectory = $_POST["imageDir"];
    $listing_id = $_SESSION["listing-id"];

    unlink($imageDirectory);
    $deleteImage = $conn->query("DELETE FROM listingimages WHERE image_id = $imageToDelete") or die($conn->error);
