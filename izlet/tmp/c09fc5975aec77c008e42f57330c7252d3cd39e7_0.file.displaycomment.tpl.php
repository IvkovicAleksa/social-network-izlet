<?php
/* Smarty version 3.1.33, created on 2019-04-05 11:32:33
  from '/storage/ssd5/543/9014543/public_html/izlet/views/displaycomment.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ca73cd11e4c21_99578875',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c09fc5975aec77c008e42f57330c7252d3cd39e7' => 
    array (
      0 => '/storage/ssd5/543/9014543/public_html/izlet/views/displaycomment.tpl',
      1 => 1554463911,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.php' => 1,
    'file:sidebar.php' => 1,
  ),
),false)) {
function content_5ca73cd11e4c21_99578875 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Izlet</title>
    
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo '<script'; ?>
>history.scrollRestoration = "manual"<?php echo '</script'; ?>
>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" type="text/css" href="css/posts.css">
    <link rel="stylesheet" type="text/css" href="css/popup.css">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="css/displaycomment.css">
    <link rel="stylesheet" type="text/css" href="css/mediaqueries.css">
  </head>
  <body>
<?php $_smarty_tpl->_subTemplateRender('file:header.php', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
  <div id="bcground-PopUp" style="display:none">
  </div>
  <div class="popupComment" style="display:none">
      <div id="close"><i class="fas fa-times"></i></div>
      <div class="img-wrap"><img src="images/placeholder.png"></div>
      <form class="newcomment" action="comment.php" method="POST">
        <input type="hidden" id="id" name="id" value=""/>
        <input type="hidden" name="currentUserID" value="<?php echo $_smarty_tpl->tpl_vars['currentUserID']->value;?>
"/>
        <input type="hidden" name="url" value="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
"/>
        <label>Ostavite komentar:</label>
        <textarea cols="10" rows="5" name="text"></textarea>
        <input type="submit" name="dodaj">
      </form>
   </div>
   <div class="popupMap" style="display:none">
     <div id="close4"><i class="fas fa-times"></i></div>
     <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d11333.633913216536!2d20.457315649999998!3d44.7520835!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2srs!4v1554291837863!5m2!1sen!2srs" allowfullscreen></iframe>
   </div>
      <div class="img-container">
        <img src='uploads/<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
'/>
      </div>
      <div class="postheader">
        <div class="headertxt">
          <h2><?php echo $_smarty_tpl->tpl_vars['header']->value;?>
</h2>
          <div class="location">
            <h4><?php echo $_smarty_tpl->tpl_vars['location']->value;?>
</h4>
            <i class="far fa-map" onclick="GetMap()"></i>
          </div>
        </div>

          <div class="headerphoto">
            <?php if ($_smarty_tpl->tpl_vars['transport']->value == 'car') {?>
             <i class="fas fa-car fa-3x"></i>
            <?php } elseif ($_smarty_tpl->tpl_vars['transport']->value == 'bus') {?>
             <i class="fas fa-bus"></i>
            <?php } elseif ($_smarty_tpl->tpl_vars['transport']->value == 'walk') {?>
             <i class="fas fa-walking"></i>
            <?php } elseif ($_smarty_tpl->tpl_vars['transport']->value == 'motorbike') {?>
             <i class="fas fa-motorcycle"></i>
            <?php } elseif ($_smarty_tpl->tpl_vars['transport']->value == 'bicycle') {?>
             <i class="fas fa-bicycle"></i>
            <?php }?>
          </div>

      </div>
      <div class="btnleft">
         <div id="userBtn">
          <img src="images/placeholder.png" alt="profile-img" class="BtnImg"><a href="profile.php?username=<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['userID']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</a></div>
         <button class="commentBtn" onclick="popupComment(<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
)">Comment</button>
      </div>
      <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['postRows']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
      <div class="comments">
        
        <div class="commInfo">  
        <h4><?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['username'];?>
</h4>
        <p><?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['date'];?>
</p>
        </div>
        <div class="comm">
        <p><?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['commentBody'];?>
</p>
        </div>
        
      </div>
      <?php
}
}
?>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:sidebar.php', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <?php echo '<script'; ?>
 type="text/javascript" src="js/javascript.js"><?php echo '</script'; ?>
>
  </body>
</html>
<?php }
}
