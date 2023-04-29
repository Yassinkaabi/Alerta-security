<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<table width="743" border="1" align="center" cellpadding="0" cellspacing="3">
  <tr>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Code</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Designation</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Description</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Date</th>
    <th bordercolor="#0033CC" bgcolor="#CCCCCC" scope="col">Action</th>
  </tr>
  <?php 
  include("../admin/connection.php");
  session_start();
  $ncin=$_SESSION["id"];
  $sql= mysql_query("select* from tache where ncin='$ncin'");
  while($res=mysql_fetch_array($sql))
  { $code=$res["code"];
    $designation=$res["designation"];
    $description=$res["description"];
   	$date=$res["date"];
  ?>
  
  <tr>
    <td bordercolor="#0033CC"><?php echo "$code";?></td>
    <td bordercolor="#0033CC"><?php echo "$designation";?></td>
    <td bordercolor="#0033CC"><?php echo "$description";?></td>
      <td bordercolor="#0033CC"><?php echo "$date";?></td>
    <td bordercolor="#0033CC"><a href="intervention.php?code=<?php echo"$code"; ?>">Ajouter intervention</a></td>
  </tr>
  <?php
 }
 ?>
</table>
</body>
</html>
