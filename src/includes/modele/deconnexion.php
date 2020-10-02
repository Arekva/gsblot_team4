<?php
$_SESSION = array() ;
$_REQUEST = array();
session_destroy();
$bdd=null;
header("Location:index.php");
?>
