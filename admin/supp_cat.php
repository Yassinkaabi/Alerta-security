<?php
include("../connection.php");
$code=$_GET["code"];
$sql=mysql_query("delete from cat where code='$code'");
header("location:ajout_categories.php");
?>
