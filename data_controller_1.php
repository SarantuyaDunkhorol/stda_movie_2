<?php 
    include("dbconnect.php");
    session_start();
    $error = array();
    if(empty($_SESSION['username'])){
    if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['cpassword'])){
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $cpassword = mysqli_real_escape_string($connection, $_POST['cpassword']);
        if (!preg_match('/^[A-Za-z]{1}[A-Za-z0-9]{5-31}$/', $username) ){
            $error['username-not-valid'] = 'Username is not valid: -Must start with letter
            -6-32 characters
            -Letters and numbers only';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error['email-not-valid'] = 'Email is not valid';
        }

        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);

        if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
            $error['password-not-valid'] = "Password not valid: At least one Uppercase, Lowercase and number. Min Lenght is 8 characters";
        }

        if(!empty($error)){
            if($password === $cpassword){
                $query = "SELECT * FROM users where '{$username}';";
                $result = mysqli_query($connection, $query);
                if(mysqli_num_rows($result) > 0){
                    echo "username is exist";
                } else {
                    $code = rand(11111,99999);
                    $que = "INSERT INTO users (username, useremail, userpassword, code) 
                                        values ('{$username}', '{$email}','{$password}' ,'{$code}');";
                    $res = mysqli_query($connection, $que);
                    if($res){
                        $receiver = "$email";
                        $subject = "Email Test via PHP using Localhost";
                        $body = "Hi, there...This is a test email send from Localhost.  verification code: $code";
                        $sender = "From: burnaa81@gmail.com";
                        if(mail($receiver, $subject, $body, $sender)){
                            echo "Email sent successfully to $receiver";
                            $_SESSION['email'] = $email;
                            header("location: emailverification.php");
                        }else{
                            echo "Sorry, failed while sending mail!";
                    }
                        // header('location: login.php');
                    } else {
                        echo "Database error";
                    }
                }
            }
        } else {
            foreach ($error as $errors) {
                echo "$errors <br>";
              }
        }
        
    }
    }else {
        header("location: welcome.php");
    }
?>