<?php 
include("connection.php");
$code=$_GET["code"];
$sql=mysql_query("delete from type where code='$code'");
header("location:list_type.php");
?>
