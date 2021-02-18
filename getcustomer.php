<?php
    require '_include/dbconn.php';
    require 'auth.php';

    $no= mysqli_real_escape_string($con, $_POST['a_no']);
    $query = "SELECT account_no,customers.full_name
    FROM accounts
    INNER JOIN customers
    ON accounts.customer_id = customers.customer_id
    WHERE accounts.account_no = '$no'";
  if($result =mysqli_query($con, $query)){
    while ($row = mysqli_fetch_assoc($result)){
        $data = $row['full_name'];
        echo $data;

    }
  }



?>