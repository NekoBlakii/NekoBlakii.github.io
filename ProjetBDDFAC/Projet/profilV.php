<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />

<h1> Guides sans complexes </h1> 

<! Bouton pour retourner sur siteV. >
<form method="POST" action="http://localhost/Projet/siteV.php">
<input type="submit" name="Retour au site" value="Retour au site"/>
</form>
<br>

<?php

	include("connexionbdd.php");
	session_start();
	// On vérifie qu'on ne vient pas de n'importe quelle page (sinon on pourrait sauter l'identification).
	if (($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/siteV.php") && ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/profilV.php")){
	header("Location: http://localhost/Projet/profilV.php");
	} 
	$idSession = $_SESSION['idVoyagiste'];
	echo'<i>Consultez votre profil ou modifiez-le en remplissant un des champs ci-dessous.</i><br><br>';
?> 

<html>
	<head>
		<title>Votre profil</title>
	</head>
<body>
	<?php 
		//On va chercher toutes les données de la ligne du voyagiste à qui correspond l'idSession et on affiche ses données.
		$reponse = $bdd->query("SELECT * FROM Voyagiste WHERE idVoyagiste='$idSession' ");
		$donnees = $reponse->fetch();
		echo '<br><b> Profil :</b> <br> <br>Nom de l\'agence : ' . $donnees['nomAgence']  . '<br> Téléphone : ' . $donnees['telVoyagiste'] . '<br> Mail : ' . $donnees['mailVoyagiste'] . '<br> Pseudo : ' . $donnees['pseudoVoyagiste']  . '<br> ' ;
		
	?>

	<p>
	<b>
	<br>
	Modifiez votre profil : 
	</b>
	</p>

	
	<! Les formulaires de type POST pour changer des données de son profil de voyagiste>
	<form action="" method="post">
	<p>
		Nom de l'agence :
		<input type="text" name="nomAgence" />
		<input type="submit" value="Valider" />
	</p>
	</form>

	<form action="" method="post">
		<p>
		Téléphone (format 00.00.00.00.00) :
		<input type="tel" name="tel" pattern='\d{2}[\.]\d{2}[\.]\d{2}[\.]\d{2}[\.]\d{2}' />
		<input type="submit" value="Valider" />
	</p>
	</form>  

	<form action="" method="post">
	<p>
		Mail :
		<input type="email" name="mailV" />
		<input type="submit" value="Valider" />
	</p>
	</form>

	<form action="" method="post">
	<p>
		Pseudo :
		<input type="text" name="pseudoV" />
		<input type="submit" value="Valider" />
	</p>
	</form>

	<form action="" method="post">
	<p>
		Mot de passe :
		<input type="password" name="passwordV" />
		<input type="submit" value="Valider" />
	</p>
	</form>


	<?php
		// Selon le champs rempli, on va récupérer la donnée à actualiser de la table Voyagiste. Cette façon de faire prepare/execute/fetch est expliquée plus en détail dans le dossier.
		if (!empty($_POST['nomAgence'])){
			$nomAgence=$_POST['nomAgence'];
			$req = $bdd->prepare("UPDATE Voyagiste SET nomAgence = '$nomAgence' WHERE idVoyagiste='$idSession' ");
			$req->execute(array(
			     $nomAgence
			 )); 
		} 


		if (!empty($_POST['tel'])){
			$tel=$_POST['tel'];
			$req = $bdd->prepare("UPDATE Voyagiste SET telVoyagiste = '$tel' WHERE idVoyagiste='$idSession' ");
			$req->execute(array(
			     $tel
			 )); 
		} 


		if (!empty($_POST['mailV'])){
			$mailV=$_POST['mailV'];
			$req = $bdd->prepare("UPDATE Voyagiste SET mailVoyagiste = '$mailV' WHERE idVoyagiste='$idSession' ");
			$req->execute(array(
			     $mailV
			 )); 
		} 


		if (!empty($_POST['pseudoV'])){
			$pseudoV=$_POST['pseudoV'];
			$req = $bdd->prepare("UPDATE Voyagiste SET pseudoVoyagiste = '$pseudoV' WHERE idVoyagiste='$idSession' ");
			$req->execute(array(
			     $pseudoV
			 )); 
		} 

		if (!empty($_POST['passwordV'])){
			$passwordV=$_POST['passwordV'];
			$req = $bdd->prepare("UPDATE Voyagiste SET mdpVoyagiste = '$passwordV' WHERE idVoyagiste='$idSession' "); 
			$req->execute(array(
			     $passwordV
			 )); 
		} 

		?>
	 </body>
</html>


