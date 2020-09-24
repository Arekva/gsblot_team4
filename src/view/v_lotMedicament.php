<table class="table table-striped">  
            <th>Numero du LOT</th>
            <th>date de Frabrication</th>
            <th> n° immatriculation</th>  
            <th> libelle de l'énergie</th>  
            <th> année</th>  
            <th> nombre de kilomètres</th>  
        </tr>
<?php 
for ($i=0; $i <count($lesdata) ; $i++) { 
echo '<td>'.$lesdata[$i]['md_libelle'].'</td>

<td>'.$lesdata[$i]['mq_libelle'].'</td>
<td>'.$lesdata[$i]['vh_immat'].'</td>
<td>'.$lesdata[$i]['ng_libelle'].'</td>
<td>'.$lesdata[$i]['vh_annee'].'</td>
<td>'.$lesdata[$i]['vh_km'].'</td>
<tr>
';
  
}

?>
    </table>