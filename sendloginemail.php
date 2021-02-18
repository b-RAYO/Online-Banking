<?php
ob_start();
require "_include/dbconn.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '_include/vendor/phpmailer/PHPMailer/src/Exception.php';
require '_include/vendor/phpmailer/PHPMailer/src/PHPMailer.php';
require '_include/vendor/phpmailer/PHPMailer/src/SMTP.php';
require 'smtp_config.php';

date_default_timezone_set('Africa/Nairobi');

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
    $token = bin2hex(random_bytes(50));


    //Recipients
    $mail->setFrom('brianjames@mylife.mku.ac.ke', 'UNAITAS');
    $_SESSION['email']=$email= mysqli_real_escape_string($con, $_POST['email']);
    $password= md5($_POST['pwd1']);
    $sql2="SELECT * FROM customers WHERE email = '$email' AND password = '$password'";
    $result2=  mysqli_query($con , $sql2) or die( mysqli_error($con));
    $rws = mysqli_fetch_assoc($result2);
    $emailverified = $rws['emailverified'];
    $phoneverified = $rws['phoneverified'];
    $_SESSION['phone'] = $rws['phone_no'];
    $acc_status=$rws['acc_status'];
    $date = date('Y-m-d H:i:s', strtotime("+5 minutes"));
    if(mysqli_num_rows($result2) == 1){
        // Add a recipient
        $name=$rws['full_name'];
        $sql1="SELECT * FROM login_table WHERE email='$email' AND password='$password'";
        $result1=mysqli_query($con , $sql1) or die(mysqli_error($con));
        $login = mysqli_fetch_assoc ($result1);
        if($emailverified =='PENDING'){
            require ("loginnotverifiedemail.php");
        }
        elseif($phoneverified =='PENDING'){
            echo '<script>alert("Please verify your phone number.");';
            echo 'window.location= "resendverifyotp.php";</script>';
        }
        elseif($acc_status =='PENDING'){
            echo '<script>alert("Please visit the nearest branch for account activation.");';
            echo 'window.location= "login.php";</script>';
        }
        elseif($acc_status =='CLOSED' || $acc_status =='REJECTED' || $acc_status =='DISABLED' ){
            echo '<script>alert("Acoount has been closed or disabled.Please visit the nearest branch for asisstance.");';
            echo 'window.location= "login.php";</script>';
        }
        else {
            $mail->addAddress($email, $name);
            //$email=$_SESSION['email'];
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Login Attempt';
            $mail->Body    = '<p>There is an attempt to login to your account. <br> If it was you please <a href="http://localhost/bank/verifylogin.php?token=' .$token. '">Click Here</a> to access your account.</p>
            If it was not you change your password immediately. <br> <p>The link will expire in 5 minutes</p>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            $sql3="UPDATE login_table SET token = '$token', token_expires = '$date',used = 'NO' WHERE email = '$email'";
            $result3 =mysqli_query($con,$sql3) or die (mysqli_error($con));
            header("location:loginemailsent.php");
        }
    }
    else{
        $_SESSION['emailerror'] ="Invalid Details!!";
        header('location: login.php');
    }

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
ob_end_flush();
?>