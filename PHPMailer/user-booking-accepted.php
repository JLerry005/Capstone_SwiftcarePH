<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    function sendEmailConfirmation($conn, $reservationCode, $userID, $listingID, $firstname, $lastname, $date, $time, $contactNumber, $emailAdd, $patientConcern, $severity, $specifyConcern, $hospitalName, $reservationType, $timeStamp){
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
            $mail->addAddress($emailAdd);     //Add a recipient

            $bodyMessage = '
              <!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
              <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
              
              <head>
                <!--[if gte mso 9]>
              <xml>
                <o:OfficeDocumentSettings>
                  <o:AllowPNG/>
                  <o:PixelsPerInch>96</o:PixelsPerInch>
                </o:OfficeDocumentSettings>
              </xml>
              <![endif]-->
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="x-apple-disable-message-reformatting">
                <!--[if !mso]><!-->
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <!--<![endif]-->
                <title></title>
              
                <style type="text/css">
                  @media only screen and (min-width: 520px) {
                    .u-row {
                      width: 500px !important;
                    }
                    .u-row .u-col {
                      vertical-align: top;
                    }
                    .u-row .u-col-100 {
                      width: 500px !important;
                    }
                  }
                  
                  @media (max-width: 520px) {
                    .u-row-container {
                      max-width: 100% !important;
                      padding-left: 0px !important;
                      padding-right: 0px !important;
                    }
                    .u-row .u-col {
                      min-width: 320px !important;
                      max-width: 100% !important;
                      display: block !important;
                    }
                    .u-row {
                      width: calc(100% - 40px) !important;
                    }
                    .u-col {
                      width: 100% !important;
                    }
                    .u-col>div {
                      margin: 0 auto;
                    }
                  }
                  
                  body {
                    margin: 0;
                    padding: 0;
                  }
                  
                  table,
                  tr,
                  td {
                    vertical-align: top;
                    border-collapse: collapse;
                  }
                  
                  p {
                    margin: 0;
                  }
                  
                  .ie-container table,
                  .mso-container table {
                    table-layout: fixed;
                  }
                  
                  * {
                    line-height: inherit;
                  }
                  
                  a[x-apple-data-detectors=\'true\'] {
                    color: inherit !important;
                    text-decoration: none !important;
                  }
                  
                  table,
                  td {
                    color: #ced4d9;
                  }
                  
                  a {
                    color: #0000ee;
                    text-decoration: underline;
                  }
                  
                  @media (max-width: 480px) {
                    #u_content_text_9 .v-line-height {
                      line-height: 100% !important;
                    }
                  }
                </style>
              
              
              
                <!--[if !mso]><!-->
                <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" type="text/css">
                <!--<![endif]-->
              
              </head>
              
              <body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #111827;color: #ced4d9">
                <!--[if IE]><div class="ie-container"><![endif]-->
                <!--[if mso]><div class="mso-container"><![endif]-->
                <table style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #111827;width:100%" cellpadding="0" cellspacing="0">
                  <tbody>
                    <tr style="vertical-align: top">
                      <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color: #111827;"><![endif]-->
              
              
                        <div class="u-row-container" style="padding: 0px;background-color: transparent">
                          <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
              
                              <!--[if (mso)|(IE)]><td align="center" width="500" style="width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                              <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                                <div style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                  <!--[if (!mso)&(!IE)]><!-->
                                  <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                    <!--<![endif]-->
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:14px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #111827;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                              <tbody>
                                                <tr style="vertical-align: top">
                                                  <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                    <span>&#160;</span>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                              <tr>
                                                <td style="padding-right: 0px;padding-left: 0px;" align="center">
              
                                                  <img align="center" border="0" src="https://images.unlayer.com/projects/74921/1650087372050-508037.png" alt="" title="" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 23%;max-width: 110.4px;"
                                                    width="110.4" />
              
                                                </td>
                                              </tr>
                                            </table>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <!--[if (!mso)&(!IE)]><!-->
                                  </div>
                                  <!--<![endif]-->
                                </div>
                              </div>
                              <!--[if (mso)|(IE)]></td><![endif]-->
                              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                          </div>
                        </div>
              
              
              
                        <div class="u-row-container" style="padding: 0px;background-color: transparent">
                          <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
              
                              <!--[if (mso)|(IE)]><td align="center" width="500" style="width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                              <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                                <div style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                  <!--[if (!mso)&(!IE)]><!-->
                                  <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                    <!--<![endif]-->
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:12px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <div class="v-line-height" style="color: #ecf0f1; line-height: 140%; text-align: center; word-wrap: break-word;">
                                              <p style="font-size: 14px; line-height: 140%;"><span style="font-size: 26px; line-height: 36.4px;"><strong>SWIFTCARE PH</strong></span></p>
                                            </div>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:11px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #111827;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                              <tbody>
                                                <tr style="vertical-align: top">
                                                  <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                    <span>&#160;</span>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <!--[if (!mso)&(!IE)]><!-->
                                  </div>
                                  <!--<![endif]-->
                                </div>
                              </div>
                              <!--[if (mso)|(IE)]></td><![endif]-->
                              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                          </div>
                        </div>
              
              
              
                        <div class="u-row-container" style="padding: 0px;background-color: transparent">
                          <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
              
                              <!--[if (mso)|(IE)]><td align="center" width="500" style="width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                              <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                                <div style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                  <!--[if (!mso)&(!IE)]><!-->
                                  <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                    <!--<![endif]-->
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <div class="v-line-height" style="color: #3598db; line-height: 140%; text-align: left; word-wrap: break-word;">
                                              <p style="font-size: 14px; line-height: 140%; text-align: center;"><span style="font-size: 22px; line-height: 30.8px;">Your Reservation has been Accepted!</span></p>
                                            </div>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:11px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #111827;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                              <tbody>
                                                <tr style="vertical-align: top">
                                                  <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                    <span>&#160;</span>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <div class="v-line-height" style="color: #3598db; line-height: 140%; text-align: left; word-wrap: break-word;">
                                              <p style="font-size: 14px; line-height: 140%; text-align: center;"><span style="font-size: 14px; line-height: 19.6px;">Registration Code:</span></p>
                                            </div>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table id="u_content_text_9" style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <div class="v-line-height" style="color: #3598db; line-height: 140%; text-align: left; word-wrap: break-word;">
                                              <p style="font-size: 14px; line-height: 140%; text-align: center;"><span style="font-size: 24px; line-height: 33.6px;"><strong><span style="line-height: 33.6px; background-color: #226fa0; color: #cfd5d9; font-size: 24px;">&nbsp; '.$reservationCode.'&nbsp; </span></strong>
                                                </span>
                                              </p>
                                            </div>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:11px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #111827;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                              <tbody>
                                                <tr style="vertical-align: top">
                                                  <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                    <span>&#160;</span>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:11px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px dashed #7e8c8d;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                              <tbody>
                                                <tr style="vertical-align: top">
                                                  <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                    <span>&#160;</span>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:11px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #111827;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                              <tbody>
                                                <tr style="vertical-align: top">
                                                  <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                    <span>&#160;</span>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <!--[if (!mso)&(!IE)]><!-->
                                  </div>
                                  <!--<![endif]-->
                                </div>
                              </div>
                              <!--[if (mso)|(IE)]></td><![endif]-->
                              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                          </div>
                        </div>
              
              
              
                        <div class="u-row-container" style="padding: 0px;background-color: transparent">
                          <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
              
                              <!--[if (mso)|(IE)]><td align="center" width="500" style="width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                              <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                                <div style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                  <!--[if (!mso)&(!IE)]><!-->
                                  <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                    <!--<![endif]-->
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <h3 class="v-line-height" style="margin: 0px; line-height: 140%; text-align: left; word-wrap: break-word; font-weight: normal; font-family: arial,helvetica,sans-serif; font-size: 18px;">
                                              <strong>PATIENT DETAILS</strong>
                                            </h3>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <!--[if (!mso)&(!IE)]><!-->
                                  </div>
                                  <!--<![endif]-->
                                </div>
                              </div>
                              <!--[if (mso)|(IE)]></td><![endif]-->
                              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                          </div>
                        </div>
              
              
              
                        <div class="u-row-container" style="padding: 0px;background-color: transparent">
                          <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
              
                              <!--[if (mso)|(IE)]><td align="center" width="500" style="width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                              <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                                <div style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                  <!--[if (!mso)&(!IE)]><!-->
                                  <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                    <!--<![endif]-->
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <div class="v-line-height" style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                              <p style="font-size: 14px; line-height: 140%;"><span style="color: #cfd5d9; font-size: 14px; line-height: 19.6px;">Full Name: <strong><span style="color: #3498da; font-size: 14px; line-height: 19.6px;">'.$firstname.' '.$lastname.'</span></strong>
                                                </span>
                                              </p>
                                            </div>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <div class="v-line-height" style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                              <p style="font-size: 14px; line-height: 140%;"><span style="color: #cfd5d9; font-size: 14px; line-height: 19.6px;">Contact Number: <strong><span style="color: #3498da; font-size: 14px; line-height: 19.6px;">'.$contactNumber.'</span></strong>
                                                </span>
                                              </p>
                                            </div>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <div class="v-line-height" style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                              <p style="font-size: 14px; line-height: 140%;"><span style="color: #cfd5d9; font-size: 14px; line-height: 19.6px;">Email Address: <strong><span style="color: #3498da; font-size: 14px; line-height: 19.6px;"><a rel="noopener" href="'.$emailAdd.'" target="_blank" style="color: #3498da;"><span style="font-size: 14px; line-height: 19.6px;">'.$emailAdd.'</span></a>
                                                </span>
                                                </strong>
                                                </span>
                                              </p>
                                            </div>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:11px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #111827;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                              <tbody>
                                                <tr style="vertical-align: top">
                                                  <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                    <span>&#160;</span>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <h3 class="v-line-height" style="margin: 0px; line-height: 140%; text-align: left; word-wrap: break-word; font-weight: normal; font-family: arial,helvetica,sans-serif; font-size: 18px;">
                                              <strong>HOSPITAL DETAILS</strong>
                                            </h3>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <div class="v-line-height" style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                              <p style="font-size: 14px; line-height: 140%;"><span style="color: #cfd5d9; font-size: 14px; line-height: 19.6px;">Hospital Name: <strong><span style="color: #3498da; font-size: 14px; line-height: 19.6px;">'.$hospitalName.'</span></strong>
                                                </span>
                                              </p>
                                            </div>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <div class="v-line-height" style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                              <p style="font-size: 14px; line-height: 140%;"><span style="color: #cfd5d9; font-size: 14px; line-height: 19.6px;">Reservation Type: <strong><span style="color: #3498da; font-size: 14px; line-height: 19.6px;">'.$reservationType.'</span></strong>
                                                </span>
                                              </p>
                                            </div>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <div class="v-line-height" style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                              <p style="font-size: 14px; line-height: 140%;"><span style="color: #cfd5d9; font-size: 14px; line-height: 19.6px;">Concern: <strong><span style="color: #3498da; font-size: 14px; line-height: 19.6px;">'.$patientConcern.' - '.$severity.'</span></strong>
                                                </span>
                                              </p>
                                            </div>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:11px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #111827;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                              <tbody>
                                                <tr style="vertical-align: top">
                                                  <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                    <span>&#160;</span>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <h3 class="v-line-height" style="margin: 0px; line-height: 140%; text-align: left; word-wrap: break-word; font-weight: normal; font-family: arial,helvetica,sans-serif; font-size: 18px;">
                                              <strong>BOOKING SCHEDULED</strong>
                                            </h3>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <div class="v-line-height" style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                              <p style="font-size: 14px; line-height: 140%;"><span style="color: #cfd5d9; font-size: 14px; line-height: 19.6px;">Date: <strong><span style="color: #3498da; font-size: 14px; line-height: 19.6px;">'.$date.'</span></strong>
                                                </span>
                                              </p>
                                            </div>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <div class="v-line-height" style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                              <p style="font-size: 14px; line-height: 140%;"><span style="color: #cfd5d9; font-size: 14px; line-height: 19.6px;">Time: <strong><span style="color: #3498da; font-size: 14px; line-height: 19.6px;">'.$time.'</span></strong>
                                                </span>
                                              </p>
                                            </div>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:11px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #111827;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                              <tbody>
                                                <tr style="vertical-align: top">
                                                  <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                    <span>&#160;</span>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <!--[if (!mso)&(!IE)]><!-->
                                  </div>
                                  <!--<![endif]-->
                                </div>
                              </div>
                              <!--[if (mso)|(IE)]></td><![endif]-->
                              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                          </div>
                        </div>
              
              
              
                        <div class="u-row-container" style="padding: 0px;background-color: transparent">
                          <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;">
                            <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                              <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding: 0px;background-color: transparent;" align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px;"><tr style="background-color: transparent;"><![endif]-->
              
                              <!--[if (mso)|(IE)]><td align="center" width="500" style="width: 500px;padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;" valign="top"><![endif]-->
                              <div class="u-col u-col-100" style="max-width: 320px;min-width: 500px;display: table-cell;vertical-align: top;">
                                <div style="width: 100% !important;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                  <!--[if (!mso)&(!IE)]><!-->
                                  <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;border-radius: 0px;-webkit-border-radius: 0px; -moz-border-radius: 0px;">
                                    <!--<![endif]-->
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:11px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px dashed #7e8c8d;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                              <tbody>
                                                <tr style="vertical-align: top">
                                                  <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                    <span>&#160;</span>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:11px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #111827;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                              <tbody>
                                                <tr style="vertical-align: top">
                                                  <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                    <span>&#160;</span>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <div class="v-line-height" style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                              <p style="font-size: 14px; line-height: 140%;">This is to confirm that your reservation at <strong>'.$hospitalName.'</strong> has been successfully accepted. You can show the <strong>Reservation Code</strong> above to corresponding personnel at the hospital
                                                once you arrive to confirm your reservation.</p>
                                              <p style="font-size: 14px; line-height: 140%;">&nbsp;</p>
                                              <p style="font-size: 14px; line-height: 140%;">We recommend writing down the <strong>Registration Code.</strong> You can also view the registration code together with your full reservation detail from your dashboard on the website.</p>
                                            </div>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:19px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #111827;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                              <tbody>
                                                <tr style="vertical-align: top">
                                                  <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                    <span>&#160;</span>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\,sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <div class="v-line-height" style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                              <p style="font-size: 14px; line-height: 140%; text-align: right;">Thank you so much!</p>
                                            </div>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <div class="v-line-height" style="line-height: 140%; text-align: left; word-wrap: break-word;">
                                              <p style="font-size: 14px; line-height: 140%; text-align: right;">Best Regards,</p>
                                              <p style="font-size: 14px; line-height: 140%; text-align: right;"><strong>Swiftcare PH Team</strong></p>
                                            </div>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <table style="font-family:\'Open Sans\',sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                      <tbody>
                                        <tr>
                                          <td style="overflow-wrap:break-word;word-break:break-word;padding:26px;font-family:\'Open Sans\',sans-serif;" align="left">
              
                                            <table height="0px" align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #111827;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                              <tbody>
                                                <tr style="vertical-align: top">
                                                  <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%">
                                                    <span>&#160;</span>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
              
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
              
                                    <!--[if (!mso)&(!IE)]><!-->
                                  </div>
                                  <!--<![endif]-->
                                </div>
                              </div>
                              <!--[if (mso)|(IE)]></td><![endif]-->
                              <!--[if (mso)|(IE)]></tr></table></td></tr></table><![endif]-->
                            </div>
                          </div>
                        </div>
              
              
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                      </td>
                    </tr>
                  </tbody>
                </table>
                <!--[if mso]></div><![endif]-->
                <!--[if IE]></div><![endif]-->
              </body>
              
              </html>
            
            ';

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Reservation Confirmed! at '.$hospitalName.'';
            $mail->Body    = $bodyMessage;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();

            // echo 'We sent you a new Code.';
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    

    
        

    