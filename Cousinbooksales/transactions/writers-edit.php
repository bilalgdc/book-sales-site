<?php
require_once("settings.php");
require_once("function.php");
?>

<?php

if (isset($_POST["id"])) {
     $yazarAdi  =   $_POST["yazarAdi"];
     $yazarSoyadi  =   $_POST["yazarSoyadi"];
     $yazarBilgisi  =   $_POST["yazarBilgisi"];
     $yazarEmail  =   $_POST["yazarEmail"];
     $yazaril  =   $_POST["yazaril"];
     $yazardTarih  =   $_POST["yazardTarih"];

     $writersedit  = $dbconnect->prepare("update writers set yazarAdi=?,yazarSoyadi=?,yazarBilgisi=?,yazarEmail=?,yazaril=?,yazardTarih=? where id=? ");
     $writersedit->execute([$yazarAdi,$yazarSoyadi,$yazarBilgisi,$yazarEmail,$yazaril,$yazardTarih,$_POST["id"]]);
     $writersedit=$writersedit->rowCount();
     if ($writersedit>0) {
        header("location:".$stlink."/pages/writers-update.php");
        die();
     }
     else {
        header("location:".$stlink."/pages/writers.php");
        die();
     }



}
else {
    header("location:".$stlink."/pages/writers.php");
    die();
}









?>