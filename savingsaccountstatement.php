<?php
    require '_include/dbconn.php';
    require 'savingsprocess.php'

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
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="fontawesome\css\all.css">
    <script src="fontawesome\js\all.js"></script>
    <title>UNAITAS-Savings</title>
</head>
<body>
        <?php include "savingsmenu.php";

         if(isset($_POST['submitBtn'])) {
            $date1=$_POST['date1'];
            $date2=$_POST['date2'];
            $accno =$savings['account_no'];
            $query1 = "SELECT * FROM savings_transcations WHERE (acc_no = '$accno') AND (date >= '$date1 00:00:00' AND date <='$date2 23:59:59')";
            $result1=  mysqli_query($con , $query1) or die( mysqli_error($con));
            $_SESSION ['date1'] = $date1;
             $_SESSION ['date2'] = $date2;
         }
            echo '<br><br>';
            echo '<div class="container mb-5">';

            if (mysqli_num_rows($result1) < 1){
                echo "<p class='mt-5 mb-5 text-danger d-flex justify-content-center'>NO TRANSCATIONS YET!!!</p>";
                }
            else{
                echo '<h3 style="text-align:center;color:#2E4372;"><u>Account Summary by Date</u></h3>';
                echo '<form action="savingsprintstatement.php" target="_blank" method="POST">';
                echo '<table class="table table-striped mb-5" align="center">';
                echo '<thead class="thead-dark">
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
                echo "<td>".$rws['balance']."</td>";
                echo "</tr>";
            }
                echo "<tr align='center'>";
                echo "<td colspan=6>";
                echo "<button type='submit' class='btn btn-success btn-raised'
                name='submitBtn'><span class='fas fa-print'></span> &nbsp Print
                </button></td>";
                echo "</tr> ";
                echo '</table>';
                echo '</form>';
                      }
                echo '</div>';
                      ?>
<?php include 'footer.php' ?>
</body>
</html>
