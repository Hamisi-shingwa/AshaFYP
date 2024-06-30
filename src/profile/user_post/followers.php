<?php

if(isset($_GET['current_user']));{
    $users = $_GET['current_user'];//This is Id of current user
    $id = $_GET['id'];//This is id of user to be followed
    $action = $_GET['action']; //The action is follow or unfollow

    require_once("../../db/dbconnect.php");
    //Let know the action and process the logic

    if($action=="follow"){
        $insert_follow = "INSERT into followers(user_id, followered_id) value($id, $users)";
        $run_insertion = mysqli_query($conn, $insert_follow);
        header("location:../main.php?page=someprofile&&uid=$id&&required=all");
    }else if($action == "unfollow"){
        $insert_follow = "DELETE from followers where followered_id = $users";
        $run_insertion = mysqli_query($conn, $insert_follow);
        header("location:../main.php?page=someprofile&&uid=$id&&required=all");
    }

}




  

