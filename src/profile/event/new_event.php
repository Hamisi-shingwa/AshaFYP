<div class="event-container"> 
    <h4>Announce an event here</h4>
    <form action="./event/process_new_event.php" id="event" method="post" enctype="multipart/form-data">
        <div id="right-event-details">
            <label for="name">What is name of your event ?</label>
            <input type="text" name="ename" placeholder="event name" required>
            <label for="description">Describe your event</label>
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Describe it clear include your contact details" required></textarea>
            <label for="Location">Where an event occur</label>
            <input type="text" name="location" placeholder="location" required>
        </div>
        <div class="left-event-details">
         <label for="Start date">Start date</label>
         <input type="date" name="start_date" required>
         <label for="End_date">End date</label>
         <input type="date" name="end_date" required>
         <label for="Target audience">Target audience</label>
         <select name="audience" id="audience">
            <option value="Musician">Musician</option>
         </select>
         <div class="profile">
            <div class="top-details">
                <label for="Having a poster">Having a poster?(Upload here)</label>
                <input type="file" name="media" id='userprofile'>
                <div class="hideprofile displayed-media">
                    <img src="../assets/Icons/upload.png" alt="">
                </div>
            </div>
            <div class="wide-displayed-media">
                 <div class="display-media"></div>
                 <input type="submit" name="sbtn" value="submit an event">
                 <div class="feedback-element">
                   <p><?php if(isset($_GET['msg'])) echo base64_decode($_GET['msg'])?></p>
                   </div>
            </div>
         </div>
        </div>
        <div class='<?php if(isset($_GET['status'])) echo 'success'?>'>
          <?php if(isset($_GET['status'])) echo 'An event are added successfull'?>
      
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