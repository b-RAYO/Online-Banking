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
    <?php
      if(isset($_SESSION["verifiedphone"])){
        echo "<p class='alert alert-success' role='alert'>".$_SESSION["verifiedphone"]."</p>";
        }
    ?>
      <i style="color:#0088cc;" class="fas fa-paper-plane fa-10x mb-5" data-fa-transform="right-40"></i>
      <h2 class="text-center font-weight-bold">A verification email is on the way</h2>
      <p class="text-center" style="font-size:20px">Click on the verification link in the email. Don't <br>see the email? Be sure to check your spam folder.</p>
      <p class="text-center">Don't see it? <a href="resendverifyemail.php" class="">RESEND LINK</a></p>
    </div>
    <?php include "footer.php"?>
</body>
</html>
