<?php
require_once("include/header.inc.php");
require_once("include/config.inc.php");
require_once("include/autoLoad.inc.php");
require_once("include/function.inc.php");
require_once("include/router.inc.php");
$pdo = new Mypdo();
$managerPartie = new PartieManager($pdo);

require_once("include/footer.inc.php");
?>

<div class="divConnexion">
    <?php
    require_once("include/pages/connexion.inc.php");
    ?>
</div>

<div class="divPartie">
    <?php
    require_once("include/pages/partie.inc.php");
    ?>
</div>
