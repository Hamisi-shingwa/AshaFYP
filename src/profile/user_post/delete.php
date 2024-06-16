<?php
 require_once("../../db/dbconnect.php");
 $m_id = $_GET['mid'];
 $sql = "DELETE from media where media_id=$m_id";
 $query = mysqli_query($conn, $sql);
 if($query){
    header("location:../main.php?page=profile&&required=all");
 }
?>