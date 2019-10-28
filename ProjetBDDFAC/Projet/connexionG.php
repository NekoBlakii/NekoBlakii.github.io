<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />

<h1> Guides sans complexes </h1> 
<html>
	<head>
		<title>Connectez-vous</title>
	</head>
	<body>

		<?php 
		include("connexionbdd.php");


		// Si tous les champs sont remplis, on initialise les variables avec les variables $_POST du formulaire.

		if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mailguide']) AND !empty($_POST['pseudoguide']) AND !empty($_POST['passwordguide'])){
			$passwordguide=$_POST['passwordguide'];
			$passwordguide2=$_POST['passwordguide2'];

			// On vérifie que la vérification du mot de passe est identique. Si c'est bon, on passe à la suite.
			if($passwordguide == $passwordguide2){
				$nom=$_POST['nom'];
				$prenom=$_POST['prenom'];
				$mailguide=$_POST['mailguide'];
				$pseudoguide=$_POST['pseudoguide'];
		
				// On vérifie que le pseudo n'existe pas déjà dans la table Guide. Si oui, on notifie que le pseudo est déjà utilisé.
				$req2 = $bdd->prepare("SELECT pseudoGuide FROM Guide WHERE pseudoGuide ='$pseudoguide'");
				$req2->execute(array($pseudoguide));
				if($req2->fetchColumn() == TRUE){ 
					echo 'pseudo déjà utilisé';  
				}
				else{

				// Sinon, on prépare une insertion avec des noms de variables
					$req = $bdd->prepare('INSERT INTO Guide(nomGuide,prenomGuide,mailGuide,pseudoGuide, mdpGuide) VALUES(:nom,:prenom,:mailguide,:pseudoguide,:passwordguide)');


					//On exécute ce que l'on a préparé en liant la requête avec les variables initialisées par les variables $_POST.
					$req->execute(array(
					    'nom' => $nom,
					    'prenom' => $prenom,
					    'mailguide' => $mailguide,
					    'pseudoguide' => $pseudoguide,
					    'passwordguide' => $passwordguide

					 )); 

					echo 'Inscription validée' . '<br>' . '<br>';
					?> 
					  
				      <form method="POST" action="http://localhost/Projet/index.php">
				      <input type="submit" name="Retour à l'accueil" value="Retour à l'accueil"/>
				      </form>
					<?php 
				}
			}
			//Sinon on indique que les mots de passe sont différents
			else{
				echo 'mots de passe différents';   
			}	      
		}
		// Si tous les champs ne sont pas remplis.
		else{
			echo 'Remplissez tous les champs';
		}

		?>

	</body>
</html>











