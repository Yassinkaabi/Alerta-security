<!doctype html><html lang="fr"><head><meta charset="utf-8"><title>Bienvenue sur notre site</title><meta name="generator" content="Lauyan TOWeb 7.0.7.757"><meta name="viewport" content="width=device-width, initial-scale=1.0"><link href="rss.xml" rel="alternate" type="application/rss+xml"><link href="_scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet"><link href="http://fonts.googleapis.com/css?family=Aldrich" rel="stylesheet"><link href="_frame/style.css" rel="stylesheet"><link rel="stylesheet" media="screen" href="_scripts/colorbox/colorbox.css"><link rel="stylesheet" href="_scripts/bootstrap/css/font-awesome.min.css"><style>.alert a{color:#003399}.ta-left{text-align:left}.ta-center{text-align:center}.ta-justify{text-align:justify}.ta-right{text-align:right}.float-l{float:left}.float-r{float:right}.float-lpad{float:left;padding-right:1.5em;}.float-rpad{float:right;padding-left:1.5em;}</style><link href="_frame/print.css" rel="stylesheet" type="text/css" media="print" />
<link href="style.css" rel="stylesheet" type="text/css">
</head><body><div id="site"><div id="page"><header><div id="toolbar1" class="navbar"><div class="navbar-inner"><div class="container-fluid"><ul id="toolbar1_l" class="nav"><li><a id="logo" href="index.html"><span id="logo-lt">Alerta</span><span id="logo-rt">Security</span><br><span id="logo-sl" class="hidden-phone">La vrai tranquilité d'esprit</span></a></li></ul><button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><div class="nav-collapse collapse"><ul id="toolbar1_r" class="nav pull-right"><li><ul id="mainmenu" class="nav"><li class="active"><a href="index0.php">Accueil</a></li><li><a href="presentation.php">Société</a></li><li><a href="nouveaute.php">Nouveautés</a></li><li><a href="devis.php">Demande de devis</a></li><li><a href="etat_demande.php">Etat de demande</a></li><li><a href="local.php">Nos Boutiques</a></li><li><a href="contact.php">Contactez-Nous</a></li></ul></li></ul></div></div></div></div><div id="main-carousel" class="carousel slide"><div class="carousel-inner fade-trans"><div class="active item"><img src="_frame/it-security-1.jpg" alt="Image 2"></div><div class="item"><img src="_frame/gsm-alarm-system-banner-f.jpg" alt="Image 3"></div><div class="item"><img src="_frame/banner2.jpg" alt="Image 1"></div><div class="item"><img src="_frame/network-security-small.jpg" alt=""></div></div></div><div id="toolbar2" class="navbar"><div class="navbar-inner"><div class="container-fluid"><ul id="toolbar2_l" class="nav"><li><div id="sharebox"><a target="_blank" href="https://www.facebook.com/"><img style="width:32px;height:32px" src="_frame/tw-share-facebook@2x.png" class="anim-360" alt="facebook"></a><a target="_blank" href="https://www.twitter.com/"><img style="width:32px;height:32px" src="_frame/tw-share-twitter@2x.png" class="anim-360" alt="twitter"></a><a target="_blank" href="" rel="publisher"><img style="width:32px;height:32px" src="_frame/tw-share-google@2x.png" class="anim-360" alt="google"></a><a target="_blank" href="http://pinterest.com/"><img style="width:32px;height:32px" src="_frame/tw-share-pinterest@2x.png" class="anim-360" alt="pinterest"></a><a target="_blank" onclick="javascript:return(decMail2(this));" href="znvygb?"><img style="width:32px;height:32px" src="_frame/tw-share-mail@2x.png" class="anim-360" alt="email"></a><a href="#" onclick="return false;"><img style="width:32px;height:32px" src="_frame/tw-share-rss@2x.png" class="anim-360" alt="rss"></a></div></li></ul><ul id="toolbar2_r" class="nav pull-right"><li></li><li><form id="searchbox" class="navbar-search" action="_search.html"><input type="text" name="req" id="searchbox-req" class="search-query" placeholder="Rechercher"></form></li></ul></div></div></div></header><div id="content" class="container-fluid"><div id="topic" class="row-fluid"><div id="topic-inner"><div id="top-content" class="span9"><h1>Bienvenue sur notre site</h1><div class="twpara-row row-fluid"><div id="heqHlINw" class="span12 tw-para "><h2 style="text-align:left"><i class="fa fa-cogs ">&nbsp;</i>A propos</h2><div class="pobj float-l" style="position:relative;z-index:1;"><a href="_media/img/small/logo.png" rel="wpQc"><img class=" frm-rounded"  data-src="img/logo.png" data-srcset="img/logo.png 1.25x" style="max-width:100%;width:160px" alt=""></a></div><div class="ptext">Alerta Security place le client au centre de ses préoccupations. De l’analyse de risques à la proposition de solutions adaptées aux besoins; Alerta security met à profit sa vaste expertise afin de développer pour vous un système de sécurité convivial et efficace. Du plus simple système contre l’intrusion à celui intégrant plusieurs technologies de surveillance et de détection, Alerta security saura combler vos attentes.<br><br><a id="lnk1-heqHlINw" class="btn" href="presentation.php">Plus...</a></div></div></div><div class="twpara-row row-fluid"><div id="RsRVE16q" class="span12 tw-para "><h2 style="text-align:left"><i class="fa fa-user ">&nbsp;</i>Nos sélection de produit</h2><div class="ptext"><p>



<table border="0" align="center" cellspacing="4" bordercolor="#660000" height="172"  >
         <tr>
           <?php
include("connection.php");

$sql=mysql_query('select* from produit where nouveaute=1 ORDER BY code DESC ');

$i=0;
while($res=mysql_fetch_array($sql))
{
$code=$res["code"];
$nom=$res["nom"];
$prix=$res["prix"];
$description=$res["description"];
$accueil=$res["Accueil"];
$nouveaute=$res["nouveaute"];
$photo=$res['photo'];
$code_cat=$res["cat"];
$promo=$res["promo"];
$i++;

if($i%3 ==1)
{
?>
         </tr>
         <?php
}
?>
  <td  valign="top" bgcolor="#FFFFFF">
  <table height="172">
  <tr>
  <td style="padding-left: 11px; padding-top: 40px; background-repeat:no-repeat;" background="img/w05.jpg"  valign="top" width="251">
<table width="203" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td width="110"><img src="img/<?php echo"$photo"?>" style="width:80px; height:80px;"  hspace="10" vspace="5" border="2" /></td>
<td valign="top" width="180">
<div class="cap"><span class="tp"><?php echo"$nom";?></span></div>
<div class="small"><?php 
if($promo!="")
{
	echo"<span style='text-decoration:line-through;'>$prix</span><img src='img/arraw.png'>";
	echo"$promo DT";
}
else
{
echo"$prix DT";
}?></div>
</td>
</tr>
<tr >
<td align="center">&nbsp;</td>
<td><a href="details.php?code=<?php echo"$code";?>"><img src="img/moreinfo.jpg" border="0"></a></td>
</tr>
</tbody>
</table>
</td>
  </tr>
  </table></td>
    <?php 
}
?>
  </tr>
       </table>




</p></div></div></div></div><div id="top-sb" class="span3"><div id="awRH5GTA" class="tw-para twps-panel"><h2>Nos Produits</h2><div class="ptext"><ul><?php
		  include("connection.php");
$sql=mysql_query("select* from cat");
while($res=mysql_fetch_array($sql))
{
$code=$res["code"];
$designation=$res["designation"];
?><li><a href="liste_med.php?code=<?php echo"$code"; ?>" target="i1" class="a"><?php echo"$designation"; ?></a></li>
<?php
}
?>


</ul></div></div><div id="r87ZrouK" class="tw-para twps-panel"><h2><a href="index1.php">Espace Admin</a></h2></div><div id="kdyO3ZVT" class="tw-para "><h2>Sondage</h2></div><iframe scrolling="no" frameborder="0" allowtransparency="true" title="Sondages Pixule" width="190" height="365" src="http://www.pixule.com/widget198023818772" data-key="198023818772"></iframe></div></div></div></div><footer><div id="footerfat" class="row-fluid"><div class="row-fluid"><div  id="footerfat_s1" class="span4 tw-para"><span style="color:#FFFFFF;"><strong>Contact</strong><br></span><br>Alerta Security<br><br>Avenue Habib Thameur Kairouan<br><br>Tel.: +216 77 22 70 70<br><br>Fax: +216 77 23 80 07<br><a onclick="javascript:return(decMail2(this));" href="znvygb?pbagnpg#lbhefvgr.pbz" id="lnkdff43647">Alerta@gmail.com</a></div><div  id="footerfat_s2" class="span4 tw-para"><span style="color:#FFFFFF;"><strong>Plan de site</strong></span><ul><li><a href="presentation.php">Présentation</a></li><li><a href="nouveaute.php">Nouveautés</a></li><li><a href="devis.php">Demande de devis</a></li><li><a href="etat_demande.php">Etat de demande</a></li><li><a href="local.php">Nos boutiques</a></li><li><a href="contact.php">Contactez-Nous</a></li></ul></div><div  id="footerfat_s3" class="span4 tw-para"><span style="color:#FFFFFF;"><strong>A propos</strong></span><br><br>Fondée en 1995, Société Alerta security S.A.R.L. est aujourd’hui la plus importante Société de sécurité électronique en Tunisie. Elle offre des services de sécurité pour le marché résidentiel.</div></div></div><div id="footersmall" class="row-fluid"><div id="foot-sec1"  class="span6 "><a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#119;&#119;&#119;&#46;&#108;&#97;&#117;&#121;&#97;&#110;&#46;&#99;&#111;&#109;">&#67;&#114;&#233;&#233;&#160;&#97;&#118;&#101;&#99;&#160;&#84;&#79;&#87;&#101;&#98;&#160;&#45;&#160;&#76;&#101;&#160;&#108;&#111;&#103;&#105;&#99;&#105;&#101;&#108;&#160;&#100;&#101;&#160;&#99;&#114;&#233;&#97;&#116;&#105;&#111;&#110;&#160;&#100;&#101;&#160;&#115;&#105;&#116;&#101;&#115;&#160;&#114;&#101;&#115;&#112;&#111;&#110;&#115;&#105;&#118;&#101;</a>. © Copyright Zied. Tous droits réservés.</div><div id="foot-sec2"  class="span6 "><div style="text-align: right; "><a href="_tos.html" id="lnkdfc5e39d">Termes &amp; Conditions</a></div></div></div></footer></div></div><script src="_scripts/jquery/jquery.min.js"></script><script src="_scripts/bootstrap/js/bootstrap.min.js"></script><script src="_scripts/colorbox/jquery.colorbox-min.js"></script><script src="_scripts/cookie/jquery.ckie.min.js"></script><script>function ucc(){var a;if(typeof window.sessionStorage!="undefined")a=sessionStorage.getItem("sc7OF")||"";else a=$.cookie("sc7OF");if(!a||a=="")b=0;else{var b=0;var c=0;do{c=a.indexOf(")",c);if(c>0){e=c-1;while(e>=0&&a[e]!="=")e--;b+=parseInt(a.substring(e+1,c));c++}}while(c>0)}$("#sc_pcount").text(b)}function decMail2(e){var s=""+e.href,n=s.lastIndexOf("/"),w;if(s.substr(0,7)=="mailto:")return(true);if(n>0)s=s.substr(n+1);s=s.replace("?",":").replace("#","@").replace(/[a-z]/gi,function(t){return String.fromCharCode(t.charCodeAt(0)+(t.toLowerCase()<"n"?13:-13));});e.href=s;return(true);}function onChangeSiteLang(href){var i=location.href.indexOf("?");if(i>0)href+=location.href.substr(i);document.location.href=href;}</script></body></html>