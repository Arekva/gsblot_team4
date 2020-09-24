<form method = "POST" action ="index.php?uc=production&action=AfficherLotMedicament">
	<h3>Consultation par médicament</h3><br><br>
Veuillez choisir un médicament : <br><select name = "medic">
<?php 
foreach ($lesMedocs as $leMedoc) {
	echo '<option value ='.$leMedoc['id'].'>'.$leMedoc['libelle'].'</option>' ;
}
 ?>
	
</select><br><br>
<button type="submit">Voir</button>
</form>