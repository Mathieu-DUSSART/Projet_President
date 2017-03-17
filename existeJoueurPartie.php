<?php
session_start();
require_once("include/config.inc.php");
require_once("include/autoLoad.inc.php");
$pdo = new Mypdo();
$managerPartie = new PartieManager($pdo);

$idJoueur = $managerPartie -> getIdJoueur($_SESSION["login"]);

$numPartie = $managerPartie -> existeJoueurPartie($idJoueur);



echo $numPartie[0];

?>
