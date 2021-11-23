<?php 
    include('dbconnect.php');
    if(!empty($_POST['movie_title']) && !empty($_POST['movie_des'] && !empty($_POST['movie_price']) && !empty($_POST['movie_image']))){
        $movie_title = mysqli_real_escape_string($connection, $_POST['movie_title']);
        $movie_des = mysqli_real_escape_string($connection, $_POST['movie_des']);
        $movie_price = mysqli_real_escape_string($connection, $_POST['movie_price']);
        $movie_image = mysqli_real_escape_string($connection, $_POST['movie_image']);

        $query = "INSERT INTO movies(movietitle, moviedescription, movieprice, movieimage) values ('{$movie_title}','{$movie_des}', '{$movie_price}', '{$movie_image}');";
        $result = mysqli_query($connection, $query);
        if($result){
            echo "Succesfully added<br>";
            echo "<a href='welcome.php'>Add more movie</a><br>";
            echo "<a href='index.php'>Home</a>";
        } else {
            echo "error";
        }
    } else {
        echo "fill all lines";
    }
?>