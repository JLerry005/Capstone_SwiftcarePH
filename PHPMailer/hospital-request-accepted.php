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
    

    function sendConfirmationEmail($conn, $representative, $email){
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

            $bodyMessage = "
                <div style='border: 1px solid gray; border-radius: 20px; padding: 10px;'>
                    <h1 style='color: green; font-size: 38px;'><center>SWIFTCARE PH</center></h1><br>

                    <p style='font-size: 18px;'><b>Account Verified</b></p><br>
                    
                    <p style='font-size: 15px;'>Good day, $representative <br>
                    Your request to signup for a Hospital account has been confirmed. You may now Login with the account you created through this link: swiftcare.ph/hospital-login
                    </p><br>
                    <p>Thank you so much!</p>
                    <p>From Swiftcare PH Team</p>
                    <br>
                </div>
            ";

            //Content
            $mail->isHTML(true);
            
            //Set email format to HTML
            $mail->Subject = 'Update with your request, '.$representative.'!';
            $mail->Body    = $bodyMessage;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();

            echo 'We sent you a new Code.';
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    
        

    