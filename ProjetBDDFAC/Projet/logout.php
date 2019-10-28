<?php 
	// Détruit la session et retourne à l'index.
	$_SESSION=array();
	session_destroy();
	header('Location: http://localhost/Projet/index.php');

?>
