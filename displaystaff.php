<?php 
include '_include/dbconn.php';
        
/*if(!isset($_SESSION['admin_login'])) 
    header('location:stafflogin.php'); */  
?>
<!DOCTYPE html>
<?php

$sql="SELECT * FROM `employees`";
//$result=  mysqli_query($con , $sql) or die( mysqli_error($con));
$sql_min="SELECT MIN(employee_id) from employees";
$result_min=  mysqli_query($con , $sql_min);
$rws_min=   mysqli_fetch_assoc($result_min);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Staff Details</title>
        <style>
            .displaystaff_content table,th,td {
    padding:6px;
    border: 1px solid #2E4372;
   border-collapse: collapse;
}
}
        </style>
    </head>

    <div class="displaystaff_content">
       <?php include 'adminnavbar.php'?>
                    <div class="displaystaff">
                <form action="editstaff.php" method="POST">
            
                    <table align="center" >
                        <caption align='center' style='color:#2E4372'><h3><u>Staff Details</u></h3></caption>
                        <th>Id</th>
                        <th>Name</th>
                        <th>DOB</th>
                        <th>Role</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Zip Code</th>
                        <th>City</th>
                        <th>Gender</th>
                        <?php
                        if($result=  mysqli_query($con , $sql)){
                            while ($row = mysqli_fetch_assoc($result)){
                                echo "<tr><td><input type='radio' name='employee_id' value=".$row['employee_id'];
                                echo "> </td>";
                                echo "<td>".$row['full_name']."</td>";
                                echo "<td>".$row['dob']."</td>";
                                echo "<td>".$row['role']."</td>";
                                echo "<td>".$row['phone_no']."</td>";
                                echo "<td>".$row['address']."</td>";
                                echo "<td>".$row['zipcode']."</td>";
                                echo "<td>".$row['city']."</td>";
                                echo "<td>".$row['gender']."</td>";
                                echo "</tr>";
                            }
                        }
                       /* while($rws = mysqli_fetch_assoc($result)){
                            echo "<tr><td><input type='radio' name='employee_id' value=".$rws['employee_id'];
                            
                           if($rws["employee_id"] == $rws_min["employee_id"]) echo' checked';
                            echo " /></td>";
                            echo "<td>".$rws['full_name']."</td>";
                            echo "<td>".$rws['dob']."</td>";
                            echo "<td>".$rws['role']."</td>";
                            echo "<td>".$rws['phone_no']."</td>";
                            echo "<td>".$rws['address']."</td>";
                            echo "<td>".$rws['zipcode']."</td>";
                            echo "<td>".$rws['city']."</td>";
                            echo "<td>".$rws['gender']."</td>";
                            echo "</tr>";
                        }*/
                        ?>
                    </table>
                    <br>
                    <table align="center" id='button'>
                    
                        <tr>
                            <td><input type="submit" name="submit1_id" value="EDIT STAFF DETAILS" class='addstaff_button' ></td>
                        </tr>
                        
                    </table>
                    </form>
                
                    
</div>

          <?php include 'footer.php';?>
    </body>
</html>