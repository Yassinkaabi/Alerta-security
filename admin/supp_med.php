<?php
include("../connection.php");
$code=$_GET["code"];
$sql=mysql_query("delete from medicament where code='$code'");
header("location:ajout_medicament.php");
?>
