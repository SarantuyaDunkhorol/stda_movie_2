<?php 
    include("dbconnect.php");
    session_start();
    if(empty($_SESSION['username'])){
    if(!empty($_POST['username']) && !empty($_POST['password'])){
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);

        $query = "SELECT * FROM users where '{$username}';";
        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 1){
            echo "username is exist";
        } else {
            $que = "INSERT INTO users (username, useremail, userpassword) values ('{$username}', '{$email}','{$password}');";
            $res = mysqli_query($connection, $que);
            if($res){
                header('location: login.php');
            } else {
                echo "Database error";
            }
        }
    }
    }else {
        header("location: welcome.php");
    }
?>