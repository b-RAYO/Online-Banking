<?php
    require "_include/dbconn.php";
    require "auth.php";
    require "accounts.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js\jquery.js"></script>
    <script src="js/popper.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap-material-design.min.css">
    <script src="bootstrap/js/bootstrap-material-design.min.js"></script>
    <link rel="stylesheet" href="css\style.css">
    <link rel="stylesheet" href="fontawesome\css\all.css">
    <script src="fontawesome\js\all.js"></script>
    <title>Withdrawals</title>
</head>
<body>
    <?php
        include "customerheader.php";
        $acc_bal=$accounts['account_bal'];
    ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <form action="otpwithdraw.php" method="POST" class="form-container mb-5">
                        <h4 class="text-primary"> Fill the form below to withdraw to M-PESA</h4>
                            <div class="form-group">
                              <label for="amount">Amount</label>
                              <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Amount" required>
                            </div>
                            <div class="form-group">
                              <label for="new_bal">New Balance</label>
                              <input type="number" name="new_bal" id="new_bal" class="form-control" placeholder="Your New Balance" readonly>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label><br>
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+254</div>
                                    <input type="tel" class="form-control" name="phone" aria-describedby="helpId" placeholder="7XXXXXXXX" required>
                                </div>
                                <small id="helpId" class="form-text text-danger">Use Format:7XXXXXXXX</small>
                            </div>
                            <button type="submit" name="submit" id="" class="btn btn-success btn-lg btn-block btn-raised">CONTINUE</button>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    <?php include "footer.php"?>
    <script>
        var acc_bal = <?php echo $acc_bal;?>;

        $('#amount').keyup(function () {
            //console.log (amount);
        var amount = $('#amount').val();
        new_bal ($(this).val());
        function new_bal(){
            var new_amount = acc_bal-amount;
                $('#new_bal').val(new_amount);
                }
        });
    </script>
</body>
</html>