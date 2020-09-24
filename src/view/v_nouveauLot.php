  <form method = "POST" action ="index.php?uc=production&action=validationNewLot">
  	<h3>Ajout du nouveau lot</h3><br><br>
Medicament : <select name = "medic">
<?php 
foreach ($lesMedocs as $leMedoc) {
	echo '<option value ='.$leMedoc['id'].'>'.$leMedoc['libelle'].'</option>' ;
}
 ?>
	
</select><br><br>
Nombre d'échantillon : <input type="number" name="nbrEchantillon"></input><br><br>
Date de fabrication : <input type="date" name="laDate"></input><br><br>
	<button type="submit">Enregistré</button>
</form>