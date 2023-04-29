<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
<link rel="stylesheet" href="themes/alerta.min.css" />
	<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile.structure-1.4.2.min.css" />
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
    <?php
		if(isset($_POST["t1"]))
		{
		$region=$_POST["t1"];
include("../connection.php");
$sql=mysql_query("select* from local where region='$region'");

while($res=mysql_fetch_array($sql))
{
	$code=$res["code"];
		$lat=$res["lat"];
	$lng=$res["lng"];
	$adresse=$res["adresse"];
	$tel=$res["tel"];
	}
	
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
$(function(){
		   var latlng=new google.maps.LatLng(<?php echo"$lat"; ?>,<?php echo"$lng"; ?>);
		   var map=new google.maps.Map(document.getElementById('gmap'),{
															   zoom:11,
															   center:latlng,
															   mapTypeId:google.maps.MapTypeId.ROADMAP
															   });
		
		var positions=[];
		var iterator=0;
		<?php
		include("../connection.php");
$sql=mysql_query("select* from local where region='$region'");
while($res=mysql_fetch_array($sql))
{
	$code=$res["code"];
		$lat=$res["lat"];
	$lng=$res["lng"];
	$adresse=$res["adresse"];
	$tel=$res["tel"];
?>
positions.push({
			  idEvent:<?php echo "$code"; ?>,
			  lat:<?php echo"$lat"  ?>,
			  lng:<?php echo "$lng" ?>
			  });

<?php
}

?>
$('.event').hide();
for(var i=0;i<positions.length;i++){
	setTimeout(addMarker,(i+1)*2000);
}
function addMarker(){
	var marker=new google.maps.Marker({
									  position:new google.maps.LatLng(positions[iterator].lat,positions[iterator].lng),
									  map:map,
									  draggable:false,
									  animation:google.maps.Animation.DROP,
									  //icon:'../img/logo.gif'
								
								  }); 
	
	var idEvent=positions[iterator].idEvent;
	google.maps.event.addListener(marker,'click',function(){
														  $('.event').hide();
														  $('.event'+idEvent).slideDown();
														  });
	iterator++;
}
		  });

											

</script>
<?php
}
else
{
?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
$(function(){
		   var latlng=new google.maps.LatLng(35.6771389,10.0972400);
		   var map=new google.maps.Map(document.getElementById('gmap'),{
															   zoom:06,
															   center:latlng,
															   mapTypeId:google.maps.MapTypeId.ROADMAP
															   });
		
		var positions=[];
		var iterator=0;
		<?php
	
include("../connection.php");
$sql=mysql_query("select* from local");
while($res=mysql_fetch_array($sql))
{
	$code=$res["code"];
		$lat=$res["lat"];
	$lng=$res["lng"];
	$adresse=$res["adresse"];
	$tel=$res["tel"];
?>
positions.push({
			  idEvent:<?php echo "$code"; ?>,
			  lat:<?php echo"$lat"  ?>,
			  lng:<?php echo "$lng" ?>
			  });

<?php
}
?>
$('.event').hide();
for(var i=0;i<positions.length;i++){
	setTimeout(addMarker,(i+1)*2000);
}
function addMarker(){
	var marker=new google.maps.Marker({
									  position:new google.maps.LatLng(positions[iterator].lat,positions[iterator].lng),
									  map:map,
									  draggable:false,
									  animation:google.maps.Animation.DROP,
									  //icon:'../img/logo.gif'
								
								  }); 
	
	var idEvent=positions[iterator].idEvent;
	google.maps.event.addListener(marker,'click',function(){
														  $('.event').hide();
														  $('.event'+idEvent).slideDown();
														  });
	iterator++;
}
		  });

											

</script>
<?php
}
?>
</head>

<body>
<div data-role="page" id="menu">
  <div data-role="header">
    <a href="menu.php" data-role="button" data-icon="home" data-iconpos="notext">Bouton</a><h1>Agences</h1>
  </div>
  <div data-role="content">
  <br>
 
<form id="form2" name="form2" method="post" action="">
  <table width="75%" border="0" align="center" cellpadding="0" cellspacing="5">
    <tr>
      <td>R&eacute;gion</td>
      <td><select name="t1" class="text" id="select" onchange="submit()">
        <option value="">S&eacute;lectionnez</option>
        <option>Ariana </option>
        <option>Ben Arous </option>
        <option>B&eacute;ja </option>
        <option>Bizerte </option>
        <option>Gab&egrave;s </option>
        <option>Gafsa </option>
        <option>Jendouba </option>
        <option>Kairouan </option>
        <option>Kasserine </option>
        <option>K&eacute;bili </option>
        <option>Kef </option>
        <option>Mahdia </option>
        <option>Manouba </option>
        <option>M&eacute;denine </option>
        <option>Monastir </option>
        <option>Nabeul </option>
        <option>Sidi Bouzid </option>
        <option>Siliana </option>
        <option>Sfax </option>
        <option>Sousse </option>
        <option>Tataouine </option>
        <option>Tozeur </option>
        <option>Tunis </option>
        <option>Zaghouan </option>
      </select></td>
    </tr>
  </table>
</form>
</fieldset>
<br />
<div id="gmap" style="width:100%; height:400px;" align="center"></div><br />
<?php
include("../connection.php");
$sql=mysql_query("select* from local");
while($res=mysql_fetch_array($sql))
{
	$code=$res["code"];
	$designation=$res["designation"];
	$tel=$res["tel"];
	$lat=$res["lat"];
	$lng=$res["lng"];
	$adresse=$res["adresse"];
	$region=$res["region"];
?>
<div class="event event<?php echo"$code"; ?>">
<fieldset>
<legend class="legend">Informations</legend>

<table border="1" cellspacing="2" width="100%" align="center"><tr>
<th bgcolor="#0099FF"><span class="Style1">Designation</span></th><th bgcolor="#0099FF"><span class="Style1">Adresse</span></th><th bgcolor="#0099FF"><span class="Style1">N° de téléphone</span></th>
</tr>
<tr><td><?php echo"$designation"; ?></td><td><?php echo"$adresse"; ?></td><td><?php echo"$tel"; ?></td>
  </tr>
<tr>
  <td>R&eacute;gion</td>
  <td colspan="2"><?php echo"$region"; ?></td>
  </tr>
</table>
</div>

<?php
}
?>
    <br>
  <p align="center"><img src="image.jpg"></p>
  </div>
  <div data-role="footer" style="position:fixed; bottom:0px; width:100%;">
    <h4>Yassine 2021</h4>
  </div>
</div>
</body>
</html>