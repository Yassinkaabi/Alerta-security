<?php 
include("../connection.php");
$code=$_GET["code"];
$sql=mysql_query("delete from produit where code='$code'");
header("location:ajout_produit.php");
?>
