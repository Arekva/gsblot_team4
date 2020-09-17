<?php
if (!isset($_REQUEST['action']))
	$action = "authentification" ;
else
	$action = $_REQUEST['action'] ;
	
switch ($action)
{
	case "authentification" : { 
            require "view/login.php" ; 
            break ;             
     		}
    case "dashboard" : {
            
            $id = $_REQUEST['login'];
            $mdp = $_REQUEST['mdp'];
            require "includes/modele/gestion_bdd.php";
            $user = getUser($id,$mdp);
            if (count($user) > 0){
                $NivoAutorisation = $user[0]['gsb_autorisation'];   
                $nom =$user[0]['gsb_nom'];
                $prenom =$user[0]['gsb_prenom'];
                require "view/v_dashboard.php"; 
                
                if ($user[0]['gsb_autorisation'] == 1) {
                    $uc="production";
                }
                else if ($user[0]['gsb_autorisation'] == 2){
                    $uc="magasinier";

                }
                else if ($user[0]['gsb_autorisation'] == 3){
                    $uc="visiteurs";

                }                
                }
                else {echo "<script>alert(\"Erreur mauvais identifiants\")</script>";
                   require "view/login.php" ; 

            }
            break;
    }
}
?>
