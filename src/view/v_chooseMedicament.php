<form method = "POST" action ="index.php?uc=production&action=AfficherLotMedicament" class = "formGaetan">
	<div class="CenterElement">
	<h3>Consultation par médicament</h3><br>
Choix du médicament : <select name = "medic">
<?php 
foreach ($lesMedocs as $leMedoc) {
	echo '<option value ='.$leMedoc['id'].'>'.$leMedoc['libelle'].'</option>' ;
}
 ?>
	
</select><br><br>
<button type="submit" class="btn btn-primary">Valider</button></div>
</form>