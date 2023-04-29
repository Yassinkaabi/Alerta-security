<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="5" bordercolor="#FFFFFF" bgcolor="#FFFFCC">
    <tr>
      <td width="50%">Site</td>
      <td width="50%"><select name="t1" id="t1">
	  <?php
include("../connection.php");
$sql=mysql_query("select* from bts");
while($res=mysql_fetch_array($sql))
{
	$code=$res["code"];
		$site=$res["site"];
?>
<option><?php echo"$site"; ?></option>
<?php
}
?>
      </select>      </td>
    </tr>
    <tr>
      <td>Date de d&eacute;but </td>
      <td><input name="t2" type="date" id="t2" /></td>
    </tr>
    <tr>
      <td>Date de fin </td>
      <td><input name="t3" type="date" id="t3" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="b5" value="consulter" />
      </div></td>
    </tr>
  </table>
</form>
<?php
if(isset($_POST["b5"]))
{
?>

<table width="100%" border="1" align="center" cellpadding="0" cellspacing="3">
  <tr>
    <th colspan="5" bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Panne</th>
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
  include("../connection.php");
  $site=$_POST["t1"];
  $dd=$_POST["t2"];
  $df=$_POST["t3"];
  $sql= mysql_query("select* from tache where site='$site' and date between '$dd' and '$df'");
  while($res=mysql_fetch_array($sql))
  { $code=$res["code"];
    $designation=$res["designation"];
    $description=$res["description"];
    $site=$res["site"];
	$date=$res["date"];
	$sql2=mysql_query("select* from intervention where code_tache='$code'");
	while($res2=mysql_fetch_array($sql2))
	{
		$code1=$res2["code"];
		  ?>
  
  <tr>
    <td bordercolor="#0033CC"><?php echo "$code";?></td>
    <td bordercolor="#0033CC"><?php echo "$designation";?></td>
    <td bordercolor="#0033CC"><?php echo "$description";?></td>
    <td bordercolor="#0033CC"><?php echo "$site";?></td>
    <td bordercolor="#0033CC"><?php echo "$date";?></td>
    <td bordercolor="#0033CC"><a href="fiche_intervention.php?code=<?php echo"$code"; ?>&amp;site=<?php echo "$site";?>">Fiche d'intervention</a></td>
  </tr>
  <?php
 }
  }
 ?>
</table>

<?php
}
?>
</body>
</html>
