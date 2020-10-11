<form class="form" method="Post"  action="index.php?uc=visiteurs&action=donTableau">

    <div class="form-group">
        <label for="inputState">Selectionnez médicament</label>
        <select id="inputState" class="form-control" name="medicament">
        <?php 
              foreach($lesMedicaments as $leMedicament)
              {
               echo "<option value=\"".$leMedicament["id"]."\">".$leMedicament["libelle"]."</option>";
              }
            ?>
      </select>
    </div>

  <button type="submit" class="btn btn-primary">Valider</button>
</form>