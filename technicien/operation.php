<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="75%" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr>
      <td width="50%">Article</td>
      <td width="50%"><input name="t1" type="text" id="t1" /></td>
    </tr>
    <tr>
      <td colspan="2">Designation</td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <textarea name="t2" id="t2"></textarea>
      </div></td>
    </tr>
    <tr>
      <td>Unité</td>
      <td><input name="t3" type="text" id="t3" /></td>
    </tr>
    <tr>
      <td>Quantité</td>
      <td><input name="t4" type="number" id="t4" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="b1" id="b1" value="Ajouter operation" />
      </div></td>
    </tr>
  </table>
</form>
<?php
if(isset($_POST["b1"]))
{
	include("../admin/connection.php");
	$article=$_POST["t1"];
	$designation=$_POST["t2"];
	$designation=addslashes($designation);
	$unite=$_POST["t3"];
	$qte=$_POST["t4"];
	$code=$_GET["code"];
	$sql=mysql_query("insert into operation (code_intervention, article, designation, unite, qte) values('$code','$article','$designation','$unite','$qte')");
	
	if($sql)
	{
		?>
        <script language="javascript">
		alert("l'ajout de l'opération est bien affectée");
		</script>
        <?php
	}
	else 
	echo"echec";
}
?>
</body>
</html>