<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
    $code=$_GET["code"];
    $desig=$_GET["designation"];
    $desc=$_GET["description"];
    $site=$_GET["site"];
		?>
		
		
	<fieldset>
    <legend >Modification d'une tache</legend>
	<form id="form1" name="form1" method="post" action="">
  <table width="75%" border="0" align ="center" cellspacing="3" cellpadding="0">
    <tr>
      <td width="50%" >D&eacute;signation</td>
      <td width="50%" ><input type="text" name="t1" id="t1" value="<?php echo "$desig";?>"/> </td>
    </tr>
    <tr>
      <td>Description</td>
      <td><textarea name="t2" id="t2"><?php echo "$desc"; ?> </textarea> </td>
    </tr>
    <tr>
      <td>Code site </td>
      <td><select name="sel1" id="sel1">
	   <?php
            include("connection.php");
            $sql=mysql_query("select* from bts");
            while($res=mysql_fetch_array($sql))
        {
	        $code=$res["code"];
	        $site=$res["site"];
	   ?>
       <option> <?php echo"$site"; ?> </option>
       <?php
       }
       ?>
      </select> </td>
	</tr>
	<tr>
      <td colspan="2" align="center"><input type="reset" name="b1" id="b1" value="Effacer" />        
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
$desig=$_POST["t1"];
$desig=addslashes($desig);
$desc=$_POST["t2"];
$desc=addslashes($desc);
$site=$_POST["sel1"];
$sql=mysql_query("update tache set designation='$desig',description='$desc',site='$site' where code='$code'");
header("location:list_tache.php");
}
?>  




</body>
</html>
