
<?php 
include("connection.php");
$cin=$_GET["cin"];
$sql=mysql_query("delete from client where ncin='$cin'");
header("location:list_client.php");
?>
