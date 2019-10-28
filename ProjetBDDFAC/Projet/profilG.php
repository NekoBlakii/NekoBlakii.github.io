<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />

<h1> Guides sans complexes </h1> 

<form method="POST" action="http://localhost/Projet/siteG.php">
	<input type="submit" name="Retour au site" value="Retour au site"/>
</form>
<br>

<?php	
	include("connexionbdd.php");
	session_start();
	// On vérifie qu'on ne peut pas accéder à cette page sans être identifié.
	if ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/siteG.php"){
		header("Location: http://localhost/Projet/profilG.php");
	}
	$idSession = $_SESSION['idGuide'];
	echo'<i>Consultez votre profil ou modifiez-le en remplissant un des champs ci-dessous.</i><br><br>';
?>

<html>
	<head>
		<title>Votre Profil</title>
	</head>
	<body>
		<?php 
			
			// On prépare les données nécessaires à l'affichage des données du guide connecté (qu'on identifie avec son idSession)
			$reponse = $bdd->query("SELECT * FROM Guide WHERE idGuide='$idSession' ");
			$donnees = $reponse->fetch();
			// On affiche ses données
			echo ' <p> <b> Profil : </b> <br> <br>Nom : ' . $donnees['nomGuide']  . '<br> Prénom : ' . $donnees['prenomGuide'] . '<br> Mail : ' . $donnees['mailGuide'] . '<br> Pseudo : ' . $donnees['pseudoGuide']  . '<br> Langue(s) maîtrisée(s) : /' ;
			
			// On cherche toutes les langues qu'il parle et pour chaque langue on l'affiche
			$reponse2 = $bdd->query("SELECT idLangue FROM Parle WHERE idGuide='$idSession' ");
			    while ($donnees2 = $reponse2->fetch())
			{
				// Ici on identifie le nom de la langue à l'aide de l'idLangue récupèrée
				$nomL= $donnees2['idLangue'];
				$req7 =$bdd->prepare("SELECT nomLangue FROM Langue WHERE idLangue= '$nomL' ");
				$req7->execute(array($nomL));
				$nomLangueG = $req7->fetch();
				echo $nomLangueG[0] . ' / ' ; 
		    }
			// On fait pareil avec les domaines. On les cherche et on les affiche
			echo ' <br> Domaine(s) maîtrisé(s) : / ';
			$reponse3 = $bdd->query("SELECT idDomaine FROM Connait WHERE idGuide='$idSession' ");
			    while ($donnees3 = $reponse3->fetch())
			{
			       
				// On on identifie le nom du domaine à l'aide de l'idDomaine récupéré
				$nomD= $donnees3['idDomaine'];
				$req8 =$bdd->prepare("SELECT nomDomaine FROM Domaine WHERE idDomaine= '$nomD' ");
				$req8->execute(array($nomD));
				$nomDomaineG = $req8->fetch();
				echo $nomDomaineG[0] . ' / ' ; 
		    }
			echo '</p>';
		?>
		
		<! Le formulaire de type POST pour modifier son profil. >
		<form action="" method="post">
		<p>
		<b>
		<br>
			Modifiez votre profil : 
		</b>
		</p>

		<p>
			Nom :
			<input type="text" name="nom" />
			<input type="submit" value="Valider" />
		</p>
		</form>

		<form action="" method="post">
		<p>
			Prenom :
			<input type="text" name="prenom" />
			<input type="submit" value="Valider" />
		</p>
		</form>

		<form action="" method="post">
		<p>
			Mail :
			<input type="text" name="mailG" />
			<input type="submit" value="Valider" />
		</p>
		</form>

		<form action="" method="post">
		<p>
			Pseudo :
			<input type="text" name="pseudoG" />
			<input type="submit" value="Valider" />
		</p>
		</form>

		<form action="" method="post">
		<p>
			Mot de passe :
			<input type="password" name="passwordG" />
			<input type="submit" value="Valider" />
		</p>
		</form>

		<b>
		<br>
			Ajoutez des compétences : 
		</b>

		<form action="addlangueG.php" method="post">
		<p>
			Langue parlée :
			<?php include("menulangues.php");?> 
			 <input type="submit" name="Retour" value="Ajouter"/>
			</p>
		</form>

		<form action="adddomaineG.php" method="post">
		<p>
			Domaine connu :
			<?php include("menudomaine.php");?>
			 <input type="submit" name="Retour" value="Ajouter"/>
		</p>
		</form>


		<?php 
			
			// Selon le champs rempli, on prépare les variables correspondantes à actualiser dans la table correspondante
			// Cette façon de procéder avec prepare/execute/fetch est expliquée en détail dans le dossier.
			if (!empty($_POST['nom'])){
				$nom=$_POST['nom'];
				$req = $bdd->prepare("UPDATE Guide SET nomGuide = '$nom' WHERE idGuide='$idSession' ");
				$req->execute(array(
				     $nom
				 )); 
			} 


			if (!empty($_POST['prenom'])){
				$prenom=$_POST['prenom'];
				$req = $bdd->prepare("UPDATE Guide SET prenomGuide = '$prenom' WHERE idGuide='$idSession' ");
				$req->execute(array(
				     $prenom
				 )); 
			} 


			if (!empty($_POST['mailG'])){
				$mailG=$_POST['mailG'];
				$req = $bdd->prepare("UPDATE Guide SET MailGuide = '$mailG' WHERE idGuide='$idSession' ");
				$req->execute(array(
				     $mailG
				 )); 
			} 


			if (!empty($_POST['pseudoG'])){
				$pseudoG=$_POST['pseudoG'];
				$req = $bdd->prepare("UPDATE Guide SET PseudoGuide = '$pseudoG' WHERE idGuide='$idSession' ");
				$req->execute(array(
				     $pseudoG
				 )); 
			} 


			if (!empty($_POST['passwordG'])){
				$passwordG=$_POST['passwordG'];
				$req = $bdd->prepare("UPDATE Guide SET mdpGuide = '$passwordG' WHERE idGuide='$idSession' ");
				$req->execute(array(
				     $passwordG
				 )); 
			} 

			?>

	</body>
</html>



