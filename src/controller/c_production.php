<?php
if (!isset($_REQUEST['action']))
	$action = "consultLotMedicament" ;
else
	$action = $_REQUEST['action'] ;
	
switch ($action)
	{
	case "consultLotMedicament" : {

            //récupération des médicaments
            $lesMedocs = getMedicaments(); 

            //données nécéssaires pour le dashboard
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom']; 

            //affichage
            $_SESSION['affichage'] = array("v_nouveauLot");     
            require "view/v_dashboard.php";
            break ;}  

    case "validationNewLot" : {
        //données d'affichage
    	$nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        $lesMedocs = getMedicaments(); 
    	require "view/v_dashboard.php";

        // Recuperations des données du formulaires 
    	$laDate = $_REQUEST['laDate'];
    	$leIDmedoc = $_REQUEST['medic'];
    	$leNbr = $_REQUEST['nbrEchantillon'];
        
        //ajout du nouveau lot
    	AjoutNewLot($laDate,$leIDmedoc,$leNbr);
        //message de succés
    	echo "<script>alert(\"Le nouveau lot a été enregistré\")</script>";
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