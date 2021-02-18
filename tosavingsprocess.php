<?php
    require '_include/dbconn.php';
    require 'auth.php';
    //selects sender account
    include 'accounts.php';

    $t_amount=mysqli_real_escape_string($con,$_POST['amount']);
    $savings=mysqli_real_escape_string($con,$_POST['a_no']);

    //select receiver's account
    $query = "SELECT * FROM savings WHERE account_no = '$savings'";
    $results = mysqli_query($con, $query) or die (mysqli_error($con));
    $receiveraccount = mysqli_fetch_assoc ($results);
    $s_accno=$accounts["account_no"];
    $main=$receiveraccount['main_acc'];
    $s_amount = $accounts['account_bal'];
    $r_amount = $receiveraccount['account_bal'];
    $s_branch = $accounts['branch_id'];
    $r_branch = $receiveraccount['branch_id'];
    $date= date('Y-m-d H:i:s');


  if($s_amount <= 200 )
    {
        echo '<script>alert("Your account balance is less than KES 200.\n\nYou must maintain a minimum balance of Rs. 500 in order to proceed with the transfer.");';
        echo 'window.location= "tosavings.php";</script>';
    }
   elseif($s_accno !== $main){
         echo '<script>alert("You cannot transfer funds to another  savings account");';
        echo 'window.location= "tosavings.php";</script>';
    }
    elseif($t_amount > $s_amount)
    {
        echo '<script>alert("You do not have enough balance in your account to transfer.");';
        echo 'window.location= "tosavings.php";</script>';
    }

    else{
        $s_total = $s_amount - $t_amount; //sender's final balance.
        $r_total = $r_amount + $t_amount;

        $sql1="INSERT INTO transcations values('','$date','TO Savings Account',0.00,'$t_amount','$s_accno','$s_total','$s_branch')";
        mysqli_query($con , $sql1) or die( mysqli_error($con));

        //insert statement into sender ACCOUNT.
        $sql2="INSERT INTO savings_transcations values('','$date','FROM Main Account','$t_amount',0.00,'$r_total','$savings')";
        $query2=mysqli_query($con,$sql2)or die(mysqli_error($con));
        echo '<script>alert("Transfer Successful.");';
        echo 'window.location= "accountsummary.php";</script>';


       $sql4 = "UPDATE accounts SET account_bal = '$s_total' WHERE account_no = '$s_accno'";
        mysqli_query($con , $sql4) or die (mysqli_error($con));

        $sql5 = "UPDATE savings SET account_bal = '$r_total' WHERE account_no = '$savings'";
        mysqli_query($con , $sql5) or die (mysqli_error($con));
    }

?>