<?php
    include ("_include/dbconn.php");
    require '_include/SMS/vendor/autoload.php';
    include "accounts.php";

    use AfricasTalking\SDK\AfricasTalking;

     $wrongwithdraw_otp="";
    $phone= $_SESSION['p_nos'];
    if(isset($_SESSION["wrongwithdraw_otp"])){
        $wrongwithdraw_otp=$_SESSION['wrongwithdraw_otp'];
        }
        else{
        $_SESSION['amounts']=mysqli_real_escape_string($con,$_POST['amount']);
        $_SESSION['p_nos']=mysqli_real_escape_string($con,$_POST['phone']);
        $amount= $_SESSION['amounts'];
    $customer_id = $_SESSION ['customer_id'];
    $sql1 = "SELECT * FROM customers WHERE customer_id = $customer_id";
    $result1 = mysqli_query($con, $sql1) or die (mysqli_error($con));
    $logged_in = mysqli_fetch_assoc ($result1);
    $phone =$logged_in['phone_no'];

    $withdraw_otp = mt_rand(10000,99999);
    setcookie ("withdraw_otp",$withdraw_otp,time()+300);


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
        $message    = "[UNAITAS]\nYour OTP is $withdraw_otp, to verify the withdrawal of KES.$amount Expires in 5 minutes";

        // Set your shortCode or senderId


        try {
            // Thats it, hit send and we'll take care of the rest
            $result = $sms->send([
                'to'      => $recipients,
                'message' => $message,

            ]);

        } catch (Exception $e) {
            echo "Error: ".$e->getMessage();
        }
        }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="js/jquery.js"></script>
        <script src="js/popper.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap-material-design.min.css">
        <script src="bootstrap/js/bootstrap-material-design.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="fontawesome\css\all.css">
        <script src="fontawesome\js\all.js"></script>
        <title>Withdrawals</title>
    </head>
    <body>
        <?php include "customerheader.php"?>
        <div class="container mb-5">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <form class="form-container" action='withdrawprocess.php' method='POST'>
                        <?php

                            echo "<p class='text-danger'>$wrongwithdraw_otp</p>";

                            $amount= $_SESSION['amounts'];
                        ?>
                        <h3>Verify Withdrawal of KES.<?php echo $amount?></h3>
                            <p>Please enter the OTP sent to the phone number you provided</p>
                            <div class="form-group ">
                                <label for="otp" >Enter OTP</label>
                                <input type="number" class="form-control" name="withdraw_otp" value="XXXXX" id="otp" required>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="phone_no" value ="<?php echo $phone?>" required >
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="amount" id ="pwd" value ="<?php echo $amount?>" required>
                            </div>
                                <br>
                                <button type="submit" class="btn btn-success btn-block btn-raised" name="verifyotp">VERIFY</button>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
        <?php
			include "footer.php";
			unset($_SESSION['wrongwithdraw_otp']);

		?>
    </body>
</html>