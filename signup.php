<?php 
    include("data_controller_1.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="data_controller_1.php" method="post">
        <h1>SIGNUP</h1>
        <input type="text" name="username" placeholder="Username"><br>
        <input type="text" name="email" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="password" name="cpassword" placeholder="Repeat password"><br>
        <input type="submit" value="Sign-Up" name="signup"><br>
    </form>
        <p>Already have an Account? <a href="login.php">LOGIN</a></p>
</body>
</html>