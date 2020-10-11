
<h1>Veuillez choisir les échantillons donner</h1>

<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">N°Lot</th>
      <th scope="col">Echantillon</th>
    </tr>
  </thead>
  <tbody>
    <?php

    foreach($lesDates as $laDate) {
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

<button type="button" class="btn btn-primary" onclick="window.history.back();">Retour</button>
