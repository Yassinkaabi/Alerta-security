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
  <div data-role="header"><a href="menu.php" data-role="button" data-icon="home" data-iconpos="notext">Bouton</a>
    <h1>Contactez-Nous</h1>
  </div>
  <div data-role="content">
  <br>
  <form id="contact" name="contact" method="post" action="" onsubmit="return control()">
		
				<div align="left">
				  
				  <p>
				    <input name="nom" type="text" class="zied" value="" placeholder="Votre Nom" />
				  </p>
				  <p>
				    <input name="prenom" type="text" class="zied" value="" placeholder="Votre Prénom" />
				  </p>
				  <p>
				    <input name="mail" type="text" class="zied" value="" placeholder="Votre E-mail" />
				  </p>
				  <p>
				    <textarea name="question" cols="30" rows="6" class="zied" placeholder="Votre MSG"></textarea>
				  </p>
				  <p>
				    <input name="envoyer" type="submit" value="Envoyer"/>
			      </p>
	  </div>
				<div align="center"></div>
    </form>
				<?php
				 if(isset($_POST["envoyer"]))
				{
/* Votre traitement de formulaire */

				include("../connection.php");
				$nom=$_POST["nom"];
				$prenom=$_POST["prenom"];
				$mail=$_POST["mail"];
				$question=$_POST["question"];
				$sql="insert into contact (nom,prenom,mail,msg)
				values('$nom','$prenom','$mail','$question')";
				$req=mysql_query($sql);
if($req)
{
echo("<p>l'ajout est valider</p>");
}
else
{
echo("l'ajout à echouer");
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