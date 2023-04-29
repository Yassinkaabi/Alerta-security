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
		
		var positions=[];
		var iterator=0;
		<?php
include("connection.php");
$sql=mysql_query("select* from bts");
while($res=mysql_fetch_array($sql))
{
	$code=$res["code"];
	$lat=$res["lat"];
	$lng=$res["lng"];
	$gov=$res["gov"];
	$operateur=$res["operateur"];
	$site=$res["site"];
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
									 icon:'../logo.png'
								
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<div id="gmap" style="width:100%; height:400px"></div>
 <?php
include("connection.php");
$sql=mysql_query("select* from bts");
while($res=mysql_fetch_array($sql))
{
	$code=$res["code"];
	$site=$res["site"];
	
?>
<div class="event event<?php echo"$code"; ?>">

<p>&nbsp;</p>
<table width="743" border="1" align="center" cellpadding="0" cellspacing="3">
  <tr>
    <th colspan="5" bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Tache</th>
    <th rowspan="2" bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Intervention</th>
  </tr>
  <tr>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Code</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Designation</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Description</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Site</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Date</th>
  </tr>
  <?php 
    $sql1= mysql_query("select* from tache where site='$site'");
  while($res1=mysql_fetch_array($sql1))
  { $code2=$res1["code"];
    $designation2=$res1["designation"];
    $description2=$res1["description"];
    $site2=$res1["site"];
	$date2=$res1["date"];
	$sql2=mysql_query("select* from intervention where code_tache='$code2'");
	while($res2=mysql_fetch_array($sql2))
	{
		$code1=$res2["code"];
		  ?>
  
  <tr>
    <td bordercolor="#0033CC"><?php echo "$code2";?></td>
    <td bordercolor="#0033CC"><?php echo "$designation2";?></td>
    <td bordercolor="#0033CC"><?php echo "$description2";?></td>
    <td bordercolor="#0033CC"><?php echo "$site2";?></td>
    <td bordercolor="#0033CC"><?php echo "$date2";?></td>
    <td bordercolor="#0033CC"><a href="fiche_intervention.php?code=<?php echo"$code2"; ?>&site=<?php echo "$site2";?>">Fiche d'intervention</a></td>
  </tr>
  <?php
 }
  }
 ?>
</table>
</div>
<?php
}
?>

</body>
</html>
