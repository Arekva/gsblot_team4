<form method = "POST" action ="index.php?uc=magasinier&action=consultationSortisDates" class="formGaetan">
<center>
<h3>Consultation des échantillons sortis</h3><br>
Date de sortie : 
    <input type="date" name="date" ></input><br><br>
    <button type="submit" class="btn btn-primary">Rechercher</button>
    </center>
</form>

<?php

    if(isset($date))
    {
        if($date == "aucun")
        {
            echo "Veuillez choisir une date.";
        }

        else
        {
            $lesMedocs = getEchantillonsSortisDate($date);

            if(count($lesMedocs) == 0)
            {
                echo "Aucun médicament sorti à cette date.";
            }

            else
            {

                ?>
                <table class="table table-striped">  
                    <th>Numéro du Lot</th>
                    <th>Numéro d'échantillon</th>
                    <th>Date de sortie de l'échantillon </th>
                    <th>Nom du visiteur</th>
                    <th>Prénom du visiteur</th>    
                </tr>
                <?php
                foreach($lesMedocs as $medoc) 
                {
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
    }
?>
