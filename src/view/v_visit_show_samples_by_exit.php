<form class="form" method="Post"  action="index.php?uc=visiteurs&action=ConsulterParMedecinTab">

    <div class="form-group">
        <label for="inputState">Selectionnez un Medecin</label>
        <select id="inputState" class="form-control" name="matricule">
        <?php 
              foreach($lesMedecins as $leMedecin)
              {
               echo "<option value=\"".$leMedecin["matricule"]."\">".$leMedecin["nomMedecin"]." ".$leMedecin["prenomMedecin"]."</option>";
               
              }
            ?>
      </select>
    </div>

  <button type="submit" class="btn btn-primary">Valider</button>
</form>