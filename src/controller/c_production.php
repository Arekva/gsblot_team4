<?php
if (!isset($_REQUEST['action']))
	$action = "affichage" ;
else
	$action = $_REQUEST['action'] ;
	
switch ($action)
	{
	case "affichage" : { 
             
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom']; 
            $_SESSION['affichage'] = "view/v_nimp.php";
            require "view/v_dashboard.php";
             echo "wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww" ; 
            break ;}           
     		
	}
	case "autre" : {
		$_SESSION['affichage'] = "view/2.php"
	}

?>