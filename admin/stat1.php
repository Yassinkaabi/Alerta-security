<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans titre</title>
<link href="../css/formulaire.css" rel="stylesheet" type="text/css" />
</head>

<body>
<fieldset>
<legend>Consulter Statistiques </legend>
<form id="form1" name="form1" method="post" action="stat2.php">
  <table width="75%" border="0" align="center" cellpadding="0" cellspacing="3">
    <tr>
      <td width="50%" class="td"><strong>Processus</strong></td>
      <td width="50%"><select name="t1" id="t1">
        <?php
  include("../connection.php");
  $sql="select* from processus";
  $req=mysql_query($sql);
  while($res=mysql_fetch_array($req))
  {
    $num=$res["num"];
  $nom=$res["nom"];
  ?>
        <option value="<?php echo"$num"; ?>"><?php echo"$nom"; ?></option>
        <?php
  }
  ?>
      </select></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="Submit" value="Suivant" />
      </div></td>
    </tr>
  </table>
</form>

</fieldset>
</body>
</html>
