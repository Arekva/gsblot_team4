<?php
if (!isset($_REQUEST['action']))
	$action = "ChoixMedicDateMedecin" ;
else
	$action = $_REQUEST['action'] ;
	
switch ($action)
	{
	case "ChoixMedicDateMedecin" : { 
   
            
            $lesMedecins = getLesMedecins();
            $lesMedicaments = getMedicaments();

            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom']; 
            $_SESSION['affichage'] = array("v_visit_poi");
            require "view/v_dashboard.php";
              
            
            break ;}  
    case "donTableau" :{
        //$lesEchantillons =  getEchantillonMedicament("UltraXanax42000");

            $date = $_REQUEST['date'];
            $medecin = $_REQUEST['medecin'];
            $medoc = $_REQUEST['medicament'];
            $visiteur = $_SESSION['id'];
            $ADonner = getVisiteurEchantillonDispo($visiteur,$medoc);

            

            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom']; 
            $_SESSION['affichage'] = array("v_visit_tabpoi");
            require "view/v_dashboard.php";
        break;
        }

    case "ValidationDon":{
            $date = $_REQUEST['date'];
            $medecin = $_REQUEST['medecin'];
            $medoc = $_REQUEST['medicament'];
            
        
            $ADonner = getVisiteurEchantillonDispo($_SESSION['id'],$medoc);
            foreach($ADonner as $leDonner){
                if (isset($_REQUEST[$leDonner[0]."_".$leDonner["gsb_numeroLot"]])){
                    setDonnation($date,$medecin,$leDonner["gsb_numeroLot"],$leDonner[0]);

                }
            }


        $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom']; 
            $_SESSION['affichage'] = array("v_visit_tabpoi");
            require "view/v_dashboard.php";
        }
    }
	
?>