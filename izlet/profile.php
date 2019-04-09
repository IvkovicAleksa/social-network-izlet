<?php
/***********************************************/
/**initial settings for the smarty tpl engines**/
/***********************************************/
session_start();
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


include("config/config.php");
if(empty($_SESSION['username'])) {
  header('Location: index.php');
}
$conn = new mysqli(SERVER, USER, PASS, DB);

  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
  }

  $currentUser = $_SESSION['username'];
    $selectedUser = $_GET['username'];
    $selectedUserID = $_GET['id'];
    $displaycurrent =  $_SESSION['displayname'];

  $userID = '';
  if($_SESSION['userID']){
      $userID=$_SESSION['userID'];
    }
  $postSuccessMessage = '';
  $noPosts = '';
  $file_name = '';
  $displayname = '';
  $status = '';
  $profileImg = '';
 


// kod za ubacivanje slika ( ubacuje sliku u folder)
    
  if(isset($_FILES['userimage'])){
    $errors = array();
    $file_name = $_SESSION['username'].".jpg";
    $file_size = $_FILES['userimage']['size'];
    $file_tmp = $_FILES['userimage']['tmp_name'];
    $file_type = $_FILES['userimage']['type'];
    $tmp = explode('.',$_FILES['userimage']['name']);
    $file_ext = end($tmp);
    $extensions = array("jpeg","jpg","png","gif");
    $uploads_dir ='images/';
    
  // if(in_array($file_ext,$extensions)=== false){
  //   $errors[]="Extension not allowed, please chose a JPEG, JPG, PNG or GIF file.";
  // }
    
  // if($file_size > 3145728){
  //   $errors[]='File size must be excately 3 MB';
  // }
    
  if(empty($errors)== true){
    $img_dir = $uploads_dir.$file_name;
    
    move_uploaded_file($file_tmp,$uploads_dir.$file_name);
    // echo "Success";
  }else{
    print_r($errors);
  }
  };
  
    //kraj uploada fajla 


if(!empty($_POST["editprofile"])) {
   
   $status = ($_POST["status"]);
   $displayname = ($_POST["displayname"]);
   
   $profileImg = '';
   if(!empty($_FILES["userimage"]["name"])){
   $profileImg = $file_name;
   }
if(!empty($profileImg) and !empty($status) and !empty($displayname)){
$sqlInsert = "UPDATE users
set userimage='".$profileImg."',
status='".$status."', displayname='".$displayname."' WHERE userID =".$selectedUserID.";";
$resultInsert = $conn->query($sqlInsert);
} elseif (!empty($status) and !empty($displayname) and empty($profileImg) ){
  $sqlInsert = "UPDATE users
set status='".$status."', displayname='".$displayname."' WHERE userID =".$selectedUserID.";";
$resultInsert = $conn->query($sqlInsert);
} elseif (!empty($status) and empty($displayname) and empty($profileImg) ){
  $sqlInsert = "UPDATE users
  set status='".$status."' WHERE userID =".$selectedUserID.";";
  $resultInsert = $conn->query($sqlInsert);
} elseif (empty($status) and !empty($displayname) and empty($profileImg) ){
  $sqlInsert = "UPDATE users
  set displayname='".$displayname."' WHERE userID =".$selectedUserID.";";
$resultInsert = $conn->query($sqlInsert);
} elseif (!empty($profileImg) and empty($status) and empty($displayname)){
  $sqlInsert = "UPDATE users
  set userimage='".$profileImg."' WHERE userID =".$selectedUserID.";";
  $resultInsert = $conn->query($sqlInsert);
}elseif (!empty($profileImg) and !empty($status) and empty($displayname)){
  $sqlInsert = "UPDATE users
  set userimage='".$profileImg."', status='".$status."' WHERE userID =".$selectedUserID.";";
  $resultInsert = $conn->query($sqlInsert);
}elseif (!empty($profileImg) and empty($status) and !empty($displayname)){
  $sqlInsert = "UPDATE users
  set userimage='".$profileImg."', displayname='".$displayname."' WHERE userID =".$selectedUserID.";";
  $resultInsert = $conn->query($sqlInsert);
};


};

//end of insert post code

//poseldnja slika user koju je okacio

// $mostRecentImage='';
$sqlimage = "SELECT posts.postimage,
                  MAX(postID)
                  FROM posts 
                  WHERE posts.userID = $selectedUserID";

$resultimage = $conn->query($sqlimage);
$imageRow = [];


if ($resultimage->num_rows > 0) {
// output data of each row
while($rowimg = $resultimage->fetch_assoc()) {
 $mostRecentImage = $rowimg['postimage'];
}
} else {
$mostRecentImage = "img05.jpg";
};

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
                  users.firstname,
                  users.userimage,
                  users.status,
                  users.displayname,
                  users.lastname,
                  users.username
                  FROM posts INNER JOIN
                  users ON posts.userID = users.userID
                  WHERE posts.userID = $selectedUserID
                  ORDER BY posts.postID DESC";

  
$result = $conn->query($sqlSelect);
  $postRows = [];

// $aboutme = '';
if ($result->num_rows > 0) {
 // output data of each row
 while($row = $result->fetch_assoc()) {
   $postRows[] = $row;
  //  $aboutme = $row['status'];
   $status = $row['status'];
   $displayname = $row['displayname'];
   $profileImg = $row['userimage'];
 }
} else {
  $mostRecentImage = "img05.jpg";
 $noPosts = "0 results";
 $profileImg = "user.png";
}

$sqlUsers = "SELECT users.userID,
                 users.firstname,
                 users.userimage,
                 users.status,
                 users.displayname,
                 users.lastname,
                 users.username
                 FROM users
                 WHERE users.userID = $selectedUserID";


$resultUser = $conn->query($sqlUsers);
 $userRows = [];

// $aboutme = '';
if ($resultUser->num_rows > 0) {
// output data of each row
while($rowUser = $resultUser->fetch_assoc()) {
  $userRows[] = $rowUser;
 //  $aboutme = $row['status'];
  $status = $rowUser['status'];
  $displayname = $rowUser['displayname'];
}
} else {
$noPosts = "0 results";
}




$conn->close();
//end of defining variables, now we need to send them to template

/******************************************************/
/**Send those variables to our template dashboard.tpl**/
/******************************************************/

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
  'userID',
  $userID
);

$smarty->assign (
  'selectedUser',
  $selectedUser
);


$smarty->assign (
  'status',
  $status
);

$smarty->assign (
  'displayname',
  $displayname
);


$smarty->assign (
  'selectedUserID',
 $selectedUserID
);

$smarty->assign (
  'profileImg',
 $profileImg
);

$smarty->assign (
  'displaycurrent',
  $displaycurrent
);

$smarty->assign (
  'userRows',
  $userRows
);
// $mostRecentImage = "img40.jpg";
$smarty->assign (
  'mostRecentImage',
  $mostRecentImage
);


/*End send request*/


$smarty->assign (
  'postRows',
  $postRows
);

$smarty->display('profile.tpl');
?>

