<?php
session_start();
require_once("include/config.inc.php");
require_once("include/autoLoad.inc.php");
$pdo = new Mypdo();
$managerPartie = new PartieManager($pdo);


$numPartie = $managerPartie -> existeJoueurPartie($_GET["idJoueur"]);



echo $numPartie[0];

?>
