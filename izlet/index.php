<?php include("config/config.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Izlet</title>
    
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/indexMediaQueries.css">
</head>
<body>

<header>
   <div class="line">
        <nav class="mobile-nav">
            <a class="a_bold" href="gallery.php">Galerija</a>
        </nav>
   </div>
   <div class="navbar">
    <div id="logo">
        <img src="images/izlet_logo.svg" alt="logo" height="70">
    </div>
    <nav class="main-nav">
        <a class="a_bold" href="gallery.php">Galerija</a>
    </nav>
    </div>
</header>


<?php 
    
    if(@$_GET['registerMessage']) {
        $registerMessage = $_GET['registerMessage'];
echo
            
<<<HTML
<div style="position: absolute; top: 100px; left: 30%; display: flex; justify-content: center; padding: 20px; z-index: 2200;">
<div style="background-color: #506CDB; color: white; padding: 20px; ">
    $registerMessage
    
<span class="closebtn" onclick="close()" style="border: 1px solid white; padding: 0 5px; margin-left: 5px; cursor: pointer;">&times;</span>
</div>
</div>
HTML;
    
    }
?>

<?php 
    
    if(@$_GET['obavestenje']) {
        $obavestenje = $_GET['obavestenje'];
echo
            
<<<HTML
<div style="position: absolute; top: 100px; left: 40%; display: flex; justify-content: center; padding: 20px; z-index: 2200;">
<div style="background-color: #506CDB; color: white; padding: 20px; ">
    $obavestenje
    
<span class="closebtn" onclick="close()" style="border: 1px solid white; padding: 0 5px; margin-left: 5px; cursor: pointer;">&times;</span>
</div>
</div>
HTML;
    
    }
?>

<div class="text-box">

    <span class="heading-main">Izlet</span>
    <span class="heading-sub">kada želite da pobegnete na dan...</span>

</div>


<div class="bg-blur"></div>

<div class="form-section">
   <div class="login_form">
    <form action="processlogin.php" method="post">
        <h3>Imate nalog:</h3>
        <input type="text" name="username" placeholder="korisničko ime" autocomplete="off">
        <input type="password" name="password" placeholder="lozinka">
        <input type="submit" name="login" value="Uloguj se" class="colored_btn">
    </form>
    </div>
    <div class="register_form">
    <form action="processregister.php" method="post">
        <h3>Nemate nalog?</h3>
        <label for="firstname">ime</label>
        <input type="text" name="firstname" autocomplete="off" required>
        <label for="lastname">prezime</label>
        <input type="text" name="lastname" autocomplete="off" required>
        <label for="username">korisničko ime</label>
        <input type="text" name="username" autocomplete="off" required>
        <label for="email">e-mail</label>
        <input type="email" name="email" autocomplete="off" required>
        <label for="password">lozinka</label>
        <input type="password" name="password" required>
        <input type="submit" name="register" value="Registruj se" id="blue_btn">
    </form>
    </div>
</div> 

<footer>
    <h1 id="onama">O nama</h1>
    <br>
    <p>Mi smo grupa entuzijasta, zaljubljenih u prirodu i kratke izlete u nju. Pokrenuli smo ovu društvenu mrežu sa ciljem da razmenimo ideje i utiske o idealnim destinacijama za kratke izlete u Srbiji i regionu.
    </p>
    <p>
    Možete da ostavite vaše slike i utiske sa onih mesta koja su vas očarala svojom lepotom i koje biste preporučili drugim zaljubljenicama u netaknutu prirodu. Ovde možete dobiti ideju i gde otići sledeći vikend.
    </p>
    
    <div class="contact">
        <a id="contact_btn" href="../digitalis/digi.html">Naš sajt</a>
        <div>
            &copy; Digitalis 2019
        </div>
    </div>
</footer>

<script>
    
  var hour = new Date().getHours();
  var body = document.getElementsByTagName("body")[0];
  
    if(hour > 6 && hour < 19) {
        body.className -= "noc";

    } else {
          body.className = "noc";
    }
    
        var close = document.querySelector('.closebtn');
    close.addEventListener('click', function() {
        this.parentElement.style.opacity = "0";
    })
    
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
 
</script>
</body>
</html>