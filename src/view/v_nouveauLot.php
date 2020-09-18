<form method = "POST" action ="index.php?uc=production&action=validationNewLot">
Medicament : <select name = "medic">
<?php 
foreach ($lesMedocs as $leMedoc) {
	echo '<option value ='.$leMedoc['libelle'].'>'.$leMedoc['libelle'].'</option>' ;
}
 ?>
	
</select>
Nombre d'échantillon : <input type="number" name="nbrEchantillon"></input>
Date de fabrication : <input type="date" name="laDate"></input>
	<button type="submit">Enregistré</button>
</form>