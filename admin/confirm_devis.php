<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
$code=$_GET["code"];
?>
<fieldset class="loginField">
<legend class="loginButton">Envoi de devis</legend>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <p>&nbsp;</p>
  <table width="75%" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr>
      <td width="50%">Code demande</td>
      <td width="50%"><input type="text" name="t1" id="t1" value="<?php echo"$code"; ?>" /></td>
    </tr>
    <tr>
      <td>Devis</td>
      <td><input type="file" name="fichier" id="fichier" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="b2" id="b2" value="Envoyer" class="loginButton" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</fieldset>
<?php
if(isset($_POST["b2"]))
{
include("../connection.php");
////////////////////////////////////////////////////////////image
$dossier='../img/';
$nom_tmp=$_FILES['fichier']['tmp_name'];
$nom_photo=$_FILES['fichier']['name'];
move_uploaded_file($nom_tmp,$dossier.$nom_photo);
/////////////////////////////////////////////////////////////////
$sql=mysql_query("update devis set devis='$nom_photo' where code='$code' ");
if($sql)
{
	?>
	<script language="javascript">
	alert("L'envoi de devis est bien effectuée");
	window.location.replace("liste_devis.php");
	</script>
    <?php
}
else
echo"echec d'ajout";
}
?>
</body>
</html>