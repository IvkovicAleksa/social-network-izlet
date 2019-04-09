<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/profile.css" />
    <link rel="stylesheet" href="css/mediaQueriesProfile.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
</head>

<body>
    <!-- ovde pocinje popup profila-->
    <div class="popup">
        <i id="x" class="fas fa-times"></i>
        <div class="cont">
            <div id="imageheaderedit">
                <div class="poligonold">
                    <div id="img" style="background-image: url('images/{$selectedUser}.jpg'); background-position:center; background-repeat: no-repeat; background-size:cover;">
                    </div>
                </div>
                <div class="dugmici2">
                    <div id="edit" class="username">
                        {if $displayname != ''} {$displayname} {else} {$selectedUser} {/if}
                    </div>
                    <p class="status">
                        {$status}
                    </p>
                </div>
            </div>
            <form id="profilforma" action="profile.php?username={$selectedUser}&id={$selectedUserID}" method="post" enctype="multipart/form-data">

                <div id="input2">
                    Ime profila <input type="text" name="displayname"></div>

                <div id="input2">Nešto o meni<input type="text" name="status" placeholder="najviše 50 karaktera"></div>

                <div id="input3"> <input class="fileup" type="file" name="userimage" id="blue_btn2"></div>


                <div class="editbtn">
                    <input type="submit" name="editprofile" value="Sačuvaj" id="submit"></div>

            </form>

        </div>
    </div>



    </div>

    <!-- ovde se zavrsava popup -->



    <div class="pozadina"></div>
    <div class="blur">
        <header id="header">
            <div class="line"></div>
            <div class="navbar">
                <div id="logo">
                    <img src="images/izlet_logo.svg" alt="logo" height="70">
                </div>
            </div>
        </header>
        <div class="sidebar">
            <div class="main-buttons">

                <a href="profile.php?username={$currentUser}&id={$userID}">
                    <div id="profileBtn"><img src="images/placeholder.png" alt="profile-img" class="BtnImg"> {if $displaycurrent != ''} {$displaycurrent} {else} {$currentUser} {/if}
                    </div>
                </a>

                <div id="dashboardBtn"><a href="dashboard.php">Početna</a></div>

            </div>
            <div class="logoutWrap"><a href="logout.php" id="logoutBtn">Izloguj se</a></div>
        </div>
        <div class="wrapper">
            <section class="header" style="background-image: url('uploads/{$mostRecentImage}'); background-position:bottom; background-attachment: fixed; background-repeat: no-repeat; background-size: cover;">

                <div class="profil">
                    <div class="puffer">
                        {* OVAJ TRENUTAK *}
                        <div class="poligon">
                            <div id="img" style="background-image: url('images/{$selectedUser}.jpg'); background-position:center; background-repeat: no-repeat; background-size:cover;">
                            </div>
                        </div>

                        <p class="status">
                            {$status}

                        </p>

                        <div class="dugmici">
                            <div class="username">
                                {if $displayname != ''} {$displayname} {else} {$selectedUser} {/if}
                            </div>
                            {if $selectedUser === $currentUser}
                            <div class="editbutton">
                                Podesi profil
                            </div>
                            {/if}
                        </div>
                    </div>
                </div>
                <div class="headerdesno"></div>
            </section>
            <main>
                {section name=i loop=$postRows}
                <section class="post">
                    <div class="postlevo">
                        <div class="slika" style="background-image: url(uploads/{$postRows[i].postimage})">
                            &nbsp;
                        </div>
                    </div>
                    <div class="postdesno ">
                        <span class="naslov">{$postRows[i].postheader}</span>
                        <div class="postBody">
                            <p id="post">{$postRows[i].postbody}</p>
                        </div>

                    </div>
                </section>

                {/section}

            </main>
        </div>
    </div>

    <footer>
        <a href="profile.php?username={$currentUser}&id={$userID}"><i class="fas fa-user"></i></a>
        <a href="dashboard.php"><i class="fas fa-angle-left"></i></a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
    </footer>


    <script>
        let edit = document.getElementsByClassName("editbutton")[0];
        edit.addEventListener("click", popup);
        let blur = document.getElementsByClassName("blur")[0];
        let x = document.getElementById("x");
        let popup_div = document.getElementsByClassName("popup")[0];
        let pozadina = document.getElementsByClassName('pozadina')[0];
        pozadina.addEventListener('click', closepopup);
        x.addEventListener("click", closepopup);

        function popup() {
            blur.style.cssText = "filter: blur(5px);background-color: #0000004b; overflow: hidden";
            popup_div.style.cssText += "display: block; ";
            pozadina.style.cssText += "display: block; ";
            console.log(4);
        }

        function closepopup() {

            blur.style.cssText = "filter: blur();background-color: #00000000;  overflow: hidden";
            popup_div.style.cssText += "display: none; ";
            pozadina.style.cssText += "display: none; ";
            window.location.reload();
        }

        /* document.body.addEventListener('keydown', function(event) {
            if (event.keyCode == 27) {
                blur.style.cssText = "filter: blur();background-color: #00000000;  overflow: hidden";
                popup_div.style.cssText += "display: none; ";
                pozadina.style.cssText += "display: none; ";
            }
        }); */

        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
        let width = window.innerWidth;
        if (width <= 900) {
            var prevScrollpos = window.pageYOffset;
            window.onscroll = function() {
                var currentScrollPos = window.pageYOffset;
                if (prevScrollpos > currentScrollPos) {
                    document.getElementById("header").style.top = "0";
                } else {
                    document.getElementById("header").style.top = "-150px";
                }
                prevScrollpos = currentScrollPos;
            }
        }
    </script>



</body>

</html>