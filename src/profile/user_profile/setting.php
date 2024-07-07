<?php
require_once("../db/dbconnect.php");
 $sql = "SELECT * from setting";
 $query = mysqli_query($conn, $sql);


 if($query){
    $data = mysqli_fetch_array($query);
    if($data==""){
        echo "<div class='no-setting_info'>You dont have setting table or any setting value</div>";
        $system_name ="";
        $about = '';
        $address ="";
        $contact = "";
        $email ="";
    }else{
    $system_name = $data['system_name'];
    $about = $data['About_content'];
    $address = $data['Address'];
    $contact = $data['contact'];
    $email = $data['email'];
    }
   
 }

 
 
 

?>

<div class="setting-container">
    !.This setting is localstorage base, can apply to all user who use this machine
    <form class="setting-form" method='post' action="./user_profile/setting_process.php">  
        <label for='System Name'>System Name</label>
        <input type="text" id="system_name" name="system_name" required value="<?php echo $system_name?>">
        <label for='About content'>About content</label>
        <textarea name="about" id="about" cols="30" rows="10" required ><?php echo $about?></textarea>
       
        <label for='Address'>Address</label>
        <input type="text" id="address" name="address" required value="<?php echo $address?>">
        <label for='Contact'>Contact</label>
        <input type="text" id="contact" name="contact" required value="<?php echo $contact?>">
        <label for='Email Address'>Email Address</label>
        <input type="text" id="email" name="email" required value="<?php echo $email?>">
        <input type="submit" id='submit' value='submit your changes' name="sbtn">
</form>
</div>