<?php
require_once("include/config.inc.php");
require_once("include/autoLoad.inc.php");
$pdo = new Mypdo();
$managerCarte = new CarteManager($pdo);

$tab = Array();
$tab["carte_id"] = "test";
$tab["carte_valeur"] = 10;
$tab["carte_img"] = "test";
$Carte = new Carte($tab);

echo $managerCarte->poserCarte($_GET["valeur"]);

?>
