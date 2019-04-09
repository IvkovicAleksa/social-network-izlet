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

    {include file='header.php'}
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
            <input type="hidden" name="currentUserID" value="{$currentUserID}"/>
            <input type="hidden" name="url" value="{$link}"/>
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
       {section name=i loop=$postRows}
       <div class="posts">
	       <div class="date">
            <h1>{$postRows[i].postdate|date_format:"%d"}</h1>
            <h3>{$postRows[i].postdate|date_format:"%b"|upper}</h3>
	       </div>
         <a href="displaycomment.php?postid={$postRows[i].postID}&userID={$postRows[i].userID}&username={$postRows[i].username}&postimage={$postRows[i].postimage}&postheader={$postRows[i].postheader}&transport={$postRows[i].transport}&postlocation={$postRows[i].postlocation}">
  	       <div class="photo tooltip" style="background-image: url('uploads/{$postRows[i].postimage}')">
               <span class="tooltiptext">Vidi komentare</span>
  	       </div>
         </a>
	       <div class="text">
		         <div class="postheader">
			            <div class="headertxt">
				             <h2>{$postRows[i].postheader}</h2>
                     <div class="location">
                       <h4>{$postRows[i].postlocation}</h4>
                         <i class="far fa-map" onclick="GetMap({$postRows[i].postID})"></i>
                         {if $postRows[i].userID eq $userID}
                           <a href="javascript:void(0)" onclick="myFunction('edit{$postRows[i].postID}')"><i class="fas fa-ellipsis-v"></i></a>
                           <div id="edit{$postRows[i].postID}" style="display:none" >
                             <i class="fas fa-edit" onclick="popupEdit({$postRows[i].postID})"></i>
                             <a id="deleteBtn" href="delete.php?idPost={$postRows[i].postID}" onclick="return confirm('Want to delete?')"><i class="fas fa-trash-alt"></i></a>
                           </div>
                         {/if}
                     </div>
			            </div>
			            <div class="headerphoto">
                    {if $postRows[i].transport eq 'car'}
				             <i class="fas fa-car fa-3x"></i>
                    {else if $postRows[i].transport eq 'bus'}
                     <i class="fas fa-bus"></i>
                    {else if $postRows[i].transport eq 'walk'}
                     <i class="fas fa-walking"></i>
                    {else if $postRows[i].transport eq 'motorbike'}
                     <i class="fas fa-motorcycle"></i>
                    {else if $postRows[i].transport eq 'bicycle'}
                     <i class="fas fa-bicycle"></i>
                    {/if}
		              </div>
		        </div>
		     <div class="textbody">
            <p>{$postRows[i].postbody}</p>
		     </div>

		     <div class="buttons">
			        <div class="btnleft">
				         <div id="userBtn" class="tooltip">
                   <img src="images/placeholder.png" alt="profile-img" class="BtnImg"/>
                   <a href="profile.php?username={$postRows[i].username}&id={$postRows[i].userID}">

                  {if $postRows[i].displayname != ''}
                            {$postRows[i].displayname}
                           {else}
                           {$postRows[i].username}
                           {/if}

                </a>
                   <span class="tooltiptext"><p>{$postRows[i].firstname} {$postRows[i].lastname}</p></span>
                 </div>
				         <button class="commentBtn" onclick="popupComment({$postRows[i].postID})">Komentar</button>
			        </div>
			        <div class="btnright">
				         <button class="vote" onmouseover="favorite()"><i class="fas fa-star fa-2x"></i></button>
			        </div>
		     </div>
		  </div>
    </div>
    {/section}
    </div>

    {include file='sidebar.php'}
    <script type="text/javascript" src="js/javascript.js"></script>
    <script type="text/javascript" src="js/sidebar.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgJogmErg3IkanvRFyfrT48mJ1xcUIGXI&libraries=places&language=hr"></script>
    <script type="text/javascript" src="js/places.js"></script>
  </body>
</html>
