<?php
	
	// Menu déroulant pour les langues. On prend l'id et le nom de toutes les langues et on affiche les langues dans un menu déroulant grâce à select qui utilise un while et option. Ce point est expliqué plus en détail dans le dossier.
	include("connexionbdd.php");
	$reqLangue = $bdd->query("SELECT idLangue, nomLangue FROM Langue");
?>
<select name="langue">

	<?php
		while($resultLangue = $reqLangue->fetch()){
		   echo "<option value=" .$resultLangue[0]. ">" .$resultLangue[1]. "</option>";
		} 
	?>
</select>


