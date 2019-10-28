<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />

<h1> Guides sans complexes </h1> 

<html>
	<header>
		<title> Connectez-vous </title>
	</header>
	<body>

		<! Le formulaire de type POST pour se connecter en tant que guide. A noter que l'admin est également un guide. >
		<i> Connectez-vous en tant que guide : </i>
		<br>
		<br>
		<br>
		<br>
		<form action="connexionvraiG.php" method="post">
		<p align="center">
			Pseudo :
			    <input type="text" name="pseudoguide" />
			<br>
			<br>
			Mot de passe :
			    <input type="password" name="passwordguide" />
			<br>
			<br>
			<input type="submit" value="Valider" />
		</p>
	</body>
</html>
