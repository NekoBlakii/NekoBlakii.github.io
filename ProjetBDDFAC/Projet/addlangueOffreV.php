
<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />

<h1> Guides sans complexes </h1> 

<form method="POST" action="http://localhost/Projet/siteV.php">
	<input type="submit" name="Retour au site" value="Retour au site"/>
</form>
<br>


Votre langue a bien été ajoutée.

<?php
	include("connexionbdd.php");
	 session_start();
	
		$idLangue=$_POST['langue'];
		$idOffre=$_POST['idOffre'];
	
		$req = $bdd->prepare('INSERT INTO Requiert(idOffre,idLangue) VALUES (:idOffre,:idLangue)');
		$req->execute(array(
			'idOffre' => $idOffre,
		      'idLangue'=> $idLangue                      
		));

	?>
