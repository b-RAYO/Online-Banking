<?php
   include ("_include/dbconn.php");
   $emailsent = "";
   $emailerror = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/loginvalidate.js"></script>
    <script src="js/popper.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap-material-design.min.css">
    <script src="bootstrap/js/bootstrap-material-design.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/16649413da.js" crossorigin="anonymous"></script>
    <title>UNAITAS - Login</title>

</head>
    <body>
        <?php include "header.php";?>
        <div class="container mt-5">
            <div class="row">
                <div class="my col-md-3 col-sm-4 col-xs-12 "></div>
                <div class="my col-md-6 col-sm-4 col-xs-12 ">
                <?php
                    if(isset($_SESSION["emailerror"])){
                        $emailerror = $_SESSION["emailerror"];
                        echo "<p class='alert alert-danger' role='alert'>$emailerror</p>";
                    }
                ?>
                    <form class="form-container" action='sendloginemail.php' id=loginform method='POST'>
                        <h3>Secure Login</h3>
                            <p><span class="error">* required field</span></p>
                            <div class="form-group email">
                                <label>Email:<span class="error">*</span></label><br>
                                <input type="email" id="email" class="form-control" name="email" >
                            </div>
                            <div class="form-group pwd">
                                <label>Password:<span class="error">*</span></label><br>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="pwd1" id ="pwd">
                                    <div class="input-group-addon">
                                        <span toggle="#pwd" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </div>
                                </div>
                            </div>
                            <a style="font-size: 12px" class="link" href="forgetpwdrequest.php">Forgot Password</a>
                                <br>
                                <button type="submit" class="btn btn-success btn-block btn-raised" name="submitBtn">Login</button>
                                <p style="font-size: 12px">Not a member yet? <a class="link" href="register.php">Register Here</a></p>
                    </form>
                </div>
            </div>
            <br><br>
            <br>
            <br>
        </div>
        <?php include "footer.php";
            unset($_SESSION['emailerror']);
        ?>
    </body>
    <script>
        $('document').ready(function(){
            $('.toggle-password').on('click', function() {
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
	</script>
</html>