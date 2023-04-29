<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<fieldset class="loginField">
  <legend class="loginButton">Liste des messages des clients
</legend>
  <table width="743" border="1" align="center" cellpadding="0" cellspacing="3">
  <tr>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Code</th>
     <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Nom</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Pr&eacute;nom</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">E-mail</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">MSG</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Action</th>
  </tr>
  <?php 
  include("../connection.php");
  $sql= mysql_query("select* from contact");
  while($res=mysql_fetch_array($sql))
  { $code=$res["code"];
    $prenom=$res["prenom"];
    $nom=$res["nom"];
	$mail=$res["mail"];
	$msg=$res["msg"];
  ?>
  <tr>
    <td bordercolor="#0033CC"><?php echo "$code";?></td>
      <td bordercolor="#0033CC"><?php echo "$nom";?></a></td>
    <td bordercolor="#0033CC"><?php echo "$prenom";?></td>
    <td bordercolor="#0033CC"><?php echo "$mail";?></td>
    <td bordercolor="#0033CC"><?php echo "$msg";?></td>
    <td bordercolor="#0033CC"><a href="supp_contact.php?code=<?php echo"$code"; ?>" onclick="return(confirm('êtes vous sûre de vouloir supprimer cette MSG?'))"><img src="../img/edit_delete.png" width="32" height="32" /></a></td>
  </tr>
  <?php
 }
 ?>
</table>
</fieldset>
</body>
</html>
