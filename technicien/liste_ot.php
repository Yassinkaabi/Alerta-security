<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<fieldset>
<legend>Liste des Ordres de travail</legend>
<table width="743" border="1" align="center" cellpadding="0" cellspacing="3">
  <tr>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Code</th>
     <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Client</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Besoins</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Renseignements</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Devis</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Emplacement</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Intervention</th>
  </tr>
  <?php 
  include("../connection.php");
  session_start();
  $ncin=$_SESSION["id"];
  
  $sql= mysql_query("select* from devis where lat!='' and tech='$ncin'");
  while($res=mysql_fetch_array($sql))
  { $code=$res["code"];
    $ncin=$res["ncin"];
    $besoin=$res["besoin"];
	$renseignement=$res["renseignement"];
	$devis=$res["devis"];
	$lat=$res["lat"];
	$lng=$res["lng"];
  ?>
  <tr>
    <td bordercolor="#0033CC"><?php echo "$code";?></td>
      <td bordercolor="#0033CC"><a href="client.php?ncin=<?php echo "$ncin";?>">Details client</a></td>
    <td bordercolor="#0033CC"><?php echo "$besoin";?></td>
    <td bordercolor="#0033CC"><?php echo "$renseignement";?></td>
    <td bordercolor="#0033CC"><a href="../img/<?php echo"$devis"; ?>"><img src="../img/icone-telecharger.gif" /></a></td>
    <td bordercolor="#0033CC"><a href="geo.php?code=<?php echo"$code"; ?>">Emplacement</a></td>
    <td bordercolor="#0033CC"><a href="intervention.php?code=<?php echo"$code"; ?>">rapport d'intervention</a></td>
  </tr>
  <?php
 }
 ?>
</table>
</fieldset>
</body>
</html>
