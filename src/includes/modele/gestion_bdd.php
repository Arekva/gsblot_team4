<?php
	//Modification d'un élève dans la BDD
	function test(){
		require "connectBdd.php";
		$sql = "select * from gsb_medecins";
		$exec=$bdd->prepare($sql) ;
        $exec->execute() ;
        $curseur=$exec->fetchAll();
        return $curseur;
	}
?>