<?php
include("config/config.php");
$conn = new mysqli(SERVER, USER, PASS, DB);
				// Check connection
				if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
} ;

  $link = '';

if(!empty($_POST["dodaj"])){
	$link = $_POST["url"];
	$kom = $_POST["text"];
	$userID = $_POST["currentUserID"];
	$postID = $_POST["id"];
	$date = date("d.m.Y.");
					$sqlInsert= "INSERT INTO comments(postID, userID, commentBody, date) VALUES ('".$postID."','".$userID."','".$kom."','".$date."')";
					$insert = $conn->query($sqlInsert);
					if($insert === true){
						$message = "Komentar je dodat";
					} else {
						$message = "Imate gresku ".$conn->error;
					}
				}
header('Location:'.$link);
?>
