<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />
<h1> Guides sans complexes </h1> 
<html>
	<head>
		<title>Inscrivez-vous</title>
	</head>
	<body>
		<! Le formulaire s'inscription de type POST pour les voyagistes. >
		<i> Inscrivez-vous en tant que voyagiste : </i>
		<br>
		<br>
		<form action="connexionV.php" method="post">
		<p>
			Nom agence:
			<input type="text" name="nomAgence" />
		</p>
		<p>
			Téléphone (format 00.00.00.00.00) :
			<input type="tel" name="tel" pattern='\d{2}[\.]\d{2}[\.]\d{2}[\.]\d{2}[\.]\d{2}' />
		</p>
		<p>
			Mail :
			<input type="email" name="mailV" />
		</p>
		<p>
			Pseudo :
			<input type="text" name="pseudoV" />
		</p>
		<p>
			Mot de passe :
			<input type="password" name="passwordV" />
		</p>
		<p>
			Veuillez retaper votre mot de passe:
			<input type="password" name="passwordV2" />
			<input type="submit" value="Valider" />
		</p>
		</form>

		<br>
		<b> TOUS les champs sont obligatoires </b>
	</body>
</html>








