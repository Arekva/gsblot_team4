<form>
<h1>Tableau "Echantillon" du medecin <?php echo $medecin[0][0]." ".$medecin[0][1] ?></h1>
<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">N°Lot</th>
      <th scope="col">Echantillon</th>
    </tr>
  </thead>
  <tbody>
    <?php

    foreach($lesEchantillons as $leEchantillon) {
        echo "<tr>
                <th scope=\"row\">".$leEchantillon["numeroLot"]."</th>
                <td>".$leEchantillon["numero"]."</td>
              </tr> ";
    }       
    ?>
  </tbody>
</table>

<button type="button" class="btn btn-primary" onclick="window.history.back();">Retour</button>
<form>