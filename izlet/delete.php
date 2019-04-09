<?php
session_start();
include('config/config.php');
$conn = mysqli_connect(SERVER, USER, PASS, DB);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
    $id = $_GET["idPost"];
    $sqlDelete = "DELETE FROM posts WHERE postID = $id";
      $result = $conn->query($sqlDelete);
header('Location: dashboard.php');
mysqli_close($conn);
?>
