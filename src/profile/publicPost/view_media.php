<?php
   require_once("../db/dbconnect.php");
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
            <a href="" class="icon"><img src="../assets/Icons/followred.png" alt=""></a>
            <div class="text">Follow</div>
            </div>
            <div class="icon-text">
            <a href="" class="icon"><img src="../assets/Icons/viewed.png" alt=""></a>
            <div class="text">view</div>
            </div>
            <div class="icon-text">
            <a href="" class="icon"><img src="../assets/Icons/LIKED.png" alt=""></a>
            <div class="text">like</div>
            </div>
            <div class="icon-text">
            <a href="" class="icon"><img src="../assets/Icons/shared.png" alt=""></a>
            <div class="text">share</div>
            </div>    
         </div>
    </div>
</div>