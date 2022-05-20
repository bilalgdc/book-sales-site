<?php
require_once("../transactions/settings.php");
require_once("../transactions/function.php");
?>
<?php
if (isset($_GET["basketid"])) {
    $cbasket    =   $dbconnect->prepare("delete from basket where basketid=?");
    $cbasket->execute([$_GET["basketid"]]);
    $cbasket    =   $cbasket->rowCount();
    if ($cbasket>0) {
        header("location:".$stlink."/pages/basketlist.php");
        exit;
    }else {
        header("location:".$stlink."/pages/basketlist.php");
        exit;
    }
}elseif (isset($_GET["musteriid"])) {
    $cmusteri   =   $dbconnect->prepare("delete from basket where musteriid=?");
    $cmusteri->execute([$_GET["musteriid"]]);
    $cmusteri   =   $cmusteri->rowCount();
    if ($cmusteri>0) {
        header("location:".$stlink."/pages/basketlist.php");
        exit;
    }else {
        header("location:".$stlink."/pages/basketlist.php");
        exit;
    }
    
}else {
    header("location:".$stlink."/pages/basketlist.php");
    exit;
}













































































?>