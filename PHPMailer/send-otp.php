<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';
    require_once '../includes/dbh-inc.php';
    require_once '../includes/functions-inc.php';

    if (isset($_POST['submit'])) {
        $firstname = $_POST['userFirstname'];
        $lastname = $_POST['userLastname'];
        $password = $_POST['userPassword'];
        $mobileNumber = $_POST['userMobileNumber'];
        $email = $_POST['user-email'];
        $otp = rand(100000,999999);

        if (userMobileNumberExists($conn, $mobileNumber) !== false) {
            header("location: ../user-signup?error=mobile-number-is-already-used");
            exit();
        }

        elseif (userEmailExists($conn, $email)) {
            header("location: ../user-signup?error=email-is-already-used");
            exit();
        }
        

        else {
            $sql = "INSERT INTO userpatienttemp (tempFirstname, tempLastname, tempUserEmail, tempUserpassword, tempUserPhoneNumber) VALUES(?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("location: ../user-signup.php?error=stmtfailed");
                exit();
            }

            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $email, $hashedPwd, $mobileNumber);
            mysqli_stmt_execute($stmt);

            $tempUserID = mysqli_insert_id($conn);

            if ($sql) {
                $insert = "INSERT INTO otpstorage(emailID, otp) VALUES ('$tempUserID', '$otp')";
                $runInsert = mysqli_query($conn, $insert);

                $signupID = mysqli_insert_id($conn);
            }

            mysqli_stmt_close($stmt);

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
                $mail->Subject = 'One Time Password. Hello '.$firstname.'!';
                $mail->Body    = '<h3 class="text-xl text-blue-700">You have requested for a unique OTP. Here is your Code: </h3> <b class="font-bold text-xl" style="background-color: black; padding: 10px;"><h1><center>'.$otp.'<center></h1></b>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();

                echo 'We sent you a new Code.';
                session_start();
                $_SESSION["signupID"] = $signupID;
                $_SESSION["userFirstname"] = $firstname;
                $_SESSION["userLastname"] = $lastname;
                $_SESSION["userPassword"] = $password;
                $_SESSION["userMobile"] = $mobileNumber;
                $_SESSION["sessionEmail"] = $email;
                $_SESSION["tempUserID"] = $tempUserID;

                header ('location: ../verify-otp.php');

                

                // $sessionID = $requestID;
                
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
        
    }
    