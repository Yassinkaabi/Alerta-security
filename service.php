
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml/DTD/xhtml1-transitional.dtd">
<html xmlns="http://wwww.w3.org/1999/xhtml">
<head>
<title>Document sans titre</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title>Document sans titre</title>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
$(function(){
		   var latlng=new google.maps.LatLng(35.671499960977336,10.099348216285762);
		   var map=new google.maps.Map(document.getElementById('gmap'),{
															   zoom:17,
															   center:latlng,
															   mapTypeId:google.maps.MapTypeId.ROADMAP
															   });
		  
		
	var marker=new google.maps.Marker({
									  position:new google.maps.LatLng(35.671499960977336,10.099348216285762),
									  map:map,
									  draggable:false,
									  animation:google.maps.Animation.DROP,
									  icon:'marker.png'
								  
								  }); 
	
		  });

											  

</script>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="entete">
<table border="0" align="center" cellpadding="0" cellspacing="0" width="1032" height="241">
<tr>
<td valign="bottom"><div id="bordureG"></div></td>
<td valign="top"><div id="banner">
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="1000" height="213">
    <param name="movie" value="slide.swf" />
    <param name="quality" value="high" />
    <embed src="slide.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="1000" height="213"></embed>
  </object>
</div>
<div id="menu">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td valign="middle"><a href="index0.php" class="a1">Accueil</a></td>
      <td valign="middle"><a href="presentation.php" class="a1">Pr&eacute;sentation</a></td>
      <td valign="middle"><a href="service.php" class="a1">Services</a></td>
      <td valign="middle"><a href="nouveaute.php" class="a1">Nouveaut&eacute;s</a></td>
      <td valign="middle"><a href="devis.php" class="a1">Devis</a></td>
      <td valign="middle"><a href="local.php" class="a1">Nos Boutiques </a></td>
      <td valign="middle"><a href="etat_demande.php" class="a1">etat de demande</a></td>
      <td valign="middle"><a href="index0.php" class="a1"></a></td>
      <td valign="middle"><a href="index0.php" class="a1"></a></td>
      <td valign="middle"><a href="contact.php" class="a1">Contactez-nous</a></td>
    </tr>
  </table>
</div>
</td>
<td valign="bottom"><div id="bordureD"></div></td>
</tr>
</table>
</div>
<div id="contenu">
<table width="1000" align="center" cellpadding="0" cellspacing="0">
<tr><td width="203" valign="top">
  <div id="contenu1">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
       <td width="203" valign="top"><div id="menuproduit">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="203" height="30" background="img/bg_btsidebar.gif">Nos Produits</td>
            </tr>
            <tr>
              <td><?php
		  include("connection.php");
$sql=mysql_query("select* from cat");
while($res=mysql_fetch_array($sql))
{
$code=$res["code"];
$designation=$res["designation"];
?>
<a href="liste_med.php?code=<?php echo"$code"; ?>" target="i1" class="a"><?php echo"$designation"; ?></a><br />
<?php
}
?>
</td>
</tr>
</table>
</div>
<br />


</td>
       <td rowspan="2" valign="top">
       <table width="100%" background="img/bg_accroche.png" style="padding-left:20px;"><tr>
       <td width="60%"> <?php if(isset($_SESSION['UserLogin'])){ $test=1;?>
        <span style="color:#909; font-weight:bold;">BienVenu,</span><span style="color:#fff; font-weight:bold;"> <?php echo "".$_SESSION['UserName'].""; ?></span> <a href="deconnection.php" style="display:block; width:100px; background:#939; color:#FFF; text-decoration:none;">D&eacute;connexion</a>
	    <?php } ?></td>
       <td width="40%"><?php
       if(isset($_SESSION["panier"]))
	   {
		   ?><table><tr><td><a href='panier.php'><img src="img/panier.png" /></a></td><td><span style="color:#FFF; font-weight:bold;"><?php
       
	   $nbArticles=count($_SESSION['panier']['nom']);
	   
		   echo"Mon panier:$nbArticles Articles";
		   ?>
           </span>
	   
	   
	   </td></tr></table><?php
	   }
	   ?></td>
       </tr>
       </table><br />
       <fieldset>
       <legend class="legend">Services</legend>
       <p>&nbsp;</p>
       <p>&nbsp;</p>
       </fieldset></td>
      
</tr>
      <tr>
        <td valign="top"><a href="index1.php"><img src="img/admin.png"</a></td>
      </tr>
        </table>
</div></td>
      </tr>
    </table>
    </div>
</td></tr></table>
</div>
<div id="lignebas">
<table width="1000" align="center" cellpadding="0" cellspacing="0">
<tr><td height="18">
  <div id="lignebas1">
  
  </div>
</td></tr></table>
</div>
<div id="piedpage1">
<table width="1000" align="center" cellpadding="0" cellspacing="0">
<tr><td height="18" valign="top">
  <div id="piedpage"></div>
</td></tr></table>
</div>
<div id="signature" align="center">CopyRight: 2017</div>
</body>
</html>