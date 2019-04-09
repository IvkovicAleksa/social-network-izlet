<?php
/* Smarty version 3.1.33, created on 2019-04-04 15:03:19
  from '/storage/ssd5/543/9014543/public_html/izlet/header.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ca61cb733db59_71404998',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e43115afbf2c9f8ac07bd36b46a9c0059c26859f' => 
    array (
      0 => '/storage/ssd5/543/9014543/public_html/izlet/header.php',
      1 => 1554389872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca61cb733db59_71404998 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
<?php }
}
