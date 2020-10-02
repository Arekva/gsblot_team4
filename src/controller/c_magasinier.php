<?php

$echantillons = getEchantillonsEnStock();
$qtMedocs = getNombreMedicaments();
$medicaments = getMedicaments();



if(!isset($_REQUEST['action']))$mode = "consultationMedocs";
else $mode = $_REQUEST['action'];

include "view/v_magasin_choix.php";

switch($mode) {
    case "consultationMedocs":
        include "view/v_magasin_consult_stock.php";
    break;

    case "consultationSortis":
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
