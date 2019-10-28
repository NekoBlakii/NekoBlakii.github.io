<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />

<h1> Guides sans complexes </h1> 

<! Bouton pour retourner à siteV. >
<form method="POST" action="http://localhost/Projet/siteV.php">
	<input type="submit" name="Retour au site" value="Retour au site"/>
</form>

<?php 

	// On vérifie qu'on ne vient pas de n'importe quelle page
	if ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/siteV.php"){
		header("Location: http://localhost/Projet/offreV.php?Soumettre+une+offre=Soumettre+une+offre");
	}
	echo '<p><i> Soumettez une offre en remplissant le formulaire ci-dessous : </i>
	</p>';
?>

<br>
Rappel : <b> TOUS</b> les champs sont obligatoires 
<br>
<br>


<html>
	<head>
		<title>Offre</title>
	</head>
	<body>

	<! Le formulaire de type POST pour soumettre une offre en étant voyagiste. >
	<form action="offreVTest.php" method="post">
	<p>
		Titre de l'offre :
		<input type="text" name="titreOffre" />
	</p>

	<p>
		Date du début de l'offre (format AAAA-MM-JJ) :
		<input type="text" name="dateDebut" />
		</p>

	<p>
		Date de la fin de l'offre (format AAAA-MM-JJ) :
		<input type="text" name="dateFin" />
	</p>
	<p>
		Description de l'offre :
	</p>

	<p> 
		<textarea cols="100" rows="5" name="descriptionOffre"></textarea>
	</p>

	<p>
		Destination :  
		<?php 
		include("menudestination.php");?>
	</p>

	<p>
		Langue requise :
		<?php include("menulangues.php");?> 
	</p>

	<p>
		Domaine requis :
		<?php include("menudomaine.php");?>
	</p>

	<p>
		<input type="submit" name="valider" value="valider" />
	</p>

	</form>
	</body>
</html>
