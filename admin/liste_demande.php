<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<fieldset class="loginField"><legend class="loginButton">Liste de Nouvelle demande de Maintenance</legend>
<table width="743" border="1" align="center" cellpadding="0" cellspacing="3">
  <tr>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Code</th>
     <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Client</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Emplacement</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Demande</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Devis</th>
  </tr>
  <?php 
  include("../connection.php");
  $sql= mysql_query("select* from demande where technicien=''");
  while($res=mysql_fetch_array($sql))
  { $code=$res["code"];
    $ncin=$res["ncin"];
    $lat=$res["lat"];
	$lng=$res["lng"];
	$demande=$res["demande"];
	
  ?>
  <tr>
    <td bordercolor="#0033CC"><?php echo "$code";?></td>
      <td bordercolor="#0033CC"><a href="client.php?ncin=<?php echo "$ncin";?>">Details client</a></td>
    <td bordercolor="#0033CC"><a href="geo_maintenance.php?code=<?php echo"$code"; ?>">Emplacement</a></td>
    <td bordercolor="#0033CC"><?php echo "$demande";?></td>
    <td bordercolor="#0033CC"><a href="affecter.php?code=<?php echo"$code"; ?>">Ordre de Travail</a></td>
  </tr>
  <?php
 }
 ?>
</table>
</fieldset>
<fieldset class="loginField"><legend class="loginButton">Liste de demande de Maintenance Encours</legend>
<table width="743" border="1" align="center" cellpadding="0" cellspacing="3">
  <tr>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Code</th>
     <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Client</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Emplacement</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Demande</th>
    </tr>
  <?php 
  include("../connection.php");
  $sql= mysql_query("select* from demande where technicien!='' and rapport=''");
  while($res=mysql_fetch_array($sql))
  { $code=$res["code"];
    $ncin=$res["ncin"];
    $lat=$res["lat"];
	$lng=$res["lng"];
	$demande=$res["demande"];
  ?>
  <tr>
    <td bordercolor="#0033CC"><?php echo "$code";?></td>
      <td bordercolor="#0033CC"><a href="client.php?ncin=<?php echo "$ncin";?>">Details client</a></td>
    <td bordercolor="#0033CC"><a href="geo_maintenance.php?code=<?php echo"$code"; ?>">Emplacement</a></td>
    <td bordercolor="#0033CC"><?php echo "$demande";?></td>
    </tr>
  <?php
 }
 ?>
</table>
</fieldset>
<fieldset class="loginField"><legend class="loginButton">Liste de demande Reparées</legend>
<table width="743" border="1" align="center" cellpadding="0" cellspacing="3">
  <tr>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Code</th>
     <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Client</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Emplacement</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Demande</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Rapport</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Action</th>
  </tr>
  <?php 
  include("../connection.php");
  $sql= mysql_query("select* from demande where rapport!=''");
  while($res=mysql_fetch_array($sql))
  { $code=$res["code"];
    $ncin=$res["ncin"];
    $lat=$res["lat"];
	$lng=$res["lng"];
	$demande=$res["demande"];
	$rapport=$res["rapport"];
	$sql1= mysql_query("select* from client where ncin='$ncin'");
  while($res1=mysql_fetch_array($sql1))
  { $profil=$res1["profil"];
    $ncin=$res1["ncin"];
    $nom=$res1["nom"];
	 $prenom=$res1["prenom"];
	  $civilite=$res1["civilite"];
	   $entreprise=$res1["entreprise"];
	    $mail=$res1["mail"];
		 $adresse=$res1["adresse"];
		  $ville=$res1["ville"];
		   $tel=$res1["tel"]; $fax=$res1["fax"];
  }
  ?>
  <tr>
    <td bordercolor="#0033CC"><?php echo "$code";?></td>
      <td bordercolor="#0033CC"><a href="client.php?ncin=<?php echo "$ncin";?>">Details client</a></td>
    <td bordercolor="#0033CC"><a href="geo_maintenance.php?code=<?php echo"$code"; ?>">Emplacement</a></td>
    <td bordercolor="#0033CC"><?php echo "$demande";?></td>
    <td bordercolor="#0033CC"><?php echo "$rapport";?></td>
    <td bordercolor="#0033CC"><a href="mailto:<?php echo"$mail"; ?>?subject=Etat de demande&body=Votre demande de maintenance est bien réparée/Rapport: <?php echo"$rapport"; ?>">Notifier Client</a></td>
  </tr>
  <?php
 }
 ?>
</table>
</fieldset>
</body>
</html>
