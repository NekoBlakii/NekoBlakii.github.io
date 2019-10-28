<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />

<h1> Guides sans complexes </h1> 

<form method="POST" action="http://localhost/Projet/siteG.php">
	<input type="submit" name="Retour au site" value="Retour au site"/>
</form>

<?php
	include("connexionbdd.php");
	session_start();

	$idSession = $_SESSION['idGuide'];
	$idDomaine=$_POST['domaine'];

	//Cette requête sert à ajouter les domaines connus du Guide dans la table Connait
	$req3 = $bdd->prepare('INSERT INTO Connait(idGuide, idDomaine) VALUES (:idGuide, :idDomaine)');
	$req3->execute(array(
		'idGuide' => $idSession,
		'idDomaine'=> $idDomaine                       
	));
?>

Votre domaine a bien été ajouté.

