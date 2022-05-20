<?php
require_once("settings.php");
require_once("function.php");

try {
    $dbconnectt=new PDO("mysql:host=localhost;dbname=databaseproject;charset=utf8;","root","");
} catch (PDOException $ErrorMessage) {
    die();
}
?>


<?php

if (isset($_POST["id"])) {
    
    $SiteName           =   $_POST["SiteName"];
    $SiteTitle          =   $_POST["SiteTitle"];
    $SiteDescription    =   $_POST["SiteDescription"];
    $SiteKeywords       =   $_POST["SiteKeywords"];
    $SiteCopyright      =   $_POST["SiteCopyright"];
    $SiteLogo           =   $_POST["SiteLogo"];
    $SiteEmail          =   $_POST["SiteEmail"];
    $SiteEmailPassword  =   $_POST["SiteEmailPassword"];
    $SiteAgreement      =   $_POST["SiteAgreement"];
    $SiteLink           =   $_POST["SiteLink"];
    $Siteinimg          =   $_FILES["SiteInimg"];
    $Siteupimg          =   $_FILES["SiteUpimg"];

if ($Siteinimg["name"]!="" && $Siteupimg["name"]!="") 
{
    
        /*    Siteinimg   */
    $inimg =	$_FILES["SiteInimg"];
    $inimgUzanti = explode(".",$_FILES["SiteInimg"]["name"])[1];
    $inimgAdi = md5(microtime()).".".$inimgUzanti;
    $inimgTuru =	$_FILES["SiteInimg"]["type"];
    $inimgTempAdi =	$_FILES["SiteInimg"]["tmp_name"];
    $inimgHata =	$_FILES["SiteInimg"]["error"];
    $inimgBoyut =	$_FILES["SiteInimg"]["size"];

    $yol = "C:/xampp/htdocs/proje/assets/img/";
    move_uploaded_file($inimgTempAdi,$yol.$inimgAdi);


            /*    Siteupimg   */
    $upimg =	$_FILES["SiteUpimg"];
    $upimgUzanti = explode(".",$_FILES["SiteUpimg"]["name"])[1];
    $upimgAdi = md5(microtime()).".".$upimgUzanti;
    $upimgTuru =	$_FILES["SiteUpimg"]["type"];
    $upimgTempAdi =	$_FILES["SiteUpimg"]["tmp_name"];
    $upimgHata =	$_FILES["SiteUpimg"]["error"];
    $upimgBoyut =	$_FILES["SiteUpimg"]["size"];

    $yol = "C:/xampp/htdocs/proje/assets/img/";
    move_uploaded_file($upimgTempAdi,$yol.$upimgAdi);


    $stedit= $dbconnectt->prepare("update settings set SiteName=?,SiteTitle=?,SiteDescription=?,SiteKeywords=?,SiteCopyright=?,SiteLogo=?,SiteEmail=?,SiteEmailPassword=?,SiteAgreement=?,SiteLink=?,SiteInimg=?,SiteUpimg=?");
    $stedit->execute([$SiteName,$SiteTitle,$SiteDescription,$SiteKeywords,$SiteCopyright,$SiteLogo,$SiteEmail,$SiteEmailPassword,$SiteAgreement,$SiteLink,$inimgAdi,$upimgAdi]);
    $stedit=$stedit->rowCount();
    if ($stedit>0) {
        header("location:".$stlink."/pages/websitesetting.php");
        exit;
    }
    else {
        header("location:".$stlink."/pages/websitesetting.php");
        exit;
    }
    
}elseif ($Siteinimg["name"]!="" && $Siteupimg["name"]=="") {
    


          /*    Siteinimg   */
          $inimg =	$_FILES["SiteInimg"];
          $inimgUzanti = explode(".",$_FILES["SiteInimg"]["name"])[1];
          $inimgAdi = md5(microtime()).".".$inimgUzanti;
          $inimgTuru =	$_FILES["SiteInimg"]["type"];
          $inimgTempAdi =	$_FILES["SiteInimg"]["tmp_name"];
          $inimgHata =	$_FILES["SiteInimg"]["error"];
          $inimgBoyut =	$_FILES["SiteInimg"]["size"];
      
          $yol = "C:/xampp/htdocs/proje/assets/img/";
          move_uploaded_file($inimgTempAdi,$yol.$inimgAdi);
      
      
          $stedit= $dbconnectt->prepare("update settings set SiteName=?,SiteTitle=?,SiteDescription=?,SiteKeywords=?,SiteCopyright=?,SiteLogo=?,SiteEmail=?,SiteEmailPassword=?,SiteAgreement=?,SiteLink=?,SiteInimg=?");
          $stedit->execute([$SiteName,$SiteTitle,$SiteDescription,$SiteKeywords,$SiteCopyright,$SiteLogo,$SiteEmail,$SiteEmailPassword,$SiteAgreement,$SiteLink,$inimgAdi]);
          $stedit=$stedit->rowCount();
          if ($stedit>0) {
              header("location:".$stlink."/pages/websitesetting.php");
              exit;
          }
          else {
              header("location:".$stlink."/pages/websitesetting.php");
              exit;
          }


}elseif ($Siteupimg["name"]!="" && $Siteinimg["name"]=="") 
{

        
                    /*    Siteupimg   */
            $upimg =	$_FILES["SiteUpimg"];
            $upimgUzanti = explode(".",$_FILES["SiteUpimg"]["name"])[1];
            $upimgAdi = md5(microtime()).".".$upimgUzanti;
            $upimgTuru =	$_FILES["SiteUpimg"]["type"];
            $upimgTempAdi =	$_FILES["SiteUpimg"]["tmp_name"];
            $upimgHata =	$_FILES["SiteUpimg"]["error"];
            $upimgBoyut =	$_FILES["SiteUpimg"]["size"];
        
            $yol = "C:/xampp/htdocs/proje/assets/img/";
            move_uploaded_file($upimgTempAdi,$yol.$upimgAdi);
        
        
            $stedit= $dbconnectt->prepare("update settings set SiteName=?,SiteTitle=?,SiteDescription=?,SiteKeywords=?,SiteCopyright=?,SiteLogo=?,SiteEmail=?,SiteEmailPassword=?,SiteAgreement=?,SiteLink=?,SiteUpimg=?");
            $stedit->execute([$SiteName,$SiteTitle,$SiteDescription,$SiteKeywords,$SiteCopyright,$SiteLogo,$SiteEmail,$SiteEmailPassword,$SiteAgreement,$SiteLink,$upimgAdi]);
            $stedit=$stedit->rowCount();
            if ($stedit>0) {
                header("location:".$stlink."/pages/websitesetting.php");
                exit;
            }
            else {
                header("location:".$stlink."/pages/websitesetting.php");
                exit;
            }
    

}else 
{

    $stedit= $dbconnectt->prepare("update settings set SiteName=?,SiteTitle=?,SiteDescription=?,SiteKeywords=?,SiteCopyright=?,SiteLogo=?,SiteEmail=?,SiteEmailPassword=?,SiteAgreement=?,SiteLink=?");
    $stedit->execute([$SiteName,$SiteTitle,$SiteDescription,$SiteKeywords,$SiteCopyright,$SiteLogo,$SiteEmail,$SiteEmailPassword,$SiteAgreement,$SiteLink]);
    $stedit=$stedit->rowCount();
    if ($stedit>0) {
        header("location:".$stlink."/pages/websitesetting.php");
        exit;
    }
    else {
        header("location:".$stlink."/pages/websitesetting.php");
        exit;
    }
}

}else {
    header("location:".$stlink."/pages/websitesetting.php");
    exit;
}















?>