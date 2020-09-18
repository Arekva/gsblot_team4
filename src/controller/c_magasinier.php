<?php

require "includes/modele/gestion_bdd.php";
$echantillons = getEchantillons();
include "view/v_magasin_consult_stock.php";

?>
