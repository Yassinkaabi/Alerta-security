<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <?php
include("../connection.php");
$code=$_GET["code"];
$sql=mysql_query("select* from devis where code='$code'");
while($res=mysql_fetch_array($sql))
{
	$code=$res["code"];
	$lat=$res["lat"];
	$lng=$res["lng"];
	
}
?>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAs2DHu6AvTQ-no_c4panFGZW0K5W-bdyg&exp&sensor=false&libraries=places" sensor="false"></script>
<script type="text/javascript">
$(function(){
		   var latlng=new google.maps.LatLng(<?php echo"$lat"; ?>,<?php echo"$lng"; ?>);
		   var map=new google.maps.Map(document.getElementById('gmap'),{
															   zoom:13,
															   center:latlng,
															   mapTypeId:google.maps.MapTypeId.ROADMAP
															   });
		  
		  var marker= new google.maps.Marker({
											  position:latlng,
											  map:map,
											  draggable: false
											  });
		  
												
												
		  });
 
											  

</script>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body>
<div id="gmap" style="width:100%; height:600px"></div>


</body>
</html>
