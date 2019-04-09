<?php
/* Smarty version 3.1.33, created on 2019-04-05 22:49:07
  from 'C:\xampp\htdocs\webhost digitalis\izlet\views\profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ca7bf4381cfb5_36602191',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30293383d2bb4a772820417c84eb06078ff79c55' => 
    array (
      0 => 'C:\\xampp\\htdocs\\webhost digitalis\\izlet\\views\\profile.tpl',
      1 => 1554496033,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca7bf4381cfb5_36602191 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
                    <div id="img" style="background-image: url('images/<?php echo $_smarty_tpl->tpl_vars['selectedUser']->value;?>
.jpg'); background-position:center; background-repeat: no-repeat; background-size:cover;">
                    </div>
                </div>
                <div class="dugmici2">
                    <div id="edit" class="username">
                        <?php if ($_smarty_tpl->tpl_vars['displayname']->value != '') {?> <?php echo $_smarty_tpl->tpl_vars['displayname']->value;?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['selectedUser']->value;?>
 <?php }?>
                    </div>
                    <p class="status">
                        <?php echo $_smarty_tpl->tpl_vars['status']->value;?>

                    </p>
                </div>
            </div>
            <form id="profilforma" action="profile.php?username=<?php echo $_smarty_tpl->tpl_vars['selectedUser']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['selectedUserID']->value;?>
" method="post" enctype="multipart/form-data">

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

                <a href="profile.php?username=<?php echo $_smarty_tpl->tpl_vars['currentUser']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['userID']->value;?>
">
                    <div id="profileBtn"><img src="images/placeholder.png" alt="profile-img" class="BtnImg"> <?php if ($_smarty_tpl->tpl_vars['displaycurrent']->value != '') {?> <?php echo $_smarty_tpl->tpl_vars['displaycurrent']->value;?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['currentUser']->value;?>
 <?php }?>
                    </div>
                </a>

                <div id="dashboardBtn"><a href="dashboard.php">Početna</a></div>

            </div>
            <div class="logoutWrap"><a href="logout.php" id="logoutBtn">Izloguj se</a></div>
        </div>
        <div class="wrapper">
            <section class="header" style="background-image: url('uploads/<?php echo $_smarty_tpl->tpl_vars['mostRecentImage']->value;?>
'); background-position:bottom; background-attachment: fixed; background-repeat: no-repeat; background-size: cover;">

                <div class="profil">
                    <div class="puffer">
                                                <div class="poligon">
                            <div id="img" style="background-image: url('images/<?php echo $_smarty_tpl->tpl_vars['selectedUser']->value;?>
.jpg'); background-position:center; background-repeat: no-repeat; background-size:cover;">
                            </div>
                        </div>

                        <p class="status">
                            <?php echo $_smarty_tpl->tpl_vars['status']->value;?>


                        </p>

                        <div class="dugmici">
                            <div class="username">
                                <?php if ($_smarty_tpl->tpl_vars['displayname']->value != '') {?> <?php echo $_smarty_tpl->tpl_vars['displayname']->value;?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['selectedUser']->value;?>
 <?php }?>
                            </div>
                            <?php if ($_smarty_tpl->tpl_vars['selectedUser']->value === $_smarty_tpl->tpl_vars['currentUser']->value) {?>
                            <div class="editbutton">
                                Podesi profil
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <div class="headerdesno"></div>
            </section>
            <main>
                <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['postRows']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                <section class="post">
                    <div class="postlevo">
                        <div class="slika" style="background-image: url(uploads/<?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['postimage'];?>
)">
                            &nbsp;
                        </div>
                    </div>
                    <div class="postdesno ">
                        <span class="naslov"><?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['postheader'];?>
</span>
                        <div class="postBody">
                            <p id="post"><?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['postbody'];?>
</p>
                        </div>

                    </div>
                </section>

                <?php
}
}
?>

            </main>
        </div>
    </div>

    <footer>
        <a href="profile.php?username=<?php echo $_smarty_tpl->tpl_vars['currentUser']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['userID']->value;?>
"><i class="fas fa-user"></i></a>
        <a href="dashboard.php"><i class="fas fa-angle-left"></i></a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
    </footer>


    <?php echo '<script'; ?>
>
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
    <?php echo '</script'; ?>
>



</body>

</html><?php }
}
