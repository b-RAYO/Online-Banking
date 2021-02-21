<?php
ob_start();
    include ("_include/dbconn.php");

    require '_include/SMS/vendor/autoload.php';
    use AfricasTalking\SDK\AfricasTalking;

	$phone = $_POST["phone"];

	$query2 = "SELECT * FROM customers WHERE phone_no = $phone";
	$result = mysqli_query($con, $query2);
    $rws2 = mysqli_fetch_assoc($result);

	if (mysqli_num_rows($result) == 0){
        $_SESSION['number_error'] = "Please Enter correct Phone Number";

		header("location:forgetpwdrequest.php");
    }
else{
    if(!isset($_SESSION["otp_error"])){
        $otp_error = "";
        $name =$_POST['fullname'];
        $forgot_otp = mt_rand(10000,99999);
        setcookie ("forgot_otp",$forgot_otp,time()+300);


            // Set your app credentials
            $username   = "brayo";
            $apiKey     = "";

            // Initialize the SDK
            $AT         = new AfricasTalking($username, $apiKey);

            // Get the SMS service
            $sms        = $AT->sms();

            // Set the numbers you want to send to in international format
            $recipients = "+254".$phone;

            // Set your message
            $message    = "[UNAITAS]<br>Your OTP is $forgot_otp. Expires in 5 minutes";

            // Set your shortCode or senderId


            try {
                // Thats it, hit send and we'll take care of the rest
                $result = $sms->send([
                    'to'      => $recipients,
                    'message' => $message,

                ]);
                    //print_r($result);
                    $encoded = json_encode($result);
                    $decoded = json_decode($encoded,true);
                    $statusCode = $decoded['data']['SMSMessageData']['Recipients']['0']['statusCode'];
                    if($statusCode == 403){
                        $no_error = "INVALID PHONE NUMBER!!";
                    }
                    elseif($statusCode == 101){
                        $otp_success = "SUCCESS.A One-Time-Pin has been sent to your number.";
                    }
                    else{
                        $send_error = "Please try again!!";
                    }
            } catch (Exception $e) {
                $send_error = "Please try again!!";
            }
    }
    else{
        $otp_error = $_SESSION["otp_error"];
        $name ="";
        $accno ="";
        $email ="";
        $phone ="";
        $otp_success = "";
        $noerror = "";
        $send_error ="";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/jquery.js"></script>
        <script src="js/popper.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap-material-design.min.css">
        <script src="bootstrap/js/bootstrap-material-design.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="fontawesome\css\all.css">
        <script src="fontawesome\js\all.js"></script>
        <title>Forgot Password</title>
    </head>
    <body>
        <?php include "header.php";?>
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <?php
                        if(isset($_SESSION["otp_error"])){
                        echo "<p class='alert alert-danger' role='alert'>$otp_error</p>";
                        }
                        elseif(isset($otp_success)){
                            echo "<p class='alert alert-success' role='alert'>$otp_success</p>";
                        }
                        elseif (isset($send_error)) {
                            echo "<p class='text-danger'>$send_error</p>";
                        }
                        elseif (isset($no_error)) {
                            echo "<p class='text-danger'>$no_error</p>";
                        }
                    ?>
                    <form class="form-container" action='verifyforgetotp.php' method='POST'>
                        <h4 class="text-danger">VERIFY IT'S YOU</h4>
                            <p>Please enter the OTP.</p>
                            <div class="form-group ">
                                <label for="otp" >Enter OTP</label>
                                <input type="number" class="form-control" name="forgot_otp" value="XXXXX" id="otp" required>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="fullname" value="<?php echo $name?>"required >
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="phone" value="<?php echo $phone?>" required >
                            </div>
                                <br>
                                <button type="submit" class="btn btn-success btn-block btn-raised" name="submitBtn">SUBMIT</button>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
        <?php include "footer.php";
            unset($_SESSION['otp_error']);
            ob_end_flush();
        ?>
    </body>
</html>
