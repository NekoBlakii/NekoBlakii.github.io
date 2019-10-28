<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />

<h1> Guides sans complexes </h1>
 
<html>
	<head>
	<title>Page de connexion </title>
	</head>
	<body>
		<?php 
			// On vérifie qu'on ne peut pas venir de n'importe quelle page (sans passer par l'identification du coup)
			if (($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/seConnecterV.php") && ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/offreV.php?Soumettre+une+offre=Soumettre+une+offre") && ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/profilV.php") && ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/mesOffresV.php?Mes+offres=Mes+offres") && ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/contacterV.php") && ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/offreVTest.php") && ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/addlangueOffreV.php") && ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/adddomaineOffreV.php"))
			{
				header("Location: http://localhost/Projet/siteV.php");
			}
		?>

		<! Les différents boutons de siteV sur lequel le voyagiste peut cliquer. >
		<p align="center">
			Vous êtes connecté(e) !
		</p>
		<form method="POST" action="http://localhost/Projet/profilV.php">
			<input type="submit" name="Profil" value="Profil"/>
		</form>

		<form methode="POST" action="http://localhost/Projet/offreV.php" >
			<input type="submit" name="Soumettre une offre" value="Soumettre une offre" />
		</form>

		<form methode="POST" action="http://localhost/Projet/mesOffresV.php" >
			<input type="submit" name="Mes offres" value="Mes offres" />
		</form>

		<form methode="POST" action="http://localhost/Projet/logout.php" >
			<input type="submit" name="Se déconnecter" value="Se déconnecter" />
		</form>


		<p ID="mail" text-align="right"> Si vous rencontrez des problèmes contactez l'administrateur à : admin@admin.fr </p>
	</body>
</html>

