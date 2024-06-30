<?php
 if(isset($_GET['page'])){
    $mypages = ['home','profile','upload','view_media','someprofile',
    'edit_profile','follower','setting','addevent','viewevents','edit_event','notification','wide_notification'];
    $page = $_GET['page'];
    if(in_array($page, $mypages)){
        $page=='home' ? require "./publicPost/public_post.php" :"";
        $page=='follower' ? require "./publicPost/followed_post.php" :"";
        $page=='view_media' ? require "./publicPost/view_media.php" :"";
        $page=='profile' ? require "./user_profile/check_suitable_profile.php" :"";
        $page=='edit_profile' ? require "./user_profile/edit_profile.php" :"";
        $page=='setting' ? require "./user_profile/setting.php" :"";
        $page=='someprofile' ? require "./user_profile/other_visit_profile.php" :"";
        $page=='upload' ? require "./user_post/newpost.php" :"";
        $page=='addevent' ? require "./event/new_event.php" :"";
        $page=='viewevents' ? require "./event/view_event.php" :"";
        $page=='edit_event' ? require "./event/edit_event.php" :"";
        $page=='notification' ? require "./event/view_notification.php" :"";
        $page=='wide_notification' ? require "./event/notification_wide_view.php" :"";
    }
 }else{
    require "./publicPost/public_post.php";
 }

?>