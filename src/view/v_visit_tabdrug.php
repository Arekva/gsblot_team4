<form>
<h1>Echantillon du medicament <?php echo""?></h1>

<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">N°Lot</th>
      <th scope="col">Echantillon</th>
    </tr>
  </thead>
  <tbody>
    <?php

    foreach($ADonner as $leDonner) {
        echo "<tr>
                <th scope=\"row\">".$leDonner["gsb_numeroLot"]."</th>
                <td>".$leDonner[0]."</td>
              </tr> ";
    }       
    ?>
    <tr>
  </tbody>
</table>

<button type="button" class="btn btn-primary" onclick="window.history.back();">Annuler</button>
</form>