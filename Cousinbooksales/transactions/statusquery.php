<?php
require_once("settings.php");
require_once("function.php");
?>
<?php
   $stquery        =   $dbconnect->prepare("SELECT * FROM user where Status =1 ");
   $stquery->execute();
   $stcount        =   $stquery->rowCount();
   $stquery             =  $stquery->fetch(PDO::FETCH_ASSOC);
?>