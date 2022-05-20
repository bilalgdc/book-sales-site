<?php
require_once("../transactions/settings.php");
require_once("../transactions/function.php");
?>

<?php

if (isset($_POST["id"])) {
    
$kitapAdi= $_POST["kitapAdi"];


    $kitapTuru =  ""; 
    for ($i=0; $i <count($_POST['kitapTuru']) ; $i++) { 
        $kitapTuru.="|";
        $kitapTuru .=$_POST['kitapTuru'][$i];
        $kitapTuru.="|";
        if ($i!=    (count($_POST['kitapTuru'])-1)) {
            $kitapTuru.=",";
        }
    }  
    

if ($_POST["aktif"]=="on") {$aktif=1;}
else {$aktif=0;}




$kitapKonusu= $_POST["kitapKonusu"];
$kitapFiyat= $_POST["kitapFiyat"];
$yayinevi= $_POST["yayinevi"];
$yazar= $_POST["yazar"];
$kitapbTarih= $_POST["kitapbTarih"];
$kitapResim= $_FILES["kitapResim"];

if ($kitapResim["name"]!="") {
    $kResim =	$_FILES["kitapResim"];
    $kResimUzanti = explode(".",$_FILES["kitapResim"]["name"])[1];
    $kResimAdi = md5(microtime()).".".$kResimUzanti;
    $kResimTuru =	$_FILES["kitapResim"]["type"];
    $kResimTempAdi =	$_FILES["kitapResim"]["tmp_name"];
    $kResimHata =	$_FILES["kitapResim"]["error"];
    $kResimBoyut =	$_FILES["kitapResim"]["size"];

    $yol = "C:/xampp/htdocs/proje/images/";
    move_uploaded_file($kResimTempAdi,$yol.$kResimAdi);

    $editbook = $dbconnect->prepare("Update books set kitapAdi=?, kitapTuru=?, kitapKonusu=?, yayinEviId=?, kitapYazarId=?, kitapbTarih=?,kitapResim=?,Fiyat=?,Aktif=? where id=?");
    $editbook->execute([$kitapAdi,$kitapTuru,$kitapKonusu,$yayinevi,$yazar,$kitapbTarih,$kResimAdi,$kitapFiyat,$aktif,$_POST["id"]]);
    $editbook=$editbook->rowCount();
    if ($editbook>0) {
        header("location:".$stlink."/pages/books.php");
        die();
    }
    else {
        header("location:".$stlink."/pages/books.php");
        die();
    }

}else
{
    $editbook = $dbconnect->prepare("Update books set kitapAdi=?, kitapTuru=?, kitapKonusu=?, yayinEviId=?, kitapYazarId=?, kitapbTarih=?,Fiyat=?,Aktif=? where id=?");
    $editbook->execute([$kitapAdi,$kitapTuru,$kitapKonusu,$yayinevi,$yazar,$kitapbTarih,$kitapFiyat,$aktif,$_POST["id"]]);
    $editbook=$editbook->rowCount();
    if ($editbook>0) {
        header("location:".$stlink."/pages/books.php");
        die();
    }
    else {
        header("location:".$stlink."/pages/books.php");
        die();
    }
}


}else
{
    header("location:".$stlink."/pages/books.php");
    die();
}



?>
