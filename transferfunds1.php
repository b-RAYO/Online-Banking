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
    <title>Transfer Funds</title>

</head>
<body>
    <?php include "customerheader.php"?>
    <div class="container mt-5">
        <div class="row ">
            <div class=" col-sm-3"></div>
            <div class=" col-sm-6">
            <?php $accountno = $_SESSION ['account_no']; $acc_bal=$accounts['account_bal'];?>
                <p> Fill the transfer request form below or choose from <a href="choosefavourites.php">your Favorites</a></p>
                <form class="form-container" action="transferotp.php" method = "POST" id="transferform">
                <div class="form-group">
                    <label for="account_no"> Account Number </label>
                    <input type="number" class="form-control" name='a_no' id = 'accountnumber' required>
                    <span id= "sameacc" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="name">Account Holder </label>
                    <input type="text" class="form-control" name='receiver_name' id = 'accountname' value = "" readonly>
                </div>
                <div class="form-group">
                    <label for="amount"> Amount </label>
                    <input type="number" class="form-control" name = 'amount' id='amount'required>
                </div>
                <div class="form-group">
                    <label for="new_bal">New Balance</label>
                    <input type="number" name="new_bal" id="new_bal" class="form-control" placeholder="Your New Balance" readonly>
                </div>
                <br>
                <button type="submit" class="btn btn-success btn-raised btn-block" name="submitBtn">Send</button>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <br>
        <br>
        <br>
    </div>
    <?php include 'footer.php' ?>
<script>
    $(document).ready(function () {
        $('#accountnumber').keyup(function () {
        trial ($(this).val());
        function trial(s){
            $('#accountnumber').val(s);
    $.ajax({
        type: "POST",
        url: "getcustomer.php",
        data: "a_no="+s ,
        dataType: "text",
        success: function (response) {
            $('#accountname').val(response);
        }
    });
        }
    });
    var acc_no = <?php echo $accountno;?>;
    var acc_bal = <?php echo $acc_bal;?>;

    $('#accountnumber').keyup(function () {
        //console.log (acc_no);
        checkacc_no ($(this).val());
        function checkacc_no(){
            if ($('#accountnumber').val() == acc_no){
                $('#sameacc').text('YOU CANNOT SEND TO THE SAME ACCOUNT!!');
                }
            else {
                $('#sameacc').text('');
                }
            }
        });
        $('#amount').keyup(function () {
                //console.log (amount);
            var amount = $('#amount').val();
            new_bal ($(this).val());
            function new_bal(){
                var new_amount = acc_bal-amount;
                    $('#new_bal').val(new_amount);
                    }
            });
    });
    </script>
</body>
</html>
