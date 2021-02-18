<?php
    require "_include/dbconn.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="js/jquery.js"></script>
        <script src="js/jquery.validate.js"></script>
		<script src="js/forgetvalidation.js"></script>
        <script src="js/popper.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap-material-design.min.css">
        <script src="bootstrap/js/bootstrap-material-design.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="fontawesome\css\all.css">
        <script src="fontawesome\js\all.js"></script>
        <title>Forgot Password</title>
    </head>
    <body>
        <?php include "header.php";?>
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                <?php
                    if(isset($_SESSION["email_error"])){
                        echo "<p class='alert alert-danger' role='alert'>".$_SESSION["email_error"]."</p>";
                    }
                    if(isset($_SESSION["number_error"])){
                        echo "<p class='alert alert-danger' role='alert'>".$_SESSION["number_error"]."</p>";
                    }
                ?>
                    <form class="form-container" id="forgotform" action='forgetpwdotp.php' method='POST'>
                        <h3>Forgot Password</h3>
                            <p><span class="error">* required field</span></p>
                            <div class="form-group">
                                <label>Full Name<span class="error">*</span></label><br>
                                <input type="text" class="form-control" id="fullname" name="fullname">
                            </div>
                            <div class="form-group">
                                <label>Phone Number<span class="error">*</span></label><br>
                                <input type="number" class="form-control" id="phone" name="phone">
                                <span></span>
                            </div>
                                <br>
                                <button type="submit" id="submit" class="btn btn-success btn-block btn-raised" name="submitBtn">SUBMIT</button>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
        <?php
			include "footer.php";
			unset($_SESSION['email_error']);
			unset($_SESSION['number_error']);
		?>
    </body>
</html>