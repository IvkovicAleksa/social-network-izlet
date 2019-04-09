<?php
session_start();
include('config/config.php');
$conn = mysqli_connect(SERVER, USER, PASS, DB);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

    $id = $_GET["edit"];
    $sqlSelect = "SELECT * FROM posts WHERE postID = $id";
      $result = $conn->query($sqlSelect);
      $postRows = array();

    if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
       $postRows[] = $row;
     }
    } else {
     $noPosts = "0 results";
    }

    $postRows = json_encode($postRows);
    //Govorim ajax-u da je JSON u pitanju:
    header('Content-Type: application/json');
    //Mora ova linija da bi ispisivalo:
    echo $postRows;
    $conn->close();
?>
