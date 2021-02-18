<?php
    require '_include/dbconn.php';
    require 'auth.php';
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
    <title>UNAITAS</title>
</head>
<body>
        <?php include "customerheader.php"?>
        <br><br>
        <div class="container">
            <?php
            $accno=$accounts["account_no"];
            $sql="SELECT * FROM transcations WHERE account_no = '$accno' LIMIT 10";
            $result=  mysqli_query($con , $sql) or die( mysqli_error($con));
            ?>
            <br><br>
            <?php
                if (mysqli_num_rows($result) < 1){
                    echo "<h2 class='mb-5 text-danger d-flex justify-content-center'>NO TRANSCATIONS YET!!!</h2>";
                    }
                else{
            echo '<h3 class="text-info" style="text-align:center;"><u>Last 10 Transaction</u></h3>
            <div class="table-responsive">
            <table class="table table-striped mb-5" align="center" >
                            <thead class="thead-dark">
                            <th scope="col">#</th>
                            <th scope="col">Transaction Date</th>
                            <th scope="col">Narration</th>
                            <th scope="col">Debit</th>
                            <th scope="col">Credit</th>
                            <th scope="col">Balance</th>
                            </thead>';
                            $x = 1;
                            while($rws=    mysqli_fetch_assoc($result)){

                                echo "<tr>";
                                echo "<td>" .$x++. "</td>";
                                echo "<td>".$rws['date']."</td>";
                                echo "<td>".$rws['description']."</td>";
                                echo "<td>".$rws['debit']."</td>";
                                echo "<td>".$rws['credit']."</td>";
                                echo "<td>".$rws['account_bal']."</td>";
                                echo "</tr>";
                            }
            echo '</table>';
            echo '</div>';
                        }
            ?>
        </div>
        <?php include 'footer.php' ?>
</body>
</html>

