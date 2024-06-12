<?php
require_once("../db/dbconnect.php");

//check if user is complete register or not
$sql = "SELECT status from users where user_id=$uid";
$query = mysqli_query($conn, $sql);

if($query){
    $status = mysqli_fetch_array($query)['status'];
     if($status=='incomplete'){
        require "./user_profile/incomplete_profile.php";
     }else{
        require "./user_profile/complete_profile.php";
     }
}

?>