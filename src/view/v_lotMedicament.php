<table class="table table-striped">  
            <th>Numero du LOT </th>
            <th>Date de Frabrication   </th>
            <th>Nombre d'échantillons</th>  
        </tr>
<?php 
foreach ($lesLots as $leLot) {
	echo '<td>'.$leLot['gsb_numero'].'</td>
	<td>'.$leLot['gsb_dateFabrication'].'</td> 
	<td>'.$leLot['nbEchantillon'].'</td> 

	<tr>';
}
?>
    </table>