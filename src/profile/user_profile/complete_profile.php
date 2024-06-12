<?php
require_once("../db/dbconnect.php");
$user_id = $_SESSION['user_id']; 
// Fetch user data from the database
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
            <button><a href="./page_viewer.php?page=edit_profile">Edit profile</a></button>
        </div>
        <div class="look-incomplete-uploads">
            <div class="null-element"></div>
            <button><a href="./page_viewer.php?page=incomplete_upload">Incomplete upload</a></button>
        </div>
    </div>

    <div class="followers-details">
        <div class="following">0 following</div>
        <div class="followers">0 followers</div>
    </div>

    <div class="call-post">
        <a class='all' href="./main.php?page=profile&&required=all">All</a>
        <a class='video' href="./main.php?page=profile&&required=video">Video</a>
        <a class='audio' href="./main.php?page=profile&&required=audio">Audio</a>
        <a class='image' href="./main.php?page=profile&&required=image">Image</a>
    </div>

    <div class="display-post">
       <?php require "./user_post/mypost.php"; ?>
    </div>
</div>
