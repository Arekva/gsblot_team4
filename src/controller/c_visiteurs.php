<?php
if (!isset($_REQUEST['action']))
	$action = "DonEchantillon" ;
else
	$action = $_REQUEST['action'] ;
	
switch ($action)
	{
	case "DonEchantillon" : { 
             
            $nom = $_SESSION['nom'];
            $prenom = $_SESSION['prenom']; 
            $_SESSION['affichage'] = array("v_visit_poi","v_visit_show_samples_by_drug","v_visit_show_samples_by_visit");
            require "view/v_dashboard.php";
            $var =  getEchantillonMedicament("UltraXanax42000");
            echo $var;
            break ;}  
         
     		
	}
	
?>