<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />

<h1> Guides sans complexes </h1> 

<! Bouton pour retourner sur siteA. >
<form method="POST" action="http://localhost/Projet/siteA.php">
	<input type="submit" name="Retour à l'accueil" value="Retour à l'accueil"/>
</form>
<br>
<br>

<?php

	// Si l'admin clique sur Supprimer pour supprimer une offre, on prépare les lignes à détruire dans les tables et on les exécute
	include("connexionbdd.php");
	session_start();
	$idSession = $_SESSION['idGuide'];
	$idO = $_POST['idOffre'];
 
	 $req1 = $bdd->prepare("DELETE FROM Necessite WHERE idOffre = '$idO'");
         $req1->execute(array($idO
)); 	
         $req2 = $bdd->prepare("DELETE FROM Requiert WHERE idOffre = '$idO'");
         $req2->execute(array($idO
)); 
         $req3 = $bdd->prepare("DELETE FROM Candidate WHERE idOffre = '$idO'");
         $req3->execute(array($idO
)); 
	 $req4 = $bdd->prepare("DELETE FROM Offre WHERE idOffre = '$idO'");
         $req4->execute(array($idO
)); 
?>

Vous avez bien supprimé cette offre !

