<?php
require_once("../transactions/settings.php");
require_once("../transactions/function.php");
?>

<?php
if (isset($_GET["id"])) {
    
    $publisherdel   = $dbconnect->prepare("Delete from publisher where yid=?");
    $publisherdel->execute([$_GET["id"]]);
    header("location:".$stlink."/pages/publisher.php");
    die();
}
else
{
    header("location:".$stlink."/pages/publisher.php");
    die();
}


?>
