<?php

	require ("_include/dbconn.php");
    require 'accounts.php';
	$msg = "";
	if(isset($_POST["submit"]))
	{
        //$acc_id = $_POST["acc_id"];
        $target = mysqli_real_escape_string($con ,$_POST["target"]);
		$duration = mysqli_real_escape_string($con ,$_POST["duration"]);
        $branch_id = $accounts['branch_id'];
        $customer_id = $_SESSION['customer_id'];
        //$bal = $accounts['account_bal'];
        $minbal = mysqli_real_escape_string($con, $_POST['min_bal']);
        $date=date("Y-m-d");
        $date2 = date_create($date);
        date_add($date2,date_interval_create_from_date_string($duration.'months'));
        $end_date=date_format($date2, 'Y-m-d');
        $main = $accounts['account_no'];

        //(account_type,account_bal,min_bal,date_opened,branch_id,customer_id)
        if ($target <= 1000){
            echo '<script>alert("Please a a target amount greater than Ksh.1000.");';
            echo 'window.location= "requestsavings.php";</script>';
        }
        else{
		$query = mysqli_query($con, "INSERT INTO savings VALUES('','0.00','$date','$target','$end_date','$branch_id','$main','$customer_id','PENDING')");
        echo '<script>alert("Request sent successfully. Please wait for admin to approve account.");';
        echo 'window.location= "accountsummary.php";</script>';
        }
    }


?>