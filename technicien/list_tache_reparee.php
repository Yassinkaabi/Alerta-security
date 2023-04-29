<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<table width="743" border="1" align="center" cellpadding="0" cellspacing="3">
  <tr>
    <th colspan="4" bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Tache</th>
  </tr>
  <tr>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Code</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Designation</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Description</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Date</th>
  </tr>
  <?php 
  include("../admin/connection.php");
  $sql= mysql_query("select* from tache where ncin!=''");
  while($res=mysql_fetch_array($sql))
  { $code=$res["code"];
    $designation=$res["designation"];
    $description=$res["description"];
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
    <td bordercolor="#0033CC"><?php echo "$date";?></td>
  </tr>
  <?php
 }
  }
 ?>
</table>
</body>
</html>
