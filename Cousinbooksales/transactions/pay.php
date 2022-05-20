<?php
require_once("../transactions/settings.php");
require_once("../transactions/function.php");

?>
<?php

if (isset($_POST["id"])) {
    $mustid    =   $_POST["id"];
    $tutar     =    $_POST["tutar"];
    
    $paycome    =   $dbconnect->prepare("select Bakiye from user where id=?");
    $paycome->execute([$mustid]);
    $paycome    =   $paycome->fetchColumn(); 

    $total=$paycome+$tutar;
    
    
    $payedit    =   $dbconnect->prepare("update user set Bakiye=? where id=?");
    $payedit->execute([$total,$mustid]);
    $payedit=$payedit->rowCount();
    if ($payedit>0) {
        header("location:".$stlink."/pages/booksales.php");
        die();     
    }else
    {
        header("location:".$stlink."/pages/payment.php");
        die();   
    }
















}else
{
    header("locaiton:".$stlink."/pages/payment.php");
    exit;
}
?>