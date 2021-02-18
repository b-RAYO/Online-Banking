<?php
    require '_include/dbconn.php';
    require 'auth.php';
    require 'savingsprocess.php';
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
        <title>UNAITAS</title>
    </head>
    <body>
    <?php include "savingsmenu.php"?>
        <div class="container">
            <div class="text-success d-flex justify-content-end">Welcome <?php echo $savings['full_name']?></div>
            <?php
            $accno=$savings["account_no"];
            $sql="SELECT * FROM savings_transcations WHERE acc_no = '$accno' LIMIT 10";
            $result=  mysqli_query($con , $sql) or die( mysqli_error($con)); ?>

                <br><br><br>
                <?php
                 if (mysqli_num_rows($result) < 1){
                    echo "NO TRANSCATIONS YET!";
                    }
                else{
                    echo '<h3 class="text-info" style="text-align:center;"><u>Last 10 Transaction</u></h3>
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
                                        echo "<td>".$rws['balance']."</td>";
                                        echo "</tr>";
                                    }
                    echo '</table>';
                                    }
                ?>
        </div>
        <?php include 'footer.php' ?>
    </body>
</html>

