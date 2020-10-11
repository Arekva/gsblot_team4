<form>
<h1>Tableau "Echantillon sortie" du <?php echo $date?></h1>
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
                <th scope=\"row\">".$laDate["numeroLot"]."</th>
                <td>".$laDate["numero"]."</td>
              </tr> ";
    }       
    ?>
    <tr>
  </tbody>
</table>

<button type="button" class="btn btn-primary" onclick="window.history.back();">Retour</button>
<form>