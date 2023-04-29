<?php
/* Script Captcha � Nassim Kacha � http://lebricabrac.wordpress.com */
/* Note :
- Il faut installer la biblioth�que GD de PHP (voir dans �php.ini�).
- Notre captcha sera insensible � la case.
*/
session_start(); // Ouverture de session
/* Fonction qui g�n�re le code du captcha */
function getCode($longueur) {
$caracteres = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ'; // Jeu de caract�res utilis� pour g�n�rer le code du captcha.
$code = ""; // Initialisation d�une chaine vide
for ($i=0; $i<$longueur; $i++) {
$code .= $caracteres{ mt_rand( 0, strlen($caracteres)-1 ) };
}
return $code;
}
/* G�n�ration d�un code de 5 caract�res */
$code = getCode(5); // valeur modifiable
/* Stockage de la valeur du captcha */
$_SESSION['captcha'] = md5($code);
/* R�cup�ration de chacun des caract�res pour l�affichage du captcha */
$char1 = substr($code,0,1);
$char2 = substr($code,1,1);
$char3 = substr($code,2,1);
$char4 = substr($code,3,1);
$char5 = substr($code,4,1);
/* Police d��citure */
$font = "JOLT.ttf"; // A modifier selon votre fichier ttf
/* Cr�ation de l�image du captcha */
$image = imagecreatefrompng('captcha.png');
/* Cr�ation de la couleur du code */
$couleur = imagecolorallocate($image, 255,0,0); // Noir, peut �tre modifi�
/* Insertion du code dans le captcha */
imagettftext($image, 28, 0, 0, 37, $couleur, $font, $char1);
imagettftext($image, 28, 25, 30, 37, $couleur, $font, $char2);
imagettftext($image, 28, 0, 50, 37, $couleur, $font, $char3);
imagettftext($image, 28, 25, 80, 37, $couleur, $font, $char4);
imagettftext($image, 28, -15, 90, 37, $couleur, $font, $char5);
/* Header pour indiquer au browser qu�il s�agit d�une image PNG */
header('Content-Type: image/png');
/* Envoie de l�image au browser */
imagepng($image);
/* Destruction de l�image apr�s envoi pour optimiser l�utilisation de la m�moire */
imagedestroy($image);
?>
