 <?php
 if(!isset($medocId) or  $medocId == "aucun")
    {
?>
<form method = "POST" action ="index.php?uc=magasinier&action=consultationSortisMedocs" class="formGaetan">
<center>
<h3>Consultation des échantillons sortis</h3><br>
Médicament : 
    <select name = "medicamentID">
    <option value = 'aucun'>-</option>
    <?php
        foreach($medicaments as $medoc) echo '<option value = "' . $medoc['id'] . '">' . $medoc['libelle'] . '</option>';
    ?>
    </select><br><br>
      <button class="btn btn-primary" type="submit">Rechercher</button> </center>
</form>

<?php
}?>

<?php
    if(isset($medocId))
    {
        if($medocId == "aucun")
        {
            echo "<script>alert(\"Veuillez saisir un médicament\")</script>";
        }

        else
        {
            $lesMedocs = getEchantillonsSortisMedocs($medocId);
            ?>
        <table class="table table-striped">  
            <th>Numéro du Lot</th>
            <th>Numéro d'échantillon</th>
            <th>Date de sortie de l'échantillon </th>
            <th>Nom du visiteur</th>
            <th>Prénom du visiteur</th>  
        </tr>
        <?php
            foreach($lesMedocs as $medoc) {
                echo '<td>'.$medoc['gsb_numeroLot'].'</td>
                <td>'.$medoc['gsb_numero'].'</td>
                <td>'.$medoc['dateSortie'].'</td>
	            <td>'.$medoc['gsb_nom'].'</td>
	            <td>'.$medoc['gsb_prenom'].'</td>
	            <tr>';

            }
            echo "</table>";
        }
        
    }
?>
