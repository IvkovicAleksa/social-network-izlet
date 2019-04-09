<?php
include('config/config.php');

$registerMessage = false;

if(!empty($_POST['register'])) {
   
   $ok = true;
    
    //provera da li su uneti svi podaci
    
    if(empty($_POST['firstname'])) {
        $ok = false;
    }
    
    if(empty($_POST['lastname'])) {
        $ok = false;
    }
    if(empty($_POST['email'])) {
        $ok = false;
    }
    if(empty($_POST['username'])) {
        $ok = false;
    }
    if(empty($_POST['password'])) {
        $ok = false;
    }
     
    if($ok == true) {
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        
        $hash = password_hash($password, PASSWORD_DEFAULT);
        
        
        // add database code here
        
        $conn = mysqli_connect(SERVER, USER, PASS, DB);
        
        $sql_u = "SELECT * FROM users WHERE username='$username'";
        $res_u = mysqli_query($conn, $sql_u);
        
        if (mysqli_num_rows($res_u) > 0) {
            $registerMessage = "Username already exists";
            header("Location: index.php?registerMessage=$registerMessage");
        } else {
        
        //SECURITY MEASURES
        
        $escapeFirstName = mysqli_real_escape_string($conn, $firstname);
        $escapeLastName = mysqli_real_escape_string($conn, $lastname);
        $escapeEmail = mysqli_real_escape_string($conn, $email);
        $escapeUsername = mysqli_real_escape_string($conn, $username);
        $escapeHash = mysqli_real_escape_string($conn, $hash);
        
        $sql = "INSERT INTO users (firstname, lastname, email, username, password) VALUES ('".$escapeFirstName."',
        '".$escapeLastName."',
       '".$escapeEmail."',
       '".$escapeUsername."',
       '".$escapeHash."'
        )";
        
        
        $registerUser = mysqli_query($conn, $sql);

       if($registerUser === true){
        
           $registerMessage = "Zdravo ".$username.", uspešno ste se registrovali!";
           header("Location: index.php?registerMessage=$registerMessage");
       } else {
           $registerMessage = "Error description: " . mysqli_error($conn);
       }
       echo $registerMessage;
       
        }
       mysqli_close($conn);
       
   }
 }

?>