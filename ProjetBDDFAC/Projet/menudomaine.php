<?php
	
	// Menu déroulant pour les domaines. On va chercher l'id et le nom de tous les domaines et on affiche les domaines grâce à un select qui utilise while et option
	include("connexionbdd.php");
	$reqDomaine = $bdd->query("SELECT idDomaine, nomDomaine FROM Domaine");
?>
<select name="domaine">

	<?php
		while($resultDomaine = $reqDomaine->fetch()){
		   echo "<option value=" .$resultDomaine[0]. ">" .$resultDomaine[1]. "</option>";
		} 
	?>
</select>

