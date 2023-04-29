<?php
session_start();//appel de session
session_unset();//vider la session
session_destroy();//destruction de session
header("location:../index.php");
?>