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
    <script>history.scrollRestoration = "manual"</script>
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
{include file='header.php'}

<div class="container">
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
        <input type="submit" name="dodaj">
      </form>
   </div>
   <div class="popupMap" style="display:none">
     <div id="close4"><i class="fas fa-times"></i></div>
     <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d11333.633913216536!2d20.457315649999998!3d44.7520835!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2srs!4v1554291837863!5m2!1sen!2srs" allowfullscreen></iframe>
   </div>
      <div class="img-container">
        <img src='uploads/{$image}'/>
      </div>
      <div class="postheader">
        <div class="headertxt">
          <h2>{$header}</h2>
          <div class="location">
            <h4>{$location}</h4>
            <i class="far fa-map" onclick="GetMap()"></i>
          </div>
        </div>

          <div class="headerphoto">
            {if $transport eq 'car'}
             <i class="fas fa-car fa-3x"></i>
            {else if $transport eq 'bus'}
             <i class="fas fa-bus"></i>
            {else if $transport eq 'walk'}
             <i class="fas fa-walking"></i>
            {else if $transport eq 'motorbike'}
             <i class="fas fa-motorcycle"></i>
            {else if $transport eq 'bicycle'}
             <i class="fas fa-bicycle"></i>
            {/if}
          </div>

      </div>
      <div class="btnleft">
         <div id="userBtn">
          <img src="images/placeholder.png" alt="profile-img" class="BtnImg"><a href="profile.php?username={$username}&id={$userID}">{$username}</a></div>
         <button class="commentBtn" onclick="popupComment({$id})">Comment</button>
      </div>
      {section name=i loop=$postRows}
      <div class="comments">
        
        <div class="commInfo">  
        <h4>{$postRows[i].username}</h4>
        <p>{$postRows[i].date}</p>
        </div>
        <div class="comm">
        <p>{$postRows[i].commentBody}</p>
        </div>
        
      </div>
      {/section}
</div>

{include file='sidebar.php'}
  <script type="text/javascript" src="js/javascript.js"></script>
  </body>
</html>
