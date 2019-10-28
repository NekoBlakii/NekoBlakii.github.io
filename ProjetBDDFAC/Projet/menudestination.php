

<?php
	
	// Menu déroulant pour les pays. On va chercher l'id et le nom de toutes les destinations dans la base et on les affiche grâce à select et un while pour les option.
	include("connexionbdd.php");
	$req = $bdd->query("SELECT idDestination, nomDestination FROM Destination");
?>

<select name="destination">

	<?php

		while($result = $req->fetch()){
		   echo "<option value=" .$result[0]. ">" .$result[1]. "</option>";
		} 
	?>
</select>



