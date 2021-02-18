<?php

require "../../_include/dbconn.php";
	if(isset($_POST["submit"]))
	{
        //$acc_id = $_POST["acc_id"];
        $accbal = mysqli_real_escape_string($con , $_POST["accbal"]);
		$minbal = mysqli_real_escape_string($con ,$_POST["minbal"]);
        $branch_id = mysqli_real_escape_string($con ,$_POST["branch_id"]);
        $customer_id = mysqli_real_escape_string($con ,$_POST["customer_id"]);

        $date= date('Y-m-d H:i:s');

        //(account_type,account_bal,min_bal,date_opened,branch_id,customer_id)
        $sql = "INSERT INTO accounts VALUES('', '$accbal','$minbal','$date','$customer_id','$branch_id')";
        $query = mysqli_query($con,$sql) or die( mysqli_error($con));
        echo '<script>alert("Account Successfully Created ");';
        echo 'window.location= "accountrequests.php";</script>';
    }
?>