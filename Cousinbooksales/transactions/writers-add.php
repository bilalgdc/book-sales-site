<?php
require_once("../transactions/settings.php");
require_once("../transactions/function.php");
?>


<?php
if (isset($_POST["yazarAdi"])) {
	$wAdi  =	$_POST["yazarAdi"];
}else
{
	$wAdi =	"";
}
if (isset($_POST["yazarSoyadi"])) {
	$wSoyadi  =	$_POST["yazarSoyadi"];
}else
{
	$wSoyadi =	"";
}

if (isset($_POST["yazarBilgisi"])) {
	$wBilgi  =	$_POST["yazarBilgisi"];
}else
{
	$wBilgi =	"";
}

if (isset($_POST["yazarEmail"])) {
	$wEmail  =	$_POST["yazarEmail"];
}else
{
	$wEmail =	"";
}

if (isset($_POST["yazaril"])) {
	$wIl  =	$_POST["yazaril"];
}else
{
	$wIl =	"";
}

if (isset($_POST["yazardTarih"])) {
	$wdt  =	$_POST["yazardTarih"];
}else
{
	$wdt =	"";
}
if ( ($wAdi!="") and ($wSoyadi!="") and ($wBilgi!="") and ($wEmail!="") and ($wIl!="") and ($wdt!="")) {
    $writeradd= $dbconnect->prepare("insert into writers(yazarAdi,yazarSoyadi,yazarBilgisi,yazarEmail,yazaril,yazardTarih) values(?,?,?,?,?,?)");
    $writeradd->execute([$wAdi,$wSoyadi,$wBilgi,$wEmail,$wIl,$wdt]);
    $writeradd=$writeradd->rowCount();
    if ($writeradd>0) {
        header("location:".$stlink."/pages/writeradd.php");
        die();
    }
    else
    {
        header("location:".$stlink."/pages/writeradd.php");
        die();
    }

}
else
{
    header("location:".$stlink."/pages/writeradd.php");
    die();
}






















?>