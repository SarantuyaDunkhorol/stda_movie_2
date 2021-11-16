<?php 
    include('dbconnect.php');
    session_start();
    if(empty($_SESSION['username'])){
    if(!empty($_POST['username']) && !empty($_POST['password'])){
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);

        $query = "SELECT * FROM users;";
        $res = mysqli_query($connection, $query);

        if(mysqli_num_rows($res) > 0){
            $lquery = "SELECT username FROM users";
            $res1 = mysqli_query($connection, $query);
            
            while($row = mysqli_fetch_assoc($res1)) {
                if($row['userpassword'] === $password){
                    $_SESSION['username'] = $username;
                    header('location: welcome.php');
                    

                } else {
                    echo "password doesnt match" . "<a href='login.php'>Try login again </a>";
                }
              }

        } else {
            echo "Username not found" . "<a href='login.php'>Try login again </a>";
        }
    }
} else {
    header('location: welcome.php');
}
?>