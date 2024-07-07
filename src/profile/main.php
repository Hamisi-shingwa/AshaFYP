<?php
session_start();
if(!$_SESSION['user_id']){
    header("location:../authentic/login.php");
}else{
    $uid = $_SESSION['user_id'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../public/css/index.css">
    <link rel="stylesheet" href="../public/css/profile.css">
    <link rel="stylesheet" href="../public/css/post.css">
    <link rel="stylesheet" href="../public/css/events.css">
</head>
<body>
<script src="../public/js/pre-loader.js"></script>
   <div class="main-profile-container">
   <?php require "./profile_nav.php"?>
   <div class="profile-section">
    <div class="left-section">
        <?php require "./aside.php"?>
    </div>
    <div class="right-section">
        <?php require "./page_viewer.php"?>
    </div>
   </div>
   </div>
</body>
<script src="../public/js/script.js"></script>
</html>