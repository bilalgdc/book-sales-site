<?php
require_once("../transactions/settings.php");
require_once("../transactions/function.php");

?>
<?php
if (isset($_POST["adresid"])) {
    $adresid    =   $_POST["adresid"];
    $mustid     =   $_POST["mustid"];

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


if (($sehir!="") and ($ilce!="") and ($posta!="") and ($adres!="")) {
  
    $adrupdate  =   $dbconnect->prepare("update adress set musteriid=?, il=?, ilce=?, postaKodu=?, acikAdres=? where id=?");
    $adrupdate->execute([$mustid,$sehir,$ilce,$posta,$adres,$adresid]);
    $adrupdate  =   $adrupdate->rowCount();
    if ($adrupdate>0)
    {
       header("location:".$stlink."/pages/adress.php?id=".$mustid);
        exit;
    }else
    {
        header("location:".$stlink."/pages/adress.php?id=".$mustid);
        exit;
    }
    
}else
{
    header("location:".$stlink."/pages/adress.php?id=".$mustid);
    exit;
}














}else
{
    header("location:".$stlink."/pages/adress.php?id=".$mustid);
    die();
}
?>