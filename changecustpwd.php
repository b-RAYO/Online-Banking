<?php
include '_include/dbconn.php';

if(!isset($_SESSION['customer_id']))
    header('location:login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.validate.js"></script>
	<script src="js/changepwdvalidation.js"></script>
    <script src="js/popper.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap-material-design.min.css">
    <script src="bootstrap/js/bootstrap-material-design.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/16649413da.js" crossorigin="anonymous"></script>
    <title>UNAITAS</title>
</head>
<body>
    <?php include "customerheader.php"?>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form action="custpwdprocess.php" method="POST" id="changepwdform" class="form-container mb-5">
                    <h3 class="text-primary justify-content-center d-flex mb-2">
                        Change Password
                    </h3>
                    <p><span class="error">* required field</span></p>
                    <?php
                        if(isset($_SESSION['pwdupdated'])) {
                            echo '<p class="alert-success alert alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>SUCCESS.</strong>'.$_SESSION['pwdupdated']; '</p>';
                        }
								?>
                    <div class="form-group">
                        <label>Old Password<span class="error">*</span></label><br>
                        <div class="input-group pwd" id="show_hide_password">
                            <input type="password" class="form-control" name="oldpwd" id = "oldpwd">
                            <div class="input-group-addon">
                                <span toggle="#oldpwd" class="fa fa-fw fa-eye field-icon toggle-oldpassword"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>New Password<span class="error">*</span></label><br>
                        <div class="input-group pwd" id="show_hide_password">
                            <input type="password" class="form-control" name="pwd1" id = "pwd1">
                            <div class="input-group-addon">
                                <span toggle="#pwd1" class="fa fa-fw fa-eye field-icon toggle-password1"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Enter Password Again<span class="error">*</span></label><br>
                        <div class="input-group pwd" id="show_hide_password">
                            <input type="password" class="form-control" name="pwd2" id = "pwd2">
                            <div class="input-group-addon">
                                <span toggle="#pwd2" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block btn-raised" name="submitBtn">Save</button>
                </form>
            </div>
            <div class="col-sm-6"></div>
        </div>
    </div>
    <?php
        include "footer.php";
        unset($_SESSION['pwdupdated']);
	?>
	<script>
        $('document').ready(function(){
            $('.toggle-password1').on('click', function() {
            $(this).toggleClass('fa-eye fa-eye-slash');
            let input = $($(this).attr('toggle'));
            if (input.attr('type') == 'password') {
                input.attr('type', 'text');
            }
            else {
                input.attr('type', 'password');
            }
            });
            });
            $('.toggle-password2').on('click', function() {
            $(this).toggleClass('fa-eye fa-eye-slash');
            let input = $($(this).attr('toggle'));
            if (input.attr('type') == 'password') {
                input.attr('type', 'text');
            }
            else {
                input.attr('type', 'password');
            }
        });
            $('.toggle-oldpassword').on('click', function() {
            $(this).toggleClass('fa-eye fa-eye-slash');
            let input = $($(this).attr('toggle'));
            if (input.attr('type') == 'password') {
                input.attr('type', 'text');
            }
            else {
                input.attr('type', 'password');
            }
        });
	</script>
</body>
</html>

