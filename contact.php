<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/contactvalidate.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap-material-design.min.css">
    <script src="bootstrap/js/bootstrap-material-design.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome\css\all.css">
    <script src="fontawesome\js\all.js"></script>
    <title>UNAITAS</title>
</head>
<body>
    <?php include "header.php"?>
    <div class="container mb-5 mt-5">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
            <h1 style="color:#b12009">Get in touch with us</h1>
                <form action="" id="contactform" class="form-container mt-5">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" name="fullname" placeholder="Name*" id="name">
                            <div class="input-group-addon">
                                <span style="color:#b12009" class="fas fa-user fa-2x"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="email" class="form-control" name="email" placeholder="Email*" id="email">
                            <div class="input-group-addon">
                                <span style="color:#b12009" class="fas fa-envelope-open-text fa-2x "></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="number" class="form-control" name="phone" placeholder="Phone No.*" id="phone">
                            <div class="input-group-addon">
                                <span style="color:#b12009" class="fas fa-phone fa-2x"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="feedback" cols="50" name="message" placeholder="Message*" rows="10" class="formcontrol"></textarea>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block btn-raised" name="submit">SEND</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>
