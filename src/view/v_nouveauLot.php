  <form method = "POST" action ="index.php?uc=production&action=validationNewLot" class ="formGaetan">
  
  	<h3 class = "CenterElement">Ajout du nouveau lot</h3><br><br>
  	<div class = gigaBoite>
  	<div class = boite>

Medicament : <br><br>
Nombre d'échantillon : &nbsp <br><br>
Date de fabrication : <br><br>

</div>
<div class = boite>
<select name = "medic" class="gaetanInput">
<?php 
foreach ($lesMedocs as $leMedoc) {
	echo '<option value ='.$leMedoc['id'].'>'.$leMedoc['libelle'].'</option>' ;
}
 ?>
	
</select><br><br>
<input type="number" name="nbrEchantillon" class="gaetanInput" required="required"> </input><br><br>
<input type="date" name="laDate" class="gaetanInput" data-error="La date est obligatoire !" required="required"></input><br><br>
</div>
</div>
<div class="CenterElement">
	<button type="submit" class="btn btn-primary">Enregistrer</button></div>
	</form>