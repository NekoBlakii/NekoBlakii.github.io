<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />
<h1> Guides sans complexes </h1> 

<?php

	include("connexionbdd.php");
	 session_start();
	$idSession = $_SESSION['idGuide'];
        $admin = $_SESSION['admin'];
	// On va chercher dans la base toutes les offres
	$reponse = $bdd->query('SELECT * FROM Offre ');


	
	// Si on est admin
	if($admin == 1){
		// On vérifie qu'on ne peut pas accéder à cette page sans être passé par siteA et donc l'identification.
		if ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/siteA.php"){
	      		header("Location: http://localhost/Projet/offreG.php");
	     	}

		// Bouton pour retourner au siteA (pour l'admin)
		 echo "<form method='POST' action='http://localhost/Projet/siteA.php'>
	      <input type='submit' name='Retour au site' value='Retour au site'/>
		</form>
		<br>
		";
		echo '<i>Voici les offres soumises par les voyagistes. Vous pouvez les supprimer si vous jugez qu\'une offre est non-conforme, terminée ou si un voyagiste vous en fait la demande. </i>
		<br>
		<br>';
	}

	// Si on est un simple guide
	if($admin == 0){
		// On vérifie qu'on ne provient pas de n'importe quelle page et qu'on pourrait sauter l'identification
		if ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/siteG.php"){
	      		header("Location: http://localhost/Projet/offreG.php");
	    	 }
		// Bouton pour retourner à siteG pour les guides
		echo "<form method='POST' action=' http://localhost/Projet/siteG.php'>
		 <input type='submit' name='Retour au site' value='Retour au site'/>
		</form>
		<br>";
		echo '<i>Voici les offres soumises par les voyagistes. Vous pouvez y souscrire si vos langues et vos domaines correspondent à l\'offre. N\'oubliez pas d\'allez dans votre profil pour ajouter des langues et des domaines. </i><br> <br>';
	}


	//Pour chaque ligne d'offre, on va pouvoir extraire les différentes informations et les afficher
	while ($donnees = $reponse->fetch())
	{ 
		// On récupère nomDestination dans Destination pour l'idDestination correspondant dans la ligne d'offre qu'on execute
                $idDestination = $donnees['idDestination'];
                $req1 = $bdd->prepare("SELECT nomDestination FROM Destination WHERE idDestination= '$idDestination' ");
                $req1->execute(array($idDestination));
                $dest = $req1->fetch();

		// On récupère l'idLangue dans Requiert pour une offre
		$idOffre = $donnees['idOffre'];
                $req2 = $bdd->prepare("SELECT idLangue FROM Requiert WHERE idOffre= '$idOffre' ");
                $req2->execute(array($idOffre));
                $langueO = $req2->fetch();

		// On identifie à l'aide de l'idLangue récupéré à quelle langue cela correspond
		$req3 =$bdd->prepare("SELECT nomLangue FROM Langue WHERE idLangue= '$langueO[0]' ");
		$req3->execute(array($langueO[0]));
		$nomlangueO = $req3->fetch();


		// On récupère l'idDomaine dans Necessite pour une offre
                $req4 = $bdd->prepare("SELECT idDomaine FROM Necessite WHERE idOffre= '$idOffre' ");
                $req4->execute(array($idOffre));
                $domaineO= $req4->fetch();

		// On identifie à l'aide de l'idDomaine récupéré à quel domaine cela correspond
		$req5 =$bdd->prepare("SELECT nomDomaine FROM Domaine WHERE idDomaine= '$domaineO[0]' ");
		$req5->execute(array($langueO[0]));
		$nomdomaineO = $req5->fetch();


		// On récupère l'idLangue dans Parle pour un Guide
                $req6 = $bdd->prepare("SELECT idLangue FROM Parle WHERE idGuide= '$idSession' ");
                $req6->execute(array($idSession));
                $langueG = $req6->fetch();

		// On identifie à l'aide de l'idLangue récupéré à quelle langue cela correspond
		$req7 =$bdd->prepare("SELECT nomLangue FROM Langue WHERE idLangue= '$langueG[0]' ");
		$req7->execute(array($langueG[0]));
		$nomlangueG = $req7->fetch();


		// On récupère l'idDomaine dans Connait pour un Guide
                $req8 = $bdd->prepare("SELECT idDomaine FROM Connait WHERE idGuide= '$idSession' ");
                $req8->execute(array($idSession));
                $domaineG = $req8->fetch();

		// On identifie à l'aide de l'idDomaine récupéré à quel domaine cela correspond
		$req9 =$bdd->prepare("SELECT nomDomaine FROM Domaine WHERE idDomaine= '$domaineG[0]' ");
		$req9->execute(array($domaineG[0]));
		$nomdomaineG = $req9->fetch();
		
	
		// On affiche ce que l'on a déjà récupéré de l'offre pour le moment
		echo '<b>titre de l\'offre : </b>' . $donnees['titreOffre']  . '<br><b> date du début : </b>' . $donnees['dateDebut'] . '<b> et date de fin : </b>' . $donnees['dateFin'] . '<br><b> description de l\'offre : </b>' . $donnees	['descriptionOffre'] . '<br><b> destination :</b> ' . $dest[0]  . '<br><b> langue(s) requise(s) : </b>' . '';

                // Ces requêtes servent à avoir plus tard les différents id des langues de l'offre (avec le req11->fetch() plus bas dans le for)
                $req11 = $bdd->prepare("SELECT idLangue FROM Requiert WHERE idOffre= '$idOffre' ");
                $req11->execute(array($idOffre));
                $validationLangue = 1; // Cette variable servira à afficher ou nom un bouton souscrire
               
                 // Cette variable sert à compter le nombre de langues requises dans l'offre pour l'utiliser dans le for
                 $nbLanguesOffre = $bdd->prepare("SELECT COUNT(idLangue) FROM Requiert WHERE idOffre='$idOffre'");
                 $nbLanguesOffre->execute(array($idOffre));
                 $resNbLangues = $nbLanguesOffre->fetch();
                 
                // Pour que les guides puissent voir le bouton souscrire seulement si leurs langues matchent avec celles du site
                for($i = 1; $i<=$resNbLangues[0] ; $i++){
		        $langueO = $req11->fetch();
		         if($validationLangue == 1){
				    $req12 = $bdd->prepare("SELECT idLangue FROM Parle WHERE idGuide ='$idSession' AND idLangue ='$langueO[0]'");
				    $req12->execute(array($idSession, $langueO[0]));
				    if($req12->fetchColumn() != 0){ 
				        $validationLangue = 1;  
				     }
				    else {
				           $validationLangue = 0; // On met notre variable à 0 si cela ne matche pas et le bouton souscrire n'apparaîtra pas
				           }
		            }

                         // Ici cela sert à afficher les différentes langues de l'offre
		        $req10 =$bdd->prepare("SELECT nomLangue FROM Langue WHERE idLangue= '$langueO[0]' ");
			$req10->execute(array($langueO[0]));
			$nomlangueO2 = $req10->fetch();
		        echo $nomlangueO2[0] .' / ';
              }

                echo '<br><b> domaine(s) requis : </b>';
                // On fait pareil pour les domaines, on se prépare à avoir tous les id des Domaines
                $req13 = $bdd->prepare("SELECT idDomaine FROM Necessite WHERE idOffre= '$idOffre' ");
                $req13->execute(array($idOffre));
                $validationDomaine = 1; // Pareil qu'avant, si cette variable se retrouve à 0 à la fin, on n'affichera pas le bouton souscrire


                 // Comme avant on compte le nombre de domaines requis 
                 $nbDomaineOffre = $bdd->prepare("SELECT COUNT(idDomaine) FROM Necessite WHERE idOffre='$idOffre'");
                 $nbDomaineOffre->execute(array($idOffre));
                 $resNbDomaine = $nbDomaineOffre->fetch();

                
		// On vérifie si les domaines matchent, sinon on met la variable à 0
                 for($i = 1; $i<=$resNbDomaine[0] ; $i++){
		        $domaineO = $req13->fetch();
		         if($validationDomaine == 1){
				    $req14 = $bdd->prepare("SELECT idDomaine FROM Connait WHERE idGuide ='$idSession' AND idDomaine ='$domaineO[0]'");
				    $req14->execute(array($idSession, $domaineO[0]));
				    if($req14->fetchColumn() != 0){ 
				        $validationDomaine = 1;  
				     }
				    else {
				           $validationDomaine = 0;
				           }
		            }

                         // Ici cela sert à afficher les différentes langues de l'offre
		        $req15 =$bdd->prepare("SELECT nomDomaine FROM Domaine WHERE idDomaine= '$domaineO[0]' ");
			$req15->execute(array($domaineO[0]));
			$nomdomaineO2 = $req15->fetch();
		        echo $nomdomaineO2[0] .' / ';
              }
                 



                echo  '<br>' . '<br>' . '<br>' ;

                // Si les langues du guide et de l'offre matchent on affiche un bouton souscrire
                if($validationLangue == 1 && $validationDomaine == 1 && $admin == 0){ 
                echo '<form method="POST" action="http://localhost/Projet/souscrireOffre.php">
                        <input type="hidden"  name="idOffre"  value='. $idOffre .'>
			<input type="submit" name="Souscrire" value="Souscrire"/>
			</form>';
		echo '__________________________________________________________________________________ <br><br>';}
                else {
		// Comme l'admin ne matche avec rien dans tous les cas, si c'est l'admin, on affiche un bouton supprimer sous chaque offre
		  if($admin == 1){
                    echo '<form method="POST" action="http://localhost/Projet/supprimerOffre.php">
                        <input type="hidden"  name="idOffre"  value='. $idOffre .'>
			<input type="submit" name="Supprimer" value="Supprimer"/>
			</form>';
	echo '__________________________________________________________________________________ <br><br>';
                   }
		else{
	echo '__________________________________________________________________________________ <br><br>';
}
                }
	}
?>

