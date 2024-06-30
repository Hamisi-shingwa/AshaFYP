<?php
$page = $_GET['page'];
$user_id = $_SESSION['user_id'];
require_once('../db/dbconnect.php');

$sql = "SELECT event_id from events where NOT user_id=$user_id";
$query = mysqli_query($conn, $sql);
$have_event = false;
$unviews = mysqli_num_rows($query);
if($unviews > 0){
    $have_event = true;
}

?>
<div class="nav-container">
    <div class="logo"><img src="../assets/Icons/icon.png" alt=""></div>
    <?php
      if($page=="home"){
        echo "<div class='search'>
        <input type='text' placeholder='search here'>
        <div class='search-icon'>
        <img src='../assets/Icons/search.png' alt=''>
        </div>
    </div>
";
      }else{
        echo "<div class='search'>
        
    </div>
";
      }
    ?>
    <div class="right-nav">
        <div class="profile-icon">
           <?php if($page=='profile'){echo " <a href='./main.php?page=upload'><img src='../assets/Icons/add.png' alt=''></a>";}?>
        </div>
        <div class="profile-icon">
            <a href="./main.php?page=profile&&required=all"><img src="../assets/Icons/person.png" alt=""></a>
        </div>
        <div class="notification-icons">
           <a href=""> <img src="../assets/Icons/notification.png" alt=""></a>
          
           <?php if($have_event)
           echo "<a href='./main.php?page=notification' class='notify-quantity'>o</a>";
           ?>
        </div>
    </div>
</div>