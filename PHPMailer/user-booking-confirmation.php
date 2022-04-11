<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';
    // require_once 'includes/dbh-inc.php';
    // require_once 'includes/functions-inc.php';
    
    // $firstName = $_POST["firstName"];
    // $lastName = $_POST["lastName"];
    // $hospitalName = $_POST["hospitalName"];
    // $reservationType = $_POST["reservationType"];
    // $email = $_POST["email"];

    function sendEmailConfirmation($conn, $firstName, $lastName, $hospitalName, $reservationType, $email){
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

                    <p style='font-size: 18px;'><b>Thank you for Booking a reservation!</b></p><br>

                    <div style='display: flex; flex-flow: row;'>
                        <div style='margin: 4px 20px;'>
                            <p>Full Name</p>
                            <div style='display: flex; flex-flow: row;'>
                                <p style='margin: 4px 10px 0 0;'><b>$firstName</b></p>
                                <p style='margin: 4px 0;'><b>$lastName</b></p>
                            </div>
                        </div>

                        <div style='margin: 4px 20px;'>
                            <p>Hospital:</p>
                            <p><b>$hospitalName</b></p>
                        </div>
                    </div>

                    <div style='display: flex; flex-flow: row;'>
                        <div style='margin: 4px 20px;'>
                            <p>Reservation Type:</p>
                            <p><b>$reservationType</b></p>
                        </div>

                        <div style='margin: 4px 20px;'>
                            <p>Hospital Contact Info:</p>
                            <p><b> email@email.com </b></p>
                            <p><b> 09123456677 </b></p>
                        </div>
                    </div>
                    
                    
                    <p style='font-size: 15px;'>
                        This is to confirm that your reservation booking at $hospitalName
                        is now being reviewed. <b> The reviewing process may take from 3 Hours - 24 Hours. </b>
                        A confirmation message will be sent to this same address once the reviewing process is done.
                        
                    </p><br>
                    <p>Thank you so much!</p>
                    <p>From Swiftcare PH Team</p>
                    <br>
                </div>
            ";

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Booking Confiramtion '.$$hospitalName.'';
            $mail->Body    = $bodyMessage;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();

            // echo 'We sent you a new Code.';
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    

    
        

    