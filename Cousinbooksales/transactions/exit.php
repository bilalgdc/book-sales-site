<?php
include 'sessionquery.php';
require_once("../transactions/settings.php");
require_once("../transactions/function.php");
?>
<?php
session_destroy();
session_unset();
header("Location:".$stlink."/pages/sign-in.php");
die();

?>