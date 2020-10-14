<br><br>
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
		echo '<table class="table table-bordered table-dark">   
			<tr>
				<th>Médicament</th>
				<th>Quantité</th>
			</tr>';
				
		foreach($qtMedocs as $medoc) {

			echo '<tr><td>' . $medoc['libelle'] . '</td><td>' . $medoc['nombre'] . '</td></td>';

		}
		echo '<tr><th> Total : </th><th>' . $totQt . '</th></th>';


		echo '</table>';
	}

?>
