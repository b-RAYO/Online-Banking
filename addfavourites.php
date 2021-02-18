<?php
    require '_include/dbconn.php';
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
    <title>UNAITAS</title>
</head>
<body>
    <?php include "customerheader.php";
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form class="form-container" action='addfavouritesprocess.php' method='post'>
                    <br><br>
                    <h3 class="text-info">Add Beneficiary</u></h3>
                    <p><span class="error">* required field</span></p>
                    <div class="form-group ">
                        <label>Account No:<span class="error">*</span></label><br>
                        <input type='number' class="form-control" name='a_no' id = 'accountnumber'required>
                    </div>
                    <div class="form-group ">
                        <label>Account Holder: <span class="error">*</span></label>
                        <input type='text' class="form-control" name='name' id = 'accountname' required readonly>
                    </div>
                    <button type="submit" class="btn btn-success btn-raised btn-block" name="submitBtn">Add</button>
                    <br><br>
                </form>
            </div>
            <div class="col-sm-3"></div>

        </div>

    </div>
    <br>
        <br>
        <br>
    <?php include 'footer.php' ?>
</body>
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
});
    </script>
</html>