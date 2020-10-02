<?php

$echantillons = getEchantillonsEnStock();
$qtMedocs = getNombreMedicaments();
$medicaments = getMedicaments();
$visiteurs = getLesVisiteurs();



if(!isset($_REQUEST['action']))$mode = "consultationMedocs";
else $mode = $_REQUEST['action'];

include "view/v_magasin_choix.php";

switch($mode) {
    case "consultationMedocs":
        include "view/v_magasin_consult_stock.php";
    break;

    case "consultationSortis":
        if(isset($_REQUEST['medicamentID']))
        {
            $filtre = getEchantillonsSortis($_REQUEST['medicamentID'], $_REQUEST['dateSortie'], $_REQUEST['visiteurID']);
        }
        include "view/v_magasin_consult_sortis.php";
    break;

    case "renseignement":
        include "view/v_magasin_consult_stock.php";
    break;

    default:
        echo "<h1>Error</h1>";
    break;
}

?>
