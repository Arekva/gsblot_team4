<?php
	function getLotDate($dateDebut,$dateFin){
		require "connectBdd.php";
		$sql = 'select gsb_lot.gsb_numero, gsb_dateFabrication, libelle, count(*) as nbEchantillon 
		from gsb_lot 
        inner join gsb_medicament on gsb_medicament.id = gsb_lot.gsb_idMedicament 
        inner join gsb_echantillon on gsb_echantillon.gsb_numeroLot = gsb_lot.gsb_numero 
		Where gsb_dateFabrication BETWEEN "'.$dateDebut.'" and "'.$dateFin.'"  
        GROUP by gsb_numero, gsb_dateFabrication, libelle';
		$exec=$bdd->prepare($sql) ;
        $exec->execute() ;
        $curseur = $exec->fetchAll();
        return $curseur;
		}
		
	function getLesVisiteurs() {
		require "connectBdd.php";
		$sql = "SELECT * FROM gsb_visitualisateur WHERE gsb_autorisation = 3";
		$exec=$bdd->prepare($sql) ;
        $exec->execute() ;
        $curseur = $exec->fetchAll();
        return $curseur;
	}


	function getLotMedicament($medicamentId){
		require "connectBdd.php";
		$sql = 'select gsb_lot.gsb_numero,gsb_dateFabrication, count(*) as nbEchantillon
		from gsb_lot
        inner join gsb_echantillon on gsb_echantillon.gsb_numeroLot = gsb_lot.gsb_numero
		Where gsb_idMedicament = '.$medicamentId.' 
        group by gsb_lot.gsb_numero,gsb_dateFabrication';
		$exec=$bdd->prepare($sql) ;
        $exec->execute() ;
        $curseur = $exec->fetchAll();
        return $curseur;
    	}



	function AjoutNewLot($doute,$medocID,$nbEchantillon){
		require "connectBdd.php";
		//insertion du nouveau lot
		$sql = 'insert into gsb_lot (gsb_dateFabrication,gsb_idMedicament)
		VALUES ("'.$doute.'",'.$medocID.')';
		$exec=$bdd->prepare($sql) ;
        $exec->execute() ;

        //récupération du numero du dernier lot
		$sql = 'select max(gsb_numero) from gsb_lot';
		$exec=$bdd->prepare($sql) ;
        $exec->execute() ;
        $curseur = $exec->fetch();
        
        //ajout des échantillons
        for ($i=1; $i < $nbEchantillon+1; $i++) { 
        	$sql = 'insert into gsb_echantillon (gsb_numero, gsb_numeroLot)
			VALUES ('.$i.','.$curseur[0].')';
			$exec=$bdd->prepare($sql) ;
        	$exec->execute() ;
        }
		
	}

	function ajoutSortie($idVisitualisateur, $nomMedecin, $prenomMedecin, $numEchantillion, $numLot)
	{
		require "connectionBdd.php";

		$sql = 
		"UPDATE gsb_echantillon SET dateSortie = ':date', gsb_idVisitualisateur = 
		:idUser, gsb_matriculeMedecins = ':matMedecin' WHERE gsb_numero = :numEch AND gsb_numeroLot = :numLot";

		$exec=$bdd->prepare($sql);
		$exec->bindParam('date', date("Y-m-d H:i:s"));
		$exec->bindParam('idUser', $idVisitualisateur);

		$exec->bindParam('matMedecin', getMedecin($nomMedecin, $prenomMedecin));

		$exec->bindParam('numEch', $numEchantillion);
		$exec->bindParam('numLot', $numLot);

		$exec->execute();
	}

	function getMedecin($nom, $prenom)
	{
		require_once "connectionBdd.php";

		$sql = 
		"SELECT * FROM gsb_medecins WHERE LOWER(gsb_nom) = LOWER(':nom') 
		AND LOWER(gsb_prenom) = LOWER(':prenom')";

		$exec=$bdd->prepare($sql);
		$exec->bindParam("nom", $nom);
		$exec->bindParam("prenom", $prenom);
		$exec->execute();
		return $exec->fetchAll();
	}

	function setSortis($date, $codeVisiteur, $idLot, $idEchantillion) {
		require "connectBdd.php";
		$sql = "UPDATE gsb_echantillon
				SET dateSortie = \"".$date."\", gsb_idVisitualisateur = \"".$codeVisiteur."\"
				WHERE gsb_numero = $idEchantillion
				AND gsb_numeroLot = $idLot ";
		$exec=$bdd->prepare($sql);
		
		$exec->execute();

	}

	/**
	 * Récupère un utilisateur selon un identifiant.
	 * @param username : nom d'utilisateur du compte
	 * @param pass : le mot de passe de du compte 
	 * @return curseur : tableau contenant id, autorisation, nom et prénom si correct; rien si ids incorrects
	*/
	function getUser($username, $pass) {
		require "connectBdd.php";

		$sql = 
		"SELECT gsb_id, gsb_autorisation, gsb_nom, gsb_prenom 
		FROM gsb_visitualisateur 
		WHERE gsb_login = :username AND gsb_mdp = :pass";

		$exec=$bdd->prepare($sql);
		$exec->bindParam('username', $username);
		$exec->bindParam('pass', $pass);
		$exec->execute();
		$curseur=$exec->fetchAll();
		return $curseur;
	}

	/**
	 * Récupère tous les échantillions disponibles.
	 * @return curseur : tableau 2D contenant tous les échantillions non donnés.
	 */
	function getEchantillonsEnStock() {
		require "connectBdd.php";

		$sql = "SELECT gsb_echantillon.*, gsb_medicament.libelle FROM gsb_echantillon 
		INNER JOIN gsb_lot ON gsb_lot.gsb_numero = gsb_echantillon.gsb_numeroLot
		INNER JOIN gsb_medicament ON gsb_medicament.id = gsb_lot.gsb_idMedicament
		WHERE dateSortie IS NULL";

		$exec = $bdd->prepare($sql);
		$exec->execute();
		$curseur = $exec->fetchAll();
		return $curseur;
	}

	function getEchantillonsSortisMedocs($idMedoc) {
		require "connectBdd.php";

		$sql = "SELECT gsb_echantillon.*, gsb_visitualisateur.* FROM gsb_echantillon INNER JOIN gsb_lot 
		ON gsb_lot.gsb_numero = gsb_echantillon.gsb_numeroLot INNER JOIN gsb_visitualisateur 
		ON gsb_visitualisateur.gsb_id = gsb_echantillon.gsb_idVisitualisateur 
		WHERE gsb_lot.gsb_idMedicament = :id AND gsb_echantillon.dateSortie IS NOT NULL";

		$exec = $bdd->prepare($sql);
		$exec->bindParam('id', $idMedoc);
		$exec->execute();
		$curseur = $exec->fetchAll();
		return $curseur;
	}
	function getEchantillonsSortisDate($date) {
		require "connectBdd.php";

		$sql = "SELECT gsb_echantillon.*, gsb_visitualisateur.* FROM gsb_echantillon INNER JOIN gsb_lot 
		ON gsb_lot.gsb_numero = gsb_echantillon.gsb_numeroLot INNER JOIN gsb_visitualisateur 
		ON gsb_visitualisateur.gsb_id = gsb_echantillon.gsb_idVisitualisateur 
		WHERE gsb_echantillon.dateSortie = :dateSortie AND gsb_echantillon.dateSortie IS NOT NULL";

		$exec = $bdd->prepare($sql);
		$exec->bindParam('dateSortie', $date);
		$exec->execute();
		$curseur = $exec->fetchAll();
		return $curseur;
	}

	function getEchantillonsSortisVisiteur($nom, $prenom) {
		require "connectBdd.php";

		$sql = 'SELECT gsb_echantillon.*, gsb_visitualisateur.* FROM gsb_echantillon INNER JOIN gsb_lot 
		ON gsb_lot.gsb_numero = gsb_echantillon.gsb_numeroLot INNER JOIN gsb_visitualisateur 
		ON gsb_visitualisateur.gsb_id = gsb_echantillon.gsb_idVisitualisateur
		WHERE gsb_visitualisateur.gsb_nom = "'.$nom.'" AND gsb_visitualisateur.gsb_prenom = "'.$prenom.'" AND gsb_echantillon.dateSortie IS NOT NULL';

		$exec = $bdd->prepare($sql);
		$exec->execute();
		$curseur = $exec->fetchAll();
		return $curseur;
	}

	/**
	 * Recupère tous les échantillions selon un médicament, date de sortie et visiteur
	 * @param medicamentId : Identifiant du médicament
	 * @param dateSortie : date the sortie du médicement
	 * @param visiteurId : identifiant de l'utilisateur
	 * @return curseur : tous les échantillons correspondants à la recherche. 
	 */
	function getEchantillonsSortis($medicamentId, $dateSortie, $visiteurId) {
		require "connectBdd.php";

		$sql = "SELECT gsb_echantillon.gsb_numero, gsb_lot.gsb_numero, gsb_medicament.libelle, gsb_visitualisateur.gsb_nom, gsb_visitualisateur.gsb_prenom
				FROM gsb_lot 
				INNER JOIN gsb_echantillon ON gsb_echantillon.gsb_numeroLot = gsb_lot.gsb_numero
				INNER JOIN gsb_medicament ON gsb_medicament.id = gsb_lot.gsb_idMedicament
				INNER JOIN gsb_visitualisateur ON gsb_visitualisateur.gsb_id = gsb_echantillon.gsb_idVisitualisateur
				WHERE " .
				($medicamentId == "aucun" ? "1 " : "gsb_medicament.libelle = ':medicament' ") . 
				"AND " . ($dateSortie == '' ? "1 " : "gsb_echantillon.dateSortie LIKE ':date' ") .
				"AND " . ($visiteurId == "aucun" ? "1 " : "gsb_visitualisateur.gsb_nom = ':visiteur' ") . "
				ORDER BY gsb_echantillon.gsb_numero, gsb_lot.gsb_numero";
				
		$exec = $bdd->prepare($sql);
		$exec->bindParam('medicament', $medicamentId);
		$exec->bindParam('date', $dateSortie);
		$exec->bindParam('visiteur', $visiteurId);

		$exec->execute();
		$curseur=$exec->fetchAll();
		return $curseur;
	}
	
	function getMedicaments() {
		require "connectBdd.php";

		$sql = 
		"select * FROM gsb_medicament";

		$exec = $bdd->prepare($sql);
		$exec->execute();
		$curseur = $exec->fetchAll();
		return $curseur;
	}

	function getNombreMedicaments() {
		require "connectBdd.php";

		$sql =
		"SELECT libelle, COUNT(*) as nombre FROM gsb_medicament INNER JOIN gsb_lot ON gsb_lot.gsb_idMedicament = gsb_medicament.id INNER JOIN gsb_echantillon ON gsb_echantillon.gsb_numeroLot = gsb_lot.gsb_numero
		WHERE gsb_echantillon.dateSortie IS NULL
		GROUP BY gsb_medicament.id";

		$exec = $bdd->prepare($sql);
		$exec->execute();
		$curseur = $exec->fetchAll();
		return $curseur;
	}



	/*					Consultation					*/

		///		Visiteur Medical

			/**
			 * Récupère les échantillon en fonction d'un médicament donné.
			 * @param libelleMedicament : libelle du medicament
			 * @return tableau : numero d'echantillon, numero de lot, date de sortie, date donnation, id du visiteur, matriculeMedecins
			*/
			function getEchantillonMedicament($libelleMedicament) {
				require "connectBdd.php";
				$sql = "SELECT *
						FROM gsb_echantillon
						WHERE gsb_echantillon.gsb_numero 
						IN (SELECT gsb_lot.gsb_numero 
							FROM gsb_lot 
							INNER JOIN gsb_medicament 
							ON gsb_medicament.id = gsb_lot.gsb_idMedicament 
							WHERE libelle = '".$libelleMedicament."');";
				$exec=$bdd->prepare($sql);
				$exec->execute();
				$curseur=$exec->fetchAll();
				return $curseur;
			}

			/**
			 * Récupère les échantillon en fonction d'une date donné.
			 * @param dateVisite : Date de visite chez le médecin à qui l'échantillon a été laissé
			 * @return tableau : numero d'echantillon, numero de lot, date de sortie, date donnation, id du visiteur, matriculeMedecins
			*/
			function getEchantillonDate($dateVisite) {
				require "connectBdd.php";
				$sql = "SELECT gsb_echantillon.*
						FROM gsb_echantillon
						WHERE gsb_echantillon.dateDon = ".$DateVisite.";";
				$exec=$bdd->prepare($sql);
				$exec->execute();
				$curseur=$exec->fetchAll();
				return $curseur;

			}

			/**
			 * Récupère les échantillon en fonction d'un médicament donné.
			 * @param nom : nom d'un medecin
			 * @param prenom : prenom d'un medecin
			 * @return tableau : numero d'echantillon, numero de lot, date de sortie, date donnation, id du visiteur, matriculeMedecins
			*/	
			function getEchantillonMedecin($nom,$prenom) {
				require "connectBdd.php";
				$sql = "SELECT gsb_echantillon.*
						FROM gsb_echantillon
						INNER JOIN gsb_medecins
						ON gsb_medecins.gsb_matricule = gsb_echantillon.gsb_matriculeMedecins
						WHERE gsb_medecins.gsb_nom = ".$nom." AND gsb_medecins.gsb_prenom = ".$prenom.";";			
				$exec=$bdd->prepare($sql);
				$exec->execute();
				$curseur=$exec->fetchAll();
				return $curseur;
			}

			function getLesMedecins() {
				require "connectBdd.php";
				$sql = "SELECT gsb_matricule, gsb_nom, gsb_prenom
						FROM gsb_medecins;";
				$exec=$bdd->prepare($sql);
				$exec->execute();
				$curseur=$exec->fetchAll();
				return $curseur;
			}

			function getVisiteurEchantillonDispo($idVisit,$idMedicament){
				require "connectBdd.php";
				$sql = "SELECT * from gsb_echantillon
				inner join gsb_lot on gsb_lot.gsb_numero = gsb_echantillon.gsb_numeroLot
				where dateDon is null and gsb_idvisitualisateur =".$idVisit." AND gsb_idMedicament =".$idMedicament."" ;
				$exec=$bdd->prepare($sql);
				$exec->execute();
				$curseur=$exec->fetchAll();
				return $curseur;
			}

			function setDonnation($date,$codeMedecin,$idLot,$idEchantillion) {
				require "connectBdd.php";
				$sql = "UPDATE gsb_echantillon
						SET dateDon = \"".$date."\", gsb_matriculeMedecins = \"".$codeMedecin."\"
						WHERE gsb_numero = $idEchantillion
						AND gsb_numeroLot = $idLot ";
				$exec=$bdd->prepare($sql);
				
				$exec->execute();

			}







			function getDateDonEchantillon(){
				require "connectBdd.php";
				$sql = "
				SELECT DISTINCT gsb_echantillon.dateDon
				FROM gsb_echantillon
				WHERE gsb_echantillon.dateDon IS NOT NULL;
				";
				$exec=$bdd->prepare($sql);
				$exec->execute();
				$curseur=$exec->fetchAll();
				return $curseur;

			}

			function getEchantillonParDateDon($date){
				require "connectBdd.php";
				$sql = "
				SELECT gsb_echantillon.gsb_numero as numero, gsb_echantillon.gsb_numeroLot as numeroLot, gsb_medecins.gsb_nom as nomMedecin, gsb_medecins.gsb_prenom as prenomMedecin
				FROM gsb_echantillon 
				INNER JOIN gsb_medecins
				ON gsb_medecins.gsb_matricule = gsb_echantillon.gsb_matriculeMedecins
				WHERE gsb_echantillon.dateDon = '$date'
				ORDER BY numero,numeroLot;
				";
				$exec=$bdd->prepare($sql);
				$exec->execute();
				$curseur=$exec->fetchAll();
				return $curseur;

			}





			function getMedecinEchantillon(){
				require "connectBdd.php";
				$sql = "
				SELECT DISTINCT gsb_echantillon.gsb_matriculeMedecins as matricule, gsb_medecins.gsb_nom as nomMedecin, gsb_medecins.gsb_prenom as prenomMedecin
				FROM gsb_echantillon 
				INNER JOIN gsb_medecins
				ON gsb_medecins.gsb_matricule =gsb_echantillon.gsb_matriculeMedecins
				";
				$exec=$bdd->prepare($sql);
				$exec->execute();
				$curseur=$exec->fetchAll();
				return $curseur;

			}

			function getEchantillonParMedecin($matricule){
				require "connectBdd.php";
				$sql = "
				SELECT gsb_echantillon.gsb_numero as numero, gsb_echantillon.gsb_numeroLot as numeroLot
				FROM gsb_echantillon 
				WHERE gsb_echantillon.gsb_matriculeMedecins = '$matricule'
				ORDER BY numero,numeroLot
				";
				$exec=$bdd->prepare($sql);
				$exec->execute();
				$curseur=$exec->fetchAll();
				return $curseur;

			}

			function getUnMedecin($matricule){
				require "connectBdd.php";
				$sql = "
				SELECT gsb_medecins.gsb_nom as nomMedecin, gsb_medecins.gsb_prenom as prenomMedecin
				FROM gsb_medecins
				WHERE gsb_medecins.gsb_matricule = '$matricule'
				";
				$exec=$bdd->prepare($sql);
				$exec->execute();
				$curseur=$exec->fetchAll();
				return $curseur;
			}
			/*SELECT gsb_echantillon.gsb_numero as numero, gsb_echantillon.gsb_numeroLot as numeroLot, gsb_medecins.gsb_nom as nomMedecin, gsb_medecins.gsb_prenom as prenomMedecin
FROM gsb_echantillon 
INNER JOIN gsb_medecins
ON gsb_medecins.gsb_matricule = gsb_echantillon.gsb_matriculeMedecins
ORDER BY numero,numeroLot*/
?>