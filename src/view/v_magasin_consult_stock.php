<h1>Consultation de tous les échantillons en magasin</h1>

<?php
	

	$totQt = 0;

	foreach($qtMedocs as $medoc) {
		$totQt += $medoc['nombre']; 
	}
	
	if($totQt == 0) {
		echo 'Aucun échantillon n\'est disponible dans le magasin !';
	}

	else
	{
		echo $totQt . ' échantillons sont disponibles dans le magasin :<br><br>';
		echo '<table class="table table-striped">   
			<tr>
				<th>Médicament</th>
				<th>Quantité</th>
			</tr>';
				
		foreach($qtMedocs as $medoc) {

			echo '<tr><th>' . $medoc['libelle'] . '</th><th>' . $medoc['nombre'] . '</th></tr>';

		}


		echo '</table>';
	}

?>
