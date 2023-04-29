<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body> 
<fieldset><legend>D�tails client</legend> <?php 
  include("../connection.php");
  $ncin=$_GET["ncin"];
  $sql= mysql_query("select* from client where ncin='$ncin'");
  while($res=mysql_fetch_array($sql))
  { $profil=$res["profil"];
    $ncin=$res["ncin"];
    $nom=$res["nom"];
	 $prenom=$res["prenom"];
	  $civilite=$res["civilite"];
	   $entreprise=$res["entreprise"];
	    $mail=$res["mail"];
		 $adresse=$res["adresse"];
		  $ville=$res["ville"];
		   $tel=$res["tel"]; $fax=$res["fax"];
  }
	  ?>
<table width="743" border="1" align="center" cellpadding="0" cellspacing="3">
 

  <tr>
    <td bordercolor="#0033CC">NCIN</td>
      <td bordercolor="#0033CC"><?php echo "$ncin";?></td>
  </tr>
  <tr>
    <td bordercolor="#0033CC">Profil</td>
    <td bordercolor="#0033CC"><?php echo "$profil";?></td>
  </tr>
  <tr>
    <td bordercolor="#0033CC">Civilit&eacute;</td>
    <td bordercolor="#0033CC"><?php echo "$civilite";?></td>
  </tr>
  <tr>
    <td bordercolor="#0033CC">Nom</td>
    <td bordercolor="#0033CC"><?php echo "$nom";?></td>
  </tr>
  <tr>
    <td bordercolor="#0033CC">Pr&eacute;nom</td>
    <td bordercolor="#0033CC"><?php echo "$prenom";?></td>
  </tr>
  <tr>
    <td bordercolor="#0033CC">Entreprise</td>
    <td bordercolor="#0033CC"><?php echo "$entreprise";?></td>
  </tr>
  <tr>
    <td bordercolor="#0033CC">E-mail</td>
    <td bordercolor="#0033CC"><?php echo "$mail";?></td>
  </tr>
  <tr>
    <td bordercolor="#0033CC">Adresse</td>
    <td bordercolor="#0033CC"><?php echo "$adresse";?></td>
  </tr>
  <tr>
    <td bordercolor="#0033CC">Ville</td>
    <td bordercolor="#0033CC"><?php echo "$ville";?></td>
  </tr>
  <tr>
    <td bordercolor="#0033CC">Tel</td>
    <td bordercolor="#0033CC"><?php echo "$tel";?></td>
  </tr>
  <tr>
    <td bordercolor="#0033CC">Fax</td>
    <td bordercolor="#0033CC"><?php echo "$fax";?></td>
  </tr></table>
 
</fieldset>
</body>
</html>
