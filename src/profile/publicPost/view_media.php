<?php
   require_once("../db/dbconnect.php");
   require "./user_post/viewers.php";
   $uid = $_GET['id'];
   $sql = "SELECT media_url from media where media_id=$uid";
   $query = mysqli_query($conn, $sql);
   if($query){
    $data = mysqli_fetch_assoc($query)['media_url'];
    $video = substr($data, 1);
   }
?> 
<div class="view-media-container">
    <div class="main-view"><iframe  src="<?php echo $video?>" frameborder="0"></iframe></div>
    <div class="uploaded-content">
         <div class="action-content">
            <div class="icon-text">
            <a href="./main.php?page=home" class="icon"><img src="../assets/Icons/backred.png" alt=""></a>
            <div class="text">back</div>
            </div>
            <div class="icon-text">
            <a href="./main.php?page=profile&&required=all" class="icon"><img src="../assets/Icons/followred.png" alt=""></a>
            <div class="text">You</div>
            </div>
            <div class="icon-text">
            <a href="" class="icon"><img src="../assets/Icons/viewed.png" alt=""></a>
            <div class="text"><?php echo $views?> views</div>
            </div>
            <div class="icon-text">
            <a href="" class="icon"><img src="../assets/Icons/LIKED.png" alt=""></a>
            <div class="text">like</div>
            </div>
            <div class="icon-text">
            <a href="" class="icon share"><img src="../assets/Icons/shared.png" alt=""></a>
            <div class="text">share</div> 
            </div>    
         </div>
    </div>
    <div class="share-container">
      <div class="share-media">
         <div class="icon"><a href="https://www.facebook.com/"><img src="../assets/Icons/fb.png" alt=""></a></div>
         <div class="text">Facebook</div>
      </div>
      <div class="share-media">
         <div class="icon"><a href="https://web.whatsapp.com/"><img src="../assets/Icons/whatsapp.png" alt=""></a></div>
         <div class="text">Whatsapp</div>
      </div>
      <div class="share-media">
         <div class="icon"><a href="https://www.instagram.com/?hl=en"><img src="../assets/Icons/ig.png" alt=""></a></div>
         <div class="text">Instagram</div>
      </div>
     
    </div>
</div>