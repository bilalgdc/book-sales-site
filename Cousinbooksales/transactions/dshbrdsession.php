<?php
session_start();
require_once("settings.php");
require_once("function.php");

?>
<?php
if (isset($_SESSION["user"])) {
    header("Location:".$stlink."/pages/dashboard.php");
    die();
}