
<?php 
 include("connection.php");
  include("connexions/connexion.php");
 
include 'function/Fonctions.php'; //Panier
if(isset($_GET["Action"])) //Action
{switch ($_GET["Action"]){
	case  "Deconnect" : //Déconnexion
			session_unset();
			session_destroy();
			header("Location: ../Index.php");
		break;
}}
if(isset($_SESSION['UserLogin']))
{
if($_SESSION["UserLogin"]=="admin")
{//nothing
}
else
{header("location:../index.php");}
}
else
{header("location:../index.php");}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml/DTD/xhtml1-transitional.dtd">
<html xmlns="http://wwww.w3.org/1999/xhtml">
<head>
<title>Document sans titre</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<link href="style.css" rel="stylesheet" type="text/css"></link>
<style type="text/css">
<!--
.Style1 {color: #FFFFFF}
-->
a {
color:#ffff00;
background:#A3BAD9;
font:bold 10px verdana, sans-serif;
text-decoration:none;
display:block;
padding:5px;
border:1px solid black;}
a:hover {
color:#0099FF;
background:#F99001;
}
 a span {display:none;}
a:hover span {
position:relative;
color:black;
background:#ffffff;
font:bold 10px verdana, sans-serif;
border:1px solid black;
display:block;
padding:10px;}
</style>
</head>
<body topmargin="0" rightmargin="0" leftmargin="0" bottommargin="0">
<table border="0" cellpadding="0" cellspacing="0" align="center">
<tr>
  <td width="16" rowspan="3" background="img/subtopv.jpg">&nbsp;</td>
<td width="780">
<table border="0" cellpadding="0" cellspacing="0">

<tr>
<td width="328" align="left">

<?php if(isset($_SESSION['UserLogin'])){ $test=1;?>
	    <span class="white" style="vertical-align: middle; padding-left: 12px; font-weight: bold;">BienVenu</span>, <b></span><span class='Style11'> <?php echo "   ".$_SESSION['UserName']."             "; ?> <a href="<?php echo $_SERVER['PHP_SELF']; ?>?Action=Deconnect">D&eacute;connexion</a><?php } ?></td>
<td width="452" align="right"><img src="../img/06.jpg" width="478" height="42" /></td>
</tr>
<tr>
  <td colspan="2"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="780" height="163">
    <param name="movie" value="../swf/0159.swf" />
    <param name="quality" value="high" />
    <embed src="../swf/0159.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="780" height="163"></embed>
  </object></td>
</tr>
</table></td>
<td width="16" rowspan="3" background="img/subtopv1.jpg">&nbsp;</td>
<tr>
  <td>
<table border="0" cellpadding="0" cellspacing="0">
<tr>
  <td rowspan="3" valign="top" width="186" bgcolor="#6C93D6"><img src="../img/cap01.jpg" width="186" height="60" />
    <p><a href="ajout_categorie.php">Ajout Cat&eacute;gorie</a></p>
    <p><a href="consult_categorie.php">Consult Cat&eacute;gorie</a></p>
    <p><a href="ajout_produit.php">Ajout produit</a></p>
    <p><a href="passage.php">Consult Produits   </a></p>
	<p><a href="consult_client.php">Consult Clients   </a></p>
	<p><a href="consult_cmd.php">Consult Commandes   </a></p>
	<p><a href="liste_contact.php">Consult Contacts   </a></p>
    <p><img src="../img/cap02.jpg" width="186" height="33" /></p></td><td valign="top"><img src="img/subtop.jpg" /></td>
</tr>
<tr>
<td valign="top" align="center" width="580"><br /><?php
$ref=$_GET["ref"];
include("connection.php");
$sql="delete from contact where ref='$ref'";
$req=mysql_query($sql);
header("location:consult_contact.php");
?></td>
</tr>
<tr>
<td valign="bottom"><img src="img/subtoph.jpg" /></td>
</tr>
</table></td>
  </tr>
<tr>
  <th background="img/f02.jpg" id="signature"><marquee>
    <span class="Style1">&copy;&nbsp;&nbsp;SIB KAIROUAN 2011 &nbsp;&copy;</span>
  </marquee></th>
  </tr>
</table>
</body>
</html>