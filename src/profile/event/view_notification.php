<?php
 require_once('../db/dbconnect.php');
 $user = $_SESSION['user_id'];


 $sql = "SELECT * from events where NOT user_id=$user";
 $query = mysqli_query($conn, $sql);

 $has_event = mysqli_num_rows($query);
 if($has_event==0){
    echo "<div class='no-media'>No event found.</div>";
 }else{
    echo "<div class='view-event-container'>";
    echo "<div class='header notification-header'>";                  
        echo "<b>EventID</b>";
        echo "<b>EventName</b>";
        echo "<b>Location</b>";
        echo "<b>Start Date</b>";
        echo "<b>End Date</b>";
        echo "<b>Posted On</b>";
        echo "<b>Audience</b>";
        echo "<b>View More</b>";
       
   echo " </div>";
   echo "<div class='detai '>";
      while($data = mysqli_fetch_assoc($query)){
        $event_id = $data['event_id'];
        $event_name = $data['event_name'];
        $location = $data['location'];
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];
        $created_at = $data['created_at'];
        $audience = $data['audience'];
    echo "<div class='in-details notification-details'>";
        echo "<div class='data'>$event_id</div>";
        echo "<div class='data'>$event_name</div>";
        echo "<div class='data'>$location</div>";
        echo "<div class='data'>$start_date</div>";
        echo "<div class='data'>$end_date</div>";
        echo "<div class='data'>$created_at</div>";
        echo "<div class='data' href='main.php?page=event_response&&id=$event_id'>$audience</div>";
        echo "<a class='data' href='main.php?page=wide_notification&&id=$event_id'>View More</a>";
       
   echo " </div>";
      }
      echo " </div>";
echo "</div>";

 }
?>
