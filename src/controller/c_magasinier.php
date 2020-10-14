<?php

$echantillons = getEchantillonsEnStock();
$qtMedocs = getNombreMedicaments();
$medicaments = getMedicaments();
$visiteurs = getLesVisiteurs();



if(!isset($_REQUEST['action']))$mode = "renseignement";
else $mode = $_REQUEST['action'];



$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom']; 

switch($mode) {
    case "consultationMedocs":
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom']; 
        $_SESSION['affichage'] = array("v_magasin_consult_stock");
        require "view/v_dashboard.php";
    break;

    case "consultationSortisMedocs":
        if(isset($_REQUEST['medicamentID']))
        {
            $medocId = $_REQUEST['medicamentID'];
        }
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom']; 
        $_SESSION['affichage'] = array("v_magasin_consult_sortis_medocs");
        require "view/v_dashboard.php";
    break;

    case "consultationSortisDates":
        if(isset($_REQUEST['date']))
        {
            $date = $_REQUEST['date'];
        }
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom']; 
        $_SESSION['affichage'] = array("v_magasin_consult_sortis_date");
        require "view/v_dashboard.php";

     case "consultationSortisVisiteur":
        if(isset($_REQUEST['nomRecherche']) && isset($_REQUEST['prenomRecherche']))
        {
            $nomRecherche = $_REQUEST['nomRecherche'];
            $prenomRecherche = $_REQUEST['prenomRecherche'];
        }
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom']; 
        $_SESSION['affichage'] = array("v_magasin_consult_sortis_visiteur");
        require "view/v_dashboard.php";

    case "renseignement":
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom']; 
        $_SESSION['affichage'] = array("v_magasin_renseignement");
        require "view/v_dashboard.php";
    break;

    case "renseignementTableau":
        $date = $_REQUEST['date'];
        $visiteur = $_REQUEST['visiteur'];

        $ADonner = $echantillons;

        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom']; 
        $_SESSION['affichage'] = array("v_magasin_renseignement_confirme");
        require "view/v_dashboard.php";

    case "validationSortis":
        $date = $_REQUEST['date'];
        $visiteur = $_REQUEST['visiteur'];      
        
        $ADonner = $echantillons;
        foreach($ADonner as $leDonner){
            if (isset($_REQUEST[$leDonner[0]."_".$leDonner["gsb_numeroLot"]])){
                setSortis($date,$visiteur,$leDonner["gsb_numeroLot"],$leDonner[0]);
            }
        }

        $echantillons = getEchantillonsEnStock();
        $ADonner = $echantillons;

        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom']; 
        $_SESSION['affichage'] = array("v_magasin_renseignement");
        require "view/v_dashboard.php";

    default:
        echo "<h1>Error</h1>";
    break;
}

?>
