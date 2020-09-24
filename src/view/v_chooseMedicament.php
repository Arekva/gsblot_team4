
<form method = "POST" action ="index.php?uc=production&action=AfficherLotMedicament">
Veuillez choisir un médicament : <select name = "medic">
<?php 
foreach ($lesMedocs as $leMedoc) {
	echo '<option value ='.$leMedoc['id'].'>'.$leMedoc['libelle'].'</option>' ;
}
 ?>
	
</select>
<button type="submit">Voir</button>
</form>