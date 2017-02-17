<?php
session_start();

require_once("include/config.inc.php");
require_once("include/autoLoad.inc.php");
$pdo = new Mypdo();
$managerPartie = new PartieManager($pdo);

$listePartie = $managerPartie->getPartie();
$jsonData = [];
$i=0;
foreach($listePartie as $partie){
	$numPartie = $partie->getIdPartie();
	$nomPartie = $partie->getNomSalon();
	$jsonData[$i] = [$numPartie, $nomPartie, $managerPartie->getNbJoueurPartie($numPartie)];
	$i++;
}
echo json_encode($jsonData, JSON_FORCE_OBJECT);
?>
