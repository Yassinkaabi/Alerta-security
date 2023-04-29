<?php
include("../connection.php");
$code=$_GET["code"];
$sql=mysql_query("delete from agence where code='$code'");
header("location:consulter_agence.php");
?>