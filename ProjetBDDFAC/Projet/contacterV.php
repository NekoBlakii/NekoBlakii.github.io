<link rel="stylesheet" href="/Projet/styles.php" type="text/css" />

<h1> Guides sans complexes </h1> 

<form method="POST" action="http://localhost/Projet/siteV.php">
      <input type="submit" name="Retour au site" value="Retour au site"/>
</form>


<?php
        echo '<br>' . '<br>';
	include("connexionbdd.php");
	 session_start();
	// On vérifie qu'on vient bien du site
	if ($_SERVER['HTTP_REFERER'] != "http://localhost/Projet/mesOffresV.php?Mes+offres=Mes+offres"){
      header("Location: http://localhost/Projet/contacterV.php");
     }
	// On affiche le mail du guide qu'on a décidé de contacter
	$idSession = $_SESSION['idVoyagiste'];
        $idM = $_POST['mailGuide'];
        echo 'Vous pouvez contacter ce guide à l\'adresse mail suivante : ' ;
        echo $idM;
        
?>



