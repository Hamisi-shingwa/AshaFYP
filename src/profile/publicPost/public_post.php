<!-- <div class='public-post-container'>
    <div class='postedad'>
        <div class="posted-media">
            <img src='../assets/images/house1.jpg'>
        </div>
        <div class='posted-details'>
            <div class='poster-profile'></div>
            <div class='posted-text'>
                <div class='title'>Title</div>
                <div class='posted-by'>Posted bye</div>
                <div class='views-date'>
                    <div class='view'>No views</div>
                    <div class='date'>7 days ago</div>
                </div>
            </div>
        </div>
    </div>
     
</div> -->

<?php
 
// Include database connection script (assuming it's in a separate file)
require_once('../db/dbconnect.php');

// Get media data (modify this query to suit your needs)
$sql = "SELECT * FROM media ORDER BY media_id DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
     // Build the post container with media and title
     echo "<div class='public-post-container'>";
  while ($row = mysqli_fetch_assoc($result)) {
    $m_id = $row['media_id'];
    $media_type = $row['media_type'];
    $media_url = $row['media_url'];
    $media_title = $row['media_title'];

   
  
    echo "<div class='postedad'>";
    // Render media based on type
    if ($media_type === 'image') {
      
      echo '<div class="posted-media"><img src="' . substr($media_url, 1) . '" alt=""></div>';
    } else if ($media_type === 'video') {
      echo '<div class="posted-media"><video src="' . substr($media_url, 1) . '" autoplay muted loop></video></div>';
    } else if ($media_type === 'audio') {
      echo '<div class="posted-media"><audio src="' . substr($media_url, 1). '" controls ></audio></div>';
    } else {
      // Handle other media types or display a message
      echo '<div class="post-media">Unsupported media type.</div>';
    }

       echo "<div class='posted-details'>";
          echo  "<div class='poster-profile'></div>";
            echo "<div class='posted-text'>";
             echo "<div class='title'>Title</div>";
               echo "<div class='posted-by'>Posted bye</div>";
                echo "<div class='views-date'>";
                    echo "<div class='view'>No views</div>";
                    echo "<div class='date'>7 days ago</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
//    echo "</div>";
     
echo "</div>";
  

  }
  echo '</div>'; // Close mypost-container
} else {
  echo '<p>No media found.</p>';
}

// Close database connection (assuming it's done in db_connect.php)
mysqli_close($conn);

?>



