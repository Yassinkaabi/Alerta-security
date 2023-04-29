<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml/DTD/xhtml1-transitional.dtd">
<htmlxmlns="http://wwww.w3.org/1999/xhtml">
<head>
<title>Document sans titre</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title>Document sans titre</title>
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
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAs2DHu6AvTQ-no_c4panFGZW0K5W-bdyg&exp&sensor=false&libraries=places" sensor="false"></script>
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
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAs2DHu6AvTQ-no_c4panFGZW0K5W-bdyg&exp&sensor=false&libraries=places" sensor="false"></script>
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

<link href="css/style1.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<fieldset>
<legend>Trier Par</legend>
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
<th>Designation</th><th>Adresse</th><th>N° de téléphone</th>
<th>Action</th>
</tr>
<tr><td><?php echo"$designation"; ?></td><td><?php echo"$adresse"; ?></td><td><?php echo"$tel"; ?></td>
  <td><a href="supp_local.php?code=<?php echo"$code"; ?>" onclick="return(confirm('êtes vous sûre de vouloir supprimer ce Local?'))"><img src="../img/edit_delete.png" width="32" height="32" /></a><a href="modif_local.php?code=<?php echo"$code"; ?>&amp;designation=<?php echo"$designation"; ?>&amp;tel=<?php echo"$tel"; ?>&amp;lat=<?php echo"$lat"; ?>&amp;lng=<?php echo"$lng"; ?>&amp;adresse=<?php echo"$adresse"; ?>&amp;region=<?php echo"$region"; ?>"><img src="../img/edit.png" width="32" height="32" /></a></td>
</tr>
<tr>
  <td>R&eacute;gion</td>
  <td colspan="3"><?php echo"$region"; ?></td>
  </tr>
</table>
</fieldset></div>

<?php
}
?>

</td>
</body>
</html>
