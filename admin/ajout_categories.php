<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>

<body>
<fieldset class="loginField">
<legend class="loginButton">LISTE DES CATEGORIES</legend>
<table width="50%" border="1" align="center" cellpadding="0" cellspacing="2">
  <tr>
<th>Code</th>
<th>designation</th>
<th>Action</th>
</tr>
<?php
include("../connection.php");
$sql=mysql_query("select* from cat");
while($res=mysql_fetch_array($sql))
{
$code=$res["code"];
$designation=$res["designation"];
?>
<tr>
<td><?php echo"$code";?></td>
<td><?php echo"$designation";?></td>
<td align="center"><a href="supp_cat.php?code=<?php echo"$code";?>" onclick="return(confirm('ete vous sure de vouloir supprimer cette catégorie?'))">
<img src="../img/edit_delete.png" width="24" height="24" border="0"/></a><a href="modif-cat.php?code=<?php echo"$code";?>&designation=<?php echo"$designation";?>"><img src="../img/edit.png" width="24" height="24" border="0"/></a></td>
<?php
}
?>
</tr>
</table>
<p>&nbsp;</p>
</fieldset>
<br />
<fieldset class="loginField">
<legend class="loginButton">Ajout d'une nouvelle categorie</legend>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<p>&nbsp;</p>
<table width="50%" border="0" align="center" cellpadding="0" cellspacing="3" class="table">
<tr>
<td width="50%">Code</td>
<td width="50%"><input type="text" name="t1"/></td>
</tr>
<tr>
<td>Designation</td>
<td><input type="text" name="t2" id="t2"/></td>
</tr>
<tr>
<td colspan="2" align="center"><input name="b1" type="submit" class="loginButton" id="b1" value="Ajouter"/></td>
</tr>
</table>
</form>
<?php
if(isset($_POST["b1"]))
{
include("../connection.php");
$code=$_POST["t1"];
$designation=$_POST["t2"];

$Sql=mysql_query("insert into cat values ('$code','$designation')");
if($sql)
{
?>
<script language="javascript">
alert("L'ajout de nouveau catégories à été bien effectuée");
window.location.replace('ajout_categories.php');
</script>
<?php
}
else
echo"echec d'ajout";
}
?>
</fieldset>
</body>
</html> 







