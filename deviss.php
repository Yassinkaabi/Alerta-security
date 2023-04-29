<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>

<body>
<fieldset><legend>Demande de devis</legend><form id="form1" name="form1" method="post" action="">
         <table width="80%" border="0" align="center" cellpadding="5" cellspacing="5">
             <tr>
               <td>Profil</td>
               <td><input type="radio" name="t1" id="radio" value="Particulier" />
                 Particulier
                   <input type="radio" name="t1" id="radio2" value="Entreprise" />
                   Entreprise</td>
             </tr>
             <tr>
               <td>Civilit&eacute;</td>
               <td><input type="radio" name="t2" id="radio3" value="Mr" />
                 Mr
                   <input type="radio" name="t2" id="radio4" value="Mme" />
                   Mme
                   <input type="radio" name="t2" id="radio5" value="Mlle" />
                   Mlle</td>
             </tr>
             <tr>
               <td>NCIN</td>
               <td><input type="text" name="t3" id="t3" /></td>
             </tr>
             <tr>
               <td>Nom</td>
               <td><input type="text" name="t4" id="t4" /></td>
             </tr>
             <tr>
               <td>Pr&eacute;nom</td>
               <td><input type="text" name="t5" id="t5" /></td>
             </tr>
             <tr>
               <td>Entreprise</td>
               <td><input type="text" name="t6" id="t6" /></td>
             </tr>
             <tr>
               <td>E-mail</td>
               <td><input type="text" name="t7" id="t7" /></td>
             </tr>
             <tr>
               <td>Adresse</td>
               <td><input type="text" name="t8" id="t8" /></td>
             </tr>
             <tr>
               <td>Ville</td>
               <td><input type="text" name="t9" id="t9" /></td>
             </tr>
             <tr>
               <td>T&eacute;l&eacute;phone</td>
               <td><input type="text" name="t10" id="t10" /></td>
             </tr>
             <tr>
               <td>N&deg; de fax</td>
               <td><input type="text" name="t11" id="t11" /></td>
             </tr>
             <tr>
               <td rowspan="8">Vos besoins</td>
               <td><input name="t12" type="checkbox" id="t12" value="Alarme sans fil" />
                 Alarme sans fil</td>
             </tr>
             <tr>
               <td><input name="t13" type="checkbox" id="t13" value="Alarme avec fil" />
                 Alarme avec fil</td>
             </tr>
             <tr>
               <td><input name="t14" type="checkbox" id="t14" value="Video surveillance" />
                 Video surveillance</td>
             </tr>
             <tr>
               <td><input name="t15" type="checkbox" id="t15" value="Contr&ocirc;le d acces" />
                 Contr&ocirc;le d'acces</td>
             </tr>
             <tr>
               <td><input name="t16" type="checkbox" id="t16" value="Video phone" />
                 Video phone</td>
             </tr>
             <tr>
               <td><input name="t17" type="checkbox" id="t17" value="Detection" />
                 Detection</td>
             </tr>
             <tr>
               <td><input name="t18" type="checkbox" id="t18" value="Interphone" />
                 Interphone</td>
             </tr>
             <tr>
               <td><input name="t19" type="checkbox" id="t19" value="Contrat de maintenance" />
                 Contrat de maintenance</td>
             </tr>
             <tr>
               <td colspan="2">Reinseignements</td>
               </tr>
             <tr>
               <td colspan="2" align="center"><textarea name="t20" id="t20" cols="45" rows="5"></textarea></td>
               </tr>
             <tr>
               <td colspan="2" align="center"><input type="submit" name="b1" id="b1" value="Envoyer" /></td>
               </tr>
           </table>
       </form>
       <?php
       if(isset($_POST["b1"]))
	   {
		   include("connection.php");
		   $profil=$_POST["t1"];
		   $civilite=$_POST["t2"];
		   $ncin=$_POST["t3"];
		   $nom=$_POST["t4"];
		   $prenom=$_POST["t5"];
		   $entreprise=$_POST["t6"];
		   $mail=$_POST["t7"];
		   $adresse=$_POST["t8"];
		   $ville=$_POST["t9"];
		   $tel=$_POST["t10"];
		   $fax=$_POST["t11"];
		   $a=$_POST["t12"];
		   $b=$_POST["t13"];
		   $c=$_POST["t14"];
		   $d=$_POST["t15"];
		   $e=$_POST["t16"];
		   $f=$_POST["t17"];
		   $g=$_POST["t18"];
		   $h=$_POST["t19"];
		   $besoin=$a."<br />".$b."<br />".$c."<br />".$d."<br />".$c."<br />".$d."<br />".$e."<br />".$f."<br />".$g."<br />".$h;
		   $renseignement=$_POST["t20"];
		   $sql=mysql_query("insert into client(ncin,profil, civilite,nom, prenom, entreprise, mail, adresse, ville, tel, fax) values('$ncin','$profil', '$civilite','$nom', '$prenom', '$entreprise', '$mail', '$adresse', '$ville', '$tel', '$fax')");
		   $sql1=mysql_query("insert into devis(ncin, besoin, renseignement) values ('$ncin','$besoin','$renseignement')");
		   if($sql1)
		   {
			   ?>
               <script language="javascript">
			   alert("votre demande à été bien transmis à l'administration de alerta sécurity");
			   </script>
               <?php
		   }
		   else
		   echo"echec d'envoi";
	   }
	   ?>
		   </fieldset>
</body>
</html>