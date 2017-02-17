<?php
session_start();

require_once("include/config.inc.php");
require_once("include/autoLoad.inc.php");
$pdo = new Mypdo();
$managerPartie = new PartieManager($pdo);

$listePartie = $managerPartie->getPartie();
$jsonData = array();
foreach($listePartie as $partie){
	
	$jsonData[$partie->getIdPartie()] = $partie->getNomSalon();
}
echo json_encode($jsonData,JSON_FORCE_OBJECT);
?>
