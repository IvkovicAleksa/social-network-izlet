<?php include("config/config.php"); ?>
<?php include("processregister.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/mediaqueries.css">
</head>
<body>

<header>
   <div class="line">
       <nav class="mobile-nav">
        <a href="#onama">O nama</a>
        <a href="#contact_btn">Kontakt</a>
        <a href="#">Galerija</a>
    </nav>
   </div>
   <div class="navbar">
    <div id="logo">
        <img src="images/izlet_logo.svg" alt="logo" height="70">
    </div>
    <nav class="main-nav">
        <a href="#onama">O nama</a>
        <a href="#contact_btn">Kontakt</a>
        <a href="#">Galerija</a>
    </nav>
    </div>
</header>

<div class="text-box">

    <span class="heading-main">Izlet</span>
    <span class="heading-sub">kada zelite da pobegnete na dan...</span>

</div>

<div class="bg-blur"></div>

<div class="form-section">
   <div class="login_form">
    <form action="processlogin.php" method="post">
        <h3>Log in</h3>
        <input type="text" name="username" placeholder="username" autocomplete="off">
        <input type="password" name="password" placeholder="password">
        <input type="submit" name="login" value="Log in" class="colored_btn">
    </form>
    </div>
    <div class="register_form">
    <form action="index.php" method="post">
        <h2>Not a member?</h2>
        <h3>Register</h3>
        <label for="firstname">First name</label>
        <input type="text" name="firstname" autocomplete="off">
        <label for="lastname">Last name</label>
        <input type="text" name="lastname" autocomplete="off">
        <label for="username">username</label>
        <input type="text" name="username" autocomplete="off">
        <label for="email" autocomplete="off">email</label>
        <input type="email" name="email">
        <label for="password">password</label>
        <input type="password" name="password">
        <input type="submit" name="register" value="Register" class="colored_btn">
    </form>
    </div>
</div> 

<footer>
    <h1 id="onama">O nama</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum veritatis recusandae beatae, blanditiis possimus. Id non unde rem similique suscipit accusamus dignissimos, deserunt dolores totam nisi dolorem molestias ut voluptas sed possimus doloremque ea excepturi vero tempora! Amet accusantium inventore, eaque quaerat molestias doloribus facilis, culpa nobis nostrum adipisci consequuntur laborum iste sunt ex debitis sed excepturi suscipit distinctio ipsam eos est ducimus ullam in ab. </p>
    
    <div class="contact">
        <a id="contact_btn" href="mailto:proba@proba.com">Contact Us</a>
        <div>
            &copy; Digitalis 2019
        </div>
    </div>
</footer>

<script>
    
var close = document.querySelector('.closebtn');
    close.addEventListener('click', function() {
        this.parentElement.style.opacity = "0";
    })
</script>
</body>
</html>