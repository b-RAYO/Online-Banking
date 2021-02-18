<?php
    require '_include/dbconn.php';
    require 'auth.php';

    $query = "SELECT * FROM sent WHERE (senderaccount = $accno) AND (date BETWEEN '$date1' AND '$date2')";
    $query2 = "SELECT * FROM sent WHERE (receiveraccount = $accno) AND (date BETWEEN '$date1' AND '$date2')"
?>