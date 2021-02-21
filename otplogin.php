<?php
    include ("_include/dbconn.php");
    require '_include/SMS/vendor/autoload.php';
    use AfricasTalking\SDK\AfricasTalking;

    $email = $_SESSION["email"];
    $password = $_SESSION["password"];
    $sql1 = "SELECT * FROM customers WHERE email='$email'";
    $result1 = mysqli_query($con, $sql1) or die (mysqli_error($con));
    $logged_in = mysqli_fetch_assoc ($result1);
    $phone =$logged_in['phone_no'];

    $login_otp = mt_rand(10000,99999);
    setcookie ("login_otp",$login_otp,time()+300);


        // Set your app credentials
        $username   = "";
        $apiKey     = "";

        // Initialize the SDK
        $AT         = new AfricasTalking($username, $apiKey);

        // Get the SMS service
        $sms        = $AT->sms();

        // Set the numbers you want to send to in international format
        $recipients = "+254".$phone;

        // Set your message
        $message    = "[UNAITAS] \n Your OTP is $login_otp. Expires in 5 minutes";

        // Set your shortCode or senderId


        try {
            // Thats it, hit send and we'll take care of the rest
            $result = $sms->send([
                'to'      => $recipients,
                'message' => $message,

            ]);
            //print_r($result);
        } catch (Exception $e) {
            echo "Error: ".$e->getMessage();
        }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="js/jquery.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap-material-design.min.css">
        <script src="bootstrap/js/bootstrap-material-design.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="fontawesome\css\all.css">
        <script src="fontawesome\js\all.js"></script>
        <title>Verify OTP</title>
    </head>
    <body>
        <?php include "header.php";
        ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <form class="form-container" action='otpverifylogin.php' method='POST'>
                        <h3>Verify Phone Number</h3>
                            <p>Please enter the OTP sent your phone number</p>
                            <div class="form-group ">
                                <label for="otp" >Enter OTP</label>
                                <input type="number" class="form-control" name="login_otp" value="XXXXX" id="otp" required>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="email" value ="<?php echo $email?>" required >
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="pwd1" id ="pwd" value ="<?php echo $password?>" required>
                            </div>
                                <br>
                                <button type="submit" class="btn btn-success btn-block btn-raised" name="verifyotp">CONTINUE</button>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
        <?php include "footer.php"?>
    </body>
</html>
