<?php
require_once("include/config.inc.php");
require_once("include/autoLoad.inc.php");
$pdo = new Mypdo();
$managerMain = new MainManager($pdo);
$managerCarte = new CarteManager($pdo);
$managerPartie = new PartieManager($pdo);

$jsonData = [];
$tabcarte = $managerCarte->getAllCarte();
$tabJoueur1 = [];
$tabJoueur2 = [];
$tabJoueur3 = [];
$tabJoueur4 = [];

$nbJoueur = 4;
$idPartie = 1;
$tabJoueur = Array();


while($managerPartie->getNbJoueurPartie($idPartie)!=4){

}

$tabJoueur = $managerPartie->getJoueurPartie($idPartie);
$nbCarteParJoueur = 52 / $nbJoueur;

for($i = 0 ; $i < 52 ; $i++){
    //Sélectionne une carte aléatoire
    $rand = mt_rand(0, count($tabcarte)-1);
    $carte = $tabcarte[$rand];

    $tab = [$carte->getIdCarte(), $carte->getValeurCarte(), $carte->getImgCarte()];
    if($i < $nbCarteParJoueur){
        $idJoueur = $tabJoueur[0];
        $tabJoueur1[] = $tab;
    }elseif($i >= $nbCarteParJoueur && $i < $nbCarteParJoueur*2){
        $idJoueur = $tabJoueur[1];
        $tabJoueur2[] = $tab;
    }elseif($i >= $nbCarteParJoueur*2 && $i < $nbCarteParJoueur*3){
        $idJoueur = $tabJoueur[2];
        $tabJoueur3[] = $tab;
    }elseif($i >= $nbCarteParJoueur*3 && $i < $nbCarteParJoueur*4){
        $idJoueur = $tabJoueur[3];
        $tabJoueur4[] = $tab;
    }

    $managerMain->addCarte($carte->getIdCarte(), $idJoueur);

    array_splice($tabcarte, $rand, 1);
}
$jsonData[0] = [$tabJoueur1];
$jsonData[1] = [$tabJoueur2];
$jsonData[2] = [$tabJoueur3];
$jsonData[3] = [$tabJoueur4];
echo json_encode($jsonData, JSON_FORCE_OBJECT);


 ?>
