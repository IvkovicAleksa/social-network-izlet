<?php
/***********************************************/
/**initial settings for the smarty tpl engines**/
/***********************************************/

require_once("smarty/libs/Smarty.class.php");
$smarty = new Smarty();
$smarty->template_dir = 'views';
$smarty->compile_dir = 'tmp';
//initial variable definition
$wrongPassword = "";
//end initial settings

/*****************************************/
/**database connection and session start**/
/*****************************************/

session_start();
include("config/config.php");
if(empty($_SESSION['username'])) {
header('Location: index.php');
 }
  $conn = new mysqli(SERVER, USER, PASS, DB);

  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
  }

  $currentUser = $_SESSION['username'];
  $currentUserID = $_SESSION['userID'];
  $displaycurrent =  $_SESSION['displayname'];
  $userimage = $_SESSION['userimage'];

/*************************************/
/**inserting image in post - UPLOAD**/
/***********************************/

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
  }else{
    print_r($errors);
  }
  };
//end image upload


  /*************************************/
  /**successfully inserted post or not**/
  /*************************************/
  $userID = '';
  if($_SESSION['userID']){
      $userID=$_SESSION['userID'];
    }
  $postSuccessMessage = '';
  $noPosts = '';
  $username = '';
  $targetImg = '';
  $deleteBtn ='';

  if(!empty($_POST["postSubmit"])) {
    $postHeader = $_POST["title"];
    $postLocation = $_POST["location"];
    $transport = $_POST["transport"];
    $postBody = $_POST["description"];
    $targetImg = $_FILES['image']['name'];
    $date = date("d.m.Y.");

$sqlInsert = "INSERT INTO posts(postID, postbody, postheader, postdate, postimage, userID, postlocation, transport) VALUES (null,'".$postBody."','".$postHeader."','".$date."','".$targetImg."', ".$userID.",'".$postLocation."','".$transport."')";
$resultInsert = $conn->query($sqlInsert);

var_dump($resultInsert);
if($resultInsert === true) {
  $postSuccessMessage = 'Vaš status je uspešno evidentiran.';
} else {
  $postSuccessMessage = 'Imate grešku u konekciji: '.$conn->error;
  }
};
//end of insert post code

  /***************************/
  /**Give me posts and users**/
  /***************************/

  $sqlSelect = "SELECT posts.postID,
                  posts.postbody,
                  posts.postheader,
                  posts.postlocation,
                  posts.postdate,
                  posts.userID,
                  posts.transport,
                  posts.postimage,
                  users.userID,
                  users.userimage,
                  users.status,
                  users.displayname,
                  users.firstname,
                  users.lastname,
                  users.username
                  FROM posts INNER JOIN
                  users ON posts.userID = users.userID
                  ORDER BY posts.postID DESC";

  $result = $conn->query($sqlSelect);
  $postRows = [];

if ($result->num_rows > 0) {
 // output data of each row
 while($row = $result->fetch_assoc()) {
   $postRows[] = $row;
 }
} else {
 $noPosts = "0 results";
}
$conn->close();

//Getting URL of this page
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $link = "https";
else
    $link = "http";

// Here append the common URL characters.
$link .= "://";

// Append the host(domain name, ip) to the URL.
$link .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL
$link .= $_SERVER['REQUEST_URI'];


//end of defining variables, now we need to send them to template

/******************************************************/
/**Send those variables to our template dashboard.tpl**/
/******************************************************/
$smarty->assign (
  'username',
  $username
);

$smarty->assign (
  'link',
  $link
);

$smarty->assign (
  'postSuccessMessage',
  $postSuccessMessage
);

$smarty->assign (
  'noPosts',
  $noPosts
);

$smarty->assign (
  'currentUser',
  $currentUser
);

$smarty->assign (
  'currentUserID',
  $currentUserID
);

$smarty->assign (
  'deleteBtn',
  $deleteBtn
);

$smarty->assign (
  'userID',
  $userID
);

$smarty->assign (
  'displaycurrent',
  $displaycurrent
);
/*End send request*/

$smarty->assign (
  'postRows',
  $postRows
);

$smarty->display('dashboard.tpl');
?>
