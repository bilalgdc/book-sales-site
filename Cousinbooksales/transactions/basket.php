<?php
require_once("../transactions/settings.php");
require_once("../transactions/function.php");

?>
<?php


if (isset($_GET["musteriid"],$_GET["kitapid"])) {
    if (($_GET["musteriid"]!="") and ($_GET["kitapid"]!="")) {
        $musteriid    =   $_GET["musteriid"];
        $kitapid    =   $_GET["kitapid"];    
    }else
    {
        header("location:".$stlink."/pages/booksales.php");
        die();
    }
        $kitapsorgu     =   $dbconnect->prepare("select kitapadet from basket where kitapid=?");
        $kitapsorgu->execute([$kitapid]);
        $kitapsorguC    =  $kitapsorgu->rowCount(); 
        $kitapsorgu     =   $kitapsorgu->fetchColumn();
    if ($kitapsorguC>0) {
        $kitapsorgu=$kitapsorgu+1;
        $basketadd  =   $dbconnect->prepare("update basket set kitapadet=? where kitapid=?");
        $basketadd->execute([$kitapsorgu,$kitapid]);
        $basketadd  = $basketadd->rowCount();
        if ($basketadd>0) {
            header("location:".$stlink."/pages/booksales.php");
            die();
        }else
        {
            header("location:".$stlink."/pages/booksales.php");
            die();
        }
        
        
    }else {
        $basketadd  =   $dbconnect->prepare("insert into basket(musteriid,kitapid) values(?,?)");
        $basketadd->execute([$musteriid,$kitapid]);
        $basketadd  = $basketadd->rowCount();
        if ($basketadd>0) {
            header("location:".$stlink."/pages/booksales.php");
            die();
        }else
        {
            header("location:".$stlink."/pages/booksales.php");
            die();
        }
        
    }
  
    


}else
{
        header("location:".$stlink."/pages/booksales.php");
        die();
}


































?>