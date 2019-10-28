<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />

<h1> Guides sans complexes </h1> 

<form method="POST" action="http://localhost/Projet/siteG.php">
	<input type="submit" name="Retour au site" value="Retour au site"/>
</form>

<?php
	include("connexionbdd.php");
	session_start();

	$idSession = $_SESSION['idGuide'];
	$idLangue=$_POST['langue'];

	//Cette requête sert à ajouter des langues que le guide parle dans la table Parle
	$req3 = $bdd->prepare('INSERT INTO Parle(idGuide, idLangue) VALUES (:idGuide, :idLangue)');
	$req3->execute(array(
	'idGuide' => $idSession,
	'idLangue'=> $idLangue                       
));
?>

Votre langue a bien été ajoutée.
