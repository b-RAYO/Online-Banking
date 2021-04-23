<?php

require "../../_include/dbconn.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../../_include/vendor/phpmailer/PHPMailer/src/Exception.php';
require '../../_include/vendor/phpmailer/PHPMailer/src/PHPMailer.php';
require '../../_include/vendor/phpmailer/PHPMailer/src/SMTP.php';
require '../../smtp_config.php';

date_default_timezone_set('Africa/Nairobi');

// Load Composer's autoloader
require '../../_include/vendor/autoload.php';

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
    $mail->SMTPDebug  = SMTP::DEBUG_SERVER;
    $token = bin2hex(random_bytes(50));


    //Recipients
    $mail->setFrom('brianjames@mylife.mku.ac.ke', 'UNAITAS');
    $email=$_SESSION['email'];
    $name=$_SESSION['name'];


    $mail->addAddress($email, $name);
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Account Status';
    $mail->Body    = '<p>This is to remind and inform you of the status your recent request to open an account with UNAITAS.</p>
    <p>Your request was APPROVED</p> <p>You can login at your own convenience</p>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
