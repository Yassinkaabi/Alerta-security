<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
<style type="text/css">
<!--
.Style1 {color: #FFFFFF}
-->
</style>
</head>

<body>
<fieldset>
<legend>Fiche d'intervention</legend>
<?php 
  include("connection.php");
  $code=$_GET["code"];
 	$sql2=mysql_query("select* from intervention where code_tache='$code'");
	while($res2=mysql_fetch_array($sql2))
	{
		$code1=$res2["code"];
		$type=$res2["type"];
		$dd=$res2["dd"];
		$df=$res2["df"];
		$hd=$res2["hd"];
		$hf=$res2["hf"];
		$jf=$res2["jf"];
		$client=$res2["client"];
  ?>
<div align="right">
  <p>N&deg;:<?php echo"$code"; ?></p>
  <table width="100%" border="0" cellspacing="3" cellpadding="0">
    <tr>
      <td width="30%" valign="top"><?php echo"$type"; ?></td>
      <td><table width="100%" border="0" cellspacing="3" cellpadding="0">
        <tr>
          <td>date de d&eacute;but </td>
          <td><?php echo"$dd"; ?></td>
        </tr>
        <tr>
          <td>date de fin </td>
          <td><?php echo"$df"; ?></td>
        </tr>
        <tr>
          <td>Heure de d&eacute;but </td>
          <td><?php echo"$hd"; ?></td>
        </tr>
        <tr>
          <td>Heure de fin </td>
          <td><?php echo"$hf"; ?></td>
        </tr>
        <tr>
          <td>Jour ferier </td>
          <td><?php echo"$jf"; ?></td>
        </tr>
      </table></td>
      <td width="20%" valign="top">Client: <?php echo"$client"; ?></td>
    </tr>
    <tr>
      <td>Site: <?php 
	  $site=$_GET["site"];
	    $sql= mysql_query("select* from bts where code='$site'");
  while($res=mysql_fetch_array($sql))
  { $site=$res["site"];
    
	}
	   echo"$site"; ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3"><table width="100%" border="1" cellspacing="3" cellpadding="0">
        <tr>
          <td colspan="4"><div align="center">Op&eacute;rations effectu&eacute;es </div></td>
          </tr>
        <tr>
          <td bgcolor="#0099FF"><span class="Style1">Article</span></td>
          <td bgcolor="#0099FF"><span class="Style1">D&eacute;signation</span></td>
          <td bgcolor="#0099FF"><span class="Style1">Unit&eacute;</span></td>
          <td bgcolor="#0099FF"><span class="Style1">Quantit&eacute;</span></td>
        </tr>
		<?php 
  include("connection.php");
  	$sql3=mysql_query("select* from operation where code_intervention='$code1'");
	while($res3=mysql_fetch_array($sql3))
	{
		$code2=$res3["code"];
		$article=$res3["article"];
		$designation=$res3["designation"];
		$unite=$res3["unite"];
		$qte=$res3["qte"];
		
  ?>
        <tr>
          <td><?php echo"$article"; ?></td>
          <td><?php echo"$designation"; ?></td>
          <td><?php echo"$unite"; ?></td>
          <td><?php echo"$qte"; ?></td>
        </tr>
		<?php
		}
		?>
      </table></td>
    </tr>
    <tr>
      <td colspan="3">
	 <?php 
  include("connection.php");
  	$sql3=mysql_query("select* from tache where code='$code'");
	while($res3=mysql_fetch_array($sql3))
	{
		$ncin=$res3["ncin"];
		}
		$sql= mysql_query("select* from technicien where ncin='$ncin'");
  while($res=mysql_fetch_array($sql))
  { 
    $nom=$res["nom"];
	}
		
  ?>
	  <div align="right">
        <table width="30%" border="0" cellspacing="3" cellpadding="0">
          <tr>
            <td colspan="2"><div align="center">Intervenant</div></td>
          </tr>
          <tr>
            <td>Nom & prénom</td>
            <td><?php echo"$nom"; ?></td>
          </tr>
          </table>
      </div></td>
    </tr>
  </table>
  <?php
  }
  ?>
  <p align="left">&nbsp;  </p>
  
</div>
</fieldset>
<div align="center"><a href="javascript:window.print()">
  IMPRIMER</a>
</div>
</body>
</html>
