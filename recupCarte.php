<?php
require_once("include/config.inc.php");
require_once("include/autoLoad.inc.php");
$pdo = new Mypdo();
$managerCarte = new CarteManager($pdo);
$tabJoueur1 = Array();
$jsonData = [];
$tabcarte = $managerCarte->getAllCarte();

for($i = 0 ; $i <8 ; $i++){
    $rand = mt_rand(0, count($tabcarte)-1);
    $carte = $tabcarte[$rand];
    $tabJoueur1[] = $carte;
    $jsonData[$i] = [$carte->getIdCarte(), $carte->getValeurCarte(), $carte->getImgCarte()];
    echo $carte->getIdCarte() . "<br>";
    array_splice($tabcarte, $rand, 1);
}

echo json_encode($jsonData, JSON_FORCE_OBJECT);


 ?>
