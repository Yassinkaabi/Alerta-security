<?php
$code=$_GET["code"];
$designation=$_GET["designation"];
$tel=$_GET["tel"];
$lat=$_GET["lat"];
$lng=$_GET["lng"];
$adresse=$_GET["adresse"];
$region=$_GET["region"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<htmlxmlns="http://www.w3.org/1999/xhtml">
<head>
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
<title>Document sans titre</title>
<link href="css/style1.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<fieldset>
<legend>Modification d'un local</legend>
<div id="gmap" style="width:100%; height:400px;"></div>
<form id="form1" name="form1" method="post" action="">
<table width="75%" border="0" align="center" cellspacing="3">
<tr>
  <td width="50%">Designation</td>
  <td width="50%"><input name="designation" type="text" id="designation" value="<?php echo"$designation";?>" /></td>
</tr>
<tr>
<td>Latitude</td>
<td><input name="Lat" type="text" id="Lat" value="<?php echo"$lat";?>" /></td>
</tr>
<tr>
<td>Longitude</td>
<td><input name="Lng" type="text" id="Lng" value="<?php echo"$lng";?>" /></td>
</tr>
<tr>
<td>Adresse</td>
<td><textarea name="adresse" id="adresse"> <?php echo"$adresse";?></textarea></td>
</tr>
<tr>
<td>N&deg; T&eacute;l&eacute;phone </td>
<td><input name="tel" type="text" id="tel" value="<?php echo"$tel";?>" /></td>
</tr>
<tr>
  <td valign="top">région</td>
  <td><input name="region" type="text" id="region" value="<?php echo"$region";?>"  /></td>
</tr>
<tr>
<td colspan="2"><div align="center">
<input type="submit" name="Submit" value="Modification d'un local" />
</div></td>
</tr>
</table>
</form>
<?php
if(isset($_POST["Submit"]))
{
include("../connection.php");
$designation=$_POST["designation"];
$designation=addslashes($designation);
$lat=$_POST["Lat"];
$lng=$_POST["Lng"];
$adresse=$_POST["adresse"];
$tel=$_POST["tel"];
$region=$_POST["region"];

$sql=mysql_query("update local set
				 designation='$designation',
				 lat='$lat', 
				 lng='$lng',
				 adresse='$adresse',
				 tel='$tel',
				 region='$region' where code='$code'");
if($sql)
{
?>
<script language="javascript">
alert("la modification de local à été bien établie");
window.location.replace('liste_local.php');
</script>
<?php
}
else echo"echec de modification";
}
?>
</fieldset>
</body>
</html>

