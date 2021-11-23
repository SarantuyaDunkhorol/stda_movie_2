<?php 
    include('data_controller.php');
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
    <a href="index.php"><h1>HOME</h1></a>
    <form action="data_controller.php" method="POST">
        <h1>LOGIN</h1>
        <input type="text" name="username" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" name="sub" value="LOGIN"><br>
        <p>Need an account? <a href="signup.php"> Signup</a></p>
    </form>
</body>
</html>