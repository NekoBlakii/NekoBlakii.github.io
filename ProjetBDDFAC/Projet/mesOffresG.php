<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />

<h1> Guides sans complexes </h1> 

<! Bouton pour retourner sur siteG. >
<form method="POST" action="http://localhost/Projet/siteG.php">
	<input type="submit" name="Retour au site" value="Retour au site"/>
</form>
<br>
<br>

<html>
	<head>
		<title>Mes offres </title>
	</head>

	<body>
		<?php
			include("connexionbdd.php");
			session_start();
			// On vérifie qu'on ne vient pas de n'importe quelle page et donc qu'on pourrait sauter l'identification
			if ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/siteG.php"){
				header("Location: http://localhost/Projet/mesOffresG.php");
			}
			$idSession = $_SESSION['idGuide'];
	
			echo '<i>Voici un récapitulatif des offres auxquelles vous avez choisi de répondre :</i> <br><br>';

		          // On récupère le nombre de candidatures du guide selon son id pour le for
		         $nbCandidatures = $bdd->prepare("SELECT COUNT(idCandidate) FROM Candidate WHERE idGuide='$idSession'");
		         $nbCandidatures->execute(array($idSession));
		         $resNbCandidatures = $nbCandidatures->fetch();
		         
		          // On se prépare à récupérer l'id de toutes les offres
		         $req = $bdd->prepare("SELECT idOffre FROM Candidate WHERE idGuide= '$idSession' ");
		         $req->execute(array($idSession));

		         // On affiche ses candidatures
		         for($i = 1; $i<= $resNbCandidatures[0] ; $i++){
				 $idOffre = $req->fetch();
				 $req2 =$bdd->prepare("SELECT titreOffre, dateDebut, dateFin, descriptionOffre, idDestination  FROM Offre WHERE idOffre= '$idOffre[0]' ");
				 $req2->execute(array($idOffre[0]));
				 $offreAfficher = $req2->fetch();

				 $req3 = $bdd->prepare("SELECT nomDestination FROM Destination WHERE idDestination='$offreAfficher[4]'");
				 $req3->execute(array($offreAfficher[4]));
				 $destOffre = $req3->fetch();
				 echo '<b>titre de l\'offre :</b> ' . $offreAfficher[0] . '<br><b> date du début :</b> ' . $offreAfficher[1] . '<b> et date de fin : </b>' . $offreAfficher[2] . '<br><b> description de l\'offre : </b>' . $offreAfficher[3] . '<b><br> destination : </b>' . $destOffre[0] . '<br><b> langue(s) requise(s) : </b>' . '';


				 // cette variable sert à compter le nombre de langues requises dans l'offre pour l'utiliser dans le 2ème for
				 $nbLanguesOffre = $bdd->prepare("SELECT COUNT(idLangue) FROM Requiert WHERE idOffre='$idOffre[0]'");
				 $nbLanguesOffre->execute(array($idOffre[0]));
				 $resNbLangues = $nbLanguesOffre->fetch();
				 
		                 // on se prépare à récupérer l'id des langues en fonction de l'offre
		                 $req4 = $bdd->prepare("SELECT idLangue FROM Requiert WHERE idOffre= '$idOffre[0]' ");
		                 $req4->execute(array($idOffre[0])); 
				 for($j = 1; $j<=$resNbLangues[0] ; $j++){
					 $idLangue = $req4->fetch();
					 $req5 =$bdd->prepare("SELECT nomLangue FROM Langue WHERE idLangue= '$idLangue[0]' ");
					 $req5->execute(array($idLangue[0]));
					 $nomlangue = $req5->fetch();
					 echo $nomlangue[0] .' / ';
				 ;} 

		                 echo '<br><b> domaine(s) requis : </b>';
	  
		                 // Pareil cette variable sert à compter le nombre de domaines requis dans l'offre pour l'utiliser dans le 3ème for
				 $nbDomaineOffre = $bdd->prepare("SELECT COUNT(idDomaine) FROM Necessite WHERE idOffre='$idOffre[0]'");
				 $nbDomaineOffre->execute(array($idOffre[0]));
				 $resNbDomaine = $nbDomaineOffre->fetch();
				 
		                 // On se prépare à récupérer l'id des domaines en fonction de l'offre

		                 $req6 = $bdd->prepare("SELECT idDomaine FROM Necessite WHERE idOffre= '$idOffre[0]' ");
		                 $req6->execute(array($idOffre[0]));
				 for($k = 1; $k<=$resNbDomaine[0] ; $k++){
					 $idDomaine = $req6->fetch();
					 $req7 =$bdd->prepare("SELECT nomDomaine FROM Domaine WHERE idDomaine= '$idDomaine[0]' ");
					 $req7->execute(array($idDomaine[0]));
					 $nomDomaine= $req7->fetch();
					 echo $nomDomaine[0] .' / ';
				 }

		                 

			echo '<br><br>__________________________________________________________________________________ <br><br>';
		         }


	  	?>
	</body>
</html>
