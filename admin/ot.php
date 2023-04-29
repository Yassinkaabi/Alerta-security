<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<fieldset><legend>Affectation d'ordre de travail</legend>
  <table width="75%" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr>
      <td align="center">Veuillez choisir un technicien<select name="t1" id="t1">
        <?php
  include("../connection.php");
  $sql=mysql_query("select* from personnel");
  while($res=mysql_fetch_array($sql))
  {
	  $ncin=$res["ncin"];
	  $nom=$res["nom"];
	  	  ?>
      <option value="<?php echo"$ncin"; ?>"><?php echo"$nom"; ?></option>
      <?php
  }
  ?>
      </select></td>
    </tr>
    <tr>
      <td align="center"><input type="submit" name="b1" id="b1" value="Affecter" /></td>
    </tr>
  </table>
</form>
<?php
if(isset($_POST["b1"]))
{
	include("../connection.php");
	$ncin=$_POST["t1"];
	$code=$_GET["code"];
	$sql=mysql_query("update devis set tech='$ncin' where code='$code'");
	if($sql)
	{
		?>
        <script language="javascript">
		alert("L'affectation de l'ordre de travail est bien affectée");
		window.location.replace("liste_installation.php");
		</script>
        <?php
	}
	else 
	echo"echec";
}
?>
</fieldset>
</body>
</html>