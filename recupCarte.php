<?php
require_once("include/config.inc.php");
require_once("include/autoLoad.inc.php");
$pdo = new Mypdo();
$managerCarte = new CarteManager($pdo);
$tabJoueur1 = Array();
$tabcarte = $managerCarte->getAllCarte();

for($i = 0 ; $i <8 ; $i++){
    $rand = mt_rand(0, count($tabcarte)-1);
    $tabJoueur1[] = $tabcarte[$rand];
    echo $tabcarte[$rand]->getIdCarte() . "<br>";
    array_splice($tabcarte, $rand, 1);
}




 ?>
