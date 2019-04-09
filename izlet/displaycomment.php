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
include('config/config.php');
$conn = mysqli_connect(SERVER, USER, PASS, DB);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$currentUser = $_SESSION['username'];
$currentUserID = $_SESSION['userID'];
$displaycurrent =  $_SESSION['displayname'];

$transport = '';
$userID = '';
if($_SESSION['userID']){
    $userID=$_SESSION['userID'];
  }

    $image = $_GET["postimage"];
    $username = $_GET["username"];
    $userID = $_GET["userID"];
    $transport = $_GET["transport"];
    $header = $_GET["postheader"];
    $location = $_GET["postlocation"];
    $id = $_GET["postid"];
    $comment = '';

    $sqlSelect = "SELECT * FROM comments INNER JOIN users ON comments.userID = users.userID WHERE postID = $id";
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
    'link',
    $link
  );

  $smarty->assign (
    'image',
    $image
  );

  $smarty->assign (
    'header',
    $header
  );

  $smarty->assign (
    'location',
    $location
  );

  $smarty->assign (
    'username',
    $username
  );

  $smarty->assign (
    'userID',
    $userID
  );

  $smarty->assign (
    'transport',
    $transport
  );

  $smarty->assign (
    'id',
    $id
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
    'displaycurrent',
    $displaycurrent
  );

  $smarty->assign (
    'userID',
    $userID
  );

  /*End send request*/

  $smarty->assign (
    'postRows',
    $postRows
  );

  $smarty->display('displaycomment.tpl');
?>
