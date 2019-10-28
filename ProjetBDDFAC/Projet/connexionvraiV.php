<?php 
	include("connexionbdd.php");

	$pseudoV=$_POST['pseudoV'];
	$passwordV=$_POST['passwordV'];

	// On vérifie que le pseudo et le mot de passe soient dans la même ligne
	$req = $bdd->prepare('SELECT idVoyagiste FROM Voyagiste WHERE pseudoVoyagiste = :pseudoV AND mdpVoyagiste = :passwordV');
	$req->execute(array(
	    'pseudoV' => $pseudoV,
	    'passwordV' => $passwordV));

	$resultat = $req->fetch();
	// Si ce n'est pas le cas l'identification est refusée
	if (!$resultat)
	{
	        echo 'Mauvais identifiant ou mot de passe !';
	}
	// Sinon on démarre la session du voyagiste
	else
	{
		session_start();
		$_SESSION['idVoyagiste'] = $resultat['idVoyagiste'];
		$_SESSION['pseudoVoyagiste'] = $pseudoV;
		echo $resultat['idVoyagiste'];
		header('Location: http://localhost/Projet/siteV.php');
		exit();
	}

?>
