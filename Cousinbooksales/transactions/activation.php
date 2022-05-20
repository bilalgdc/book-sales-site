<?php
require_once("settings.php");
require_once("function.php");

if(isset($_GET["ActivationCode"]))
{
    $cmactivatecode = security($_GET["ActivationCode"]);
}else {
    $cmactivatecode ="";
}

if(isset($_GET["Email"]))
{
    $cmemail = security($_GET["Email"]);
}else {
    $comemail ="";
}

if (($cmactivatecode!="") and($cmemail!="")
{
    $controlquery       =   $dbconnect->prepare("select * from user where Email = ? AND actcode= ?");
    $controlquery->execute($cmemail,$cmactivatecode);
    $controlcount       =$controlquery->rowCount();
    if ($controlcount>0) {

        $userupdatequery       =   $dbconnect->prepare("UPDATE user SET Status =1");
        $userupdatequery->execute();
        $userupdatecount       =$userupdatequery->rowCount();
        if ($userupdatecount>0) {
            header("Location: ".$stlink);
        }else{"Location:".$stlink}

        
    }
    else{header("Location".$stlink); exit();}
}
else
{
    header("Location".$stlink);
}








?>

