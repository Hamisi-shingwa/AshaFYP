<?php
require_once("../db/dbconnect.php");
$user_id = $_SESSION['user_id'];

$take_user_info = "SELECT * from users where user_id=$user_id";
$query = mysqli_query($conn, $take_user_info);

$data = mysqli_fetch_assoc($query);
$username = $data['username'];
$email = $data['email'];
$fullname = $data['fullname'];
$date_of_birth = $data['date_of_birth'];
$place_of_birth = $data['place_of_birth'];
$profile = $data['profile'];
$current_address = $data['current_address'];
$type_of_talent = $data['type_of_talent'];
?>


<div class='incomplete-profile-container'>
    <h4>Change information about you</h4>
    <form action='./user_profile/edit_profile_process.php' method='post' enctype='multipart/form-data'>
        <div class='form-data-container'>
        <div class='left-form-data'> 
            <div class='user-profile-capture'>
            <input type='file' name='profile' id='userprofile'>
            <input type='hidden' name='availableprofile' id='hidden-profile' value='<?php echo $profile?>'>
            <div class='hideprofile'><img src='<?php echo substr($profile,1)?>' alt='photo to be ediited' ></div>
            <div class='textlable'>Upload your profile</div>
            </div>
        
            <select name='talent' id='talented'>
                <option value='<?php echo $type_of_talent?>'><?php echo $type_of_talent?></option>
               <?php while($row = mysqli_fetch_array($query)){
                $talent = $row['type_of_talent'];
                   echo "<option value='$talent'>$talent</option>";
                }?>
            </select>

            <input type='text' name='username' placeholder='Tell us your user name' value='<?php echo $username?>'>
            
        </div>

        <div class='right-form-data'>
            <input type='text' name='fullname' placeholder='Full name' value='<?php echo $fullname?>'>
            <input type='date' name='birthdate' placeholder='Date of birth' value='<?php echo $date_of_birth?>'>
            <input type='text' name='location' placeholder='Location of birth' value='<?php echo $place_of_birth?>'>
            <input type='text' name='address' placeholder='Current Address' value='<?php echo $current_address?>'>
        </div>
        </div>
        <input type='submit' value='Edit'>
        <div class='<?php if(isset($_GET['status'])) echo 'success'?>'>
          <?php if(isset($_GET['status'])) echo 'Successfull update your information'?>
      
        </div>
    </form>
    <script>
      const success_msg = document.querySelector('.success');
    
      if(success_msg){
       
        setTimeout(() => {
           success_msg.style.display= 'none' 
        }, 5000);
      }

    </script>
</div>