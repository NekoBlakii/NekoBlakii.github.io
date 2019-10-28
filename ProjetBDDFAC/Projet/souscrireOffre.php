<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />

<h1> Guides sans complexes </h1> 

<! Bouton pour retourner sur siteG. >
<form method="POST" action="http://localhost/Projet/siteG.php">
	<input type="submit" name="Retour au site" value="Retour au site"/>
</form>

<?php

	include("connexionbdd.php");
	session_start();
	
	// On vérifie qu'on ne vient pas de l'extérieur du site
	if ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/offreG.php?Offres=Offres"){
      header("Location: http://localhost/Projet/souscrireOffre.php");
     }
	$idSession = $_SESSION['idGuide'];
	$idO = $_POST['idOffre'];

	// On insère l'id du guide et de l'offre à laquelle il a candidaté dans la table Candidate
	 $req = $bdd->prepare('INSERT INTO Candidate(idGuide, idOffre) VALUES (:idSession, :idOffre) ');
         $req->execute(array(
	    'idSession' => $idSession,
            'idOffre' => $idO
)); 
?>

Vous avez bien souscrit à cette offre !

