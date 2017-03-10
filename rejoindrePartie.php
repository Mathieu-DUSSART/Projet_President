<?php
session_start();

require_once("include/config.inc.php");
require_once("include/autoLoad.inc.php");
$pdo = new Mypdo();
$managerConnexion = new ConnexionManager($pdo);
$managerPartie = new PartieManager($pdo);

$login = $managerConnexion->getIdJoueurLogin($_SESSION["login"]);

if($managerPartie->addJoueurPartie($login, $_GET["idPartie"])){
    echo "Success";
}else{
    echo "Failed";
}
?>
