<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />
<h1> Guides sans complexes </h1> 
<html>
	<head>
		<title>Page de connexion </title>
		   
	</head>
	<body>
		<?php 
			// On vérifie qu'on ne peut pas venir de n'importe où (donc sans passer par l'identification)
			if (($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/seConnecterG.php") && ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/offreG.php?Offres=Offres") && ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/profilG.php") && ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/mesOffresG.php?Mes+offres=Mes+offres") && ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/addlangueG.php") && ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/adddomaineG.php") && ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/souscrireOffre.php")){
			      header("Location: http://localhost/Projet/siteG.php");
			     }
		?>

		<! Les boutons sur lequels le guide peut cliquer pour naviguer sur le site >
		<p align="center">
		    Vous êtes connecté(e) !
		</p>
		<form method="POST" action="http://localhost/Projet/profilG.php">
			<input type="submit" name="Profil" value="Profil" />
		</form>
		    
		<form methode="POST" action="http://localhost/Projet/offreG.php" >
			<input type="submit" name="Offres" value="Offres" />
		</form>

		<form methode="POST" action="http://localhost/Projet/mesOffresG.php" >
			<input type="submit" name="Mes offres" value="Mes offres" />
		</form> 

		<form methode="POST" action="http://localhost/Projet/logout.php" >
			<input type="submit" name="Se déconnecter" value="Se déconnecter" />
		</form>
		<p ID="mail" text-align="right"> Si vous rencontrez des problèmes contactez l'administrateur à : admin@admin.fr </p>
	</body>
</html>

