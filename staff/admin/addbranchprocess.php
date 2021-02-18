<?php
	require ("../../_include/dbconn.php");
	if(isset($_POST["submit"]))
	{
        $branch_name = mysqli_real_escape_string($con , $_POST["b_name"]);
		$address = mysqli_real_escape_string($con ,$_POST["address"]);
        $zip = mysqli_real_escape_string($con ,$_POST["zip"]);
        $city = mysqli_real_escape_string($con ,$_POST["city"]);
		$date=date("Y-m-d");

		$sql="INSERT INTO branches VALUES('','$branch_name','$address','$zip','$city','$date')";
        mysqli_query($con , $sql) or die( mysqli_error($con));

		echo '<script>alert("BRANCH SUCCESSFULLY ADDED ");';
		echo 'window.location= "addbranch.php";</script>';
	}
?>