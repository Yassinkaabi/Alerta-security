<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<link href ="style.css" rel="stylesheet" type="text/css">
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<fieldset class="loginField">
<legend class="loginButton"> Ajout d'un nouveau personnel</legend>
<form id="form_aj_tech" name="form_aj_tech" method="post" action="">
  <table width="75%" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr>
      <td>NCIN</td>
      <td><input type="text" name="t2" id="t2" /></td>
    </tr>
    <tr>
      <td>Nom &amp; Prénom</td>
      <td><input type="text" name="t3" id="t3" /></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><input type="reset" name="b1" id="b1" value="Effacer" />
        <input type="submit" name="b2" id="b2" value="Ajouter" class="loginButton" /></td>
    </tr>
  </table>
</form>
</fieldset>
<?php
if(isset($_POST["b2"]))
{
include("../connection.php");
$cin=$_POST["t2"];
$nom=$_POST["t3"];
$sql=mysql_query("insert into personnel(ncin, nom) values('$cin','$nom')");
if($sql)
{
	?>
	<script language="javascript">
	alert("L'ajout de nouveau personnel est bien effectuée");
	</script>
    <?php
}
else
echo"echec d'ajout";
}
?>
</body>
</html>