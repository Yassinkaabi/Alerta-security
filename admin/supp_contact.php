<?php
include("../connection.php");
$code=$_GET["code"];
$sql=mysql_query("delete from contact where code='$code'");
header("location:liste_contact.php");
?>
