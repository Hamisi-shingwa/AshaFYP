<?php
 
// Include database connection script (assuming it's in a separate file)
require_once('../db/dbconnect.php');

// Get media data (modify this query to suit your needs)
$sql = "SELECT media_id, media_type, media_url, media_title FROM media ORDER BY media_id DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
     // Build the post container with media and title
     echo '<div class="mypost-container">';
  while ($row = mysqli_fetch_assoc($result)) {
    $m_id = $row['media_id'];
    $media_type = $row['media_type'];
    $media_url = $row['media_url'];
    $media_title = $row['media_title'];

   
    echo "<div class='posted-content'>";

    // Render media based on type
    if ($media_type === 'image') {
      
      echo '<div class="post-media"><img src="' . substr($media_url, 1) . '" alt=""></div>';
    } else if ($media_type === 'video') {
      echo '<div class="post-media"><video src="' . substr($media_url, 1) . '" autoplay muted loop></video></div>';
    } else if ($media_type === 'audio') {
      echo '<div class="post-media"><audio src="' . substr($media_url, 1). '" controls ></audio></div>';
    } else {
      // Handle other media types or display a message
      echo '<div class="post-media">Unsupported media type.</div>';
    }

    echo "<div class='title'>$media_title</div>";
    echo "<a href='../user_post/delete.php?mid=$m_id' class='delete-post'>Delete</a>";
    echo '</div>'; // Close posted-content
  

  }
  echo '</div>'; // Close mypost-container
} else {
  echo '<p>No media found.</p>';
}

// Close database connection (assuming it's done in db_connect.php)
mysqli_close($conn);

?>
