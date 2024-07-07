<?php
$value = $_GET['value'];

require_once('../db/dbconnect.php');

// Get media data (modify this query to suit your needs)
$sql = "SELECT media_id,media_type,media_url,media_title,uploaded_at,users.user_id, users.profile, users.username
 FROM media JOIN users ON users.user_id = media.user_id where media_title LIKE '%$value%' OR media.description LIKE '%$value%' ORDER BY media_id DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
     // Build the post container with media and title
     echo "<div class='public-post-container'>";
  while ($row = mysqli_fetch_assoc($result)) {
    $m_id = $row['media_id'];
    $u_id = $row['user_id'];
    $media_type = $row['media_type'];
    $media_url = $row['media_url'];
    $media_title = $row['media_title'];
    $time_uploaded = $row['uploaded_at'];
    $profile = $row['profile'];
    $username = $row['username'];
   $display_media = substr($media_url, 1);
    $displayed_prof = substr($profile, 1);

    $currentTime = time();
    $uploadedTime = strtotime($time_uploaded);
    $difInSec =   $currentTime - $uploadedTime;
    $reall_time = 'Today';
  
    if($difInSec > 3600){
      $timeToDay  = $difInSec / (60 * 60 * 24);
      $really_day = floor($timeToDay);
      if($really_day == 0){
        $reall_time = 'Posted today';
      }
     else{
      $reall_time = $really_day.' '. 'days ago';
     }
    }
   
  
    echo "<div class='postedad'>";
    // Render media based on type
    if ($media_type === 'image') {
      
      echo '<div class="posted-media"><img src="' . substr($media_url, 1) . '" alt=""></div>';
    } else if ($media_type === 'video') {
      echo "<div class='posted-media'><a href='./main.php?page=view_media&&id=$m_id'><video src='$display_media' autoplay muted loop></video></a></div>";
    } else if ($media_type === 'audio') {
      echo '<div class="posted-media"><audio src="' . substr($media_url, 1). '" controls ></audio></div>';
    } else {
      // Handle other media types or display a message
      echo '<div class="post-media">Unsupported media type.</div>';
    }

       echo "<div class='posted-details'>";
          echo  "<a href='./main.php?page=someprofile&&uid=$u_id&&required=all' class='poster-profile'><img src=' $displayed_prof'></a>";
            echo "<div class='posted-text'>";
             echo "<div class='title'> $media_title</div>";
               echo "<div class='posted-by'> $username</div>";
                echo "<div class='views-date'>";
                    echo "<div class='view'>$media_type</div>";
                    echo "<div class='date'>$reall_time</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
//    echo "</div>";
     
echo "</div>";
  

  }
  echo '</div>'; // Close mypost-container
} else {
  echo "<div class='no-media'>Nothing match $value.</div>";
}

// Close database connection (assuming it's done in db_connect.php)
mysqli_close($conn);

?>



