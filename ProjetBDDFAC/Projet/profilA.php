<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />

<h1> Guides sans complexes </h1> 

<! Bouton pour retourner au siteA. >
<form method="POST" action="http://localhost/Projet/siteA.php">
	<input type="submit" name="Retour au site" value="Retour au site"/>
</form>

<br>
<br>

<?php	
	include("connexionbdd.php");
	session_start();
	
	// Sécurité pour ne pas atteindre cette page sans être identifié
	if ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/siteA.php"){
		header("Location: http://localhost/Projet/profilA.php");
	}
	$idSession = $_SESSION['idGuide'];

?>

<html>
	<head>
		<title>Votre Profil</title>
	</head>
	<body>
		<p>
			<b>Changez votre mot de passe :</b> 
		</p>
		  

		<form action="" method="post">
		<p>
			Mot de passe :
			<input type="password" name="passwordG" />
			<input type="submit" value="Valider" />
		</p>
		</form>

		<?php 
		
			// Si le champs mot de passe est rempli, on va changer le mot de passe
			if (!empty($_POST['passwordG'])){
			$passwordG=$_POST['passwordG'];

			//On prépare une insertion avec les noms de variables
			$req = $bdd->prepare("UPDATE Guide SET mdpGuide = '$passwordG' WHERE idGuide='$idSession' ");

		
			// On exécute en liant les variables nécessaires
			$req->execute(array(
			     $passwordG
			 )); 
			} 

		?>

	</body>
</html>



