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
<div data-role="page" id="menu">
  <div data-role="header">
   <a href="menu.php" data-role="button" data-icon="home" data-iconpos="notext">Bouton</a> <h1>Menu</h1>
  </div>
  <div data-role="content">
  <br>
  <form id="form1" name="form1" method="post" action="">
            <label for="t1">Votre NCIN</label>
            <input type="text" name="t1" id="t1" />
            <input type="submit" name="b1" id="b1" value="Consulter" />
          </form>
          
          
            <?php 
			if(isset($_POST["b1"]))
			{
				$ncin=$_POST["t1"];
  include("../connection.php");
  $sql= mysql_query("select* from devis where ncin='$ncin'");
  while($res=mysql_fetch_array($sql))
  { 
  $code=$res["code"];
    $ncin=$res["ncin"];
    $besoin=$res["besoin"];
	$renseignement=$res["renseignement"];
	$devis=$res["devis"];
  }
	if($devis=='')
	{
  ?>
            Votre demande est encours d'étude<br />
            Vous aurez votre devis le plustôt possible<br />
            merci
            <?php
	}
	if($devis!='')
	{
		?>
            <a href="../img/<?php echo"$devis"; ?>"><img src="../img/icone-telecharger.gif" />Cliquez ICI pour télécharger votre devis</a><br />
            </p>
        <?php
	}
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