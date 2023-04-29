<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
<link rel="stylesheet" href="themes/alerta.min.css" />
	<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile.structure-1.4.2.min.css" />
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
</head>

<body>
<div data-role="page" id="produit">
  <div data-role="header"><a href="menu.php" data-role="button" data-icon="home" data-iconpos="notext">Bouton</a>
    <h1>Nouveautés</h1>
  </div>
  <div data-role="content">
  <br>
     <?php
include("../connection.php");

$sql=mysql_query('select* from produit where nouveaute=1 ');


while($res=mysql_fetch_array($sql))
{
$code=$res["code"];
$nom=$res["nom"];
$prix=$res["prix"];
$description=$res["description"];
$accueil=$res["Accueil"];
$nouveaute=$res["nouveaute"];
$photo=$res['photo'];
$code_cat=$res["cat"];

?>
     <div data-role="collapsible-set" data-theme="b">
       <div data-role="collapsible">
         <h3><?php echo"$nom";?></h3>
         <p>
         <img src="../img/<?php echo"$photo"?>" width="100" height="100" hspace="10" vspace="5" border="2" class="pimg" /><br>
        <?php echo"$prix" ?>DT<br>
        <?php echo"$description"; ?> 
         
         </p>
       </div>
      
     </div>
    <?php 
}
?>
    <br>
  <p align="center"><img src="image.jpg"></p>
  </div>
  <div data-role="footer" style="position:fixed; bottom:0px; width:100%;">
    <h4>Yassine 2021</h4>
  </div>
</div>
</body>
</html>