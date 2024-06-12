<?php
define("WEBSERVER","localhost");
define("USER","root");
define("PASSWORD","");
define("DATABASE","talent_showcase_db");

$conn = mysqli_connect("localhost","root","","talent_showcase_db") or die("fail to connect");
?>