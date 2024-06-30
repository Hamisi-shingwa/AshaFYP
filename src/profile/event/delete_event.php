<?php
 require_once("../../db/dbconnect.php");
 $m_id = $_GET['mid'];
 $sql = "DELETE from events where event_id=$m_id";
 $query = mysqli_query($conn, $sql);
 if($query){
    header("location:../main.php?page=viewevents");
 }
?>