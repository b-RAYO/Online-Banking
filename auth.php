<?php
    
        if(!isset($_SESSION["customer_login"])){
            header("location:login.php");
            exit(); 
        }
?>