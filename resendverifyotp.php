<?php
    include ("_include/dbconn.php");
    require '_include/SMS/vendor/autoload.php';
    use AfricasTalking\SDK\AfricasTalking;

    $phone = $_SESSION['phone'];
    $otp = mt_rand(10000,99999);
    setcookie ("otp",$otp,time()+300);

    /*$sql = "SELECT * FROM customers WHERE phone_no = '$phone'";
    $result = mysqli_query($con, $sql);
    $rws = mysqli_fetch_assoc($result);*/

    // Set your app credentials
    $username   = "brayo";
    $apiKey     = "c2dccb37be43956089ed18f7de82db2ec40f2ed9f661f1a97c69859ddbeaf7e9";

    // Initialize the SDK
    $AT         = new AfricasTalking($username, $apiKey);

    // Get the SMS service
    $sms        = $AT->sms();

    // Set the numbers you want to send to in international format
    $recipients = "+254".$phone;

    // Set your message
    $message    = "[UNAITAS] \n Your OTP is $otp. Expires in 5 minutes";

    // Set your shortCode or senderId


    try {
        // Thats it, hit send and we'll take care of the rest
        $result = $sms->send([
            'to'      => $recipients,
            'message' => $message,

        ]);
        $encoded = json_encode($result);
        $decoded = json_decode($encoded,true);
        $statusCode = $decoded['data']['SMSMessageData']['Recipients']['0']['statusCode'];
        if($statusCode == 403){
            $no_error = "INVALID PHONE NUMBER!!";
        }
        elseif($statusCode == 101){
            $otp_success = "SUCCESS.A One-Time-Pin has been sent to your registered number.";
        }
        else{
            $send_error = "PLEASE TRY AGAIN!!";
        }
    } catch (Exception $e) {
        $msg_error = "PLEASE TRY AGAIN!!";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OTP sent</title>
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap-material-design.min.css">
    <script src="bootstrap/js/bootstrap-material-design.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome\css\all.css">
    <script src="fontawesome\js\all.js"></script>
</head>
<body>
    <?php include "header.php"?>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <?php
                    if(isset($otp_success)){
                    echo "<p class='alert alert-success' role='alert'>$otp_success</p>";
                }
                ?>
                <form action="verifyresendotp.php" method="POST" class="form-container">
                    <legend class="w-auto text-primary">
						Verify Phone Number
                    </legend>
                    <div class="form-group w-50">
                        <label for="otp" >Enter OTP</label>
                        <input type="number" class="form-control" name="otp" value="XXXXX" id="otp" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="verifyotp" class="btn btn-success btn-raised">Verify</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
    <?php
        include "footer.php";
        //unset($_SESSION['wrong_otp']);
    ?>
</body>
</html>