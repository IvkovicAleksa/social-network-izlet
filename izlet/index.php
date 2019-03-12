<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/mediaqueries.css">
</head>
<body>

<div class="content">
<div class="line"></div>

<header>
    <div id="logo">
        <img src="images/izlet_logo.svg" alt="logo" height="70">
    </div>
    <nav>
        <a href="#">O nama</a>
        <a href="#">Kontakt</a>
        <a href="#">Posao</a>
    </nav>
</header>

<div class="text-box">

    <span class="heading-main">Izlet</span>
    <span class="heading-sub">kada zelite da pobegnete na dan...</span>

</div>

<div class="form-section">
    <form action="dashboard.php" method="post" class="login_form">
        <h3>Log in</h3>
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <input type="submit" name="login" value="Log in" class="colored_btn">

    </form>

    <form action="index.php" method="post" class="register_form">
        <h3>Not a member?</h3>
        <h3>Register</h3>
        <label for="name">name</label>
        <input type="name" name="name">
        <label for="username">username</label>
        <input type="text" name="username">
        <label for="email">email</label>
        <input type="email" name="email">
        <label for="password">password</label>
        <input type="password" name="password">
        <input type="submit" name="register" value="Register" class="colored_btn">
    </form>
</div> 

<footer>
    <div class="page">
           <a href="#">O nama</a>
    </div>
</footer>
</div>

</body>
</html>