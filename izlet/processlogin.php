<?php

session_start();
include("config/config.php");

//definisemo varijable

$username = !empty($_POST['username']);
$password = !empty($_POST['password']);


//provera da li su prazne

if($username && $password) {
    $db = mysqli_connect(SERVER, USER, PASS, DB);
    
    //promenimo enkodiranje na utf8
    mysqli_set_charset($db, "utf8");
    

    $sql = sprintf("SELECT * FROM users WHERE username='%s'",
        mysqli_real_escape_string($db, $_POST['username'])          
    );
    
    
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if($row) {
        $hash = $row['password'];
        
        if(password_verify($_POST['password'], $hash)) {
            $message = 'Login successful.';
            
            $_SESSION['username'] = $row['username'];
            $_SESSION['userID'] = $row['userID'];
            $_SESSION['userimage'] = $row['userimage'];
            $_SESSION['firstname'] = $row['firstname'];

            
            
            header('Location: dashboard.php');
        } else {

            echo "Pogresna lozinka";
        }
    } else {
        echo "Pogresni podaci";
    }
    mysqli_close($db);
} else {
    echo "Niste popunili sva polja";
}


?>