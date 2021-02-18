<?php
    include "_include/dbconn.php";
    require '_include/SMS/vendor/autoload.php';
    require 'auth.php';
    //selects sender account
    include 'accounts.php';

    use AfricasTalking\SDK\AfricasTalking;

    if(isset($_POST['verifyotp'])) {
        $withdraw_otp =$_POST['withdraw_otp'];
        if($_COOKIE['withdraw_otp'] == $withdraw_otp) {
            $date= date('Y-m-d H:i:s');
            $w_amount=mysqli_real_escape_string($con,$_POST['amount']);
            $phone_no=mysqli_real_escape_string($con,$_POST['phone_no']);
            $s_amount = $accounts['account_bal'];
            $phone =$accounts['phone_no'];
            $s_accno=$accounts["account_no"];
            $s_branch = $accounts['branch_id'];
            $s_total=$s_amount - $w_amount; //sender's final balance.
            if($s_amount && $s_total <=200 )
            {
                echo '<script>alert("Your account balance is less than KES 200.\n\nYou must maintain a minimum balance of KES 200 in order to proceed with the transfer.");';
                echo 'window.location= "withdraw.php";</script>';
            }
            elseif($w_amount > $s_amount)
            {
                echo '<script>alert("You do not have enough balance in your account to transfer.");';
                echo 'window.location= "withdraw.php";</script>';
            }
            else
            {
                //sender's transcation details
               $sql4 = "UPDATE accounts SET account_bal = '$s_total' WHERE account_no = '$s_accno'";
                mysqli_query($con , $sql4) or die (mysqli_error($con));

                $sql1="INSERT INTO transcations values('','$date','WITHDRAWN TO $phone_no','0','$w_amount','$s_accno','$s_total','$s_branch')";
                mysqli_query($con , $sql1) or die( mysqli_error($con));
                echo '<script>alert("Withdrawal Successful.");';
                echo 'window.location= "accountsummary.php";</script>';

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
                    $message    = "[UNAITAS]\nYour withdrawal of KES.$w_amount to $phone_no was successful.";

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

        }
        else {
            $_SESSION['wrongwithdraw_otp'] = "PLEASE ENTER THE CORRECT OTP";
            header('location:otpwithdraw.php');
        }
    }
?>