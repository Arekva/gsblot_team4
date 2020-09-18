<form method = "POST" action ="index.php?uc=production&action=validationNewLot">
	Date de fabrication : <input type="date" name="laDate"></input>
Medicament : <select name = "medic">
<?php 
foreach ($lesMedocs as $leMedoc) {
	echo '<option value ='.$leMedoc['libelle'].'>'.$leMedoc['libelle'].'</option>' ;
}
 ?>
	
</select>
	<button type="submit">Enregistré</button>
</form>