<?php
    require '_include/dbconn.php';
    require 'auth.php';
    //selects sender account
    include 'savingsprocess.php';

    $t_amount=mysqli_real_escape_string($con,$_POST['amount']);
     $accno=mysqli_real_escape_string($con,$_POST['a_no']);

    //select receiver's account
    $query = "SELECT * FROM accounts WHERE account_no = '$accno'";
    $results = mysqli_query($con, $query) or die (mysqli_error($con));
    $acc = mysqli_fetch_assoc ($results);
    $s_accno=$savings["account_no"];
    $s_amount = $savings['account_bal'];
    $r_amount = $acc['account_bal'];
    $s_branch = $savings['branch_id'];
    $r_branch = $acc['branch_id'];
    $date= date('Y-m-d H:i:s');
    $s_total=$s_amount - $t_amount; //sender's final balance.
    $r_total=$r_amount + $t_amount;

    if($accno == $s_accno){
         echo  '<script>alert("You cannot transfer funds to this account");';
        echo 'window.location= "tomain.php";</script>';
    }
    elseif($t_amount > $s_amount)
    {
        echo '<script>alert("You do not have enough balance in your account to transfer.");';
        echo 'window.location= "tomain.php";</script>';
    }

    else{
        $sql1="INSERT INTO transcations values('','$date','FROM Savings Account','$t_amount',0.00,'$accno','$r_total','$s_branch')";
        mysqli_query($con , $sql1) or die( mysqli_error($con));


        $sql2="INSERT INTO savings_transcations values('','$date','TO Main Account',0.00,'$t_amount','$s_total','$s_accno')";
        mysqli_query($con , $sql2) or die( mysqli_error($con));

       $sql4 = "UPDATE accounts SET account_bal = '$r_total' WHERE account_no = '$accno'";
        mysqli_query($con , $sql4) or die (mysqli_error($con));

        $sql5 = "UPDATE savings SET account_bal = '$s_total' WHERE account_no = '$s_accno'";
        mysqli_query($con , $sql5) or die (mysqli_error($con));

        echo '<script>alert("Transfer Successful.");';
        echo 'window.location= "savings.php";</script>';

    }

?>