<!--piece of information-->
<!--date and doctor's information-->






<form class="form" method="Post"  action="index.php?uc=visiteurs&action=donTableau">


    <div class="form-group">
        <label for="inputState">Selectionnez médecin</label>
        <select id="inputState" class="form-control" name="medecin">
            <?php 
              foreach($lesMedecins as $leMedecin)
              {
               echo '<option value ='.$leMedecin["gsb_matricule"].'>'.$leMedecin["gsb_nom"]." ".$leMedecin["gsb_prenom"].'</option>' ;
              }
            ?>
      </select>
    </div>

    <div class="form-group">
        <label for="date">Insérer date</label>
        <input type="date" class="form-control" aria-describedby="date" placeholder="" name= "date" required >
    </div>

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