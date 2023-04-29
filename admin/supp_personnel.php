
<?php 
include("../connection.php");
$cin=$_GET["cin"];
$sql=mysql_query("delete from personnel where ncin='$cin'");
header("location:list_personnel.php");
?>
