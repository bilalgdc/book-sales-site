<?php
require_once("../transactions/settings.php");
require_once("../transactions/function.php");
?>
<?php
if (isset($_GET["id"])) {
  
    $bktypdel   = $dbconnect->prepare("Delete from booktype where id=?");
    $bktypdel->execute([$_GET["id"]]);
    $bktypdel->rowCount();
    if ($bktypdel>0) {
        header("location:".$stlink."/pages/booktype.php");
        die();
    }
    
}
else
{
    header("location:".$stlink."/pages/booktype.php");
    die();
}


?>