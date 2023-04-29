<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document sans nom</title>
<!-- TinyMCE -->
<script type="text/javascript" src="../Script/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->
<link href="../styles/screen.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.ttt {
	text-align: center;
}
.ttt {
	font-weight: bold;
}
-->
</style>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<fieldset class="loginField">
<legend class="loginButton">LISTE DES PRODUITS</legend>
<form id="form2" name="form2" method="post" action="">
  <table border="0" align="right" cellpadding="0" cellspacing="0">
    <tr>
      <td><select name="cat" onchange="submit()">
      <option>Veuillez Séléctionner une catégorie</option>
    <?php
include("../connection.php");
$sql=mysql_query("select* from cat");
while($res=mysql_fetch_array($sql))
{
$code=$res["code"];
$designation=$res["designation"];
?>
      <option value="<?php echo"$code"; ?>"><?php echo"$designation"; ?></option>
      <?php
	  }
	  ?>
      </select></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<p>
  <?php
include("../connection.php");
$messagesParPage=1;
if(isset($_POST['cat']))
{
	$cat=$_POST['cat'];
	$retour_total=mysql_query('SELECT COUNT(*) AS total FROM produit where cat='.$cat.''); 
}
else
{
$retour_total=mysql_query('SELECT COUNT(*) AS total FROM produit'); 
}

$donnees_total=mysql_fetch_assoc($retour_total); 
$total=$donnees_total['total']; 
$nombreDePages=ceil($total/$messagesParPage);

if(isset($_GET['page']))
{
     $pageActuelle=intval($_GET['page']);
     
     if($pageActuelle>$nombreDePages) 
     {
          $pageActuelle=$nombreDePages;
     }
}
else
{
     $pageActuelle=1;   
}

$premiereEntree=($pageActuelle-1)*$messagesParPage;
if(isset($_POST['cat']))
{
	$cat=$_POST['cat'];
	$sql=mysql_query('select* from produit where cat='.$cat.' ORDER BY code DESC LIMIT '.$premiereEntree.', '.$messagesParPage.'');
}
else
{
$sql=mysql_query('select* from produit ORDER BY code DESC LIMIT '.$premiereEntree.', '.$messagesParPage.'');
}
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
$fiche=$res["fiche"];
?>
</p>
<table width="90%" border="1" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td width="50%" bgcolor="#0099FF"><span class="ttt">Code</span></td>
    <td width="50%"><span class="ttt"><?php echo"$code";?></span></td>
  </tr>
  <tr>
    <td bgcolor="#0099FF"><span class="ttt">Nom</span></td>
    <td><span class="ttt"><?php echo"$nom";?></span></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#0099FF"><span class="ttt">Description</span></td>
    </tr>
  <tr>
    <td colspan="2"><span class="ttt"><?php echo"$description";?></span></td>
    </tr>
  <tr>
    <td bgcolor="#0099FF"><span class="ttt">Prix</span></td>
    <td><span class="ttt"><?php echo"$prix";?></span></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><span class="ttt"><img src="../img/<?php echo"$photo"; ?>" width="100" height="100" /></span></td>
    </tr>
  <tr>
    <td align="center">Fiche technique</td>
    <td align="center"><a href="../img/<?php echo"$fiche"; ?>"><img src="../img/icone-telecharger.gif" /></a></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><span class="ttt"><a href="supp_pd.php?code=<?php echo"$code";?>" onclick="return(confirm('ete vous sure de vouloir supprimer cet produit?'))">
  <img src="../img/edit_delete.png" width="24" height="24" border="0"/></a><a href="modif_pd.php?code=<?php echo"$code";?>"><img src="../img/edit.png" width="24" height="24" border="0"/></a></span></td>
    </tr>
</table>

<?php
}
echo '<p align="center">Page : ';
for($i=1; $i<=$nombreDePages; $i++) 
{
  
     if($i==$pageActuelle) 
     {
         echo ' [ '.$i.' ] '; 
     }	
     else 
     {
          echo ' <a href="ajout_produit.php?page='.$i.'">'.$i.'</a> ';
     }
}
echo '</p>';
?>
<p>&nbsp;</p>
</fieldset>
<br />
<fieldset class="loginField">
<legend class="loginButton">Ajout d'un nouveau Produit</legend>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<p>&nbsp;</p>
<table width="50%" border="0" align="center" cellpadding="0" cellspacing="3" class="table">
<tr>
  <td>Cat&eacute;gorie</td>
  <td><select name="t9" id="t9">
  <?php
  include("../connection.php");
  $sql=mysql_query("select* from cat");
  while($res=mysql_fetch_array($sql))
  {
  $code=$res["code"];
  $designation=$res["designation"];
  ?>
  <option value="<?php echo"$code"; ?>"><?php echo"$designation"; ?></option>
  <?php
  }
  ?>
  </select>  </td>
</tr>
<tr>
<td width="50%">Designation</td>
<td width="50%"><input type="text" name="t1"/></td>
</tr>
<tr>
<td>Description</td>
<td><textarea name="t2" id="t2" cols="45" rows="5"></textarea></td>
</tr>
<tr>
<td>Prix</td>
<td><input type="text" name="t3" id="t3"/>
DT TTC</td>
</tr>
<tr>
  <td colspan="2"><input type="checkbox" name="t7" id="t7" />    
    Ajouter ce produit &agrave; la page d'accueil?</td>
  </tr>
<tr>
  <td colspan="2"><input type="checkbox" name="t8" id="t8" />
    Ajouter ce produit &agrave; la liste des nouveaut&eacute;s?</td>
  </tr>
<tr>
  <td>Photo</td>
  <td><input name="fichier" type="file" id="fichier" /></td>
</tr>
<tr>
  <td>Fiche technique</td>
  <td><input type="file" name="fichier1" id="fichier1" /></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="b1" id="b1" value="Ajouter" class="loginButton"/></td>
</tr>
</table>
</form>
<?php
if(isset($_POST["b1"]))
{
include("../connection.php");
$nom=$_POST["t1"];
$nom=addslashes($nom);
$description=$_POST["t2"];
$description=addslashes($description);
$prix=$_POST["t3"];
$accueil=$_POST["t7"];
$nouveaute=$_POST["t8"];
//////////////////////////////////////////////////////////////case à coché
if($accueil)
{
$accueil="1";
}
else
{
$accueil="0";
}
if($nouveaute)
{
$nouveaute="1";
}
else
{
$nouveaute="0";
}
$code_cat=$_POST["t9"];
////////////////////////////////////////////////////////////image
$dossier='../img/';
$nom_tmp=$_FILES['fichier']['tmp_name'];
$nom_photo=$_FILES['fichier']['name'];
move_uploaded_file($nom_tmp,$dossier.$nom_photo);
/////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////fiche
$dossier='../img/';
$nom_tmp=$_FILES['fichier1']['tmp_name'];
$nom_fiche=$_FILES['fichier1']['name'];
move_uploaded_file($nom_tmp,$dossier.$nom_fiche);
/////////////////////////////////////////////////////////////////
$Sql=mysql_query("insert into produit (nom, description, prix, Accueil, nouveaute, photo, cat, fiche)values ('$nom','$description','$prix','$accueil','$nouveaute', '$nom_photo','$code_cat', '$nom_fiche')");
if($sql)
{
?>
<script language="javascript">
alert("L'ajout de nouveau produit à été bien effectuée");
window.location.replace('ajout_produit.php');
</script>
<?php
}
else
echo"echec d'ajout";
}
?>
</fieldset>
</body>
</html> 