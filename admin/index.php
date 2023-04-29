<?php
session_start();
if(!isset($_SESSION["id"]))
{
	header("location:../index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->
<style type="text/css">
body{
	background:url(../img/sized_AUDIO-Bringing-Cybersecurity-to-the-Forefront-copy1.jpg) center fixed;
}
.ttttt {
	color: #FFF;
	font-weight: bold;
}
</style>
	<!-- Start css3menu.com HEAD section -->
	<link rel="stylesheet" href="CSS3 Menu.css3prj_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
	<!-- End css3menu.com HEAD section -->
</head>

<body>
<table width="1024" border="0" align="center" cellpadding="0" cellspacing="0" background="../img/bg.png">
  <tr>
    <td height="200" colspan="2"><!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1">
<div class="ws_images"><ul>
		<li><img src="data1/images/banner1.jpg" alt="banner1" title="banner1" id="wows1_0"/></li>
		<li><img src="data1/images/banner2.jpg" alt="banner2" title="banner2" id="wows1_1"/></li>
		<li><img src="data1/images/banner3.jpg" alt="banner3" title="banner3" id="wows1_2"/></li>
		<li><img src="data1/images/5_banner3970x331.jpg" alt="5_banner3970x331" title="5_banner3970x331" id="wows1_3"/></li>
		<li><img src="data1/images/20150407220217377.jpg" alt="20150407220217377" title="20150407220217377" id="wows1_4"/></li>
		<li><a href="http://wowslider.net"><img src="data1/images/banner_guardian.jpg" alt="javascript slider" title="banner_guardian" id="wows1_5"/></a></li>
		<li><img src="data1/images/gsm_alarm_system_banner_f.jpg" alt="gsm_alarm_system_banner_f" title="gsm_alarm_system_banner_f" id="wows1_6"/></li>
	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="banner1"><span><img src="data1/tooltips/banner1.jpg" alt="banner1"/>1</span></a>
		<a href="#" title="banner2"><span><img src="data1/tooltips/banner2.jpg" alt="banner2"/>2</span></a>
		<a href="#" title="banner3"><span><img src="data1/tooltips/banner3.jpg" alt="banner3"/>3</span></a>
		<a href="#" title="5_banner3970x331"><span><img src="data1/tooltips/5_banner3970x331.jpg" alt="5_banner3970x331"/>4</span></a>
		<a href="#" title="20150407220217377"><span><img src="data1/tooltips/20150407220217377.jpg" alt="20150407220217377"/>5</span></a>
		<a href="#" title="banner_guardian"><span><img src="data1/tooltips/banner_guardian.jpg" alt="banner_guardian"/>6</span></a>
		<a href="#" title="gsm_alarm_system_banner_f"><span><img src="data1/tooltips/gsm_alarm_system_banner_f.jpg" alt="gsm_alarm_system_banner_f"/>7</span></a>
	</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">html5 slideshow</a> by WOWSlider.com v8.8</div>
<div class="ws_shadow"></div>
</div>	
<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>
<!-- End WOWSlider.com BODY section --></td>
  </tr>
  <tr>
    <td width="200" valign="top"><!-- Start css3menu.com BODY section -->

<ul id="css3menu1" class="topmenu">
	<li class="switch"><label onclick="" for="css3menu-switcher"></label></li>
	<li class="topfirst"><a href="index.php" style="width:171px;"><img src="CSS3 Menu.css3prj_files/css3menu1/home.png" alt=""/>Accueil</a></li>
	<li class="topmenu"><a href="ajout_categories.php" target="i1" style="width:171px;"><img src="CSS3 Menu.css3prj_files/css3menu1/list.png" alt=""/>Catégories</a></li>
	<li class="topmenu"><a href="ajout_produit.php" target="i1" style="width:171px;"><img src="CSS3 Menu.css3prj_files/css3menu1/cart.png" alt=""/>Produit</a></li>
	<li class="topmenu"><a href="#" style="width:171px;"><span><img src="CSS3 Menu.css3prj_files/css3menu1/service.png" alt=""/>Personnel</span></a>
	<ul>
		<li class="subfirst"><a href="ajout_personnel.php" target="i1"><img src="CSS3 Menu.css3prj_files/css3menu1/256-1.png" alt=""/>Ajouter</a></li>
		<li><a href="list_personnel.php" target="i1"><img src="CSS3 Menu.css3prj_files/css3menu1/256subdown1.png" alt=""/>Consulter</a></li>
	</ul></li>
	<li class="topmenu"><a href="liste_devis.php" target="i1" style="width:171px;"><img src="CSS3 Menu.css3prj_files/css3menu1/dollar.png" alt=""/>Demande de devis</a></li>
	<li class="topmenu"><a href="liste_installation.php" target="i1" style="width:171px;"><img src="CSS3 Menu.css3prj_files/css3menu1/samples.png" alt=""/>Demande d'installation</a></li>
    <li class="topmenu"><a href="liste_demande.php" target="i1" style="width:171px;"><img src="CSS3 Menu.css3prj_files/css3menu1/samples.png" alt=""/>Demande de maintenance</a></li>
	<li class="topmenu"><a href="#" style="width:171px;"><img src="CSS3 Menu.css3prj_files/css3menu1/bars.png" alt=""/>Historique</a></li>
	<li class="topmenu"><a href="#" style="width:171px;"><span><img src="CSS3 Menu.css3prj_files/css3menu1/location2.png" alt=""/>Agence</span></a>
	<ul>
		<li class="subfirst"><a href="ajout_local.php" target="i1"><img src="CSS3 Menu.css3prj_files/css3menu1/256-11.png" alt=""/>Ajouter</a></li>
		<li><a href="liste_local.php" target="i1"><img src="CSS3 Menu.css3prj_files/css3menu1/256subdown.png" alt=""/>Consulter</a></li>
	</ul></li>
	<li class="topmenu"><a href="#" style="width:171px;"><span><img src="CSS3 Menu.css3prj_files/css3menu1/contact.png" alt=""/>Boite de reception</span></a>
	<ul>
		<li class="subfirst"><a href="liste_msg_tech.php" target="i1"><img src="CSS3 Menu.css3prj_files/css3menu1/samples1.png" alt=""/>Message Technicien</a></li>
		<li><a href="liste_contact.php" target="i1"><img src="CSS3 Menu.css3prj_files/css3menu1/bcontact.png" alt=""/>Message Client</a></li>
	</ul></li>
	<li class="toplast"><a href="deconnect.php" style="width:171px;"><img src="CSS3 Menu.css3prj_files/css3menu1/256base-buy.png" alt=""/>Deconnexion</a></li>
</ul><p class="_css3m"><a href="http://css3menu.com/">css3 dropdown menu</a> by Css3Menu.com</p>
<!-- End css3menu.com BODY section -->
<img src="../img/logo.png" />
</td>
    <td width="824" height="700"><iframe name="i1" width="824" height="700" frameborder="0" src="../img/admin.png"></iframe></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#000033"><marquee class="ttttt">CopyRight: 2021 DesignedBy: Yassine</marquee></td>
  </tr>
</table>
</body>
</html>