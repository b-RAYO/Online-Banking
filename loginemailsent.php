<?php
  include "_include/dbconn.php";
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
    <title>Email Sent</title>
</head>
<body>
    <?php include "header.php";?>
    <div class="container mb-5 mt-5">
        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-6">
            <i style="color:#0088cc;" class="fas fa-paper-plane fa-10x mb-5" data-fa-transform="right-08"></i>
            <h2 class="text-center font-weight-bold">An email is on the way</h2>
            <p class="text-center" style="font-size:20px">Click on the link in the email sent to access your account. Don't <br>see the email? Be sure to check your spam folder.</p>
          </div>
          <div class="col-sm-3"></div>
        </div>
    </div>
    <?php include "footer.php"?>
</body>
</html>
