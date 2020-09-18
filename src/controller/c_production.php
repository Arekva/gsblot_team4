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
            //$_SESSION['affichage'] = "view/v_nimp.php";
            require "view/v_dashboard.php";
            require "view/v_nouveauLot.php";
            break ;}  

    case "validationNewLot" : {
    	echo "AAAAAAAAAAAAAAAAAA";
		break;
	}
         
     		
	}
	
?>