<?php
 if(isset($_GET['page'])){
    $mypages = ['home','profile','upload','view_media','someprofile'];
    $page = $_GET['page'];
    if(in_array($page, $mypages)){
        $page=='home' ? require "./publicPost/public_post.php" :"";
        $page=='view_media' ? require "./publicPost/view_media.php" :"";
        $page=='profile' ? require "./user_profile/check_suitable_profile.php" :"";
        $page=='someprofile' ? require "./user_profile/other_visit_profile.php" :"";
        $page=='upload' ? require "./user_post/newpost.php" :"";
    }
 }else{
    require "./publicPost/public_post.php";
 }

?>