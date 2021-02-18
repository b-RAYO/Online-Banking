<?php
    require "_include/dbconn.php";
        if (isset($_POST['submit'])){
            $id = $_POST['id'];
            //$name = mysqli_real_escape_string($con, $name);

            $sql="DELETE FROM demo WHERE id ='$id'";
            $result=  mysqli_query($con , $sql) or die( mysqli_error($con));

        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="number" name="id" id="">
        <button type="submit" name="submit">SAVE</button>
    </form>
</body>
</html>