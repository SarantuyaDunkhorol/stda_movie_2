<?php 
    include('dbconnect.php');
    session_start();
    if(!empty($_SESSION['username'])){
    $username = mysqli_real_escape_string($connection, $_SESSION['username']);

    $query = "SELECT * FROM users where username ='{$username}';";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)) {
            echo "id: " . $row["userid"]. " - Name: " . $row["username"]. " " . $row["useremail"]. "<br>";
          }
    } else {
        header('location: login.php');
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
    <a href="index.php">Home</a><br>
    <a href="welcome.php">Add movie</a><br>
    <a href="logout.php">Logout</a>

</body>
</html>