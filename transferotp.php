<?php
    include ("_include/dbconn.php");
    require '_include/SMS/vendor/autoload.php';
    include "accounts.php";


    use AfricasTalking\SDK\AfricasTalking;

    $wrong_otp='';
    $a_no="";
    $amount="";
    if(isset($_SESSION["wrongtransfer_otp"])){
        $wrong_otp = $_SESSION["wrongtransfer_otp"];
        //echo "<p class='alert alert-danger' role='alert'>$wrong_otp</p>";
        }
    else{
    $a_no = mysqli_real_escape_string($con,$_POST['a_no']);
    $amount = mysqli_real_escape_string($con,$_POST['amount']);
    $_SESSION['a_nos']= $a_no;
    $_SESSION['amt']= $amount;

    $sql = "SELECT account_no,account_bal,min_bal,date_opened,branch_id,customers.*
            FROM accounts
            INNER JOIN customers
            ON accounts.customer_id = customers.customer_id
            WHERE accounts.account_no = $a_no";
    $result = mysqli_query($con, $sql) or die (mysqli_error($con));
    $receiver = mysqli_fetch_assoc ($result);
    $r_accstatus=$receiver['acc_status'];
    //echo "$r_accstatus";

    if($r_accstatus == "PENDING" || $r_accstatus == "DISABLED" ||  $r_accstatus == "CLOSED")
    {
        //echo "$r_accstatus";
        echo '<script>alert("You cannot transfer funds to this account. Please confirm with the receiver.");';
        echo 'window.location= "transferfunds1.php";</script>';
    }
    elseif($a_no == $_SESSION['account_no']){
        echo '<script>alert("You cannot transfer funds back to this account.");';
        echo 'window.location= "transferfunds1.php";</script>';
    }
    elseif(mysqli_num_rows ($result) < 1){
        echo '<script>alert("This account does not exist.");';
        echo 'window.location= "transferfunds1.php";</script>';
    }
    else{
    $customer_id = $_SESSION ['customer_id'];
    $sql1 = "SELECT * FROM customers WHERE customer_id = $customer_id";
    $result1 = mysqli_query($con, $sql1) or die (mysqli_error($con));
    $logged_in = mysqli_fetch_assoc ($result1);
    $phone =$logged_in['phone_no'];

    $transfer_otp = mt_rand(10000,99999);
    setcookie ("transfer_otp",$transfer_otp,time()+300);


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
        $message    = "[UNAITAS]\nYour OTP is $transfer_otp. Expires in 5 minutes";

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
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/jquery.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap-material-design.min.css">
        <script src="bootstrap/js/bootstrap-material-design.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="fontawesome\css\all.css">
        <script src="fontawesome\js\all.js"></script>
        <title>Document</title>
    </head>
    <body>
        <?php include "header.php"?>
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                <?php

                    echo "<p class='alert alert-danger' role='alert'>$wrong_otp</p>";

                ?>
                    <form class="form-container" action='transferotpverify.php' method='POST'>
                        <h3>Verify Phone Number</h3>
                            <p>Please enter the OTP sent to the phone number you provided</p>
                            <div class="form-group ">
                                <label for="otp" >Enter OTP</label>
                                <input type="number" class="form-control" name="transfer_otp" value="XXXXX" id="otp" required>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="a_no" value ="<?php echo $_SESSION['a_nos']?>" required >
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="amount" id ="pwd" value ="<?php echo $_SESSION['amt']?>" required>
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
			unset($_SESSION['wrongtransfer_otp']);
		?>
    </body>
</html>