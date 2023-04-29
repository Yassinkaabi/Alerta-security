<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
<link href="../styles/screen.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
$code=$_GET["code"];
$nom=$_GET["nom"];
$prix=$_GET["prix"];
$type=$_GET["type"];
$quantite=$_GET["quantite"];
$dosage=$_GET["dosage"];
$libelle=$_GET["libelle"];
$forme=$_GET["forme"];

?>
<fieldset>
<legend>Modification d'un medicament</legend>
<form id="form1" name="form1" method="post" action="">
  <table width="75%" border="0" align="center">
    <tr>
      <td width="50%">code</td>
      <td width="50%"><input name="t1" type="text" id="t1" value="<?php echo"$code"; ?>" /></td>
    </tr>
    <tr>
      <td>nom</td>
      <td><input name="t2" type="text" id="t2" value="<?php echo"$nom"; ?>"/></td>
    </tr>
	<tr>
      <td>prix</td>
      <td><input name="t3" type="text" id="t3" value="<?php echo"$prix"; ?>" /></td>
    </tr>
    <tr>
      <td>type</td>
      <td><input name="t4" type="text" id="t4" value="<?php echo"$type"; ?>"/></td>
    </tr>
	 <tr>
      <td>quantite</td>
      <td><input name="t5" type="text" id="t5" value="<?php echo"$quantite"; ?>"/></td>
    </tr>
	<tr>
      <td>dosage</td>
      <td><input name="t6" type="text" id="t6" value="<?php echo"$dosage"; ?>" /></td>
    </tr> 
	<tr>
      <td>libellé</td>
      <td><input name="t7" type="text" id="t7" value="<?php echo"$libelle"; ?>"/></td>
    </tr>
	<tr>
      <td>forme</td>
      <td><input name="t8" type="text" id="t8" value="<?php echo"$forme"; ?>" /></td>
    </tr>
     <td colspan="9"><div align="center">
        <input name="b1" type="submit" id="b1" value="modifier" />
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
$nom=$_POST["t2"];
$prix=$_POST["t3"];
$type=$_POST["t4"];
$quantite=$_POST["t5"];
$dosage=$_POST["t6"];
$libelle=$_POST["t7"];
$forme=$_POST["t8"];

$sql=mysql_query("update medicament set nom='$nom',type='$type',dosage='$dosage',forme='$forme',prix='$prix',quantite='$quantite',libelle='$libelle' where code='$code'");

header ("location:ajout_medicament.php");
}
?>

</body>
</html>
