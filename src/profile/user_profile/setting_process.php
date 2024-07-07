<?php
require_once("../../db/dbconnect.php");

 $system_name = $_POST['system_name'];
 $about = $_POST['about'];
 $address = $_POST['address'];
 $contact = $_POST['contact'];
 $email = $_POST['email'];

 $sql = "SELECT * from setting";
 $query = mysqli_query($conn, $sql);

 if(mysqli_num_rows($query)==0){
    $insert = "INSERT into setting (System_name,about_content,`address`,contact,email) 
    VALUES('$system_name','$about','$address','$contact','$email')";
    
    
    $query = mysqli_query($conn, $insert);
    header("location:../main.php?page=setting&&status=success");
 }else{
    $sql = "UPDATE setting  set System_name='$system_name',about_content='$about',address='$address',contact='$contact',email='$email'
 where setting_id=1";
 $query = mysqli_query($conn, $sql);
 
 if($query){
    header("location:../main.php?page=setting&&status=success");
 }
 }
 
 
 

?>