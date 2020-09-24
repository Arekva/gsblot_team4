<table class="table table-striped">  
            <th>Numero du LOT </th>
            <th>date de Frabrication   </th>
            <th>NB echantillon</th>  
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