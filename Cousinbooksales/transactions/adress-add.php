<?php
require_once("../transactions/settings.php");
require_once("../transactions/function.php");

?>
<?php

if (isset($_POST["id"])) {
    $mustid=$_POST["id"];

    // ----------------------------------------------
if (isset($_POST["sehir"])) {
	$sehir  =	$_POST["sehir"];
}else
{
	$sehir =	"";
}
if (isset($_POST["ilce"])) {
	$ilce  =	$_POST["ilce"];
}else
{
	$ilce =	"";
}
if (isset($_POST["posta"])) {
	$posta  =	$_POST["posta"];
}else
{
	$posta =	"";
}
if (isset($_POST["adres"])) {
	$adres  =	$_POST["adres"];
}else
{
	$adres =	"";
}


if (($sehir!="") && ($ilce!="") && ($adres!="") && ($posta!="")) 
{
    $adresadd   =   $dbconnect->prepare("insert into adress(musteriid,il,ilce,postaKodu,acikAdres) values(?,?,?,?,?)");
    $adresadd->execute([$mustid,$sehir,$ilce,$posta,$adres]);
    $adresadd= $adresadd->rowCount();
    if ($adresadd>0) 
    {
        header("location:".$stlink."/pages/adress.php?id=".$mustid);
        die();
    }else
    {
        header("location:".$stlink."/pages/booksales.php");
        die();
    }
   





}else
{
    header("location:".$stlink."/pages/booksales.php");
    die();
}






//------------------------------------
}else
{
    header("location:".$stlink."/pages/adress.php");
    die();
}
?>