<?php
    require '_include/dbconn.php';
    //require 'auth.php';

    if (isset($_POST['phone_check'])) {
        $phone= mysqli_real_escape_string($con, $_POST['phone']);
        $query = "SELECT * FROM customers WHERE phone_no = '$phone'";
        $results = mysqli_query($con, $query);
        if (mysqli_num_rows($results) > 0) {
            echo "taken";
          }else{
            echo 'not_taken';
          }
          exit();
    }
?>