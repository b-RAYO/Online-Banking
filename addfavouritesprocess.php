<?php
require '_include/dbconn.php';
require 'auth.php';



                $sender_acc=$_SESSION["accno"];
                $sender_name=$_SESSION["name"];

                $Payee_name= mysqli_real_escape_string($con,$_POST['name']);
                $acc_no= mysqli_real_escape_string($con,$_POST['a_no']);




                $sql1="SELECT * FROM favourites WHERE s_acc='$sender_acc' AND r_acc='$acc_no'";
                $result1=  mysqli_query($con , $sql1);
                $rws1=  mysqli_fetch_assoc($result1);
                $s1=$rws1['s_acc'];
                $s2=$rws1['r_acc'];


                $sql= "SELECT account_no,account_bal,min_bal,date_opened,branch_id,customers.*
                FROM accounts
                INNER JOIN customers
                ON accounts.customer_id = customers.customer_id
                WHERE accounts.account_no = '$acc_no'";

                $result=  mysqli_query($con , $sql) or die (mysqli_error($con));
                $rws=  mysqli_fetch_assoc($result) ;

                if($sender_acc==$acc_no) //can't add themselves
                {
                echo '<script>alert("You cannot add yourself as a favourite!");';
                     echo 'window.location= "addfavourites.php";</script>';
                }

                elseif($s1==$sender_acc && $s2==$acc_no)
                {
                    echo '<script>alert("Account already added as favourite!");';
                     echo 'window.location= "addfavourites.php";</script>';
                }

                elseif(mysqli_num_rows($result) < 1)
                {
                echo '<script>alert("Account Not Found!\nPlease enter correct details");';
                     echo 'window.location= "addfavourites.php";</script>';
                }


                else{
                    $date = date('Y-m-d H:i:s');
                    $status="PENDING";
                $sql="INSERT INTO favourites values('','$sender_acc','$sender_name','$acc_no','$Payee_name','$date','$status','')";
                mysqli_query($con , $sql) or die(mysqli_error($con));
                header("location:favourites.php");
                }
?>
