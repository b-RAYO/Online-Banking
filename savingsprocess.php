<?php
$customer_id = $_SESSION ['customer_id'];
$sql = "SELECT account_no,account_bal,date_opened,target_amount,end_date,branch_id,customers.*
FROM savings
INNER JOIN customers
ON savings.customer_id = customers.customer_id
WHERE savings.status = 'APPROVED' AND customers.customer_id = '$customer_id'";
$rws = mysqli_query($con, $sql) or die (mysqli_error($con));
$savings = mysqli_fetch_assoc ($rws);
?>