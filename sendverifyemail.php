<?php
ob_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '_include/vendor/phpmailer/PHPMailer/src/Exception.php';
require '_include/vendor/phpmailer/PHPMailer/src/PHPMailer.php';
require '_include/vendor/phpmailer/PHPMailer/src/SMTP.php';
require 'smtp_config.php';


// Load Composer's autoloader
require '_include/vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings

    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = $smtphost;                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $smtpuser;                     // SMTP username
    $mail->Password   = $smtppass;                               // SMTP password
    $mail->SMTPSecure = 'tls';                         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;
    $mail->SMTPDebug  = SMTP::DEBUG_OFF;

    //Recipients
    $mail->setFrom('brianjames@mylife.mku.ac.ke', 'UNAITAS');
    $mail->addAddress($email, $name);     // Add a recipient




    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Email Verification';
    $mail->Body    = '<p>Thank you for signing up on our site. <br>
    Please click on the link below to verify your account:.</p>
    <p><a href="http://localhost/bank/verifyemail.php?token=' .$token. '">Verify Email!</a></p>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header("location:verifyemailsent.php");

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
ob_end_flush();
?>