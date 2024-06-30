<?php
 $event_id = $_GET['id'];
 if(!$event_id){
  header("location:../authentic/login.php");
 }else{
  require_once("../db/dbconnect.php");
  $sql = "SELECT * from events where event_id=$event_id";
 $query = mysqli_query($conn, $sql);

 $data = mysqli_fetch_assoc($query);
  $event_id = $data['event_id'];
  $event_name = $data['event_name'];
  $description = $data['description'];
  $location = $data['location'];
  $start_date = $data['start_date'];
  $end_date = $data['end_date'];
  $audience = $data['audience'];
  $profile = $data['profile'];
  $profile_type = $data['profile_type'];
  $created_at = $data['created_at'];

  $has_profile = false;
  if($profile_type != "NULL"){
    $has_profile = true;
    $display_profile = substr($profile, 1);
  }
 }
?>

<div class="event-container"> 
    <h4>Posted on <?php echo $created_at?> </h4>
    <form action="./event/proccess_edit_event.php"  id='view-notification' method="post" enctype="multipart/form-data">
        <div id="right-event-details">
          <input type="hidden" name="id" value="<?php echo $event_id?>">
            <label for="name">Name of event</label>
            <input type="text" name="ename" placeholder="event name"  value="<?php echo $event_name?>">
            <label for="description"></label>
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Description"><?php echo $description?></textarea>
            <label for="Location"></label>
            <input type="text" name="location" placeholder="location"   value="<?php echo $location?>">
        </div>
        <div class="left-event-details">
         <label for="Start date">Start date</label>
         <input type="text" name="start_date"  value="<?php echo $start_date?>">
         <label for="End_date">End date</label>
         <input type="text" name="end_date"  value="<?php echo $end_date?>">
         <label for="Target audience">Target audience</label>
         <input type="text" name="audience" id="audience" value="<?php echo $audience?>">
           
         <div class="profile">
            <div class="top-details">
               
            
            </div>
            <?php 
               if($has_profile){
          echo" <div class='wide-displayed-media'>
                 <div id='display-media'><img src='$display_profile' alt=''></div>";
               }
                 ?> 
                 <div class="feedback-element">
                   <p><?php if(isset($_GET['msg'])) echo base64_decode($_GET['msg'])?></p>
                   </div>
            </div>
         </div>
        </div>
       
    </form>
</div>

<script>
      const success_msg = document.querySelector('.success');
    
      if(success_msg){
       
        setTimeout(() => {
           success_msg.style.display= 'none' 
        }, 5000);
      }

    </script>