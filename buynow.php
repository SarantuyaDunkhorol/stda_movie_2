<?php 
    include('dbconnect.php');
    if(!empty($_GET['movieid'])){
    $id = mysqli_real_escape_string($connection, $_GET['movieid']);
    $query = "SELECT * FROM movies where movieid = $id";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)) {
            echo "Movie Title: " . $row["movietitle"]. "<br>Movie Description: " . $row["moviedescription"]. "<br>";
          }
    } else {
        echo "Movie not found";
    }
} else {
    header('location: index.php');
}
?>