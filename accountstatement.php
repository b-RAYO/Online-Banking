<?php
    require '_include/dbconn.php';
    require 'accounts.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap-material-design.min.css">
    <script src="bootstrap/js/bootstrap-material-design.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome\css\all.css">
    <script src="fontawesome\js\all.js"></script>
    <title>Account Statement</title>
</head>
<body>
    <?php include "customerheader.php";

         if(isset($_POST['submitBtn'])) {
            $date1=$_POST['date1'];
            $date2=$_POST['date2'];
            $accno =$_SESSION ['account_no'];
            $query1 = "SELECT * FROM transcations WHERE (account_no = '$accno') AND (date >= '$date1 00:00:00' AND date <='$date2 23:59:59')";
            $result1=  mysqli_query($con , $query1) or die( mysqli_error($con));
            $_SESSION ['date1'] = $date1;
            $_SESSION ['date2'] = $date2;
         }

        echo '<br><br>';
        echo '<div class="container mb-5">';

                       if (mysqli_num_rows($result1) < 1){
                        echo "<h2 class='mb-5 text-danger d-flex justify-content-center'>NO TRANSCATIONS YET!!!</h2>";
                        }
                        else{
                        echo '<h3 class="text-info" style="text-align:center;">Account Statement</h3>';
                        echo '<form action="mainprintstatement.php" target="_blank" method="POST">';
                                echo '<div class="table-responsive"><table class="table table-striped mb-5" align="center">
                                            <thead class="thead-dark">
                                            <th scope="col">#</th>
                                            <th scope="col">Transaction Date</th>
                                            <th scope="col">Narration</th>
                                            <th scope="col">Debit</th>
                                            <th scope="col">Credit</th>
                                            <th scope="col">Balance</th>
                                            </thead>';
                                            $x = 1;
                                            while($rws= mysqli_fetch_assoc($result1)){
                                                echo "<tr>";
                                                echo "<td>" .$x++. "</td>";
                                                echo "<td>".$rws['date']."</td>";
                                                echo "<td>".$rws['description']."</td>";
                                                echo "<td>".$rws['debit']."</td>";
                                                echo "<td>".$rws['credit']."</td>";
                                                echo "<td>".$rws['account_bal']."</td>";
                                                echo "</tr>";
                                                }
                                                echo "<tr align='center'>";
                                                echo "<td colspan=6>";
                                                echo "<button type='submit' class='btn btn-success btn-raised'
                                                name='submitBtn'><span class='fas fa-print'></span> &nbsp Print
                                                </button></td>";
                                                echo "</tr> ";
                                echo '</table>';
                                echo '</div>';
                        echo '</form>';
                      }
            echo '</div>'?>
    <?php include 'footer.php'?>
</body>
</html>
