<?php
require_once("../transactions/settings.php");
require_once("../transactions/function.php");

?>
<?php
if (isset($_POST["kitapAdi"])) {
	$kAdi  =	$_POST["kitapAdi"];
}else
{
	$kAdi =	"";
}



if (isset($_POST["kitapTuru"])) {
    $kTuru =  ""; 
    for ($i=0; $i <count($_POST['kitapTuru']) ; $i++) { 
        $kTuru.="|";
        $kTuru .=$_POST['kitapTuru'][$i];
        $kTuru.="|";
        if ($i!=    (count($_POST['kitapTuru'])-1)) {  
            $kTuru.=",";
        }
    }  
}


if (isset($_POST["kitapKonusu"])) {
	$kKonu  =	$_POST["kitapKonusu"];
}else
{
	$kKonu =	"";
}
if (isset($_POST["yayinevi"])) {
	$kYevi =	$_POST["yayinevi"];
}else
{
	$kYevi =  0;
}
if (isset($_POST["yazar"])) {
	$kyazar =	$_POST["yazar"];
}else
{
	$kyazar =  0;
}

if (isset($_POST["aktif"]))
{
    if ($_POST["aktif"]=="on") {
        $aktif=1;
    }
}else {
    $aktif=0;
}


if (isset($_POST["kitapbTarih"])) {
	$ktarih =	$_POST["kitapbTarih"];
}else
{
	$ktarih =  "1770";
}
if (isset($_POST["kitapFiyat"])) {
	$kFiyat =	$_POST["kitapFiyat"];
}else
{
	$kFiyat =  "0";
}
if (isset($_FILES["kitapResim"])) {
	$kResim =	$_FILES["kitapResim"];
    $kResimUzanti = explode(".",$_FILES["kitapResim"]["name"])[1];
    $kResimAdi = md5(microtime()).".".$kResimUzanti;
    $kResimTuru =	$_FILES["kitapResim"]["type"];
    $kResimTempAdi =	$_FILES["kitapResim"]["tmp_name"];
    $kResimHata =	$_FILES["kitapResim"]["error"];
    $kResimBoyut =	$_FILES["kitapResim"]["size"];

    $yol = "C:/xampp/htdocs/proje/images/";
    
    
}
else
{
	$kResim =	"";
}
if (($kAdi!="") and ($kTuru!="") and ($kKonu!="") and ($kYevi!="") and ($kyazar!="") and ($ktarih!="") and ($kResim!="") and ($kFiyat!="")) {

    $bookadd    = $dbconnect->prepare("insert into books(kitapAdi,kitapTuru,kitapKonusu,yayinEviId,kitapYazarId,kitapbTarih,kitapResim,Fiyat,Aktif) values(?,?,?,?,?,?,?,?,?)");
    $bookadd->execute([$kAdi,$kTuru,$kKonu,$kYevi,$kyazar,$ktarih,$kResimAdi,$kFiyat,$aktif]);
    $bookadd    =$bookadd->rowCount();
    if ($bookadd>0) {
        move_uploaded_file($kResimTempAdi,$yol.$kResimAdi);
       header("location:".$stlink."/pages/bookadd.php");
       exit;
    }
    else
    {
        header("location:".$stlink."/pages/bookadd.php");
        exit;
    }
}
else
{
    header("location:".$stlink."/pages/bookadd.php");
    die();
}



?>