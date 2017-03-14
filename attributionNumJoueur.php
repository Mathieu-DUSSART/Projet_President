<?php
require_once("include/config.inc.php");
require_once("include/autoLoad.inc.php");
$pdo = new Mypdo();
$managerPartie = new PartieManager($pdo);

$nbJoueur= $managerPartie->getNbJoueurPartie($_GET['idPartie']);
echo $nbJoueur;
