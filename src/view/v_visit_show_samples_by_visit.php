<form class="form" method="Post"  action="index.php?uc=visiteurs&action=ConsulterParDateVisiteTab">

    <div class="form-group">
        <label for="inputState">Selectionnez une date de visite</label>
        <select id="inputState" class="form-control" name="date">
        <?php 
              foreach($lesDates as $laDate)
              {
               echo "<option value=\"".$laDate["dateDon"]."\">".$laDate["dateDon"]."</option>";
              }
            ?>
      </select>
    </div>

  <button type="submit" class="btn btn-primary">Valider</button>
</form>