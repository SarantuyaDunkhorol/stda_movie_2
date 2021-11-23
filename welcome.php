<?php 
    session_start();
    if($_SESSION['username']===NULL){
        header('location: login.php');
    } else {
    echo "Hello " . $_SESSION['username'];
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
    <form action="add_movie.php" method="POST">
        <input type="text" name="movie_title" placeholder="Movie title">
        <br>
        <input type="text" name="movie_des" placeholder="Movie Description">
        <br>
        <input type="text" name="movie_price" placeholder="Movie Price">
        <br>
        <input type="text" name="movie_image" placeholder="Image name">
        <br>
        <input type="submit" value="Add Movie" name="add_movie">
    </form>
    <a href="profile.php">Profile</a>
</body>
</html>