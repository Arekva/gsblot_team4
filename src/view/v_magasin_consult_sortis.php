<?php
include "view/v_magasin_choix.php";
?>
<h1>Consultation des échantillons sortis</h1>

<form method = "POST" action ="index.php?uc=magasinier&action=consultationSortis">
Médicament : 
    <select name = "medicamentID">
    <option value = 'aucun'>-</option>
    <?php
        foreach($medicaments as $medoc) echo '<option value = "' . $medoc['id'] . '">' . $medoc['libelle'] . '</option>';
    ?>
    </select>

Date de sortie : 
    <input type="date" name="dateSortie"></input>

Visiteur :
    <select name = "visiteurID">
    <option value = 'aucun'>-</option>
    <?php
        foreach($visiteurs as $visit) echo '<option value ="' . $visit['gsb_id'] . '">' . $visit['gsb_nom'] . ' ' . substr($visit['gsb_prenom'],0,1) . '.';
    ?>
    </select> 
    <button type="submit">Rechercher</button>
</form>


<?php
    if(isset($filtre))
    {
        foreach($filtre as $result)
        {
            echo $result['gsb_numero'] . '<br>';
        }
    }
?>
