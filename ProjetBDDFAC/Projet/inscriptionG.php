<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />

<h1> Guides sans complexes </h1> 

<html>
	<head>
		<title>Inscrivez-vous</title>
	</head>
	<body>
		<! Formulaire d'inscription de type POST pour les guides. A noter que l'admin est inscrit de base.>
		<i> Inscrivez-vous en tant que guide : </i>
		<br>
		<br>
		<form action="connexionG.php" method="post">
		<p>
			Nom :
			<input type="text" name="nom" />
		</p>
		<p>
			Prenom :
			<input type="text" name="prenom" />
		</p>
		<p>
			Mail :
			<input type="email" name="mailguide" />
		</p>
		<p>
			Pseudo :
			<input type="text" name="pseudoguide" />
		</p>
		<p>
			Mot de passe :
			<input type="password" name="passwordguide" />
		</p>
		<p>
			Veuillez retaper votre mot de passe:
			<input type="password" name="passwordguide2" />
			<input type="submit" value="Valider" />
		</p>
		<br>
		<b>
			TOUS les champs sont obligatoires 
		</b>
	</body>
</html>








