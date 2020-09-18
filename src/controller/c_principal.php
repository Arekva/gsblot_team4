<?php
if (!isset($_REQUEST['uc'])) {
    $uc = "accueil" ;
}
else{
	$uc = $_REQUEST['uc'];

}
switch ($uc)
{
    case 'accueil' : {  include "c_accueil.php" ; break ;} 
    case 'production' : {  include "c_production.php" ; break ;}
    case 'magasinier' : {  include "c_magasinier.php" ; break ;}
    case 'visiteurs' : {  include "c_visiteurs.php" ; break ;}
	case 'deconnexion' : {  include "includes/modele/deconnexion.php" ; break ;}
}

?>

