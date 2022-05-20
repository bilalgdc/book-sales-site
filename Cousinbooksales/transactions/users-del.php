<?php
require_once("settings.php");
require_once("function.php");
?>
<?php
if ($_GET["id"]) {
    $userdel    =   $dbconnect->prepare("delete from user where id=?");
    $userdel->execute([$_GET["id"]]);
    header("location:".$stlink."/pages/tables.php");
    die();
}
else {
    header("location:".$stlink."/pages/tables.php");
    die();
}

?>