<?php
	function test(){
		require "connectBdd.php";
		$sql = "select * from gsb_medecins";
		$exec=$bdd->prepare($sql) ;
        $exec->execute() ;
        $curseur=$exec->fetchAll();
        return $curseur;
	
	}

	/**
	 * Récupère un utilisateur selon un identifiant.
	 * @param username : nom d'utilisateur du compte
	 * @param pass : le mot de passe de du compte 
	 * @return tableau contenant id, autorisation, nom et prénom si correct; rien si ids incorrects
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





	/*					Consultation					*/

		///		Visiteur Medical

			/**
			 * Récupère les échantillon en fonction d'un médicament donné.
			 * @param libelleMedicament : libelle du medicament
			 * @return tableau : numero d'echantillon, numero de lot, date de sortie, date donnation, id du visiteur, matriculeMedecins
			*/
			function getEchantillonMedicament($libelleMedicament) {
				require "connectBdd.php";
				$sql = "SELECT gsb_echantillon.*
						FROM gsb_echantillon
						WHERE gsb_echantillon.gsb_numero 
						IN (SELECT gsb_lot.gsb_numero 
							FROM gsb_lot 
							INNER JOIN gsb_medicament 
							ON gsb_medicament.id = gsb_lot.gsb_idMedicament 
							WHERE libelle = ".$libelleMedicament.");";
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




		///		Production




		///		Magasin

	/*					FinConsulation					*/



?>