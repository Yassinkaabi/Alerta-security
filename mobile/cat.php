<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml/DTD/xhtml1-transitional.dtd">
<html xmlns="http://wwww.w3.org/1999/xhtml">
<head>
<title>Document sans titre</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="themes/alerta.min.css" />
	<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile.structure-1.4.2.min.css" />
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
</head>

<body>
<div data-role="page" id="cat">
  <div data-role="header" data-theme="b">
    <a href="menu.php" data-role="button" data-icon="home" data-iconpos="notext">Bouton</a><h1>Catégorie</h1>
  </div>
  <div data-role="content">
  <br>
    <?php
		  include("../connection.php");
$sql=mysql_query("select* from cat");
while($res=mysql_fetch_array($sql))
{
$code=$res["code"];
$designation=$res["designation"];
?>
<a href="produit.php?code=<?php echo"$code"; ?>" data-role="button"><?php echo"$designation"; ?></a><hr>
<?php
}
?>
    <br>
  <p align="center"><img src="image.jpg"></p>
  </div>
  <div data-role="footer" style="position:fixed; bottom:0px; width:100%;" data-theme="b">
    <h4>Yassine 2021</h4>
  </div>
</div>
</body>
</html>