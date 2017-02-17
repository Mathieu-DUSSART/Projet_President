<?php
session_start();

require_once("include/config.inc.php");
require_once("include/autoLoad.inc.php");
$pdo = new Mypdo();
$managerPartie = new PartieManager($pdo);

$listePartie = $managerPartie->getPartie();
$jsonData1 = Array();
$jsonData2 = Array();
foreach($listePartie as $partie){

	$jsonData1[$partie->getIdPartie()] = $partie->getNomSalon();
	$jsonData2[$partie->getNomSalon()] = $managerPartie->getNbJoueurPartie($partie->getIdPartie())[0];
}

$jsonData = Array();
$jsonData[] = $jsonData1;
$jsonData[] = $jsonData2;
echo json_encode($jsonData,JSON_FORCE_OBJECT);
?>
