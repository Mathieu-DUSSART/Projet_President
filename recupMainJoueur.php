<?php
require_once("include/config.inc.php");
require_once("include/autoLoad.inc.php");
$pdo = new Mypdo();
$managerMain = new MainManager($pdo);

$tabCarte = $managerMain->getMainJoueur(1);

foreach ($tabCarte as $carte) {
    $jsonData[] = [$carte->getIdCarte(), $carte->getValeurCarte(), $carte->getImgCarte()];
}



echo(json_encode($jsonData, JSON_FORCE_OBJECT));
 ?>
