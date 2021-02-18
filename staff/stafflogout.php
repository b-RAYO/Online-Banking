<?php 
session_start();
session_unset('staff');
session_destroy();
header('location:stafflogin.php');   
?>
