<!doctype html><html lang="fr"><head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><title>Bienvenue sur notre site</title><meta property="og:url" content="/"/><meta property="og:type" content="website"/><meta property="og:title" content="Bienvenue sur notre site"/><meta name="twitter:card" content="summary"/><meta name="twitter:title" content="Bienvenue sur notre site"/><meta name="generator" content="Lauyan TOWeb 9.0.6.907"><meta name="viewport" content="width=device-width, initial-scale=1.0"><link href="rss.xml" rel="alternate" type="application/rss+xml"><link href="_scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet"><link href="http://fonts.googleapis.com/css?family=Tenor+Sans" rel="stylesheet"><link href="_frame/style.css" rel="stylesheet"><link rel="stylesheet" media="screen" href="_scripts/colorbox/colorbox.css"><link rel="stylesheet" href="_scripts/bootstrap/css/font-awesome.min.css"><style>.alert a{color:#003399}.ta-left{text-align:left}.ta-center{text-align:center}.ta-justify{text-align:justify}.ta-right{text-align:right}.float-l{float:left}.float-r{float:right}.flexobj{flex-grow:0;flex-shrink:0;margin-right:1em;margin-left:1em}.flexrow{display:flex !important;align-items:center}@media (max-width:767px){.flexrow{flex-direction:column}};</style><link href="_frame/print.css" rel="stylesheet" type="text/css" media="print">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAs2DHu6AvTQ-no_c4panFGZW0K5W-bdyg&exp&sensor=false&libraries=places" sensor="false"></script>
<script type="text/javascript">
$(function(){
		   var latlng=new google.maps.LatLng(35.6771389,10.0972400);
		   var map=new google.maps.Map(document.getElementById('gmap'),{
															   zoom:13,
															   center:latlng,
															   mapTypeId:google.maps.MapTypeId.ROADMAP
															   });
		
		  var marker= new google.maps.Marker({
											  position:latlng,
											  map:map,
											  title:'Bougez ce curseur',
											  draggable: true
											  });
		   var geocoder= new google.maps.Geocoder();
		   google.maps.event.addListener(marker,'drag',function(){
																setPosition(marker);
																});
		
													return false;
												
												
		  });
  function setPosition(marker){
	  var pos=marker.getPosition();
	  $(document.getElementById('Lat')).val(pos.lat());
	  $(document.getElementById('Lng')).val(pos.lng());
  }
											

</script>
<!-- TinyMCE -->
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->
</head><body><div id="site"><div id="page"><header><div id="toolbar1" class="navbar"><div class="navbar-inner"><div class="container-fluid"><ul id="toolbar1_l" class="nav"><li><a id="logo" href="index.php"><span id="logo-lt">Alerta</span><span id="logo-rt">S&eacute;curity</span><br><span id="logo-sl">La Vrai Tranquilit&eacute; d'Esprit</span></a></li></ul><button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><div class="nav-collapse collapse"><ul id="toolbar1_r" class="nav pull-right"><li><ul id="mainmenu" class="nav">


<li><a href="index.php">Accueil</a></li>
<li><a href="presentation.php">Soci&eacute;t&eacute;</a></li>
<li class="active"><a href="nouveaute.php">Nouveaut&eacute;</a></li>
<li><a href="local.php">Nos boutiques</a></li>
<li><a href="forum/index.php">Forum</a></li>
<li><a href="contact.php">Contactez-Nous</a></li>



</ul></li></ul></div></div></div></div><div id="main-carousel" class="carousel slide"><ol class="carousel-indicators"><li data-target="#main-carousel" data-slide-to="0" class="active"><!----></li><li data-target="#main-carousel" data-slide-to="1" class="active"><!----></li><li data-target="#main-carousel" data-slide-to="2" class="active"><!----></li><li data-target="#main-carousel" data-slide-to="3" class="active"><!----></li><li data-target="#main-carousel" data-slide-to="4" class="active"><!----></li><li data-target="#main-carousel" data-slide-to="5" class="active"><!----></li></ol><div class="carousel-inner fade-trans"><div class="active item"><img src="_frame/banner2.jpg" alt="Image 2"></div><div class="item"><img src="_frame/20150407220217377.jpg" alt="Image 3"></div><div class="item"><img src="_frame/banner1.jpg" alt="Image 1"></div><div class="item"><img src="_frame/banner3.jpg" alt="banner3.jpg"></div><div class="item"><img src="_frame/gsm-alarm-system-banner-f.jpg" alt="gsm_alarm_system_banner_f.jpg"></div><div class="item"><img src="_frame/5-banner3970x331.jpg" alt="5_banner3970x331.jpg"></div></div></div><div id="toolbar2" class="navbar"><div class="navbar-inner"><div class="container-fluid"><ul id="toolbar2_l" class="nav"><li><div id="sharebox"><a target="_blank" href="https://www.facebook.com/" rel="noopener"><img style="width:30px;height:30px" src="_frame/tw-share-facebook@2x.png" class="anim-360" alt="facebook"></a><a target="_blank" href="https://www.twitter.com/" rel="noopener"><img style="width:30px;height:30px" src="_frame/tw-share-twitter@2x.png" class="anim-360" alt="twitter"></a><a target="_blank" href="https://www.linkedin.com/in/" rel="noopener"><img style="width:30px;height:30px" src="_frame/tw-share-linkedin@2x.png" class="anim-360" alt="linkedin"></a><a target="_blank" href="https://pinterest.com/" rel="noopener"><img style="width:30px;height:30px" src="_frame/tw-share-pinterest@2x.png" class="anim-360" alt="pinterest"></a><a target="_blank" href="https://www.youtube.com/" rel="noopener"><img style="width:30px;height:30px" src="_frame/tw-share-youtube@2x.png" class="anim-360" alt="youtube"></a><a target="_blank" href="https://www.instagram.com/" rel="noopener"><img style="width:30px;height:30px" src="_frame/tw-share-instagram@2x.png" class="anim-360" alt="instagram"></a><a target="_blank" onclick="javascript:return(decMail2(this));" href="znvygb?" rel="noopener"><img style="width:30px;height:30px" src="_frame/tw-share-mail@2x.png" class="anim-360" alt="email"></a><a href="#" onclick="return false;"><img style="width:30px;height:30px" src="_frame/tw-share-rss@2x.png" class="anim-360" alt="rss"></a></div></li></ul><ul id="toolbar2_r" class="nav pull-right"><li><form id="searchbox" class="navbar-search" action="_search.html"><input type="text" name="req" id="searchbox-req" class="search-query" placeholder="Rechercher"></form></li></ul></div></div></div></header><div id="content" class="container-fluid"><h1>Bienvenue sur notre site</h1><div id="topic" class="row-fluid"><div id="topic-inner"><div id="top-content" class="span9"><div class="twpara-row row-fluid"><div id="heqHlINw" class="span12 tw-para ">
           <h2 style="text-align:left"><i class="fa fa-cogs " style="color:#969696">&nbsp;</i>Demande de Maintenance</h2>
            
            
            <div id="gmap" style="width:100%; height:400px;"></div>
           <form id="form1" name="form1" method="post" action="">
         <table width="80%" border="0" align="center" cellpadding="5" cellspacing="5">
             <tr>
               <td>Profil</td>
               <td><input type="radio" name="t1" id="radio" value="Particulier" />
                 Particulier
                   <input type="radio" name="t1" id="radio2" value="Entreprise" />
                   Entreprise</td>
             </tr>
             <tr>
               <td>Civilit&eacute;</td>
               <td><input type="radio" name="t2" id="radio3" value="Mr" />
                 Mr
                   <input type="radio" name="t2" id="radio4" value="Mme" />
                   Mme
                   <input type="radio" name="t2" id="radio5" value="Mlle" />
                   Mlle</td>
             </tr>
             <tr>
               <td>NCIN</td>
               <td><input type="text" name="t3" id="t3" /></td>
             </tr>
             <tr>
               <td>Nom</td>
               <td><input type="text" name="t4" id="t4" /></td>
             </tr>
             <tr>
               <td>Pr&eacute;nom</td>
               <td><input type="text" name="t5" id="t5" /></td>
             </tr>
             <tr>
               <td>Entreprise</td>
               <td><input type="text" name="t6" id="t6" /></td>
             </tr>
             <tr>
               <td>E-mail</td>
               <td><input type="text" name="t7" id="t7" /></td>
             </tr>
             <tr>
               <td>Adresse</td>
               <td><input type="text" name="t8" id="t8" /></td>
             </tr>
             <tr>
               <td>Ville</td>
               <td><input type="text" name="t9" id="t9" /></td>
             </tr>
             <tr>
               <td>T&eacute;l&eacute;phone</td>
               <td><input type="text" name="t10" id="t10" /></td>
             </tr>
             <tr>
               <td>N&deg; de fax</td>
               <td><input type="text" name="t11" id="t11" /></td>
             </tr>
             <tr>
               <td>Latitude</td>
               <td><input type="text" name="Lat" id="Lat"></td>
             </tr>
             <tr>
               <td>Longitude</td>
               <td><input type="text" name="Lng" id="Lng"></td>
             </tr>
             <tr>
               <td colspan="2">Votre demande</td>
             </tr>
             <tr>
               <td colspan="2" align="center"><textarea name="t20" id="t20" cols="45" rows="5"></textarea></td>
               </tr>
             <tr>
               <td colspan="2" align="center"><input type="submit" name="b1" id="b1" value="Envoyer" /></td>
               </tr>
           </table>
       </form>
       <?php
       if(isset($_POST["b1"]))
	   {
		   include("connection.php");
		   $profil=$_POST["t1"];
		   $civilite=$_POST["t2"];
		   $ncin=$_POST["t3"];
		   $nom=$_POST["t4"];
		   $prenom=$_POST["t5"];
		   $entreprise=$_POST["t6"];
		   $mail=$_POST["t7"];
		   $adresse=$_POST["t8"];
		   $ville=$_POST["t9"];
		   $tel=$_POST["t10"];
		   $fax=$_POST["t11"];
		  $lat=$_POST["Lat"];
		  $lng=$_POST["Lng"];
		   $demande=$_POST["t20"];
		   $sql=mysql_query("insert into client(ncin,profil, civilite,nom, prenom, entreprise, mail, adresse, ville, tel, fax) values('$ncin','$profil', '$civilite','$nom', '$prenom', '$entreprise', '$mail', '$adresse', '$ville', '$tel', '$fax')");
		   $sql1=mysql_query("insert into demande(ncin, lat, lng, demande) values ('$ncin','$lat', '$lng','$demande')");
		   if($sql1)
		   {
			   ?>
               <script language="javascript">
			   alert("votre demande à été bien transmis à l'administration de alerta sécurity");
			   </script>
               <?php
		   }
		   else
		   echo"echec d'envoi";
	   }
	   ?>
</div></div><div class="twpara-row row-fluid"></div></div><div id="top-sb" class="span3"><div id="FYslspHz" class="tw-para twps-panel"><h2>&nbsp;<i class="fa fa-bell ">&nbsp;&nbsp;</i>Nos Produits</h2><div class="ptext"><p>

<?php
		  include("connection.php");
$sql=mysql_query("select* from cat");
while($res=mysql_fetch_array($sql))
{
$code=$res["code"];
$designation=$res["designation"];
?><a href="liste_med.php?code=<?php echo"$code"; ?>" target="i1" class="btn btn-primary" style="width:100%;"><?php echo"$designation"; ?></a>
<?php
}
?>



</p></div></div><div id="aCu8gPlQ" class="tw-para twps-panel"><h2><i class="fa fa-cog ">&nbsp;&nbsp;&nbsp;</i>Demandes</h2><div class="ptext">

<p><a href="devis.php" class="btn btn-success" id="lnk00c360c7" style="width:100%">Demande de devis</a></p>
<p><a href="demande.php" class="btn btn-primary" id="lnkd68f38da" style="width:100%">Demande de maintenance</a></p>
<p><a href="etat_demande.php" class="btn btn-info" id="lnkf6b9e064" style="width:100%">Etat de demande</a></p>



</div></div><div id="5iJXVEQy" class="tw-para "><h2>Espace Admin</h2><div class="pobj obj-before" style="text-align:center;"><a href="index1.php"><img src="_media/img/small/it-security-1.jpg" srcset="_media/img/medium/it-security-1.jpg 1.6x,_media/img/large/it-security-1.jpg 2.13x" style="max-width:100%;width:260px;" alt="" loading="lazy"></a></div></div></div></div></div></div><footer><div id="footerfat" class="row-fluid"><div class="row-fluid"><div  id="footerfat_s1" class="span4 tw-para"><strong>Contact</strong><br><br><strong>Alerta Security</strong><br>Avenue Habib Thameur Kairouan<br>Tel.: +216 77 22 70 70<br>Fax: +216 77 23 80 07<br>Alerta@gmail.com</div><div  id="footerfat_s2" class="span4 tw-para"><strong>Plan de site</strong><ul><li><a href="presentation.php">Pr&eacute;sentation</a></li><li><a href="nouveaute.php">Nouveaut&eacute;s</a></li><li><a href="devis.php">Demande de devis</a></li><li><a href="demande.php">Demande de maintenance</a></li><li><a href="etat_demande.php">Etat de demande</a></li><li><a href="local.php">Nos boutiques</a></li><li><a href="forum/index.php">Forum de discussion</a></li><li><a href="contact.php">Contactez-Nous</a></li></ul></div><div  id="footerfat_s3" class="span4 tw-para"><strong>A propos</strong><br><br>Fond&eacute;e en 1995, Soci&eacute;t&eacute; Alerta security S.A.R.L. est aujourd&rsquo;hui la plus importante Soci&eacute;t&eacute; de s&eacute;curit&eacute; &eacute;lectronique en Tunisie. Elle offre des services de s&eacute;curit&eacute; pour le march&eacute; r&eacute;sidentiel.</div></div></div><div id="footersmall" class="row-fluid"><div id="foot-sec1" class="span6 ">© Copyright Yassine. Tous droits réservés.</div><div id="foot-sec2" class="span6 "><div style="text-align: right; "><a href="_tos.html" id="lnkdfc5e39d">Termes &amp; Conditions</a></div></div></div></footer></div></div><script src="_scripts/jquery/jquery.min.js"></script><script src="_scripts/bootstrap/js/bootstrap.min.js"></script><script src="_scripts/colorbox/jquery.colorbox-min.js"></script><script src="_scripts/cookie/jquery.ckie.min.js"></script><script>function ucc(){var a;if(typeof window.sessionStorage!="undefined")a=sessionStorage.getItem("scUoB")||"";else a=$.cookie("scUoB");if(!a||a=="")b=0;else{var b=0;var c=0;do{c=a.indexOf(")",c);if(c>0){e=c-1;while(e>=0&&a[e]!="=")e--;b+=parseInt(a.substring(e+1,c));c++}}while(c>0)}$("#sc_pcount").text(b)}function decMail2(e){var s=""+e.href,n=s.lastIndexOf("/"),w;if(s.substr(0,7)=="mailto:")return(true);if(n>0)s=s.substr(n+1);s=s.replace("?",":").replace("#","@").replace(/[a-z]/gi,function(t){return String.fromCharCode(t.charCodeAt(0)+(t.toLowerCase()<"n"?13:-13));});e.href=s;return(true);}function onChangeSiteLang(href){var i=location.href.indexOf("?");if(i>0)href+=location.href.substr(i);document.location.href=href;}</script><script>$(document).ready(function(){$("#main-carousel").carousel({interval:3000});$("a[rel='wpQc']").colorbox({maxWidth:'90%',maxHeight:'90%',transition:'none'});ucc();if(typeof window.sessionStorage!="undefined")$("#button-cart").popover({placement:"bottom",html:true,content:function(){return sessionStorage.getItem("scUoB-popover")||"<small>VOTRE PANIER EST VIDE</small>"},trigger:"hover"});$("#searchbox>input").click(function(){$(this).select();});$("#searchbox").click(function(e){if(e.offsetX>e.target.width){}else $("#searchbox").submit()});if(location.href.indexOf("?")>0&&location.href.indexOf("twtheme=no")>0){$("#toolbar1,#toolbar2,#toolbar3,#footersmall,#footerfat").hide();var idbmk=location.href;idbmk=idbmk.substring(idbmk.lastIndexOf("#")+1,idbmk.lastIndexOf("?"));if(idbmk!="")$("html,body").animate({scrollTop:$("#"+idbmk).offset().top},0);}$("#site").prepend("<a href='javascript:void(0)' class='toTop' title='Haut de page'><i class='fa fa-arrow-circle-up fa-2x toTopLink'></i></a>");var offset=220;var duration=500;$(window).scroll(function(){if($(this).scrollTop()>offset){$(".toTop").fadeIn(duration);}else{$(".toTop").fadeOut(duration);}});$(".toTop").click(function(event){event.preventDefault();$("html, body").animate({scrollTop:0},duration);return(false);});var s=document.location.href.toLowerCase();if(typeof onTOWebPageLoaded=="function")onTOWebPageLoaded();});</script></body></html>