<?php
include("../connection.php");
$code=$_GET["code"];
$sql=mysql_query("delete from msg where code='$code'");
header("location:liste_msg_tech.php");
?>
