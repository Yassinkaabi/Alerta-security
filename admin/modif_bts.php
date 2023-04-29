<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
$(function(){
		   var latlng=new google.maps.LatLng(36.8188100,10.1659600);
		   var map=new google.maps.Map(document.getElementById('gmap'),{
															   zoom:09,
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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<div id="gmap" style="width:100%; height:400px"></div>
<?php
$site=$_GET["site"];
$gov=$_GET["gov"];
$opt=$_GET["operateur"];
$lat=$_GET["lat"];
$lng=$_GET["lng"];
?>

<fieldset>
<legend> Modification BTS</legend>
<form id="form_aj_tech" name="form_aj_tech" method="post" action="">
  <table width="75%" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr>
	  <td>Site</td>
	  <td><input type="text" name="t1" value="<?php echo "$site" ?>"/> </td>
    </tr>
	
	<tr>
      <td>Gouvernorat</td>
      <td><input type="text" name="t2" value="<?php echo "$gov"?>"/></td>
    </tr>
	<tr>
	  <td>Opérateur</td>
	  <td>	<input type="text" name="t3" value="<?php echo "$opt"?>"/></td>  </td>
	</tr>
	<tr>
	  <td>Latitude</td>
	  <td><input type="text" name="Lat" id="Lat" value="<?php echo $lat?>"/></td>
	</tr>
    <tr>
      <td>Longitude</td>
      <td><input type="text" name="Lng" id="Lng" value="<?php echo $lng?>" /></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><input type="reset" name="b1" id="b1" value="Effacer" />
        <input type="submit" name="b2" id="b2" value="Modifier" /></td>
	  </tr>
  </table>
</form>
</fieldset>
<?php
if(isset($_POST["b2"]))
{
include("connection.php");
$code=$_GET["code"];
$site=$_POST["t1"];
$gov=$_POST["t2"];
$opt=$_POST["t3"];
$lat=$_POST["Lat"];
$lng=$_POST["Lng"];
$sql=mysql_query("update bts set site='$site', gov='$gov', operateur='$opt', lat='$lat', lng='$lng' where code='$code'");
header("location:list_bts.php");
}
?>

</body>
</html>
