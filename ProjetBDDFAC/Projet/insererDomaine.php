<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />
<h1> Guides sans complexes </h1> 

<! Bouton pour retourner sur siteA. >
<form method="POST" action="http://localhost/Projet/siteA.php">
<input type="submit" name="Retour au site" value="Retour au site"/>
</form>
<br>

<?php echo '<i>Un guide ou un voyagiste a besoin d\'un domaine qui n\'existe pas encore? Créez-le ici. </i><br><br>';?>

<! Formulaire pour ajouter un domaine >

<p><b> Ajoutez un domaine :</b></p>
<form action="" method="post">
<p>
	Domaine : 
	<input type="text" name="nomDomaine" />
	<input type="submit" value="Ajouter" />
</p>
</form>

<?php
	include("connexionbdd.php");
	session_start();

	//On vérifie qu'on ne vient pas de n'importe quelle page (qu'on pourrait sauter l'identification du coup).
	if (($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/siteA.php") && ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/insererDomaine.php?Ins%C3%A9rer+des+domaines=Ins%C3%A9rer+des+domaines") && ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/insererDomaine.php"))
	{
	      header("Location: http://localhost/Projet/insererDomaine.php");
	}
	$idSession = $_SESSION['idGuide'];

	// Si le champs est rempli, alors on le récupère
	if(!empty ($_POST['nomDomaine'])){
	$nomDomaine=$_POST['nomDomaine'];

		// On vérifie qu'il n'existe pas déjà dans la base
		$req2 = $bdd->prepare("SELECT nomDomaine FROM Domaine WHERE nomDomaine ='$nomDomaine'");
		$req2->execute(array($nomDomaine));
		if(($test = $req2->fetchColumn()) == $nomDomaine){ 
			echo 'Domaine déjà renseigné';  
		}
		// Si le domaine n'existe pas, on l'entre dans la base
		else{
	$req = $bdd->prepare('INSERT INTO Domaine(nomDomaine) VALUES (:nomDomaine)');
	$req->execute(array(
		      'nomDomaine'=> $nomDomaine                       
	));
	       echo 'Domaine ajouté';
	       echo $test;
		}
	}


?>


