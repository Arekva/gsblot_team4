<form class="form" method="Post"  action="index.php?uc=visiteurs&action=donTableau">

    <div class="form-group">
        <label for="inputState">Selectionnez une date de sortie</label>
        <select id="inputState" class="form-control" name="date">
        <?php 
              foreach($lesDates as $laDate)
              {
               echo "<option value=\"".$laDate["dateSortie"]."\">".$laDate["dateSortie"]."</option>";
              }
            ?>
      </select>
    </div>

  <button type="submit" class="btn btn-primary">Valider</button>
</form>