<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
$num=$_GET["num"];
$cin=$_GET["cin"];
$nom=$_GET["nom"];

?>

<fieldset>
<legend>Modification d'un Personnel </legend>
<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <table width="70%" border="0" align="center" cellpadding="0" cellspacing="3">
        <tr>
      <td>NCIN</td>
      <td><input type="text" name="t2" id="t2" value="<?php echo"$cin"; ?>" /> </td>
    </tr>
	  <td>Nom&prenom </td>
	  <td><input type="text" name="t3" id="t3" value="<?php echo"$nom"; ?>" /></td>
    </tr>
	
	<tr>
      <td colspan="2" align="center"><input type="reset" name="b1" id="b1" value="Effacer" />       
	   <input type="submit" name="b2" id="b2" value="Modifier" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</fieldset>
<?php 
if(isset($_POST["b2"]))
{
include("../connection.php");
$cin=$_POST["t2"];
$nom=$_POST["t3"];

$sql=mysql_query("update personnel set nom='$nom' where ncin='$cin'");
header("location:list_personnel.php");
}
?>
</body>
</html>
