<?php
if (!isset($_REQUEST['action']))
	$action = "newLot" ;
else
	$action = $_REQUEST['action'] ;
	
switch ($action)
	{
	case "newLot" : { 
			$nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom']; 
            //require "view/v_dashboard.php";
			require "includes/modele/gestion_bdd.php";
            $lesMedocs = getMedicaments();
            require "view/v_nouveauLot.php";        
            
            break ;}  

    case "validationNewLot" : {
    	echo "Bravo votre lot est valider";
    	$laDate = $_REQUEST['laDate'];
    	$leMedicament = $_REQUEST['medic'];
    	echo $laDate;
    	echo $leMedicament;
    	
		break;
	}
         
     		
	}
	
?>