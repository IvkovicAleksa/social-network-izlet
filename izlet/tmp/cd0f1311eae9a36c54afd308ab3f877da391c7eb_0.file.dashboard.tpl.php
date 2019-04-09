<?php
/* Smarty version 3.1.33, created on 2019-04-05 11:31:17
  from '/storage/ssd5/543/9014543/public_html/izlet/views/dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ca73c859acf25_47206254',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd0f1311eae9a36c54afd308ab3f877da391c7eb' => 
    array (
      0 => '/storage/ssd5/543/9014543/public_html/izlet/views/dashboard.tpl',
      1 => 1554463872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.php' => 1,
    'file:sidebar.php' => 1,
  ),
),false)) {
function content_5ca73c859acf25_47206254 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/storage/ssd5/543/9014543/public_html/izlet/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!DOCTYPE html>
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/mediaqueries.css">
    <link rel="stylesheet" href="css/popup.css">
    <link rel="stylesheet" href="css/posts.css">
  </head>
  <body>

    <?php $_smarty_tpl->_subTemplateRender('file:header.php', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="container">
        <div class="sidebarBtn" onclick="showSdb()">
      <i class="fas fa-align-justify fa-3x"></i>
    </div>
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
            <input type="submit" name="dodaj" value="Dodaj">
          </form>
       </div>

         <div class="popupPost" style="display:none">
         <div id="close2"><i class="fas fa-times"></i></div>
         <h1>Nova objava</h1>
         <form class="newpost" action="dashboard.php" method="post" enctype="multipart/form-data" autocomplete="off">
           <input type="text" name="title" maxlength="20" placeholder="Naziv" required>
           <input id="pac-input" type="text" name="location" placeholder="Lokacija" required>
           <label class="custom-file-upload"><input type="file" name="image" id="image" required>Izaberi...</label>
           <select class="transport" name="transport" required>
             <option value="walk">Peške</option>
             <option value="car">Automobilom</option>
             <option value="motorbike">Motociklom</option>
             <option value="bicycle">Biciklom</option>
             <option value="bus">Autobusom</option>
           </select>
           <textarea name="description" rows="5" cols="10" placeholder="Opis" required></textarea>
           <input type="submit" name="postSubmit" value="Objavi">
         </form>
         </div>

         <div class="popupEdit" style="display:none">
         <div id="close3"><i class="fas fa-times"></i></div>
         <h1>Izmeni objavu</h1>
         <form class="newpost" action="insertEdit.php" method="post" enctype="multipart/form-data" autocomplete="off">
           <input id="title" type="text" maxlength="20" name="title" value="">
           <input id="location" type="text" name="location" value="">
           <div class="img-wrap">
             <img id="edit-img" src=NULL alt="thumbnail"/>
             <label class="custom-file-upload"><input type="file" name="image" id="updateImage" value="" onchange="previewFile()">Promeni sliku</label>
           </div>
           <select id="transport" class="transport" name="transport">
             <option value="walk">Peške</option>
             <option value="car">Automobilom</option>
             <option value="motorbike">Motociklom</option>
             <option value="bicycle">Biciklom</option>
             <option value="bus">Autobusom</option>
           </select>
           <input type="hidden" name="edit" id="edit" value="">
           <textarea id="description" name="description" rows="5" cols="10" value=""></textarea>
           <input type="submit" name="postSubmit" value="Objavi">
         </form>
         </div>

         <div class="popupMap" style="display:none">
           <div id="close4"><i class="fas fa-times"></i></div>
           <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d11333.633913216536!2d20.457315649999998!3d44.7520835!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2srs!4v1554291837863!5m2!1sen!2srs" allowfullscreen></iframe>
         </div>
       <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['postRows']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
       <div class="posts">
	       <div class="date">
            <h1><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['postdate'],"%d");?>
</h1>
            <h3><?php echo mb_strtoupper(smarty_modifier_date_format($_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['postdate'],"%b"), 'UTF-8');?>
</h3>
	       </div>
         <a href="displaycomment.php?postid=<?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['postID'];?>
&userID=<?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['userID'];?>
&username=<?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['username'];?>
&postimage=<?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['postimage'];?>
&postheader=<?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['postheader'];?>
&transport=<?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['transport'];?>
&postlocation=<?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['postlocation'];?>
">
  	       <div class="photo tooltip" style="background-image: url('uploads/<?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['postimage'];?>
')">
               <span class="tooltiptext">Vidi komentare</span>
  	       </div>
         </a>
	       <div class="text">
		         <div class="postheader">
			            <div class="headertxt">
				             <h2><?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['postheader'];?>
</h2>
                     <div class="location">
                       <h4><?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['postlocation'];?>
</h4>
                         <i class="far fa-map" onclick="GetMap(<?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['postID'];?>
)"></i>
                         <?php if ($_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['userID'] == $_smarty_tpl->tpl_vars['userID']->value) {?>
                           <a href="javascript:void(0)" onclick="myFunction('edit<?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['postID'];?>
')"><i class="fas fa-ellipsis-v"></i></a>
                           <div id="edit<?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['postID'];?>
" style="display:none" >
                             <i class="fas fa-edit" onclick="popupEdit(<?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['postID'];?>
)"></i>
                             <a id="deleteBtn" href="delete.php?idPost=<?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['postID'];?>
" onclick="return confirm('Want to delete?')"><i class="fas fa-trash-alt"></i></a>
                           </div>
                         <?php }?>
                     </div>
			            </div>
			            <div class="headerphoto">
                    <?php if ($_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['transport'] == 'car') {?>
				             <i class="fas fa-car fa-3x"></i>
                    <?php } elseif ($_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['transport'] == 'bus') {?>
                     <i class="fas fa-bus"></i>
                    <?php } elseif ($_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['transport'] == 'walk') {?>
                     <i class="fas fa-walking"></i>
                    <?php } elseif ($_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['transport'] == 'motorbike') {?>
                     <i class="fas fa-motorcycle"></i>
                    <?php } elseif ($_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['transport'] == 'bicycle') {?>
                     <i class="fas fa-bicycle"></i>
                    <?php }?>
		              </div>
		        </div>
		     <div class="textbody">
            <p><?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['postbody'];?>
</p>
		     </div>

		     <div class="buttons">
			        <div class="btnleft">
				         <div id="userBtn" class="tooltip">
                   <img src="images/placeholder.png" alt="profile-img" class="BtnImg"/>
                   <a href="profile.php?username=<?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['username'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['userID'];?>
">

                  <?php if ($_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['displayname'] != '') {?>
                            <?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['displayname'];?>

                           <?php } else { ?>
                           <?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['username'];?>

                           <?php }?>

                </a>
                   <span class="tooltiptext"><p><?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['lastname'];?>
</p></span>
                 </div>
				         <button class="commentBtn" onclick="popupComment(<?php echo $_smarty_tpl->tpl_vars['postRows']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['postID'];?>
)">Komentar</button>
			        </div>
			        <div class="btnright">
				         <button class="vote" onmouseover="favorite()"><i class="fas fa-star fa-2x"></i></button>
			        </div>
		     </div>
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
    <?php echo '<script'; ?>
 type="text/javascript" src="js/sidebar.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgJogmErg3IkanvRFyfrT48mJ1xcUIGXI&libraries=places&language=hr"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/places.js"><?php echo '</script'; ?>
>
  </body>
</html>
<?php }
}
