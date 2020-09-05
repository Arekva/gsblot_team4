<?php
session_start();
date_default_timezone_set('Europe/Paris');
/*include "connexion.php" ;*/

include "view/header.php";
include "includes/modele/connectBdd.php";
include "controller/c_accueil.php";
include "view/footer.php";

//test raccord bdd

include "includes/modele/gestion_bdd.php";
$nomMedecin = test();
echo "Nom du medecin : ";
echo $nomMedecin[0][2];
?>



