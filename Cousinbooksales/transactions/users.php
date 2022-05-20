<?php
require_once("settings.php");
require_once("function.php");

?>

<?php

if (isset($_POST["id"])) {
$cmid               =$_POST["id"];
$cmuptname          =$_POST["Name"];
$cmupdsurname       =$_POST["Surname"];
$cmuptemail         =$_POST["Email"];
$cmuptpwd           =$_POST["Password"];
$cmuptsex          =$_POST["sex"];

$sorgu  =   $dbconnect->prepare("select * from user where id=?");
$sorgu->execute($cmid);
$sorgu = $sorgu->fetch(PDO::FETCH_ASSOC);


if ($_POST["Active"]=="on") {$cmuptactive=1;}
else {$cmuptactive=0;}
if ($_POST["Status"]=="on") {$cmuptstatus=1;}
else {$cmuptstatus=0;}

// if ($_POST["Customer"]=="on") {$cmuptcustomer=1;}
//else {$cmuptcustomer=0;}


if ($cmuptpwd=="")
{
    $uptquery       =       $dbconnect->prepare("Update user set Name=?, Surname=?, Email=?, Sex=?,Status=?,Active=? where id=?");
    $uptquery->execute([$cmuptname,$cmupdsurname,$cmuptemail,$cmuptsex,$cmuptstatus,$cmuptactive,$cmid]);
    $uptcount=$uptquery->rowCount();
    if ($uptcount>0) {
        if ($user["Active"]==1) 
        {
          header("Location:".$stlink."/pages/tables.php");
          die();
        }else
        {
            header("Location:".$stlink."/pages/booksales.php");
          die();
        }
    }else 
    {
        if ($sorgu["Active"]==1) 
        {
          header("Location:".$stlink."/pages/tables.php");
          die();
        }else
        {
            header("Location:".$stlink."/pages/booksales.php");
          die();
        }



    }
}else 
{
    $uptquery       =       $dbconnect->prepare("Update user set Name=?, Surname=?, Email=?, Password=?, Sex=?,Status=?,Active=? where id=?");
    $uptquery->execute([$cmuptname,$cmupdsurname,$cmuptemail,md5($cmuptpwd),$cmuptsex,$cmuptstatus,$cmuptactive,$cmid]);
    $uptcount=$uptquery->rowCount();
    if ($uptcount>0) {
    header("Location:".$stlink."/transactions/exit.php");
    die();
    }else 
    {
       
        if ($sorgu["Active"]==1) 
        {
          header("Location:".$stlink."/pages/tables.php");
          die();
        }else
        {
            header("Location:".$stlink."/pages/booksales.php");
          die();
        }

    }

}

}else {
    if ($sorgu["Active"]==1) 
    {
      header("Location:".$stlink."/pages/tables.php");
      die();
    }else
    {
        header("Location:".$stlink."/pages/booksales.php");
      die();
    }

}








?>

