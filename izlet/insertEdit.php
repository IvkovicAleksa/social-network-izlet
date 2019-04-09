<?php
session_start();
include('config/config.php');
$conn = mysqli_connect(SERVER, USER, PASS, DB);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$id = $_POST["edit"];
$image = '';

$editImageStr = '';

if(isset($_FILES['image'])){
    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $tmp = explode('.',$_FILES['image']['name']);
    $file_ext = end($tmp);
    $extensions = array("jpeg","jpg","png","gif");
    $uploads_dir ='uploads/';

  if(in_array($file_ext,$extensions)=== false){
    $errors[]="Extension not allowed, please chose a JPEG, JPG, PNG or GIF file.";
  }

  if($file_size > 3145728){
    $errors[]='File size must be excately 3 MB';
  }

  if(empty($errors)== true){
    $img_dir = $uploads_dir.$file_name;

    move_uploaded_file($file_tmp,$uploads_dir.$file_name);
    echo "Success";
    $image = $_FILES['image']['name'];

    $editImageStr = "postimage = '".$image."', ";

  }

  // else{
  //   $sqlSelect = "SELECT postimage FROM posts WHERE postID = $id";
  //   $result = $conn->query($sqlSelect);
  //   if ($result->num_rows > 0) {
  //  // output data of each row
  //  while($row = $result->fetch_assoc()) {
  //    $image = $row['postimage'];
  //     }
  //   }
  // }
};

    $title = $_POST["title"];
    $location = $_POST["location"];
    $transport = $_POST["transport"];
    $description = $_POST["description"];
    $date = date("d.m.Y.");
    // $sqlUpdate = "UPDATE posts
    // SET postheader = $title, postlocation = $location, postimage = $image, transport = $transport, postbody = $description, date = $date
    // WHERE postID = $id";

    $sqlUpdate = "UPDATE posts
    SET postheader = '$title', postlocation = '$location', ".$editImageStr." transport = '$transport', postbody = '$description', postdate = '$date'
    WHERE postID = '$id'";

    //var_dump($sqlUpdate);

    $result = $conn->query($sqlUpdate);

    if($result === true) {
      $postSuccessMessage = 'Vaš status je uspešno evidentiran.';
    } else {
      $postSuccessMessage = 'Imate grešku u konekciji: '.$conn->error;
      }

  $conn->close();
  header('Location: dashboard.php');
?>
