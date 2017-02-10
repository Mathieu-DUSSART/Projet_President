<?php
if (!empty($_GET["page"])){
    $pageNum=$_GET["page"];}
else{
    $pageNum=1;
}

switch ($pageNum) {
    case 1:
        include_once('/index.php');
        break;

    default : include_once('/index.php');
}


 ?>
