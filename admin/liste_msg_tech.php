<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<fieldset>
  <legend>Liste des messages des techniciens
</legend>
  <table width="743" border="1" align="center" cellpadding="0" cellspacing="3">
  <tr>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Code</th>
     <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">NCIN</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Nom</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">MSG</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Action</th>
  </tr>
  <?php 
  include("../connection.php");
  $sql= mysql_query("select* from msg");
  while($res=mysql_fetch_array($sql))
  { $code=$res["code"];
    $ncin=$res["ncin"];
    $nom=$res["nom"];
	$msg=$res["msg"];
  ?>
  <tr>
    <td bordercolor="#0033CC"><?php echo "$code";?></td>
      <td bordercolor="#0033CC"><?php echo "$ncin";?></a></td>
    <td bordercolor="#0033CC"><?php echo "$nom";?></td>
    <td bordercolor="#0033CC"><?php echo "$msg";?></td>
    <td bordercolor="#0033CC"><a href="supp_msg_tech.php?code=<?php echo"$code"; ?>" onclick="return(confirm('êtes vous sûre de vouloir supprimer cette MSG?'))"><img src="../img/edit_delete.png" width="32" height="32" /></a></td>
  </tr>
  <?php
 }
 ?>
</table>
</fieldset>
</body>
</html>
