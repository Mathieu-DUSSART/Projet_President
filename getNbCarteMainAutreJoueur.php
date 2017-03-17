<?php
require_once("include/config.inc.php");
require_once("include/autoLoad.inc.php");
$pdo = new Mypdo();
$managerMain = new MainManager($pdo);
$managerCarte = new CarteManager($pdo);
$managerPartie = new PartieManager($pdo);

$tabNbCarteAutreJoueur = $managerMain->getNombreCarteMainAutreJoueur($_GET["idPartie"], $_GET["idJoueur"]);

echo (json_encode($tabNbCarteAutreJoueur, JSON_FORCE_OBJECT));
 ?>
