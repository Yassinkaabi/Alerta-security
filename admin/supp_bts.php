<?php
include("connection.php");
$code=$_GET["code"];
$sql=mysql_query("delete from bts where code='$code'");
header("location:list_bts.php");
?>