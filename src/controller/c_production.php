<?php
if (!isset($_REQUEST['action']))
	$action = "newLot" ;
else
	$action = $_REQUEST['action'] ;
	
switch ($action)
	{
	case "newLot" : { 
			//$nom = $_SESSION['nom'];
            //$prenom = $_SESSION['prenom']; 
            //require "view/v_dashboard.php";
            $lesMedocs = getMedicaments();
            require "view/v_nouveauLot.php";        
            break ;}  

    case "validationNewLot" : {
    	$laDate = $_REQUEST['laDate']." 00:00:00";
    	$leIDmedoc = $_REQUEST['medic'];
    	$leNbr = $_REQUEST['nbrEchantillon'];
    	require "includes/modele/gestion_bdd.php";
    	AjoutNewLot($laDate,$leIDmedoc,$leNbr);
    	echo "Bravo l'ajout de votre lot est valider";
		break;
	}
    case "consultLotMedicament" : {
    	$lesMedocs = getMedicaments();
		require "view/v_chooseMedicament.php";
		break;
	}
	case "AfficherLotMedicament" :{
		$leIDmedoc = $_REQUEST['medic'];
		echo $leIDmedoc;
		require "view/v_lotMedicament.php";
		break;
	}
	case ""
 
	}
	
?>