<?php

    session_start();
    include_once 'includes/dbh-inc.php';

    $phpFileUploadErrors = array(
        0 => 'There is no error, The File is oploaded successfully!',
        1 => 'The file exceeds the max upload size in php.ini',
        2 => 'The file exceeds the max upload size specified in html form.',
        3 => 'The file was only partially uploaded.',
        4 => 'NO file was uploaded',
        5 => 'Missing a temp folder.',
        6 => 'Failed to write file to disk',
        7 => 'A PHP extension stopped the file upload.'
    );

    $hospitalID = $_SESSION["hospitalID"];
    $listing_id = $_SESSION["listing-id"];

    // Insert Images
        $file_array = reArrayFiles($_FILES['images']);

        for ($i=0; $i <count($file_array); $i++) { 
            if ($file_array[$i]['error']) {
                ?>
                <?php echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']];?>
                <?php
            }
            else {
                $extensions = array('jpg', 'png', 'gif', 'jpeg');
                $file_ext = explode('.',$file_array[$i]['name']);
                
                $name = $file_ext[0];
                $name = preg_replace("!-!", " ", $name);
                $name = ucwords($name);

                $file_ext = end($file_ext);

                if (!in_array($file_ext, $extensions)) {
                    echo "error";
                    ?>
                    <?php echo "{$file_array[$i]['name']} - Invalid file extension!" ?>
                    <?php
                }

                else {
                    $img_dir = 'web/hospital-images/'.$file_array[$i]['name'];

                    move_uploaded_file($file_array[$i]['tmp_name'], $img_dir);

                    $insertImage = "INSERT IGNORE INTO listingimages (listing_idFK, image_name, image_dir) VALUES ('$listing_id', '$name', '$img_dir')";
                    $conn->query($insertImage) or die($conn->error);

                    // echo "Success";
                    ?>
                    <?php
                        echo $file_array[$i]['name']. ' - '.$phpFileUploadErrors[$file_array[$i]['error']];
                        ?>
                    <?php
                }
            }
        }
        // header ("location: ../hospital-dashboard");



    function reArrayFiles(&$file_post)
    {
        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);
        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }
        return $file_ary;
    }