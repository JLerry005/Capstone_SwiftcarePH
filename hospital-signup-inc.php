<?php
    require_once 'includes/dbh-inc.php';
    require_once 'includes/functions-inc.php';

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

    if (isset($_POST["btnSignup"])) {
        $hospitalType = $_POST["hospitalType"];
        $hospitalNameInput = $_POST["hospitalNameInput"];
        $addressInput = $_POST["addressInput"];
        $representativeNameInput = $_POST["representativeNameInput"];
        $supervisorNameInput = $_POST["supervisorNameInput"];
        $mobileNumberInput = $_POST["mobileNumberInput"];
        $positionInput = $_POST["positionInput"];
        $EmailInput = $_POST["EmailInput"];
        $passwordInput = $_POST["passwordInput"];

        // PENDING TABLE | VERIFYING MOBILE NUMBER
        if (hospitalPhoneExistsPending($conn, $mobileNumberInput) !== false) {
            header("location: hospital-signup?error=mobile-number-is-already-used");
            exit();
        }

        // HOSPITAL TABLE | VERIFYING MOBILE NUMBER
        if (hospitalPhoneExistsApproved($conn, $mobileNumberInput) !== false) {
            header("location: hospital-signup?error=mobile-number-is-already-used");
            exit();
        }
        
        // PENDING TABLE | VERIFYING EMAIL 
        if (hospitalEmailExistsPending($conn, $EmailInput) !== false) {
            header("location: hospital-signup?error=email-is-already-used");
            exit();
        }

        // HOSPITAL TABLE | VERIFYING EMAIL 
        if (hospitalEmailExistsApproved($conn, $EmailInput) !== false) {
            header("location: hospital-signup?error=email-is-already-used");
            exit();
        }

        $sql = "INSERT INTO pendingadminsignup (pendingType, pendingName, pendingAddress, pendingRepresentativeName, pendingSupervisorName, pendingPhoneNumber, pendingDesignation, pendingEmail, pendingPassword)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";

        $stmt = mysqli_stmt_init($conn);
        $userMobileNumberExists = hospitalEmailExistsPending($conn, $mobileNumberInput);

        // $loginUser = loginUser($conn, $userMobileNumber, $userPassword);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Failed!";
            // header("location: ../user-signup.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "sssssssss", $hospitalType, $hospitalNameInput, $addressInput, $representativeNameInput, $supervisorNameInput, $mobileNumberInput, $positionInput, $EmailInput, $passwordInput);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $pendingLastID = mysqli_insert_id($conn);

        if (isset($_FILES['HospitalDocs'])) {
            $file_array = reArrayFiles($_FILES['HospitalDocs']);

            if ($sql) {
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
                            ?>
                            <?php echo "{$file_array[$i]['name']} - Invalid file extension!" ?>
                            <?php
                        }

                        else {
                            $img_dir = 'web/'.$file_array[$i]['name'];
        
                            move_uploaded_file($file_array[$i]['tmp_name'], $img_dir);
        
                            $insertImage = "INSERT IGNORE INTO hospitaldocuments (hospitalID, imageName, image_dir) VALUES ('$pendingLastID', '$name', '$img_dir')";
                            $conn->query($insertImage) or die($conn->error);
        
                            ?>
                            <?php
                                echo $file_array[$i]['name']. ' - '.$phpFileUploadErrors[$file_array[$i]['error']];
                                ?>
                            <?php
                        }
                    }
                }
            }
        }

        // Send email conformation
        require_once 'PHPMailer/hospital-signup-confirm.php';
        sendConfirmationEmail($conn, $hospitalNameInput, $EmailInput);
        header("location: hospital-request-sent.php?error=none");

    }

    else {
        header("location: hospital-signup.php");
        exit();
    }

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

    