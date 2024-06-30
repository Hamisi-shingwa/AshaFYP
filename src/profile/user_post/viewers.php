<?php
$media_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$views = 2;
$has_view = "INSERT into views(media_id,user_id) value($media_id, $user_id)";
$run_query = mysqli_query($conn, $has_view);

$view = "SELECT count(view_id) as viewes from views where media_id=$media_id";
$get_views = mysqli_query($conn, $view);//We get views regardless the one who view is poster or not

$row = mysqli_fetch_assoc($get_views);
$views = $row['viewes'];

?>