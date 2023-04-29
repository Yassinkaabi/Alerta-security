<?php
session_start();
if(!isset($_SESSION["id"]))
{
	header("location:../identification_tech.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
 <?php
				$nom=$_SESSION["nom"];
		?>
        
        
        <p>Bienvenu MR.<?php echo"$nom"; ?></p>
          <p><a href="list_tache.php">Ordres de travail</a></p>
          <p><a href="list_tache_reparee.php">Liste des interventions </a></p>
          <p><a href="deconnect.php"></a></p>
          
</body>
</html>