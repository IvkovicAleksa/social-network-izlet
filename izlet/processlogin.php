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
            $_SESSION['displayname'] = $row['displayname'];

            
            header('Location: dashboard.php');
        } else {
            $obavestenje = "Pogrešna lozinka";
           header("Location: index.php?obavestenje=$obavestenje");
        }
    } else {
        $obavestenje = "Pogrešni podaci";
           header("Location: index.php?obavestenje=$obavestenje");
        
    }
    mysqli_close($db);
} else {
    $obavestenje = "Niste popunili sva polja";
           header("Location: index.php?obavestenje=$obavestenje");
   
}


?>