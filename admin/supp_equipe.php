<?php
include("connection.php");
$code=$_GET["code"];
$sql=mysql_query("delete from equipe where code='$code'");
header("location:list_equipe.php");
?>