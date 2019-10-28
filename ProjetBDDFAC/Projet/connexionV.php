<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />

<h1> Guides sans complexes </h1> 

<html>
	<head>
		<title>Connectez-vous</title>
	</head>
<body>

	<?php 
	// On vérifie que tous les champs sont remplis. Si c'est le cas, initialise les variables avec les variables $_POST.
	include("connexionbdd.php");
	if (!empty($_POST['nomAgence']) AND !empty($_POST['tel']) AND !empty($_POST['mailV']) AND !empty($_POST['pseudoV']) AND !empty($_POST['passwordV'])){
		$passwordV=$_POST['passwordV'];
		$passwordV2=$_POST['passwordV2'];
		
		// Si la vérification de mot de passe est correcte, on continue d'initialiser les variables
		if($passwordV == $passwordV2){
			$nomAgence=$_POST['nomAgence'];
			$tel=$_POST['tel'];
			$mailV=$_POST['mailV'];
			$pseudoV=$_POST['pseudoV'];

			// On vérifie que le pseudo n'existe pas dans la table Voyagiste, s'il existe déjà, on le notifie à l'utilisateur.
			$req2 = $bdd->prepare("SELECT pseudoVoyagiste FROM Voyagiste WHERE pseudoVoyagiste ='$pseudoV'");
			$req2->execute(array($pseudoV));
			if($req2->fetchColumn() == TRUE){ 
				echo 'pseudo déjà utilisé';  
			}
			else{

				// Sinon on se prépare à insérer toutes les variables
				$req = $bdd->prepare('INSERT INTO Voyagiste(nomAgence,telVoyagiste,mailVoyagiste,pseudoVoyagiste, mdpVoyagiste) VALUES(:nomAgence,:tel,:mailV,:pseudoV,:passwordV)');


				// On exécute ce que l'on a préparé avec les variables qui ont été initialisées 
				$req->execute(array(
				    'nomAgence' => $nomAgence,
				    'tel' => $tel,
				    'mailV' => $mailV,
				    'pseudoV' => $pseudoV,
				    'passwordV' => $passwordV

				 ));
				 
				echo 'Inscription validée' . '<br>' . '<br>';
				// Le bouton suivant permet de retourner à la page d'index.
				?>

			      <form method="POST" action="http://localhost/Projet/index.php">
			      <input type="submit" name="Retour à l'accueil" value="Retour à l'accueil"/>
			      </form>
			<?php
			 } 
		}
		// Sinon on notifie que les mots de passe sont différents
		else{
			echo 'mots de passe différents';   
		}		      
	} 
        // Si tous les champs ne sont pas remplis, on le notifie
        else{
		echo 'Remplissez tous les champs';
        }

	?>

 </body>
</html>











