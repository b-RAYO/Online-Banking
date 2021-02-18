<?php


$customer_id = $_SESSION ['customer_id'];
//$sql1 = "SELECT * FROM customers WHERE customer_id = '$customer_id' AND status = 'VERIFIED'";
//$result1= mysqli_query($con, $sql1) or die (mysqli_error($con));
//$verified =mysqli_fetch_assoc($result1);

$sql2 = "SELECT account_no,account_bal,min_bal,date_opened,branch_id,customers.*
FROM accounts
INNER JOIN customers
ON accounts.customer_id = customers.customer_id
WHERE customers.customer_id = '$customer_id'";
$result2 = mysqli_query($con, $sql2) or die (mysqli_error($con));
$accounts = mysqli_fetch_assoc ($result2);
$_SESSION ['account_no'] = $accounts['account_no'];
?>