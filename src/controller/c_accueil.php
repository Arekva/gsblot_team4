<?php
if (!isset($_REQUEST['action']))
	$action = "pageDeCo" ;
else
	$action = $_REQUEST['action'] ;
	
switch ($action)
{
	case "pageDeCo" : { 
            require "view/login.php" ; 
            break ;             
     		}
    case "authentification" : {
            
            $id = $_REQUEST['login'];
            $mdp = $_REQUEST['mdp'];
            require "includes/modele/gestion_bdd.php";
            $user = getUser($id,$mdp);
            if (count($user) > 0){
                $NivoAutorisation = $user[0]['gsb_autorisation'];   
                $nom =$user[0]['gsb_nom'];
                $prenom =$user[0]['gsb_prenom']; 
                
                if ($user[0]['gsb_autorisation'] == 1) {
                    $uc="production";
                }
                else if ($user[0]['gsb_autorisation'] == 2){
                    $uc="magasinier";
                }
                else if ($user[0]['gsb_autorisation'] == 3){
                    $uc="visiteurs";

                } 
                $_SESSION['droit'] = $user[0]['gsb_autorisation'];
                $_SESSION['nom'] =  $nom;
                $_SESSION['prenom'] = $prenom; 
                header("Location:index.php?uc=".$uc);              
                }
                else {echo "<script>alert(\"Erreur mauvais identifiants\")</script>";
                   require "view/login.php" ; 

            }
            break;
    }
}
?>
