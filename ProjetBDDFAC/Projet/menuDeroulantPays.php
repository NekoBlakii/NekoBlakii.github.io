
<form action="#" method="post"/>
<?php

	include("connexionbdd.php");
	
	// Menu déroulant des pays (On prend l'id et le nom de toutes les destination qu'on affiche dans un menu déroulant grâce à select et option 
	$sql= "SELECT idDestination, nomDestination FROM Destination";
	$query=mysql_query($sql);

	echo '<select name="destination" value=''><option>Menu</option>';
	while($row = mysql_fetch_array($query)){
	echo "<option value=".$row['idDestination'].">".$row['nomDestination']."</option>";
	}
	echo '</select'>;

?> 

<input type="submit" value="submit"/>
</form>

<?php 	
	// Si on a cliqué sur valider
	if (!empty($_POST['valider']))  
	{
		header("Location: http://localhost/Projet/index.php") or die('pb');
	
	} 
?>
