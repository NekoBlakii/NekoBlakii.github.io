
<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />

<h1> Guides sans complexes </h1> 

<form method="POST" action="http://localhost/Projet/siteV.php">
	<input type="submit" name="Retour au site" value="Retour au site"/>
</form>
<br>


Votre domaine a bien été ajouté.

<?php
	include("connexionbdd.php");
	 session_start();
	
		$idDomaine=$_POST['domaine'];
		$idOffre=$_POST['idOffre'];
	
		$req = $bdd->prepare('INSERT INTO Necessite(idOffre,idDomaine) VALUES (:idOffre,:idDomaine)');
		$req->execute(array(
			'idOffre' => $idOffre,
		      'idDomaine'=> $idDomaine                     
		));

	?>
