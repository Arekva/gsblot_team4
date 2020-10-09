<?php
if (!isset($_REQUEST['action']))
	$action = "consultLotMedicament" ;
else
	$action = $_REQUEST['action'] ;
	
switch ($action)
	{
	case "consultLotMedicament" : {
            $lesMedocs = getMedicaments(); 
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom']; 
            $_SESSION['affichage'] = array("v_nouveauLot");     
            require "view/v_dashboard.php";
            break ;}  

    case "validationNewLot" : {
    	$nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        $lesMedocs = getMedicaments(); 
    	require "view/v_dashboard.php"; 
    	$laDate = $_REQUEST['laDate'];
    	$leIDmedoc = $_REQUEST['medic'];
    	$leNbr = $_REQUEST['nbrEchantillon'];
    	AjoutNewLot($laDate,$leIDmedoc,$leNbr);
    	
		break;
	}
    case "chooseMedicament" : {
    	$lesMedocs = getMedicaments();
    	$nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom']; 
    	$_SESSION['affichage'] = array("v_chooseMedicament");     
        require "view/v_dashboard.php";
		//require "view/v_chooseMedicament.php";
		break;
	}
	case "AfficherLotMedicament" :{
		$leIDmedoc = $_REQUEST['medic'];
		$lesLots = getLotMedicament($leIDmedoc);
		$nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom']; 
    	$_SESSION['affichage'] = array("v_lotMedicament");
    	require "view/v_dashboard.php";
    	//require "view/v_lotMedicament.php";
		break;
	}
	case "chooseDate" : {
		$nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom']; 
    	$_SESSION['affichage'] = array("v_chooseDate");     
        require "view/v_dashboard.php";
		//require "view/v_chooseDate.php";
		break;
	}
	case "AfficherLotDate" :{
		$dateDebut = $_REQUEST['dateDebut'];
		$dateFin = $_REQUEST['dateFin'];
		$lesLots = getLotDate($dateDebut,$dateFin);
		$nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom']; 
    	$_SESSION['affichage'] = array("v_lotDate");     
        require "view/v_dashboard.php";
		//require "view/v_lotDate.php";
		break;
	}
 
	}
	
?>