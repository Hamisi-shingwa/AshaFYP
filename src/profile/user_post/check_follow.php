<?php
//Check if user is folllow of not arleady follow
require_once("../db/dbconnect.php");
$chek_follow = "SELECT * from followers where followered_id = $users AND user_id = $user_id";
$query = mysqli_query($conn, $chek_follow);

$is_following = false;
$num = mysqli_num_rows($query);
if(mysqli_num_rows($query)!=0){
    $is_following = true;
}

//Lets us know list of person someonefollow; ? don't change variable name of user id
$get_follow = "SELECT count(user_id) as followers from followers where user_id = $user_id";
$query_follow = mysqli_query($conn, $get_follow);

$get = mysqli_fetch_array($query_follow);
$followers = $get['followers'];

//Then let us know list of member followered by such person
$get_followered = "SELECT count(followered_id) as followered from followers where followered_id = $user_id";
$query_followed = mysqli_query($conn, $get_followered);
$row = mysqli_fetch_array($query_followed);
$followered = $row['followered'];
?>