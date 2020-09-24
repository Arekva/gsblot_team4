<table class="table table-striped">  
            <th>Numero du LOT </th>
            <th>date de Frabrication</th>
            <th>Medicament</th>
            <th>Nombre d'echantillons</th>  
        </tr>
<?php 
foreach ($lesLots as $leLot) {
	echo '<td>'.$leLot['gsb_numero'].'</td>
	<td>'.$leLot['gsb_dateFabrication'].'</td>
	<td>'.$leLot['libelle'].'</td>
	<td>'.$leLot['nbEchantillon'].'</td>
	 <tr>';
}
?>
    </table>