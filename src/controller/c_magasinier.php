<?php

$echantillons = getEchantillonsEnStock();
$qtMedocs = getNombreMedicaments();
$medicaments = getMedicaments();
$visiteurs = getLesVisiteurs();



if(!isset($_REQUEST['action']))$mode = "consultationMedocs";
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

    case "consultationSortis":
        //require "view/v_dashboard.php";
        if(isset($_REQUEST['medicamentID']))
        {
            $filtre = getEchantillonsSortis($_REQUEST['medicamentID'], $_REQUEST['dateSortie'], $_REQUEST['visiteurID']);
        }
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom']; 
        $_SESSION['affichage'] = array("v_magasin_consult_sortis");
        require "view/v_dashboard.php";
    break;

    case "renseignement":
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom']; 
        $_SESSION['affichage'] = array("v_magasin_consult_sortis");
        require "view/v_magasin_renseignement.php";
    break;

    default:
        echo "<h1>Error</h1>";
    break;
}

?>
