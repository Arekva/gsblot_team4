<?php
	function getLotDate($dateDebut,$dateFin){
		require "connectBdd.php";
		$sql = 'select  GSB_LOT.gsb_numero, gsb_dateFabrication, libelle, count(*) as nbEchantillon 
		from GSB_LOT 
        inner join GSB_MEDICAMENT on GSB_MEDICAMENT.id = GSB_LOT.gsb_idMedicament 
        inner join GSB_ECHANTILLON on GSB_ECHANTILLON.gsb_numeroLot = GSB_LOT.gsb_numero 
		Where gsb_dateFabrication BETWEEN "'.$dateDebut.'" and "'.$dateFin.'"  
        GROUP by gsb_numero, gsb_dateFabrication, libelle';
		$exec=$bdd->prepare($sql) ;
        $exec->execute() ;
        $curseur = $exec->fetchAll();
        return $curseur;
		}
		
	function getLesVisiteurs() {
		require "connectBdd.php";
		$sql = "SELECT * FROM GSB_VISITUALISATEUR WHERE gsb_autorisation = 3";
		$exec=$bdd->prepare($sql) ;
        $exec->execute() ;
        $curseur = $exec->fetchAll();
        return $curseur;
	}


	function getLotMedicament($medicamentId){
		require "connectBdd.php";
		$sql = 'select GSB_LOT.gsb_numero,gsb_dateFabrication, count(*) as nbEchantillon
		from GSB_LOT
        inner join GSB_ECHANTILLON on GSB_ECHANTILLON.gsb_numeroLot = GSB_LOT.gsb_numero
		Where gsb_idMedicament = '.$medicamentId.' 
        group by GSB_LOT.gsb_numero,gsb_dateFabrication';
		$exec=$bdd->prepare($sql) ;
        $exec->execute() ;
        $curseur = $exec->fetchAll();
        return $curseur;
    	}



	function AjoutNewLot($doute,$medocID,$nbEchantillon){
		require "connectBdd.php";
		$sql = 'insert into GSB_LOT (gsb_dateFabrication,gsb_idMedicament)
		VALUES ("'.$doute.'",'.$medocID.')';
		$exec=$bdd->prepare($sql) ;
        $exec->execute() ;

		$sql = 'select max(gsb_numero) from GSB_LOT';
		$exec=$bdd->prepare($sql) ;
        $exec->execute() ;
        $curseur = $exec->fetchAll();
        
        for ($i=1; $i < $nbEchantillon+1; $i++) { 
        	$sql = 'insert into GSB_ECHANTILLON (gsb_numero, gsb_numeroLot)
			VALUES ('.$i.','.$curseur[0][0].')';
			$exec=$bdd->prepare($sql) ;
        	$exec->execute() ;
        }
		
	}

	function ajoutSortie($idVisitualisateur, $nomMedecin, $prenomMedecin, $numEchantillion, $numLot)
	{
		require "connectionBdd.php";

		$sql = 
		"UPDATE GSB_ECHANTILLON SET dateSortie = ':date', gsb_idVisitualisateur = 
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
		"SELECT * FROM GSB_MEDECINS WHERE LOWER(gsb_nom) = LOWER(':nom') 
		AND LOWER(gsb_prenom) = LOWER(':prenom')";

		$exec=$bdd->prepare($sql);
		$exec->bindParam("nom", $nom);
		$exec->bindParam("prenom", $prenom);
		$exec->execute();
		return $exec->fetchAll();
	}

	function setSortis($date, $codeVisiteur, $idLot, $idEchantillion) {
		require "connectBdd.php";
		$sql = "UPDATE GSB_ECHANTILLON
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

		$sql = "SELECT GSB_ECHANTILLON.*, GSB_MEDICAMENT.libelle FROM GSB_ECHANTILLON 
		INNER JOIN GSB_LOT ON GSB_LOT.gsb_numero = GSB_ECHANTILLON.gsb_numeroLot
		INNER JOIN GSB_MEDICAMENT ON GSB_MEDICAMENT.id = GSB_LOT.gsb_idMedicament
		WHERE dateSortie IS NULL";

		$exec = $bdd->prepare($sql);
		$exec->execute();
		$curseur = $exec->fetchAll();
		return $curseur;
	}

	function getEchantillonsSortisMedocs($idMedoc) {
		require "connectBdd.php";

		$sql = "SELECT GSB_ECHANTILLON.*, GSB_VISITUALISATEUR.* FROM GSB_ECHANTILLON INNER JOIN GSB_LOT 
		ON GSB_LOT.gsb_numero = GSB_ECHANTILLON.gsb_numeroLot INNER JOIN GSB_VISITUALISATEUR 
		ON GSB_VISITUALISATEUR.gsb_id = GSB_ECHANTILLON.gsb_idVisitualisateur 
		WHERE GSB_LOT.gsb_idMedicament = :id AND GSB_ECHANTILLON.dateSortie IS NOT NULL";

		$exec = $bdd->prepare($sql);
		$exec->bindParam('id', $idMedoc);
		$exec->execute();
		$curseur = $exec->fetchAll();
		return $curseur;
	}
	function getEchantillonsSortisDate($date) {
		require "connectBdd.php";

		$sql = "SELECT GSB_ECHANTILLON.*, GSB_VISITUALISATEUR.* FROM GSB_ECHANTILLON INNER JOIN GSB_LOT 
		ON GSB_LOT.gsb_numero = GSB_ECHANTILLON.gsb_numeroLot INNER JOIN GSB_VISITUALISATEUR 
		ON GSB_VISITUALISATEUR.gsb_id = GSB_ECHANTILLON.gsb_idVisitualisateur 
		WHERE GSB_ECHANTILLON.dateSortie = :dateSortie AND GSB_ECHANTILLON.dateSortie IS NOT NULL";

		$exec = $bdd->prepare($sql);
		$exec->bindParam('dateSortie', $date);
		$exec->execute();
		$curseur = $exec->fetchAll();
		return $curseur;
	}

	function getEchantillonsSortisVisiteur($nom, $prenom) {
		require "connectBdd.php";

		$sql = 'SELECT GSB_ECHANTILLON.*, GSB_VISITUALISATEUR.* FROM GSB_ECHANTILLON INNER JOIN GSB_LOT 
		ON GSB_LOT.gsb_numero = GSB_ECHANTILLON.gsb_numeroLot INNER JOIN GSB_VISITUALISATEUR 
		ON GSB_VISITUALISATEUR.gsb_id = GSB_ECHANTILLON.gsb_idVisitualisateur
		WHERE GSB_VISITUALISATEUR.gsb_nom = "'.$nom.'" AND GSB_VISITUALISATEUR.gsb_prenom = "'.$prenom.'" AND GSB_ECHANTILLON.dateSortie IS NOT NULL';

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

		$sql = "SELECT GSB_ECHANTILLON.gsb_numero, GSB_LOT.gsb_numero, GSB_MEDICAMENT.libelle, GSB_VISITUALISATEUR.gsb_nom, GSB_VISITUALISATEUR.gsb_prenom
				FROM GSB_LOT 
				INNER JOIN GSB_ECHANTILLON ON GSB_ECHANTILLON.gsb_numeroLot = GSB_LOT.gsb_numero
				INNER JOIN GSB_MEDICAMENT ON GSB_MEDICAMENT.id = GSB_LOT.gsb_idMedicament
				INNER JOIN GSB_VISITUALISATEUR ON GSB_VISITUALISATEUR.gsb_id = GSB_ECHANTILLON.gsb_idVisitualisateur
				WHERE " .
				($medicamentId == "aucun" ? "1 " : "GSB_MEDICAMENT.libelle = ':medicament' ") . 
				"AND " . ($dateSortie == '' ? "1 " : "GSB_ECHANTILLON.dateSortie LIKE ':date' ") .
				"AND " . ($visiteurId == "aucun" ? "1 " : "GSB_VISITUALISATEUR.gsb_nom = ':visiteur' ") . "
				ORDER BY GSB_ECHANTILLON.gsb_numero, GSB_LOT.gsb_numero";
				
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
		"SELECT libelle, COUNT(*) as nombre FROM GSB_MEDICAMENT INNER JOIN GSB_LOT ON GSB_LOT.gsb_idMedicament = GSB_MEDICAMENT.id INNER JOIN GSB_ECHANTILLON ON GSB_ECHANTILLON.gsb_numeroLot = GSB_LOT.gsb_numero
		WHERE GSB_ECHANTILLON.dateSortie IS NULL
		GROUP BY GSB_MEDICAMENT.id";

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
						FROM GSB_ECHANTILLON
						WHERE GSB_ECHANTILLON.gsb_numero 
						IN (SELECT GSB_LOT.gsb_numero 
							FROM GSB_LOT 
							INNER JOIN GSB_MEDICAMENT 
							ON GSB_MEDICAMENT.id = GSB_LOT.gsb_idMedicament 
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
				$sql = "SELECT GSB_ECHANTILLON.*
						FROM GSB_ECHANTILLON
						WHERE GSB_ECHANTILLON.dateDon = ".$DateVisite.";";
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
				$sql = "SELECT GSB_ECHANTILLON.*
						FROM GSB_ECHANTILLON
						INNER JOIN GSB_MEDECINS
						ON GSB_MEDECINS.gsb_matricule = GSB_ECHANTILLON.gsb_matriculeMedecins
						WHERE GSB_MEDECINS.gsb_nom = ".$nom." AND GSB_MEDECINS.gsb_prenom = ".$prenom.";";			
				$exec=$bdd->prepare($sql);
				$exec->execute();
				$curseur=$exec->fetchAll();
				return $curseur;
			}

			function getLesMedecins() {
				require "connectBdd.php";
				$sql = "SELECT gsb_matricule, gsb_nom, gsb_prenom
						FROM GSB_MEDECINS;";
				$exec=$bdd->prepare($sql);
				$exec->execute();
				$curseur=$exec->fetchAll();
				return $curseur;
			}

			function getVisiteurEchantillonDispo($idVisit,$idMedicament){
				require "connectBdd.php";
				$sql = "SELECT * from GSB_ECHANTILLON
				inner join GSB_LOT on GSB_LOT.gsb_numero = GSB_ECHANTILLON.gsb_numeroLot
				where dateDon is null and gsb_idvisitualisateur =".$idVisit." AND gsb_idMedicament =".$idMedicament."" ;
				$exec=$bdd->prepare($sql);
				$exec->execute();
				$curseur=$exec->fetchAll();
				return $curseur;
			}

			function setDonnation($date,$codeMedecin,$idLot,$idEchantillion) {
				require "connectBdd.php";
				$sql = "UPDATE GSB_ECHANTILLON
						SET dateDon = \"".$date."\", gsb_matriculeMedecins = \"".$codeMedecin."\"
						WHERE gsb_numero = $idEchantillion
						AND gsb_numeroLot = $idLot ";
				$exec=$bdd->prepare($sql);
				
				$exec->execute();

			}







			function getDateDonEchantillon(){
				require "connectBdd.php";
				$sql = "
				SELECT DISTINCT GSB_ECHANTILLON.dateDon
				FROM GSB_ECHANTILLON
				WHERE GSB_ECHANTILLON.dateDon IS NOT NULL;
				";
				$exec=$bdd->prepare($sql);
				$exec->execute();
				$curseur=$exec->fetchAll();
				return $curseur;

			}

			function getEchantillonParDateDon($date){
				require "connectBdd.php";
				$sql = "
				SELECT GSB_ECHANTILLON.gsb_numero as numero, GSB_ECHANTILLON.gsb_numeroLot as numeroLot, GSB_MEDECINS.gsb_nom as nomMedecin, GSB_MEDECINS.gsb_prenom as prenomMedecin
				FROM GSB_ECHANTILLON 
				INNER JOIN GSB_MEDECINS
				ON GSB_MEDECINS.gsb_matricule = GSB_ECHANTILLON.gsb_matriculeMedecins
				WHERE GSB_ECHANTILLON.dateDon = '$date'
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
				SELECT DISTINCT GSB_ECHANTILLON.gsb_matriculeMedecins as matricule, GSB_MEDECINS.gsb_nom as nomMedecin, GSB_MEDECINS.gsb_prenom as prenomMedecin
				FROM GSB_ECHANTILLON 
				INNER JOIN GSB_MEDECINS
				ON GSB_MEDECINS.gsb_matricule =GSB_ECHANTILLON.gsb_matriculeMedecins
				";
				$exec=$bdd->prepare($sql);
				$exec->execute();
				$curseur=$exec->fetchAll();
				return $curseur;

			}

			function getEchantillonParMedecin($matricule){
				require "connectBdd.php";
				$sql = "
				SELECT GSB_ECHANTILLON.gsb_numero as numero, GSB_ECHANTILLON.gsb_numeroLot as numeroLot
				FROM GSB_ECHANTILLON 
				WHERE GSB_ECHANTILLON.gsb_matriculeMedecins = '$matricule'
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
				SELECT GSB_MEDECINS.gsb_nom as nomMedecin, GSB_MEDECINS.gsb_prenom as prenomMedecin
				FROM GSB_MEDECINS
				WHERE GSB_MEDECINS.gsb_matricule = '$matricule'
				";
				$exec=$bdd->prepare($sql);
				$exec->execute();
				$curseur=$exec->fetchAll();
				return $curseur;
			}
			/*SELECT GSB_ECHANTILLON.gsb_numero as numero, GSB_ECHANTILLON.gsb_numeroLot as numeroLot, GSB_MEDECINS.gsb_nom as nomMedecin, GSB_MEDECINS.gsb_prenom as prenomMedecin
FROM GSB_ECHANTILLON 
INNER JOIN GSB_MEDECINS
ON GSB_MEDECINS.gsb_matricule = GSB_ECHANTILLON.gsb_matriculeMedecins
ORDER BY numero,numeroLot*/
?>