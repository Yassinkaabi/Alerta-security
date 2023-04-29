<?php
include("../connection.php");
$code=$_GET["code"];
$sql=mysql_query("delete from local where code='$code'");
header("location:liste_local.php");
?>