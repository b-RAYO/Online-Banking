<?php
    require '_include/dbconn.php';
    require 'accounts.php';
    require 'auth.php';
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
    <title>Transfer Main Account</title>
</head>
<body>
    <?php include "savingsmenu.php";
        $main = $accounts['account_no'];
        $query = "SELECT * FROM accounts WHERE account_no = '$main' ";
        $result = mysqli_query($con, $query);
        $rws = mysqli_fetch_assoc ($result);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form class="form-container mb-5" action="tomainprocess.php" method = "POST" id="transferform">
                    <p class="mt-5 mb-5 text-info d-flex justify-content-center"> TRANFER FUNDS TO MAIN ACCOUNT</p>
                    <div class="form-group">
                        <label for="account_no"> Account Number </label>
                        <input type="number" class="form-control" name='a_no' id = 'accountnumber' value = '<?php echo $_SESSION['account_no']?>' readonly>
                    </div>
                    <div class="form-group">
                        <label for="amount"> Amount </label>
                        <input type="number" class="form-control" name = 'amount' required>
                    </div>
                    <button type="submit" class="btn btn-success btn-block btn-raised" name="submitBtn">SEND</button>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>

    </div>
    <?php include 'footer.php' ?>
</body>
</html>
