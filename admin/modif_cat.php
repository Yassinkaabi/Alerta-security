<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<?php
$code=$_GET["code"];
$designation=$_GET["designation"];
?>
<fieldset>
<legend>Modification d'une catégorie</legend>
<form id="form1" method="post" name="form1" action="">
<table width="75%" border="0" align="center">
<tr>
<td width="50%">code</td>
<td width="50%"><input name="t1" type="text" id="t1" value="<?php echo"$code";?>" /></td>
</tr>
<tr>
<td>Designation</td>
<td><input name="t2" type="text" id="t2" value="<?php echo"$designation";?>"/></td>
</tr>
<tr>
<td colspan="2"><div align="centre">
<input name="b1" type="submit" id="b1" value="modifier"/>
</div></td>
</tr>
</table>
</form>
</fieldset>
<?php
if (isset($_POST["b1"]))
{
include("../connection.php");
$code=$_POST["t1"];
$designation=$_POST["t2"];

$sgl=mysql_query("update cat set designation='$designation' where code='$code'");

header("location:ajout_categories.php");
}
?>

</body>
</html>