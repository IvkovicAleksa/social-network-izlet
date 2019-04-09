<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <style>
        header {
            position: sticky;
            top: 0;
            left: 0;
            grid-row: 1/2;
            grid-column: 1/-1;
            z-index: 1;
        }

        .line {
            background-color: #000;
            height: 20px;
        }

        .navbar {
            padding-left: 10%;
            display: flex;
            align-items: center;
            width: 10%;
        }

        #logo {
            background-color: #000;
            padding: 15px 10px;
            border-radius: 0 0 50px 50px;
        }
    </style>

</head>
<body>

<header>
   <div class="line"></div>
   <div class="navbar">
    <div id="logo">
        <img src="images/izlet_logo.svg" alt="logo" height="70">
    </div>
    </div>
</header>

</body>
</html>
