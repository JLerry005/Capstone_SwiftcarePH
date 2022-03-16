<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';
    require_once '../includes/dbh-inc.php';

    session_start();
    // $firstname = $_POST['userFirstname'];
    // $lastname = $_POST['userLastname'];
    // $password = $_POST['userPassword'];
    // $mobileNumber = $_POST['userMobileNumber'];
    
    $tempUserID = $_SESSION["tempUserID"];
    $email = $_SESSION["sessionEmail"];
    
    $newOTP = rand(100000,999999);

    $insertNewOTP = "UPDATE otpstorage SET otp = '$newOTP' WHERE emailID = $tempUserID";
    $runInsert = mysqli_query($conn, $insertNewOTP);

    $signupID = mysqli_insert_id($conn);

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'swiftcareph@gmail.com';                     //SMTP username
        $mail->Password   = 'Rm7GQA#>C9Uq\NZ]';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('swiftcareph@gmail.com', 'SwiftcarePH');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'New OTP. Hello '.$firstname.'!';
        $mail->Body    = '<h3 class="text-xl text-blue-700">You have requested for a new OTP Code. Here is your new Code: </h3> <b class="font-bold text-xl" style="background-color: black; padding: 10px;"><h1><center>'.$newOTP.'<center></h1></b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        echo 'We sent you a new Code.';
        
        // $_SESSION["signupID"] = $signupID;
        // $_SESSION["userFirstname"] = $firstname;
        // $_SESSION["userLastname"] = $lastname;
        // $_SESSION["userPassword"] = $password;
        // $_SESSION["userMobile"] = $mobileNumber;
        // $_SESSION["sessionEmail"] = $email;

        header ('location: ../verify-otp.php?success=email-is-already-used');

            

            // $sessionID = $requestID;
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
        
    