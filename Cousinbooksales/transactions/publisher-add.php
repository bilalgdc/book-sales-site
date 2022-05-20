<?php
require_once("../transactions/settings.php");
require_once("../transactions/function.php");

?>
<?php


if (isset($_POST["yAdi"])) {
	$yAdi  =	$_POST["yAdi"];
}else
{
	$yAdi =	"";
}
if (isset($_POST["yAdres"])) {
	$yAdres  =	$_POST["yAdres"];
}else
{
	$yAdres =	"";
}
if (isset($_POST["yTel"])) {
	$yTel  =	$_POST["yTel"];
}else
{
	$yTel =	"";
}
if (isset($_POST["yEmail"])) {
	$yEmail =	$_POST["yEmail"];
}else
{
	$yEmail =  "";
}

if (($yAdi!="") and ($yAdres!="") and ($yTel!="") and ($yEmail!="")) {

    $bookadd    = $dbconnect->prepare("insert into publisher(yAdi,yAdres,yTel,yEmail) values(?,?,?,?)");
    $bookadd->execute([$yAdi,$yAdres,$yTel,$yEmail]);
    $bookadd    =$bookadd->rowCount();
    if ($bookadd>0) {
       header("location:".$stlink."/pages/publisheradd.php");
       exit;
    }
    else
    {
        header("location:".$stlink."/pages/publisheradd.php");
        exit;
    }
}
else
{
    header("location:".$stlink."/pages/publisheradd.php");
    die();
}



?>