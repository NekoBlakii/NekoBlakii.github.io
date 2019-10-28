<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />

<h1> Guides sans complexes </h1> 

<! Bouton pour retourner sur siteV. >
<form method="POST" action="http://localhost/Projet/siteV.php">
	<input type="submit" name="Retour au site" value="Retour au site"/>
</form>

<?php
	session_start();
	$idSession = $_SESSION['idVoyagiste'];
?> 

<html>
	<head>
	</head> 
	<body>
	
		<?php

			include("connexionbdd.php");
			
			// On vérifie qu'on ne vient pas de n'importe quelle page et qu'on pourrait sauter l'identification.
			if ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/offreV.php?Soumettre+une+offre=Soumettre+une+offre"){
     				 header("Location: http://localhost/Projet/offreVTest.php"); 
     			}
			// On vérifie que tous les champs soient remplis. Si c'est le cas, on initialise les variables avec les variables $_POST
			if (!empty($_POST['titreOffre']) AND !empty($_POST['descriptionOffre']) AND !empty($_POST['dateDebut']) AND !empty($_POST['dateFin']) AND !empty($_POST['destination'])){
				$titreOffre=$_POST['titreOffre'];
				$descriptionOffre=$_POST['descriptionOffre'];
				$dateDebut=$_POST['dateDebut'];
				$dateFin=$_POST['dateFin'];
				$idVoyagiste=$idSession;
				$idDestination=$_POST['destination'];
				$idLangue=$_POST['langue'];
				$idDomaine=$_POST['domaine'];

				$convDebut = explode("-", $dateDebut);
				$convFin = explode("-", $dateFin);
				$dateJour=date("Ymd");
				$concatDebut = $convDebut[0].$convDebut[1].$convDebut[2];
				$concatFin = $convFin[0].$convFin[1].$convFin[2];
				
				// Si les dates sont incorrectes, on refuse la création de l'offre
				if($concatDebut > $concatFin OR $dateJour > $concatDebut){
				 echo 'Entrez des dates valides';
				 }
				// Sinon on insère les valeurs dans la table Offre
				else{

				$req = $bdd->prepare('INSERT INTO Offre(titreOffre, dateDebut , dateFin, descriptionOffre, idDestination, idVoyagiste) VALUES(:titreOffre, :dateDebut, :dateFin, :descriptionOffre, :idDestination, :idVoyagiste)');
				$req->execute(array(
				    'titreOffre' => $titreOffre,
				    'dateDebut' => $dateDebut,
				    'dateFin' => $dateFin,
				    'descriptionOffre' => $descriptionOffre, 
				    'idDestination' => $idDestination,
				    'idVoyagiste' => $idSession
			)); 
				echo 'Votre offre a bien été insérée';
					} 
			}
			
			// Si les champs n'ont pas été tous remplis.
			else{

				echo 'Remplissez tous les champs';
			}

			
			// Ces requêtes servent à insérer les langues requises par l'offre dans la table Requiert
			$req2 = $bdd->prepare("SELECT idOffre FROM Offre WHERE titreOffre= '$titreOffre' AND dateDebut= '$dateDebut' AND dateFin= '$dateFin' AND descriptionOffre= '$descriptionOffre'AND idDestination= '$idDestination' AND idVoyagiste= '$idSession'");
			$req2->execute(array($titreOffre,$dateDebut, $dateFin, $descriptionOffre, $idDestination, $idSession));
			$idOffre = $req2->fetch();

			$req3 = $bdd->prepare('INSERT INTO Requiert(idOffre, idLangue) VALUES (:idOffre, :idLangue)');
			$req3->execute(array(
				      'idOffre' => $idOffre[0],
				      'idLangue'=> $idLangue                       
			));

			//Ces requêtes servent à insérer les domaines requis par l'offre dans la table Necessite
			$req3 = $bdd->prepare('INSERT INTO Necessite(idOffre, idDomaine) VALUES (:idOffre, :idDomaine)');
			$req3->execute(array(
				      'idOffre' => $idOffre[0],
				      'idDomaine'=> $idDomaine                       
			));

		?>

	</body>
</html>
