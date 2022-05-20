<?php
require_once("../transactions/settings.php");
require_once("../transactions/function.php");
?>

<?php
if (isset($_GET["id"])) {
    $writesdell   = $dbconnect->prepare("Delete from writers where id=?");
    $writesdell->execute([$_GET["id"]]);
    header("location:".$stlink."/pages/writers.php");
    die();
}
else
{
    header("location:".$stlink."/pages/writers.php");
    die();
}


?>
