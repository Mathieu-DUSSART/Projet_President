<?php
session_start();
//echo isset($_SESSION["login"]);

if(isset($_SESSION["login"])){
    echo $_SESSION["login"];
}else{
    echo "";
}

 ?>
