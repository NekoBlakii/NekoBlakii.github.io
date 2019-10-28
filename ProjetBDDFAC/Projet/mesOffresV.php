<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />

<h1> Guides sans complexes </h1> 

<form method="POST" action="http://localhost/Projet/siteV.php">
	<input type="submit" name="Retour au site" value="Retour au site"/>
</form>
<br>

<i> Consultez les offres que vous avez soumises au site et contactez les guides qui s'y sont inscrits. </i>
<br>
<br>
<br>


<?php
	include("connexionbdd.php");
	 session_start();

	//On vérifie qu'on ne provient pas de n'importe quelle page qui ne nécessiterait pas une identification.
	if ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/siteV.php"){
		header("Location: http://localhost/Projet/mesOffresV.php");
	} 
	$idSession = $_SESSION['idVoyagiste'];
	
	// On va sélectionner toutes les offres du voyagiste dont l'id est l'idSession et le but sera de les afficher toutes
	$reponse = $bdd->query("SELECT * FROM Offre WHERE idVoyagiste='$idSession' ");

	// On va parcourir chaque ligne qui correspond à une offre que le voyagiste a soumise
	while ($donnees = $reponse->fetch())
	{ 
		
		// On récupère le nom de la destination dont l'id est dans la table Offre
                $idDestination = $donnees['idDestination'];
                $req1 = $bdd->prepare("SELECT nomDestination FROM Destination WHERE idDestination= '$idDestination' ");
                $req1->execute(array($idDestination));
                $dest = $req1->fetch();

		// On récupère l'idLangue dans Requiert pour une offre
		$idOffre = $donnees['idOffre'];
                $req2 = $bdd->prepare("SELECT idLangue FROM Requiert WHERE idOffre= '$idOffre' ");
                $req2->execute(array($idOffre));
                $langueO = $req2->fetch();

		// On identifie à l'aide de l'idLangue récupèrée à quelle langue cela correspond
		$req3 =$bdd->prepare("SELECT nomLangue FROM Langue WHERE idLangue= '$langueO[0]' ");
		$req3->execute(array($langueO[0]));
		$nomlangueO = $req3->fetch();


		// on récupère l'idDomaine dans Requiert pour une offre
                $req4 = $bdd->prepare("SELECT idDomaine FROM Necessite WHERE idOffre= '$idOffre' ");
                $req4->execute(array($idOffre));
                $domaineO= $req4->fetch();

		// on identifie à l'aide de l'idDomaine récupèrée à quel domaine cela correspond
		$req5 =$bdd->prepare("SELECT nomDomaine FROM Domaine WHERE idDomaine= '$domaineO[0]' ");
		$req5->execute(array($langueO[0]));
		$nomdomaineO = $req5->fetch();


		// on récupère l'idLangue dans Parle pour un Guide
                $req6 = $bdd->prepare("SELECT idLangue FROM Parle WHERE idGuide= '$idSession' ");
                $req6->execute(array($idSession));
                $langueG = $req6->fetch();

		// on identifie à l'aide de l'idLangue récupérée à quelle langue cela correspond
		$req7 =$bdd->prepare("SELECT nomLangue FROM Langue WHERE idLangue= '$langueG[0]' ");
		$req7->execute(array($langueG[0]));
		$nomlangueG = $req7->fetch();


		// on récupère l'idDomaine dans Connait pour un Guide
                $req8 = $bdd->prepare("SELECT idDomaine FROM Connait WHERE idGuide= '$idSession' ");
                $req8->execute(array($idSession));
                $domaineG = $req8->fetch();

		// on identifie à l'aide de l'idDomaine récupéré à quel domaine cela correspond
		$req9 =$bdd->prepare("SELECT nomDomaine FROM Domaine WHERE idDomaine= '$domaineG[0]' ");
		$req9->execute(array($domaineG[0]));
		$nomdomaineG = $req9->fetch();

		
		// On récupère l'idGuide dans Candidate pour une Offre
                $req16 = $bdd->prepare("SELECT idGuide FROM Candidate WHERE idOffre= '2' ");
                $req16->execute(array($idSession));
                $idG = $req16->fetch();

		// On identifie à l'aide de l'idGuide récupèrée à quel pseudo cela correspond
		$req17 =$bdd->prepare("SELECT pseudoGuide FROM Guide WHERE idGuide= '$idG[0]' ");
		$req17->execute(array($idG[0]));
		$pseudoGuide = $req17->fetch();
	
		
	
		//On affiche le début de l'offre avec toutes les données récupérées. Il manque à présent les domaines et les langues.
		echo '<b>titre de l\'offre :</b> ' . $donnees['titreOffre']  . '<br><b> date du début : </b>' . $donnees['dateDebut'] . ' <b>et date de fin : </b> ' . $donnees['dateFin'] . '<br><b> description de l\'offre : </b> ' . $donnees	['descriptionOffre'] . '<br> <b>destination : </b> ' . $dest[0]  . '<br><b> langue(s) requise(s) : </b> ' . ' / ' ;


                // Ce bloc sert à avoir plus tard les différents id des langues de l'offre (avec le req11->fetch() plus bas dans le for)
                $req11 = $bdd->prepare("SELECT idLangue FROM Requiert WHERE idOffre= '$idOffre' ");
                $req11->execute(array($idOffre));
                $validationLangue = 1; // On initialise cette variable à 1 pour pouvoir entrer dans le if du for
               
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
				           $validationLangue = 0;
				           }
		            }

                         // Ici cela sert à afficher les différentes langues de l'offre
		        $req10 =$bdd->prepare("SELECT nomLangue FROM Langue WHERE idLangue= '$langueO[0]' ");
			$req10->execute(array($langueO[0]));
			$nomlangueO2 = $req10->fetch();
		        echo $nomlangueO2[0] .' / ';
              }

                echo '<br><b> domaine(s) requis : </b> ';
                // on fait pareil pour les domaines, on se prépare à avoir toutes les id des Domaines
                $req13 = $bdd->prepare("SELECT idDomaine FROM Necessite WHERE idOffre= '$idOffre' ");
                $req13->execute(array($idOffre));
                $validationDomaine = 1;


                 // Comme avant on compte le nombre de domaines requis 
                 $nbDomaineOffre = $bdd->prepare("SELECT COUNT(idDomaine) FROM Necessite WHERE idOffre='$idOffre'");
                 $nbDomaineOffre->execute(array($idOffre));
                 $resNbDomaine = $nbDomaineOffre->fetch();

                // Ce for est presque identique à l'autre. Si les domaines ne matchent pas, la variable $validationDomaine devient 0 et on affichera pas le bouton souscrire
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

                         // ici cela sert à afficher les différentes langues de l'offre
		        $req15 =$bdd->prepare("SELECT nomDomaine FROM Domaine WHERE idDomaine= '$domaineO[0]' ");
			$req15->execute(array($domaineO[0]));
			$nomdomaineO2 = $req15->fetch();
		        echo $nomdomaineO2[0] .' / ';
              }
?>
	


		<?//Pour ajouter une langue à notre offre?>
		<form action="http://localhost/Projet/addlangueOffreV.php" method="post">
		<p>
			Ajouter une langue :
			<?php include("menulangues.php");?> 
			 <input type="submit" name="Retour" value="Ajouter"/>
			<input type='hidden'  name='idOffre'  value="<?php echo $idOffre; ?>" > 
			</p>
		</form>



		<?//Pour ajouter un domaine à notre offre?>
		<form action="http://localhost/Projet/adddomaineOffreV.php" method="post">
		<p>
			Ajouter un domaine :
			<?php include("menudomaine.php");?> 
			 <input type="submit" name="Retour" value="Ajouter"/>
			<input type='hidden'  name='idOffre'  value="<?php echo $idOffre; ?>" > 
			</p>
		</form>




<?php
		


 echo '<br><b> Pseudo Candidat(s) : </b> ';
                // on fait pareil pour les candidats, on se prépare à avoir toutes les id des Guides
                $req13 = $bdd->prepare("SELECT idGuide FROM Candidate WHERE idOffre= '$idOffre' ");
                $req13->execute(array($idOffre));
                $validationGuide = 1;


                 // comme avant on compte le nombre de guide candidats
                 $nbGuideOffre = $bdd->prepare("SELECT COUNT(idGuide) FROM Candidate WHERE idOffre='$idOffre'");
                 $nbGuideOffre->execute(array($idOffre));
                 $resNbGuide = $nbGuideOffre->fetch();

                

                 for($i = 1; $i<=$resNbGuide[0] ; $i++){
		        $idG = $req13->fetch();
		         if($validationGuide == 1){
				    $req14 = $bdd->prepare("SELECT idGuide FROM Connait WHERE idOffre ='$idOffre' AND idGuide ='$idG[0]'");
				    $req14->execute(array($idOffre, $idG[0]));
				    if($req14->fetchColumn() != 0){ 
				        $validationGuide = 1;  
				     }
				    else {
				           $validationGuide = 0;
				           }
		            }

                         // ici cela sert à afficher les différents pseudos des guides pour cette offre
		        $req15 =$bdd->prepare("SELECT pseudoGuide FROM Guide WHERE idGuide= '$idG[0]' ");
			$req15->execute(array($idG[0]));
			$pseudoGuide = $req15->fetch();
                        echo $pseudoGuide[0] .' / ';

                        // ici on va récupérer les mails des guides pour après
                        $req18 =$bdd->prepare("SELECT mailGuide FROM Guide WHERE idGuide= '$idG[0]' ");
			$req18->execute(array($idG[0]));
			$mailGuide = $req18->fetch();
		        
                        echo  '<br>' . '<br>'  ;
			//Ici on souhaite contacter par mail le Guide qui candidate 
			 echo '<form method="POST" action="http://localhost/Projet/contacterV.php">
			<input type="submit" name="Contacter" value="Contacter"/>
                        <input type="hidden"  name="mailGuide"  value='. $mailGuide[0] .'> 
			</form>';
	
			
              }

                echo '<br>' . '_______________________________________________________________________ ' . '<br>' . '<br>' . '<br>' ;
	}
?>
