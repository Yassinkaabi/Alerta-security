<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml/DTD/xhtml1-transitional.dtd">
<html xmlns="http://wwww.w3.org/1999/xhtml">
<head>
<title>Document sans titre</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title>Document sans titre</title>
<link href="style.css" rel="stylesheet" type="text/css" />
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
</head>

<body>
<fieldset><legend>Contacter administrateur</legend>
<?php
session_start();
$ncin=$_SESSION["id"];
$nom=$_SESSION["nom"];
?>
<form id="form1" name="form1" method="post" action="">
  <table width="80%" border="0" align="center" cellpadding="5" cellspacing="5">
    <tr>
      <td>NCIN</td>
      <td><?php echo"$ncin"; ?></td>
    </tr>
    <tr>
      <td>Nom</td>
      <td><?php echo"$nom"; ?></td>
    </tr>
    <tr>
      <td colspan="2">Message</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><textarea name="t1" id="t1" cols="45" rows="5" ></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="b1" id="b1" value="Envoyer" /></td>
    </tr>
  </table>
</form>
</fieldset>
<?php
if(isset($_POST["b1"]))
{
	include("../connection.php");
	$msg=$_POST["t1"];
	$sql=mysql_query("insert into msg (ncin, nom, msg) values('$ncin','$nom','$msg')");
	if($sql)
	{
		?>
        <script language="javascript">
		alert("Votre MSG à été bien transmis à l'administration de alerta securité");
		</script>
        <?php
	}
	else
	echo"echec d'envoi";
}
?>
</body>
</html>