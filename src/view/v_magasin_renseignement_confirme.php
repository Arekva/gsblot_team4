<div style="overflow-y: scroll;max-height: 90vh;">
<form  method="Post"  action="index.php?uc=magasinier&action=validationSortis">
<h1>Veuillez choisir les échantillons sortir</h1>

<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">N°Lot</th>
      <th scope="col">Echantillon</th>
      <th scope="col">Sortir ?</th>
    </tr>
  </thead>
  <tbody>
    <?php

    foreach($ADonner as $leDonner) {
        echo "<tr>
                <th scope=\"row\">".$leDonner["gsb_numeroLot"]."</th>
                <td>".$leDonner[0]."</td>
                <td>
                    <input type=\"checkbox\" value=\"".$leDonner[0]."\" name=\"".$leDonner[0]."_".$leDonner["gsb_numeroLot"]."\">
                </td>
              </tr> ";
    }       
    ?>
    <tr>
  </tbody>
</table>
<input type="hidden" value=<?php echo "\"$visiteur\"" ?> name="visiteur">
<input type="hidden" value=<?php echo "\"$date\"" ?> name="date"> 


<button type="submit" class="btn btn-primary">Valider</button>
<button type="button" class="btn btn-primary" onclick="window.history.back();">Annuler</button>
</form>
</div>