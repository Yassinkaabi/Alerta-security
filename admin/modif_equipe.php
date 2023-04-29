<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
$code_equipe=$_GET["code"];
$designation=$_GET["designation"];
?>
<fieldset>
<legend>Modification d'une  équipe</legend>
<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <table width="70%" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr>
      <td width="50%">Code</td>
      <td width="50%"><input type="text" name="t1" id="t1" value="<?php echo"$code_equipe"; ?>" /></td>
    </tr>
    <tr>
      <td>Designation</td>
      <td><input type="text" name="t2" id="t2" value="<?php echo"$designation"; ?>" /></td>
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
include("connection.php");
$code=$_POST["t1"];
$desig=$_POST["t2"];
$sql=mysql_query("update equipe set designation='$desig' where code='$code'");
header("location:list_equipe.php");
}
?>
</body>
</html>