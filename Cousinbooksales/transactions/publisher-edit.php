<?php
require_once("../transactions/settings.php");
require_once("../transactions/function.php");
?>

<?php

if (isset($_POST["id"])) {
    
$yAdi= $_POST["yAdi"];
$yAdres= $_POST["yAdres"];
$yTel= $_POST["yTel"];
$yEmail= $_POST["yEmail"];


    $pbedit = $dbconnect->prepare("Update publisher set yAdi=?, yAdres=?, yTel=?, yEmail=? where yid=?");
    $pbedit->execute([$yAdi,$yAdres,$yTel,$yEmail,$_POST["id"]]);
    $pbedit=$pbedit->rowCount();
    if ($pbedit>0) {
        header("location:".$stlink."/pages/publisher-update.php");
        die();
    }
    else {
        header("location:".$stlink."/pages/publisher.php");
        die();
    }
}
else
{
    header("location:".$stlink."/pages/publisher.php");
    die();
}



?>
