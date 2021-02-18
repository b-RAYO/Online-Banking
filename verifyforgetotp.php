<?php
    require "_include/dbconn.php";

    if (isset($_POST['submitBtn'])) {
        $forgot_otp =$_POST['forgot_otp'];
            if($_COOKIE['forgot_otp'] == $forgot_otp){
                $name =$_POST['fullname'];
                $phone =$_POST['phone'];
            }
            else{
                $_SESSION['otp_error'] = "PLEASE ENTER THE CORRECT OTP";
                header ("location:forgetpwdotp.php");
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="js/jquery.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/newpwdvalidate.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap-material-design.min.css">
        <script src="bootstrap/js/bootstrap-material-design.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <script src="https://kit.fontawesome.com/16649413da.js" crossorigin="anonymous"></script>
        <title>Document</title>
    </head>
    <body>
        <?php include "header.php";?>
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <?php
                        $pwd_error = "";
                        if(isset($_SESSION["pwd_error"])){
                            $otp_error = $_SESSION["pwd_error"];
                            echo "<p class='alert alert-danger' role='alert'>$pwd_error</p>";
                        }
                    ?>
                    <form action="forgetpwdprocess.php" method="POST" id="forgotpwdform" class="form-container">
                        <h4 class="text-primary">Change Password</h4>
                        <div class="input-group" id="show_hide_password">
                        <label>New Password</label> <br>
                            <input type="password" class="form-control" name="newpwd" id = "newpwd">
                            <div class="input-group-addon">
                                <span toggle="#newpwd" class="fa fa-fw fa-eye field-icon toggle-password1"></span>
                            </div>
						</div>
                        <div class="input-group" id="show_hide_password">
                        <label>Confirm Password</label> <br>
                            <input type="password" class="form-control" name="confirmnewpwd" id = "confirmnewpwd">
                            <div class="input-group-addon">
                                <span toggle="#confirmnewpwd" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="fullname" value="<?php echo $name?>"required >
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="phone" value="<?php echo $phone?>" required >
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success btn-block btn-raised" name="submitBtn">SUBMIT</button>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
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
		</script>
        <?php include "footer.php";
        unset ($_SESSION["pwd_error"]);
        ?>
    </body>
</html>