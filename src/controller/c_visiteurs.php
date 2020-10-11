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
        break;
        }




    case "ConsulterParMedoc" :{ 

    
        $lesMedicaments = getMedicaments();

        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom']; 
        $_SESSION['affichage'] = array("v_visit_show_samples_by_drug");
        require "view/v_dashboard.php";
            
        
        break ;
        } 
    case "ConsulterParMedocTab" :{ 


        $medoc = $_REQUEST['medicament'];
            
        
        $ADonner = getVisiteurEchantillonDispo($_SESSION['id'],$medoc);

        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom']; 
        $_SESSION['affichage'] = array("v_visit_tabdrug");
        require "view/v_dashboard.php";
            
        
        break ;
        } 





    case "ConsulterParDateVisite" :{ 

        $lesDates = getDateDonEchantillon();

        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom']; 
        $_SESSION['affichage'] = array("v_visit_show_samples_by_visit");
        require "view/v_dashboard.php";
            
        
        break ;
        } 
    case "ConsulterParDateVisiteTab" :{ 

        $date = $_REQUEST['date'];

        $lesDates = getEchantillonParDateDon($date);

        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom']; 
        $_SESSION['affichage'] = array("v_visit_tabvisit");
        require "view/v_dashboard.php";
            
        
        break ;
        } 






    case "ConsulterParMedecin" :{ 

        $lesMedecins = getMedecinEchantillon();

        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom']; 
        $_SESSION['affichage'] = array("v_visit_show_samples_by_exit");
        require "view/v_dashboard.php";
            
        
        break ;
        } 
    case "ConsulterParMedecinTab" :{ 

        $matricule = $_REQUEST['matricule'];
        $medecin = getUnMedecin($matricule);
        $lesEchantillons = getEchantillonParMedecin($matricule);

        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom']; 
        $_SESSION['affichage'] = array("v_visit_tabexit");
        require "view/v_dashboard.php";
            
        
        break ;
        } 
    }
	
?>