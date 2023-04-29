<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<fieldset class="loginField"><legend class="loginButton">Liste des personnels</legend>
<table width="743" border="1" align="center" cellpadding="0" cellspacing="3">
  <tr>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Num&eacute;ro</th>
     <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">NCIN</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Nom&amp;pr&eacute;nom</th>
  
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Action</th>
  </tr>
  <?php 
  include("../connection.php");
  $sql= mysql_query("select* from personnel");
  while($res=mysql_fetch_array($sql))
  { $num=$res["num"];
    $cin=$res["ncin"];
    $nom=$res["nom"];
	  ?>
  <tr>
    <td bordercolor="#0033CC"><?php echo "$num";?></td>
      <td bordercolor="#0033CC"><?php echo "$cin";?></td>
    <td bordercolor="#0033CC"><?php echo "$nom";?></td>
   
    <td bordercolor="#0033CC"><a href="supp_personnel.php?cin=<?php echo"$cin";?>" onclick="return(confirm('étes vous sur de supprimer ce personnel?'))"> <img src="../img/DeleteRed.png" /> </a>
	   <a href="modif_personnel.php?num=<?php echo "$num";?>&amp;cin=<?php echo"$cin";?>&amp;nom=<?php echo "$nom";?>"> <img src="../img/Text Edit Icon.jpg" width="24" /></a> </td>
  </tr>
  <?php
 }
 ?>
</table>
</fieldset>
</body>
</html>
