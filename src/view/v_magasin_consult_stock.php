<h1>Consultation de tous les échantillons en magasin<h1>

<?php
	$size = sizeof($echantillons);
	
	if($size == 0) {
		echo 'Aucun échantillon n\'est disponible dans le magasin !';
	}

	else
	{
		echo $size . ' échantillons sont disponibles dans le magasin :<br><br>';
		echo '<table class="table table-striped">   
			<tr>
				<th>N°</th>
				<th>Lot</th>
				<th>Médicament</th>
			</tr>';
				
		foreach($echantillons as $echantillon) {

			echo '<tr><th>' . $echantillon['gsb_numero'] . '</th><th>' . $echantillon['gsb_numeroLot'] . '</th><th>' . $echantillon['libelle'] . '</th></tr>';

		}


		echo '</table>';
	}

?>
