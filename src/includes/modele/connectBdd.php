<?php
try {
    $bdd = new PDO('mysql:host=stadjutoogg4.mysql.db;dbname=stadjutoogg4;charset=utf8;', 'stadjutoogg4', 'aMonbofis04');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  //echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>