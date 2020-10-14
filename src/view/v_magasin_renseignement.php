

<form class="formGaetan" method="Post" action="index.php?uc=magasinier&action=renseignementTableau">
<center>
<h3>Renseignement de nouvelles sorties</h3>

    <div class="form-group">
        <label for="inputState">Selectionnez un visiteur</label>
        <select id="inputState" class="form-control" name="visiteur">
            <?php 
                foreach($visiteurs as $leVisiteur)
                {
                    echo '<option value ='.$leVisiteur["gsb_id"].'>'.$leVisiteur["gsb_nom"]." ".$leVisiteur["gsb_prenom"].'</option>' ;
                }
            ?>
      </select>
    </div>

    <div class="form-group">
        <label for="date">Insérer une date</label>
        <input type="date" class="form-control" aria-describedby="date" placeholder="" name= "date" required >
    </div>

  <button type="submit" class="btn btn-primary">Valider</button></center>
</form>