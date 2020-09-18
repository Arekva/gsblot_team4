<?php
if (!isset($_REQUEST['action']))
	$action = "newLot" ;
else
	$action = $_REQUEST['action'] ;
	
switch ($action)
	{
	case "newLot" : { 
             
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom']; 
            $_SESSION['affichage'] = array("v_addLot","v_addLot2","v_addLot3");
            require "view/v_dashboard.php";
            break ;}  
         
     		
	}
	
?>