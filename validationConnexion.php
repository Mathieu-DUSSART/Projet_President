<?php
require_once("include/config.inc.php");
require_once("include/autoLoad.inc.php");
$pdo = new Mypdo();
$managerConnexion = new ConnexionManager($pdo);

if(isset($_POST['login']) && isset($_POST['password'])){
    $login = $_POST['login'];
    $password = $_POST['password'];

    if($managerConnexion->checkLoginPassword($login, $password)){
        echo "Success";
    }else{
        echo "Fail";
    }
}
?>
