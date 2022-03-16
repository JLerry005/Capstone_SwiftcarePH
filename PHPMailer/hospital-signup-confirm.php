<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';
    require_once 'includes/dbh-inc.php';
    require_once 'includes/functions-inc.php';
    

    function sendConfirmationEmail($conn, $hospitalNameInput, $EmailInput){
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
            $mail->addAddress($EmailInput);     //Add a recipient

            $bodyMessage = "
                <div style='border: 1px solid gray; border-radius: 20px; padding: 10px;'>
                    <h1 style='color: green; font-size: 38px;'><center>SWIFTCARE PH</center></h1><br>

                    <p style='font-size: 18px;'><b>Thank you for signing up $hospitalNameInput!</b></p><br>
                    
                    <p style='font-size: 15px;'>Good Day! We've received your request for a Hospital account at swiftcare.ph. Please allow
                        up to 24 hours for us to process and verify your request. An Email from this same address will be sent to you once
                        your request has been verified and approved. Until then, please be patient and take care!!
                    </p><br>
                    <p>Thank you so much!</p>
                    <p>From Swiftcare PH Team</p>
                    <br>
                </div>
            ";

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Thank you for Signing Up! '.$hospitalNameInput.'!';
            $mail->Body    = $bodyMessage;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();

            echo 'We sent you a new Code.';
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    
        

    