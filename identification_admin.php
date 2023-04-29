<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="admin/engine1/style.css" />
<script type="text/javascript" src="admin/engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->
<style type="text/css">
body{
	background:url(img/sized_AUDIO-Bringing-Cybersecurity-to-the-Forefront-copy1.jpg) center fixed;
}
.ttttt {
	color: #FFF;
	font-weight: bold;
}
</style>
	<!-- Start css3menu.com HEAD section -->
	<link rel="stylesheet" href="admin/CSS3 Menu.css3prj_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<!-- End css3menu.com HEAD section -->
</head>

<body>
<table width="1024" border="0" align="center" cellpadding="0" cellspacing="0" background="img/bg.png">
  <tr>
    <td height="200"><!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1">
<div class="ws_images"><ul>
		<li><img src="admin/data1/images/banner1.jpg" alt="banner1" title="banner1" id="wows1_0"/></li>
		<li><img src="admin/data1/images/banner2.jpg" alt="banner2" title="banner2" id="wows1_1"/></li>
		<li><img src="admin/data1/images/banner3.jpg" alt="banner3" title="banner3" id="wows1_2"/></li>
		<li><img src="admin/data1/images/5_banner3970x331.jpg" alt="5_banner3970x331" title="5_banner3970x331" id="wows1_3"/></li>
		<li><img src="admin/data1/images/20150407220217377.jpg" alt="20150407220217377" title="20150407220217377" id="wows1_4"/></li>
		<li><a href="http://wowslider.net"><img src="admin/data1/images/banner_guardian.jpg" alt="javascript slider" title="banner_guardian" id="wows1_5"/></a></li>
		<li><img src="admin/data1/images/gsm_alarm_system_banner_f.jpg" alt="gsm_alarm_system_banner_f" title="gsm_alarm_system_banner_f" id="wows1_6"/></li>
	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="banner1"><span><img src="admin/data1/tooltips/banner1.jpg" alt="banner1"/>1</span></a>
		<a href="#" title="banner2"><span><img src="admin/data1/tooltips/banner2.jpg" alt="banner2"/>2</span></a>
		<a href="#" title="banner3"><span><img src="admin/data1/tooltips/banner3.jpg" alt="banner3"/>3</span></a>
		<a href="#" title="5_banner3970x331"><span><img src="admin/data1/tooltips/5_banner3970x331.jpg" alt="5_banner3970x331"/>4</span></a>
		<a href="#" title="20150407220217377"><span><img src="admin/data1/tooltips/20150407220217377.jpg" alt="20150407220217377"/>5</span></a>
		<a href="#" title="banner_guardian"><span><img src="admin/data1/tooltips/banner_guardian.jpg" alt="banner_guardian"/>6</span></a>
		<a href="#" title="gsm_alarm_system_banner_f"><span><img src="admin/data1/tooltips/gsm_alarm_system_banner_f.jpg" alt="gsm_alarm_system_banner_f"/>7</span></a>
	</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">html5 slideshow</a> by WOWSlider.com v8.8</div>
<div class="ws_shadow"></div>
</div>	
<script type="text/javascript" src="admin/engine1/wowslider.js"></script>
<script type="text/javascript" src="admin/engine1/script.js"></script>
<!-- End WOWSlider.com BODY section --></td>
  </tr>
  <tr>
    <td height="700" valign="top"><form id="form1" name="form1" method="post" action="">
    <fieldset  class="loginField">
	  <legend> Identification</legend>
      <table width="75%" border="0" align="center" cellpadding="0" cellspacing="3">
        <tr>
          <td width="50%">Login</td>
          <td width="50%"><input type="text" name="t1" id="t1" /></td>
        </tr>
        <tr>
          <td>Mot de passe</td>
          <td><input type="password" name="t2" id="t2" /></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="b1" id="b1" value="S'identifier" /></td>
          </tr>
      </table>
	  </fieldset>
      <p><img src="img/admin.jpg" width="1024" height="300" /></p>
      </form>
      <div align="center"><span class="Style2">
        <?php
	if(isset($_POST["b1"]))
	{
    include("connection.php");
	$login=$_POST["t1"];
	$pass=$_POST["t2"];
	$pass=md5($pass);
	$sql=mysql_query("select* from administrateur");
	while($res=mysql_fetch_array($sql))
	{
		$id=$res["id"];
		$logint=$res["login"];
		$passt=$res["pass"];
		
		if($login==$logint&&$pass==$passt)
		{
			session_start();
			$_SESSION["id"]=$id;
			header("location:admin/index.php");
		}
		else
		?>
		Veuillez vérifier votre login et/ou mot de passe      </span>
        <?php
	}
	}
	?></td>
  </tr>
  <tr>
    <td bgcolor="#000033"><marquee class="ttttt">
    CopyRight: 2021 DesignedBy: Yassine
    </marquee></td>
  </tr>
</table>
</body>
</html>