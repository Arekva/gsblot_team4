<?php
if (!isset($_REQUEST['action']))
	$action = "chooseMedicament" ;
else
	$action = $_REQUEST['action'] ;
	
switch ($action)
	{
	case "consultLotMedicament" : { 
			//$nom = $_SESSION['nom'];
            //$prenom = $_SESSION['prenom']; 
            //require "view/v_dashboard.php";
            $lesMedocs = getMedicaments();
            require "view/v_nouveauLot.php";        
            break ;}  

    case "validationNewLot" : {
    	$laDate = $_REQUEST['laDate'];
    	$leIDmedoc = $_REQUEST['medic'];
    	$leNbr = $_REQUEST['nbrEchantillon'];
    	AjoutNewLot($laDate,$leIDmedoc,$leNbr);
    	echo "Bravo l'ajout de votre lot est validé";
		break;
	}
    case "chooseMedicament" : {
    	$lesMedocs = getMedicaments();
		require "view/v_chooseMedicament.php";
		break;
	}
	case "AfficherLotMedicament" :{
		$leIDmedoc = $_REQUEST['medic'];
		$lesLots = getLotMedicament($leIDmedoc);
		require "view/v_lotMedicament.php";
		break;
	}
	case "chooseDate" : {
		require "view/v_chooseDate.php";
		break;
	}
	case "AfficherLotDate" :{
		$dateDebut = $_REQUEST['dateDebut'];
		$dateFin = $_REQUEST['dateFin'];
		$lesLots = getLotDate($dateDebut,$dateFin);
		require "view/v_lotDate.php";
		break;
	}
 
	}
	
?>