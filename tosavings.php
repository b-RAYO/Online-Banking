<?php
    require '_include/dbconn.php';
    require 'accounts.php';
    require 'auth.php'
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
    <title>Transfer to Savings Account</title>

</head>
<body>
<?php include "customerheader.php";?>
    <div class="container">
    <?php
        $main = $accounts['account_no'];
        $query = "SELECT * FROM savings WHERE main_acc = '$main' AND status = 'APPROVED' ";
        $result = mysqli_query($con, $query);
        $rws = mysqli_fetch_assoc ($result);
        if (mysqli_num_rows($result) < 1) {
            echo "<h4 class='mt-5 mb-5 text-danger d-flex justify-content-center'>SORRY YOU DO NOT HAVE A SAVINGS ACCOUNT. PLEASE";
            echo "&nbsp";
            echo "<A HREF='REQUESTSAVINGS.PHP'>CLICK HERE</A>";
            echo "&nbsp";
            echo "TO OPEN ONE.</h4>";
        }
        else{
            echo '<div class="row">';
                echo '<div class="col-sm-3"></div>';
                echo '<div class="col-sm-6">';
                    echo '<p> Tranfer funds to Savings account</a></p>';
                    echo '<form class="form-container mb-5" action="tosavingsprocess.php" method = "POST" id="transferform">';
                        echo '<div class="form-group ">';
                            echo '<label for="account_no"> Account Number </label>';
                            echo '<input type="number" class="form-control" name="a_no" id = "accountnumber" readonly value = "'.$rws["account_no"].'" ?>';
                        echo '</div>';
                        echo '<div class="form-group ">';
                            echo '<label for="amount"> Amount </label>';
                            echo '<input type="number" class="form-control" name = "amount" required>';
                        echo '</div>';
                        echo '<button type="submit" class="btn btn-success btn-block btn-raised" name="submitBtn">Send</button>';
                    echo '</form>';
                echo '</div>';
                echo '<div class="col-sm-3"></div>';
            echo '</div>';
        }
    ?>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>
