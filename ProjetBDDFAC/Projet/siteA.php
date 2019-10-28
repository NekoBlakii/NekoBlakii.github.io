<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />
<h1> Guides sans complexes </h1> 
<html>
	<head>
		<title>Page de connexion </title>
	</head>
	<body>
		<?php
			// On vérifie qu'on ne vient pas de n'importe où et qu'on est passé par l'identification du coup
			if (($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/seConnecterG.php") && ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/insererDomaine.php?Ins%C3%A9rer+des+domaines=Ins%C3%A9rer+des+domaines") && ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/profilA.php") && ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/offreG.php?Offres=Offres") && ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/supprimerOffre.php") && ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/insererDomaine.php?Insérer+des+domaines=Insérer+des+domaines"))
			{
				header("Location: http://localhost/Projet/siteG.php");
			}
		?>

		<! Les boutons que l'admin voit et sur lesquels il peut cliquer pour naviguer dans le site. >
		<p align="center">
			Vous êtes connecté(e) !
		</p>

		<form method="POST" action="http://localhost/Projet/profilA.php">
			<input type="submit" name="Profil" value="Profil"/>
		</form>
		    
		<form methode="POST" action="http://localhost/Projet/offreG.php" >
			<input type="submit" name="Offres" value="Offres" />
		</form>

		<form methode="POST" action="http://localhost/Projet/insererDomaine.php" >
			<input type="submit" name="Insérer des domaines" value="Insérer des domaines" />
		</form> 

		<form methode="POST" action="http://localhost/Projet/logout.php" >
			<input type="submit" name="Se déconnecter" value="Se déconnecter" />
		</form>

	</body>
</html>

