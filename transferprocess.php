<?php
    require '_include/dbconn.php';
    require 'auth.php';
    //selects sender account
    include 'accounts.php';

    $t_amount=mysqli_real_escape_string($con,$_POST['amount']);
    $r_accno=mysqli_real_escape_string($con,$_POST['a_no']);

    //select receiver's account
    $query = "SELECT account_no,account_bal,min_bal,date_opened,branch_id,customers.*
    FROM accounts
    INNER JOIN customers
    ON accounts.customer_id = customers.customer_id
    WHERE accounts.account_no = '$r_accno'";
    $results = mysqli_query($con, $query) or die (mysqli_error($con));
    $receiveraccount = mysqli_fetch_assoc ($results);
    $r_name = $receiveraccount['full_name'];
    $s_accno=$accounts["account_no"];
    $s_name = $accounts['full_name'];
    $s_amount = $accounts['account_bal'];
    $r_amount = $receiveraccount['account_bal'];
    $r_accstatus=$receiveraccount['acc_status'];
    $s_branch = $accounts['branch_id'];
    $r_branch = $receiveraccount['branch_id'];
    $date= date('Y-m-d H:i:s');
    $s_total=$s_amount - $t_amount; //sender's final balance.
    $r_total=$r_amount + $t_amount;

  if($s_amount<=200 )
    {
        echo '<script>alert("Your account balance is less than KES 200.\n\nYou must maintain a minimum balance of Rs. 500 in order to proceed with the transfer.");';
        echo 'window.location= "transferfunds1.php";</script>';
    }
   elseif($r_accno == $s_accno){
        echo  $s_accno,$r_accno,'<script>alert("You cannot transfer funds back to this account");';
        echo 'window.location= "transferfunds1.php";</script>';
    }
    elseif($t_amount > $s_amount)
    {
        echo '<script>alert("You do not have enough balance in your account to transfer.");';
        echo 'window.location= "transferfunds1.php";</script>';
    }
    elseif($r_accstatus = "PENDING" || "DISABLED")
    {
        echo '<script>alert("You cannot transfer funds to this account. Please confirm with the receiver.");';
        echo 'window.location= "transferfunds1.php";</script>';
    }

    else{
        //sender's transcation details
        $sql1="INSERT INTO transcations values('','$date','TO $r_name','0','$t_amount','$s_accno','$s_total','$r_branch')";
        mysqli_query($con , $sql1) or die( mysqli_error($con));

        //insert statement into receiver ACCOUNT.
        $sql2="INSERT INTO transcations values('','$date','FROM $s_name','$t_amount','0','$r_accno','$r_total','$s_branch')";
        mysqli_query($con , $sql2) or die( mysqli_error($con));
        echo '<script>alert("Transfer Successful.");';
        echo 'window.location= "accountsummary.php";</script>';


       $sql4 = "UPDATE accounts SET account_bal = '$s_total' WHERE account_no = '$s_accno'";
        mysqli_query($con , $sql4) or die (mysqli_error($con));

        $sql5 = "UPDATE accounts SET account_bal = '$r_total' WHERE account_no = '$r_accno'";
        mysqli_query($con , $sql5) or die (mysqli_error($con));

    }

?>