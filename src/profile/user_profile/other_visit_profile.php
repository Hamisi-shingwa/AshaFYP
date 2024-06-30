<?php
require_once("../db/dbconnect.php");
$user_id = $_GET['uid'];
$users = $_SESSION['user_id']; 


$sql = "SELECT profile, email, username FROM users WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);

// Check if user data is found
if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    // Handle the case where user data is not found
    $user = [
        'profile' => '../assets/Icons/person.png',
        'email' => 'Email not found',
        'username' => 'Username not found',
    ];
}
?>

<div class="complete-profile-container">
    <div class="user-info">
        <div class="hideprofile profile">
            <img src="<?php echo substr(htmlspecialchars($user['profile']),1); ?>" alt="User Profile Picture">
        </div>
        <div class="some-details">
            <b><?php echo htmlspecialchars($user['email']); ?></b>
            <b><?php echo htmlspecialchars($user['username']); ?></b>
            <?php 
             require "./user_post/check_follow.php";
             if(!$is_following){
              
              echo "<button><a href='./user_post/followers.php?action=follow&&id=$user_id&&current_user=$users''>Follow</a></button>";
             }else{
               
                echo "<button><a href='./user_post/followers.php?action=unfollow&&id=$user_id&&current_user=$users''>Unfollow</a></button>";
             }
            ?>
          
        </div>
        <div class="look-incomplete-uploads">
            <div class="null-element"></div>
            <button><a href="./page_viewer.php?page=incomplete_upload"></a></button>
        </div>
    </div>

    <div class="followers-details">
        <div class="following"><?php echo $followered?> following</div>
        <div class="followers"><?php echo $followers?> followers</div>
    </div>

   <?php
    echo "<div class='call-post'>";
    echo "<a class='all' href='./main.php?page=someprofile&&uid=$user_id&&required=all'>All</a>";
    echo "<a class='video' href='./main.php?page=someprofile&&uid=$user_id&&required=video'>Video</a>";
    echo "<a class='audio' href='./main.php?page=someprofile&&uid=$user_id&&required=audio'>Audio</a>";
    echo "<a class='image' href='./main.php?page=someprofile&&uid=$user_id&&required=image'>Image</a>";
echo"</div>";
   ?>

    <div class="display-post">
       <?php require "./user_post/mypost.php"; ?>
    </div>
</div>
