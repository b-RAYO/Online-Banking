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
    <link rel="stylesheet" href="bootstrap/css/bootstrap-material-design.min.css">
    <script src="bootstrap/js/bootstrap-material-design.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome\css\all.css">
    <script src="fontawesome\js\all.js"></script>
    <title>User Verified</title>
</head>
<body>
    <?php include "header.php";?>
    <div class="container mb-5 mt-5">
      <i style="color:#22bb33;" class="far fa-check-circle fa-10x mb-5" data-fa-transform="right-35"></i>
      <h2 class="text-center font-weight-bold">You have been successfully verified</h2>
      <p class="text-center" style="font-size:20px">Please visit the nearest branch to activate your account.</p>
    </div>
    <?php include "footer.php"?>
</body>
</html>
