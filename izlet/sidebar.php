<div class="sidebar">
   <div class="main-buttons">
     <a href="profile.php?username={$currentUser}&id={$userID}"><div id="profileBtn"><img src="images/placeholder.png" alt="profile-img" class="BtnImg">
     <!-- {$currentUser} -->
     <!-- {if $displayname != ''} {$displayname} {else} {$currentUser} {/if} -->
     {if $displaycurrent != ''}
                               {$displaycurrent}
                              {else}
                              {$currentUser}
                              {/if}
                              </div></a>
     <div id="dashboardBtn"><a href="dashboard.php">Početna</a></div>
     <div id="newPostBtn"><a href="#">Nova objava</a></div>
   </div>
    <div class="logoutWrap"><a href="logout.php" id="logoutBtn">Izloguj se</a></div>
</div>

<div class="mobile-footer">
  <div id="profileBtn2"><a href="profile.php?username={$currentUser}&id={$userID}"><img src="images/placeholder.png" alt="profile-img" class="BtnImg"></a></div>
  <div id="newPostBtn2"><i class="fas fa-plus"></i></div>
  <a href="logout.php" id="logoutBtn2"><i class="fas fa-sign-out-alt"></i></a>
</div>
