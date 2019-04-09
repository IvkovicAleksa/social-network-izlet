<?php
/* Smarty version 3.1.33, created on 2019-04-05 10:05:31
  from '/storage/ssd5/543/9014543/public_html/izlet/sidebar.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ca7286bbf9d46_11617312',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c01ea182a16581c77224bcc4e85ef6a6a3711dd9' => 
    array (
      0 => '/storage/ssd5/543/9014543/public_html/izlet/sidebar.php',
      1 => 1554458728,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ca7286bbf9d46_11617312 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="sidebar">
   <div class="main-buttons">
     <a href="profile.php?username=<?php echo $_smarty_tpl->tpl_vars['currentUser']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['userID']->value;?>
"><div id="profileBtn"><img src="images/placeholder.png" alt="profile-img" class="BtnImg">
     <!-- <?php echo $_smarty_tpl->tpl_vars['currentUser']->value;?>
 -->
     <!-- <?php if ($_smarty_tpl->tpl_vars['displayname']->value != '') {?> <?php echo $_smarty_tpl->tpl_vars['displayname']->value;?>
 <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['currentUser']->value;?>
 <?php }?> -->
     <?php if ($_smarty_tpl->tpl_vars['displaycurrent']->value != '') {?>
                               <?php echo $_smarty_tpl->tpl_vars['displaycurrent']->value;?>

                              <?php } else { ?>
                              <?php echo $_smarty_tpl->tpl_vars['currentUser']->value;?>

                              <?php }?>
                              </div></a>
     <div id="dashboardBtn"><a href="dashboard.php">Početna</a></div>
     <div id="newPostBtn"><a href="#">Nova objava</a></div>
   </div>
    <div class="logoutWrap"><a href="logout.php" id="logoutBtn">Izloguj se</a></div>
</div>

<div class="mobile-footer">
  <div id="profileBtn2"><a href="profile.php?username=<?php echo $_smarty_tpl->tpl_vars['currentUser']->value;?>
&id=<?php echo $_smarty_tpl->tpl_vars['userID']->value;?>
"><img src="images/placeholder.png" alt="profile-img" class="BtnImg"></a></div>
  <div id="newPostBtn2"><i class="fas fa-plus"></i></div>
  <a href="logout.php" id="logoutBtn2"><i class="fas fa-sign-out-alt"></i></a>
</div>
<?php }
}
