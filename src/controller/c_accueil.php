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

}

?>