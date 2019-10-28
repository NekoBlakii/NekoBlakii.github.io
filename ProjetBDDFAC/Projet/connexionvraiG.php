
<?php 
	include("connexionbdd.php");

	$pseudoguide=$_POST['pseudoguide'];
	$passwordguide=$_POST['passwordguide'];

	// On vérifie que le pseudo et le mot de passe soient ceux de la même ligne et on récupère le booléen d'admin
	$req = $bdd->prepare('SELECT idGuide, admin FROM Guide WHERE pseudoGuide = :pseudoguide AND mdpGuide = :passwordguide');
	$req->execute(array(
	    'pseudoguide' => $pseudoguide,
	    'passwordguide' => $passwordguide));

	$resultat = $req->fetch();
	
	// Si ce n'est pas le cas, on refuse l'identification
	if (!$resultat)
	{
	    echo 'Mauvais identifiant ou mot de passe !';
		if($resultat == NULL) {echo 'NULL';}
	}
	// Sinon, on démarre la session Guide ou la Session admin (si la ligne contenait admin=1)
	else
	{
	    session_start();
	    $_SESSION['idGuide'] = $resultat['idGuide'];
	    $_SESSION['pseudoGuide'] = $pseudoguide;
	    $_SESSION['admin'] = $resultat['admin'];
	    $admin= $resultat['admin'];
	    echo 'Vous êtes connecté !';

		// On redirige sur siteA ou siteG selon le booléen admin
	    if($admin == 1){
		header('Location: http://localhost/Projet/siteA.php');
		}

	   else{
		header('Location: http://localhost/Projet/siteG.php');
		}
	exit();
	}

?>
