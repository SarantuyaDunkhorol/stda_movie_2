<?php 
    include('dbconnect.php');
    session_start();
    if(!empty($_POST['verifcode'])){
        $verifcode = mysqli_real_escape_string($connection, $_POST['verifcode']);
        $email = mysqli_real_escape_string($connection,$_SESSION['email']);
        $quer = "SELECT * from users where useremail = '{$email}'";
        $res = mysqli_query($connection, $quer);
        if (mysqli_num_rows($res) > 0){
            while($row = mysqli_fetch_assoc($res)) {
                if($verifcode === $row['code']){
                    $status = 'verified';
                    $q1 = "update users set status = '{$status}' where useremail = '{$email}';";
                    $res1 = mysqli_query($connection, $q1);
                    $_SESSION['username'] = $row['username'];
                    header("location: profile.php");
                }
                
                    
              }
        } else {
            echo "database error";
        }
    }
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
    <form action="emailverification.php" method="post">
        <input type="text" name= "verifcode" placeholder="Verifictaion code"><br>
        <input type="submit" value="Check code">
    </form>
</body>
</html>