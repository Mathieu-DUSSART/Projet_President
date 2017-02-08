<?php
if (!empty($_GET["page"])){
    $pageNum=$_GET["page"];}
else{
    $pageNum=1;
}

switch ($pageNum) {
    case 1:
        include_once('pages/connexion.inc.php');
        break;
    case 2:
        include_once('pages/partie.inc.php');
        break;
        
    default : include_once('pages/connexion.inc.php');
}


 ?>
