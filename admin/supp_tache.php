<?php 
include("connection.php");
$code=$_GET["code"];
$sql=mysql_query("delete from tache where code='$code'");
header("location:list_tache.php");
?>
